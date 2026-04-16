<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


use App\Models\User;
use App\Models\users_c;
use App\Models\types;
use App\Models\adahy_type;
use App\Models\adahyt;
use App\Models\sak;
use App\Models\days;
use App\Models\times;
use App\Models\expense;
use App\Models\income;
use App\Models\pages;
use App\Models\per;
use App\Models\reservation;
use App\Models\treasury_sak;
use App\Models\tr_expense;
use App\Models\tr_income;
use App\Models\butcher;
use App\Models\tr_butcher;
use App\Models\butcher2;
use App\Models\tr_butcher2;
use App\Models\follower;
use App\Models\tr_follower;
use App\Models\vendor;
use App\Models\tr_vendor;
use App\Models\treasures;
use App\Models\treasury;
use App\Models\clients;
use App\Models\clients_history;
use App\Models\reservation_del;
use App\Models\opt;
use App\Models\freez;
use App\Models\trans;
use App\Models\callcenter;
use App\Models\agreement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Session;
use DB;




use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\LogoutOtherDevices;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

public function logind(Request $request)
{

}


public function get_sak_data(Request $request){
          $gov = $request->gov;
          $c = DB::table('adahy_type')->where('id',$gov)->count();
          if($c > 0){
      $name = DB::table('adahy_type')->where('id',$gov)->first()->name;
 
       $get = DB::table('sak')->where('name','LIKE','%'.$name.'%')->get();
          }else{
           $get = DB::table('sak')->get();   
          }
       $res = '<select name="sak"  class="form-control" style="
      width: 100%;
    height: 40px;
    border-radius: 5px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 25px;
    color: #525252;
    padding: 2%;">
    <option value="">
    الكل
    </option>
    ';
    
       foreach ($get as $g){
           $res  .='<option value="'.$g->id.'">'.$g->name.'</option>';
       }
        $res  .='</select>';
        return $res;
    
    
}


public function get_sak_adahy(Request $request){
  $gov = $request->gov;
  $c = DB::table('adahy_type')->where('name',$gov)->count();
  if($c > 0){
$name = DB::table('adahy_type')->where('name',$gov)->first()->name;

$get = DB::table('sak')->where('name','LIKE','%'.$name.'%')->get();
  }else{
   $get = DB::table('sak')->get();   
  }
$res = '<select name="sak"  class="form-control" style="
width: 100%;

border-radius: 10px;
border-color: #d3cec7;
direction: rtl;
font-size: 18px;
color: #525252;
padding: 4%;">
<option value="">
الكل
</option>
';

foreach ($get as $g){
   $res  .='<option value="'.$g->name.'">'.$g->name.'</option>';
}
$res  .='</select>';
return $res;


}
public function get_sak_data2(Request $request){
          $gov = $request->gov;
          $c = DB::table('adahy_type')->where('id',$gov)->count();
          if($c > 0){
      $name = DB::table('adahy_type')->where('id',$gov)->first()->name;
 
       $get = DB::table('sak')->where('name','LIKE','%'.$name.'%')->get();
          }else{
           $get = DB::table('sak')->get();   
          }
       $res = '<select name="sak"  class="form-control" style="
       width: 100%;
    
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">
    <option value="">
    الكل
    </option>
    ';
    
       foreach ($get as $g){
           $res  .='<option value="'.$g->id.'">'.$g->name.'</option>';
       }
        $res  .='</select>';
        return $res;
    
    
}
   public function res_post(Request $request){
    DB::beginTransaction();
    $request->validate([
            'id' => 'required',
            'times' => 'required',
            'c_sak' => 'required',
            'c_persons' => 'required',
            'day' => 'required',
        ]);  
           
         $data = $request->all();
         $data['resnum'] = time().rand(1000,9999);//رقم الحجز
        //  $data['resnum'] = time().rand(1000,9999);//رقم الحجز
       
        if(isset($data['co_z'])){}else{$data['co_z'] = 0;}
        if(isset($data['nots'])){}else{$data['nots'] = 0;}
        if(isset($data['history'])){}else{$data['history'] = 0;}
        $data['pay'] = 0;$data['types'] = 1;
        $id = $data['id'];
        $get_info = adahyt::where('id',$data['id'])->first();

        // $data['resnum'] = (int) $get_info->days.$get_info->code.rand(10,99);
        if($get_info->free < $data['c_sak'] ){
        session()->flash("fail", "لقد سبقك احد فى حجز الصك");
        return redirect("resrv2/");   
         }else{
          $sak_price = sak::where('name',$get_info->sak)->first()->price;
          if($data['types'] == 200){$data['pay'] = $sak_price; $data['type'] = 200;}else{$data['type'] = 1;}
          $loan = ($sak_price - $data['pay']);  
          $free = ($get_info->free - $data['c_sak']);
          $reservation = 0 ;
          if($free < 1){$cases = 2;}else{$cases = 1;}
          $city = $request->get('city');
          $gov = $request->get('gov');
          $address = $request->get('address');
          $view = $request->get('view');
          $notes = $request->get('notes');
          $name = $request->get('name');
          $whats = $request->get('whats');
          $mobile = $request->get('mobile');
          $whatsd = $request->get('whatsd');
          $mobile2 = $request->get('mobile2');
          $mobile3 = $request->get('mobile3');
          $number = $request->get('number');
          $description = $request->get('description');
         
          // $kar = $request->get('kar');
          // $kars = $request->get('kars');
          // $karss = $request->get('karss');
          // $karsss = $request->get('karsss');
          // $ka = $request->get('ka');
          // $kah = $request->get('kah');
          // $kam = $request->get('kam');
          $parts = $request->get('parts');
  
//  if(isset($view)){}else{$view=[0];}
//  if(isset($whats)){}else{$whats=[0];}
//  if(isset($whatsd)){}else{$whatsd=[0];}

        foreach($city as $key => $n ) { 
          $cc = rand(1000,9999);
          $data['resnum2'] = (int)(time()/$cc);
           $govs = $gov[$key]; 
           $addresss = $address[$key]; 
           if(isset($view[$key])){ $views = $view[$key]; }else{$views = 0;}
           if(isset($whats[$key])){ $whatss = $whats[$key]; }else{$whatss = 0;}
           if(isset($whatsd[$key])){ $whatsds = $whatsd[$key]; }else{$whatsds = 0;}
           if(isset($mobile2[$key])){ $mobile2s = $mobile2[$key]; }else{$mobile2s = 0;}
           if(isset($mobile3[$key])){ $mobile3s = $mobile3[$key]; }else{$mobile3s = 0;}
           if(isset($city[$key])){ $citys = $city[$key]; }else{$citys = 0;}
           if(isset($address[$key])){ $addresss = $address[$key]; }else{$addresss = 0;}
            if(isset($description[$key])){ $descriptions = $description[$key]; }else{$descriptions = null;}
          //  if(isset($kar[$key])){ $kar_ = $kar[$key]; }else{$kar_ = 0;}
          //  if(isset($kars[$key])){ $kars_ = $kars[$key]; }else{$kars_ = 0;}
          //  if(isset($karss[$key])){ $karss_ = $karss[$key]; }else{$karss_ = 0;}
          //  if(isset($karsss[$key])){ $karsss_ = $karsss[$key]; }else{$karsss_ = 0;}
          //  if(isset($ka[$key])){ $ka_ = $ka[$key]; }else{$ka_ = 0;}
          //  if(isset($kah[$key])){ $kah_ = $kah[$key]; }else{$kah_ = 0;}
          //  if(isset($kam[$key])){ $kam_ = $kam[$key]; }else{$kam_ = 0;}
            
          
           $notess = $notes[$key]; 
           $names = $name[$key]; 
           $mobiles = $mobile[$key]; 
          // $mobile2s = $mobile2[$key]; 
           $mobile3s = $mobile3[$key]; 
           $numbers = $number[$key]; 
        //   $kars = $kar[$key]; 
        
          
          ///add clients 
        $c_client = clients::where('mob',$mobiles)->count();
         if($c_client > 0){
             $this->add_client_history_($mobiles);
             $this->edit_client_($id,$mobiles,$names,$mobile2s,$mobile3s,0,$citys,$addresss);
             
         }else{
            $this->create_new_client_($id,$mobiles,$names,$mobile2s,$mobile3s,0,$citys,$addresss); 
         }
          $data['whats'] = $whatss;
          $data['whats2'] = $whatsds;
          $data['city'] = $citys;
          $data['name'] = $names;
          $data['mobile'] = $mobiles;
          $data['mobile2'] = $mobile2s;
          $data['mobile3'] = $mobile3s;
          $data['zone'] = $govs;
          $data['address'] = $addresss;
          $data['note'] = $notess;
          $data['view'] = $views;
          $data['number'] = $numbers;
          $data['description'] = $descriptions;
          $data['rec'] = $data['resnum2'];
          $data['def'] = $data['resnum2'];
          $data['co_z'] = 0;
          $data['history'] = 0;
          $parts = is_array($parts) ? array_values($parts) : [];
          if (!empty($parts) && isset($parts[$key]) && is_array($parts[$key])) {
            foreach ($parts[$key] as $part) {
                DB::table('adahy_acc')->insert([
                    'r_id' => htmlspecialchars($data['resnum2']), // رقم الحجز الفرعي لهذا الشخص
                    'name' => htmlspecialchars($part), // اسم الجزء
                    'code_adahy'=> htmlspecialchars($id) ?? null,
                ]);
            }
        }
          // $data['kar'] = $kar_;
          // $data['kars'] = $kars_;
          // $data['karss'] = $karss_;
          // $data['karsss'] = $karsss_;
          // $data['ka'] = $ka_;
          // $data['kah'] = $kah_;
          // $data['kam'] = $kam_;
          /////end 
          // dd($parts);
          // for ($i = 0; $i <= $numbers; $i++) {
          //   $selected_parts = $parts[$i] ?? []; // نحصل على الأجزاء اللي اختارها الشخص رقم $x
          // }

          // if(!empty($parts)){
          //   foreach ($parts as $part) {
          //     $data['part'] = $part;
          //     DB::table('adahy_acc')->insert([
          //       'r_id' => htmlspecialchars($data['resnum2']),
          //       'name' => htmlspecialchars($data['part']),
          //       'code_adahy'=> htmlspecialchars($id)??null,
          //     ]);
          //   }
          // }
        //   if(!empty($parts) && isset($parts[$key])){
        //     foreach ($parts as $person_number => $person_parts) {
        //       foreach ($person_parts as $part) {
        //           DB::table('adahy_acc')->insert([
        //               'r_id' => htmlspecialchars($data['resnum2']), // هذا لازم يتغير لو عندك ID مختلف لكل شخص
        //               'name' => htmlspecialchars($part),
        //               'code_adahy' => htmlspecialchars($id) ?? null,
        //           ]);
        //       }
        //   }
        // }
            // $parts = array_values($parts); // نصفر المفاتيح عشان نرتبهم 0,1,2,
         
            
            $partIndex = 0; // مؤشر تتبع الأجزاء
           for ($x = 0; $x < $numbers; $x++) {
            $gov_type = $get_info->gov;
            $data['gov_type'] = $gov_type;
              //   $reservation = ($reservation + $numbers);
              $reservation++;
              $data['id'] = $get_info->id;
            $this->create_new_reservation_($data,$loan);


            // نسجل أجزاء الشخص لو موجودة

            }
            // $this->adahy_acc($data);
            
                ///////treasury_sak///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
        $reason_t = "  قيمة الصك".$get_info->sak.' ('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
        $data['amount'] = $sak_price;
        
        $data['nots'] = 'ثمن الصك';
         $check = treasury_sak::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
      //  $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t); 
         
         
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
        $reason_t = "SYSTEM- استلام نقدية";
        $data['amount'] = $data['pay'];
        
        $data['nots'] = 'دفعة';
           $check = treasury_sak::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  (0 + $data['amount']) ; 
         }
         $this->create_new_treasury_sak_($data,$total,$type_frome,$type,$reason_t); 
         
         
             
        ///////treasury_account///////////////////////////////////////
        $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "  حجز الصك".$get_info->sak.' ('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'حجز الصك';
         $check = treasury::where('treasury_id', $data['id'])->count();
         if($check > 0){
             $get = treasury::where('treasury_id', $data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
        $this->create_new_treasury_account_($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            
               
           }
            
            
        }
             
           
      
         $free = ($get_info->free - $reservation);
         
        $reservation = ($get_info->reservation + $reservation) ;
        DB::commit();
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            $this->edit_adahyt_reservation_($get_info->id,$free,$cases,$reservation);      
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("reservationweb/".$data['resnum']);
         
         }
        
   
    
 
   protected function adahy_acc(array $data)
   {

       date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        if($data['kar'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['kar']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['kars'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['kars']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['karss'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['karss']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['karsss'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['karsss']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['ka'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['ka']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['kah'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['kah']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
             if($data['kam'] != 0){
     DB::table('adahy_acc')->insert([
        'r_id' => htmlspecialchars($data['rec']),
        'name' => htmlspecialchars($data['kam']),
        'code_adahy'=> htmlspecialchars($data['id'])??null,
      ]);
        }
       
   }
   
              protected function create_new_treasury_account_(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      
        
        return treasury::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => 0,
        
        'agent' => 'website'
      
        
      ]);
      
   
    }
   
   
   
            protected function create_new_treasury_sak_(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',1)->first()->name;
        
        return treasury_sak::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => 1,
        
        'agent' => 'website'
      
        
      ]);
      
   
    } 
   
   
     protected function create_new_reservation_(array $data , $loan)
    {  date_default_timezone_set(timezoneId: "Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$data['id'])->first();
        return reservation::create([
        'ad_id' => htmlspecialchars($data['id']),
        'resnum' => htmlspecialchars($data['resnum']),
        'c_persons' => htmlspecialchars($data['c_persons']),
        'times' => htmlspecialchars($data['times']),
        'whats' => htmlspecialchars($data['whats']),
        'whats2' => htmlspecialchars($data['whats2']),
        'city' => htmlspecialchars($data['city']),
        'code' => $get_sakc->code,
        'adahy' => $get_sakc->adahy,
        'saks' => $get_sakc->sak,
        'days' => $get_sakc->days,
        'name' => htmlspecialchars($data['name']),
        'mobile' => htmlspecialchars($data['mobile']),
        'mobile2' => htmlspecialchars($data['mobile2']),
        'mobile3' => htmlspecialchars($data['mobile3']),
        'description' => htmlspecialchars($data['description'])?? null ,
        'gov_type' => htmlspecialchars($data['gov_type']),
        'view' => htmlspecialchars($data['view']),
        'c_sak' => htmlspecialchars($data['number']),
        'number' => htmlspecialchars($data['number']),
        'zone' => htmlspecialchars($data['zone']),
        'address' => htmlspecialchars($data['address']),
        'sak' => 1,
        'pay' => htmlspecialchars($data['pay']),
        'price' => 0,
        'loan' => $loan,
        'note' => htmlspecialchars($data['note']),
        'rec' => htmlspecialchars($data['rec']),
        'def' => htmlspecialchars($data['def']),
        'emp' => 'website',
        'co_z' => htmlspecialchars($data['co_z']),
        'history' => htmlspecialchars($data['history']),
        'type' => htmlspecialchars($data['type']),
          'retype' => 0,   
          'calltype' => 0, 
          'resptype' => 0, 
          'rectype' => 0, 
        'treasury_id' => 1,
        'agent' => 'website'
      
        
      ]);
      
   
    }



    protected function edit_adahyt_reservation_($id,$free,$cases,$reservation)
    {
        return adahyt::where("id", $id)->update([
        'free' => $free,
        'reservation' => $reservation,
        'cases' => $cases
      ]);  
    }
   
   
   
   
           protected function create_new_client_($id,$mobile,$name,$mobile2,$mobile3,$mobile4,$zone,$address)
    {   date_default_timezone_set("Africa/Kampala"); 
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$id)->count();
        return clients::where('mob',$mobile)->update([
        'name' => htmlspecialchars($name),
        
        'mob2' => htmlspecialchars($mobile2),
        'mob3' => htmlspecialchars($mobile3),
        'mob4' => htmlspecialchars($mobile4),
        'zone' => htmlspecialchars($zone),
        'address' => htmlspecialchars($address),
        'type' => 1,
        
        'agent' => 'website'
      
        
      ]);
      
   
    }
   
   
            protected function edit_client_($id,$mobile,$name,$mobile2,$mobile3,$mobile4,$zone,$address)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$id)->count();
        return clients::where('mob',$mobile)->update([
        'name' => htmlspecialchars($name),
        
        'mob2' => htmlspecialchars($mobile2),
        'mob3' => htmlspecialchars($mobile3),
        'mob4' => htmlspecialchars($mobile4),
        'zone' => htmlspecialchars($zone),
        'address' => htmlspecialchars($address),
        'type' => 1,
        
        'agent' => 'website'
      
        
      ]);
      
   
    }
   
            protected function add_client_history_($mobile)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $check= clients::where('mob',$mobile)->count();
        if($check > 0){
        $get_old = clients::where('mob',$mobile)->first();
        return clients_history::create([
        'name' => $get_old->name,
        'mob' => $get_old->mob,
        'mob2' => $get_old->mob2,
        'mob3' => $get_old->mob3,
        'mob4' => $get_old->mob4,
        'zone' => $get_old->zone,
        'address' => $get_old->address,
        'type' => 1,
        
        'agent' => 'website'
      
        
      ]);
        }
      
   
    } 

}
