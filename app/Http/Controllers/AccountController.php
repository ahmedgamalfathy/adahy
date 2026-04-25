<?php

namespace App\Http\Controllers;

use DB;

use Session;
use Carbon\Carbon;
use App\Models\opt;
use App\Models\per;
use App\Models\sak;
use App\Models\days;
use App\Models\User;
use App\Models\freez;
use App\Models\pages;
use App\Models\times;
use App\Models\trans;
use App\Models\types;
use App\Models\adahyt;
use App\Models\income;
use App\Models\vendor;
use App\Models\butcher;
use App\Models\clients;
use App\Models\expense;
use App\Models\users_c;
use App\Models\butcher2;
use App\Models\follower;
use App\Models\treasury;
use App\Models\agreement;
use App\Models\tr_income;
use App\Models\tr_vendor;
use App\Models\treasures;
use App\Models\adahy_type;
use App\Models\callcenter;
use App\Models\tr_butcher;
use App\Models\tr_expense;
use App\Models\reservation;
use App\Models\tr_butcher2;
use App\Models\tr_follower;
use App\Models\treasury_sak;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

use App\Models\clients_history;
use App\Models\reservation_del;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    ///////////////////////////////////////////////////////////
    // تصدير جدول الموردين إلى اكسل بدون أي مكتبة خارجية (توليد ملف Excel بسيط بصيغة CSV)
    public function export_excel_supplier(Request $request)
    {
      // جلب البيانات المطلوبة
      $get = opt::where('gov',12)->get();

      // تجهيز بيانات الجدول
      $rows = [];
      $rows[] = [
        'كود',
        'المورد',
        'نوع الاضحية',
        'الوزن قائم',
        'الوزن شقتين',
        'الوزن الصافي',
        'نسبة التصفية',
        'الوزن المشفى',
        'نسبة التشفية'
      ];

      foreach ($get as $g) {
        $rows[] = [
          $g->code,
          $g->w_vendor,
          $g->adahy,
          $g->w_weight,
          $g->b_weight,
          $g->f_weight + $g->f_weight2,
          number_format($g->b_case, 2),
          $g->f_weight,
          number_format($g->f_case, 2)
        ];
      }

      // إعداد الهيدر للتحميل كملف CSV
      $fileName = 'suppliers_export_' . date('Ymd_His') . '.csv';
      header('Content-Type: text/csv; charset=UTF-8');
      header('Content-Disposition: attachment; filename="' . $fileName . '"');
      header('Pragma: no-cache');
      header('Expires: 0');

      // فتح مخرج الملف
      $output = fopen('php://output', 'w');
      // دعم العربية في Excel بإضافة BOM
      fwrite($output, "\xEF\xBB\xBF");

      foreach ($rows as $row) {
        // استخدم الفاصلة المنقوطة كفاصل أعمدة لتوافق Excel مع العربية
        fputcsv($output, $row, ";");
      }
      fclose($output);
      exit;
    }
    /////////////////////////////////////////////////////////////
    public function export_excel_times(){
          // جلب البيانات المطلوبة
      $get = opt::where('gov',12)->get();

      // تجهيز بيانات الجدول
      $rows = [];
      $rows[] = [
          'كودالاضحية',
          'نوع الاضحية',
          'وقت دخول الجزارة',
          'وقت خروج الجزارة',
          'الوقت المستغرق جزارة',
          'مشرف الجزارة',
          'الجزار',
          ' وقت دخول التبريد',
          ' وقت خروج التبريد',
          'الوقت المستغرق تبريد',
          'مشرف التبريد',
          ' وقت دخول التعبئة',
          ' وقت خروج التعبئة',
          'الوقت المستغرق تعبئة',
          'رقم غرفة التعبئة',
          'مشرف  غرفة التعبئة',
          ' وقت دخول التسليم',
          ' وقت خروج التسليم',
          'الوقت المستغرق تسليم',
          'رقم غرفة التسليم',
          'مشرف غرفة التسليم',
      ];

      foreach ($get as $g) {
        $rows[] = [
          $g->code,
          $g->adahy,
          $g->b_entry_date,
          $g->b_exit_date,
          $g->b_deff_date ? gmdate('H:i', $g->b_deff_date * 60) : null,
          $g->b_follower,
          $g->b_butcher,
          $g->fb_entry_date,
          $g->fb_exit_date,
          $g->fb_deff_date ?gmdate('H:i', $g->fb_deff_date * 60) : null,
          $g->fb_note1,
          $g->f_entry_date,
          $g->f_exit_date,
          $g->f_deff_date ? gmdate('H:i', $g->f_deff_date * 60) : null,
          $g->f_room,
          $g->f_follower,
          $g->r_entry_date,
          $g->r_date ? Carbon::parse($g->r_date)->format('H:i') :null,
          $g->deff_date ? gmdate('H:i', $g->deff_date * 60) : null,
          $g->r_room,
          $g->r_follower,
        ];
      }

      // إعداد الهيدر للتحميل كملف CSV
      $fileName = 'suppliers_export_' . date('Ymd_His') . '.csv';
      header('Content-Type: text/csv; charset=UTF-8');
      header('Content-Disposition: attachment; filename="' . $fileName . '"');
      header('Pragma: no-cache');
      header('Expires: 0');

      // فتح مخرج الملف
      $output = fopen('php://output', 'w');
      // دعم العربية في Excel بإضافة BOM
      fwrite($output, "\xEF\xBB\xBF");

      foreach ($rows as $row) {
        // استخدم الفاصلة المنقوطة كفاصل أعمدة لتوافق Excel مع العربية
        fputcsv($output, $row, ";");
      }
      fclose($output);
      exit;
    }

    //////////////////////////////////////////////////////////
    public function c_test()
    {
        
 $get = DB::table('adahyt')->where('sak_c','>',1)->get();
 foreach($get as $g){
     $sc = $g->sak_c;
     $c = DB::table('reservation')->where('code',$g->code)->count();
     if($sc == $c){}else{
         echo $g->code." - ".$sc." - ".$c."<br>";
     }
 }
      
    }
    
    
    ///////////////////////////////////////////////////////////////
    
      public function res_posts_(Request $request){
        
        $request->validate([
            'id'        => 'required',
            'times'     => 'required',
            'c_sak'     => 'required',
            'c_persons' => 'required',
            'day'       => 'required',
        ]);
        $data             = $request->all();
        $data['resnum']   = time() . rand(1000, 9999);
        $data['co_z']     = isset($data['co_z'])     ? $data['co_z']     : 0;
        $data['nots']     = isset($data['nots'])     ? $data['nots']     : 0;
        $data['history']  = isset($data['history'])  ? $data['history']  : 0;
        $data['pay']      = 0;
        $data['types']    = 1;
        $id       = $data['id'];
        $get_info = adahyt::where('id', $data['id'])->first();
         $gov_type = $get_info->gov;
         
        if ($get_info->free < $data['c_sak']) {
       session()->flash("fail", "لقد سبقك احد فى حجز الصك");
            return redirect("adahyt_rss/");   
        }
             $data['types'] == 200;
        $sak_price = sak::where('name', $get_info->sak)->first()->price;

        if ($data['types'] == 200) {
            $data['pay']  = $data['nots'];
            $data['type'] = 200;
        } else {
            $data['type'] = 1;
        }
        $loan        = ($sak_price - $data['pay']);
        $free        = ($get_info->free - $data['c_sak']);
        $reservation = 0;
        $cases       = ($free < 1) ? 2 : 1;
        $city        = $request->get('city');
        $gov         = $request->get('gov');
        $address     = $request->get('address');
        $view        = $request->get('view');
        $notes       = $request->get('notes');
        $name        = $request->get('name');
        $whats       = $request->get('whats');
        $mobile      = $request->get('mobile');
        $whatsd      = $request->get('whatsd');
        $mobile2     = $request->get('mobile2');
        $mobile3     = $request->get('mobile3');
        $number      = $request->get('number');
 $description = $request->get('description');
//  $kar = $request->get('kar');
//  $kars = $request->get('kars');
//  $karss = $request->get('karss');
//  $karsss = $request->get('karsss');
//  $ka = $request->get('ka');
//  $kah = $request->get('kah');
//  $kam = $request->get('kam');
$parts = $request->get('parts');
  
//  if(isset($view)){}else{$view=[0];}
//  if(isset($whats)){}else{$whats=[0];}
//  if(isset($whatsd)){}else{$whatsd=[0];}

     $data['gov_type'] = $gov_type;
        foreach ($city as $key => $n) {
            $cc               = rand(1000, 9999);
            $data['resnum2']  = (int)(time() / $cc) . rand(10, 99);
            $govs             = $gov[$key];
            $addresss         = $address[$key];
            $data['pay']      = $notes[$key];

            $views       = isset($view[$key])        ? $view[$key]        : 0;
            $whatss      = isset($whats[$key])       ? $whats[$key]       : 0;
            $whatsds     = isset($whatsd[$key])      ? $whatsd[$key]      : 0;
            $mobile2s    = isset($mobile2[$key])     ? $mobile2[$key]     : 0;
            $mobile3s    = isset($mobile3[$key])     ? $mobile3[$key]     : 0;
            $citys       = isset($city[$key])        ? $city[$key]        : 0;
            $addresss    = isset($address[$key])     ? $address[$key]     : 0;
            $descriptions = isset($description[$key]) ? $description[$key] : null;
          //  if(isset($kar[$key])){ $kar_ = $kar[$key]; }else{$kar_ = 0;}
          //  if(isset($kars[$key])){ $kars_ = $kars[$key]; }else{$kars_ = 0;}
          //  if(isset($karss[$key])){ $karss_ = $karss[$key]; }else{$karss_ = 0;}
          //  if(isset($karsss[$key])){ $karsss_ = $karsss[$key]; }else{$karsss_ = 0;}
          //  if(isset($ka[$key])){ $ka_ = $ka[$key]; }else{$ka_ = 0;}
          //  if(isset($kah[$key])){ $kah_ = $kah[$key]; }else{$kah_ = 0;}
          //  if(isset($kam[$key])){ $kam_ = $kam[$key]; }else{$kam_ = 0;}

            $notess  = $notes[$key];
            $names   = $name[$key];
           $mobiles = $mobile[$key]; 
          // $mobile2s = $mobile2[$key]; 
           $mobile3s = $mobile3[$key]; 
            $numbers  = $number[$key];
        //   $kars = $kar[$key]; 
          
          ///add clients 
            $c_client = clients::where('mob', $mobiles)->count();
            if ($c_client > 0) {
             $this->add_client_history_2($mobiles);
                $this->edit_client_2($id, $mobiles, $names, $mobile2s, $mobile3s, 0, $citys, $addresss);
            } else {
                $this->create_new_client_2($id, $mobiles, $names, $mobile2s, $mobile3s, 0, $citys, $addresss);
         }
          
            $data['whats']       = $whatss;
            $data['whats2']      = $whatsds;
            $data['city']        = $citys;
            $data['name']        = $names;
            $data['mobile']      = $mobiles;
            $data['mobile2']     = $mobile2s;
            $data['mobile3']     = $mobile3s;
            $data['zone']        = $govs;
            $data['address']     = $addresss;
            $data['note']        = $notess;
            $data['view']        = $views;
            $data['number']      = $numbers;
            $data['rec']         = $data['resnum2'];
            $data['def']         = $data['resnum2'];
            $data['co_z']        = 0;
            $data['history']     = 0;
          $data['description'] = $descriptions;
          // $data['kar'] = $kar_;
          // $data['kars'] = $kars_;
          // $data['karss'] = $karss_;
          // $data['karsss'] = $karsss_;
          // $data['ka'] = $ka_;
          // $data['kah'] = $kah_;
          // $data['kam'] = $kam_;
     
          $parts = is_array($parts) ? array_values($parts) : [];
          if (!empty($parts) && isset($parts[$key]) && is_array($parts[$key])) {
            foreach ($parts[$key] as $part) {
                DB::table('adahy_acc')->insert([
                        'r_id'       => htmlspecialchars($data['resnum2']),
                        'name'       => htmlspecialchars($part),
                        'code_adahy' => htmlspecialchars($id) ?? null,
                ]);
            }
        }
          /////end 

           for ($x = 0; $x < $numbers; $x++) {
                $reservation++;
               $data['id'] = $get_info->id;
                $resId      = $this->create_new_reservation_2($data, $loan);

            $data['amount'] = $sak_price;
          if ($data['amount'] > 0) {
             $branchSafe = \App\Models\Safe::where('type', 'branch')
                        ->where(function ($q) {
                     $q->where('id', Auth::user()->t_id)
                    //  ->orWhere('parent_id', Auth::user()->t_id)
                      ->orWhere('user_id', Auth::user()->t_id);
                 })->first();
                //  dd($branchSafe);
             if ($branchSafe) {
                 $branchSafe->increment('balance', $data['amount']);
                 \App\Models\SafeMovement::create([
                     'amount'              => $data['amount'] ,
                    //  'amount'              => $data['amount'],
                     'type'                => 'payment',
                     'destination_safe_id' => $branchSafe->id,
                     'reservation_id'      => $resId->id,
                     'created_by'          => Auth::id(),
                     'notes'               => 'دفعة حجز - ' . $data['name'] . ' - ' . $get_info->sak,
                 ]);
             }
         }

                ///////treasury_sak///////////////////////////////////////
                $data['id']    = reservation::where('id', '!=', 0)->orderBy('id', 'desc')->first()->id;
                $type_frome    = 2; //الاكشن من انى صفحة
                $type          = 1; // مدين
                $reason_t      = "  قيمة الصك" . $get_info->sak . ' (' . $get_info->id . ')-' . $data['name'] . '-' . $data['mobile'];
       // $data['amount'] = $sak_price;
        $data['amount'] = $data['pay'];
                $data['nots']   = 'ثمن الصك';
                $check = treasury_sak::where('treasury_id', $data['id'])->count();
                if ($check > 0) {
                    $get   = treasury_sak::where('treasury_id', $data['id'])->orderBy('id', 'desc')->first();
             $total = 0;
                } else {
                    $total = 0;
         }
    
       
                $type_frome     = 2; //الاكشن من انى صفحة
                $type           = 2; // دائن
                $reason_t       = "SYSTEM- استلام نقدية";
      $data['amount'] = $data['pay'];

                $data['nots']   = 'دفعة';
                $check = treasury_sak::where('treasury_id', $data['id'])->count();
                if ($check > 0) {
                    $get   = treasury_sak::where('treasury_id', $data['id'])->orderBy('id', 'desc')->first();
             $total = 0;
                } else {
                    $total = 0;
         }
                $this->create_new_treasury_sak_2($data, $total, $type_frome, $type, $reason_t);
         
        ///////treasury_account///////////////////////////////////////
                $data['id']     = reservation::where('id', '!=', 0)->orderBy('id', 'desc')->first()->id;
                $type_frome     = 2; //الاكشن من انى صفحة
                $type           = 1; // مدين
                $reason_t       = "  حجز الصك" . $get_info->sak . ' (' . $get_info->id . ')-' . $data['name'] . '-' . $data['mobile'];
      //$data['amount'] = $sak_price;
         $data['amount'] = $data['pay'];
                $data['nots']   = 'حجز الصك';
                $check = treasury::where('treasury_id', Auth::user()->t_id)->count();
                if ($check > 0) {
                    $get   = treasury::where('treasury_id', Auth::user()->t_id)->orderBy('id', 'desc')->first();
             $total = 0;
                } else {
                    $total = 0;
         }
                $this->create_new_treasury_account_2($data, $total, $type_frome, $type, $reason_t);
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
           }
        }
             
        $free        = ($get_info->free - $reservation);
        $reservation = ($get_info->reservation + $reservation);

         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
        $this->edit_adahyt_reservation_2($get_info->id, $free, $cases, $reservation);

       session()->flash("sucess", "تم الإضافة بنجاح");
        return redirect("reservationsystempay/" . $data['resnum']);
         }
    
    
    public function res_posts(Request $request){
        
       // dd($request->all());
       DB::beginTransaction();
                  $request->validate([
            'id' => 'required',
            'times' => 'required',
            'c_sak' => 'required',
            'c_persons' => 'required',
            'day' => 'required',
          
        ] 
     );  
           
     $data = $request->all();
     $data['resnum'] = time().rand(1000,9999);//رقم الحجز
        if(isset($data['co_z'])){}else{$data['co_z'] = 0;}
        if(isset($data['nots'])){}else{$data['nots'] = 0;}
        if(isset($data['history'])){}else{$data['history'] = 0;}
        $data['pay'] = 0;$data['types'] = 1;
        $id = $data['id'];
        $get_info = adahyt::where('id',$data['id'])->first();
        $gov_type = $get_info->gov;
        $data['gov_type']= $gov_type;
         if($get_info->free < $data['c_sak'] ){
           
       session()->flash("fail", "لقد سبقك احد فى حجز الصك");
            return redirect("adahyt_r/");   
         }else{
             $data['types'] == 200;
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
//  $kar = $request->get('kar');
//  $kars = $request->get('kars');
//  $karss = $request->get('karss');
//  $karsss = $request->get('karsss');
//  $ka = $request->get('ka');
//  $kah = $request->get('kah');
//  $kam = $request->get('kam');
$parts = $request->get('parts');
  
//  if(isset($view)){}else{$view=[0];}
//  if(isset($whats)){}else{$whats=[0];}
//  if(isset($whatsd)){}else{$whatsd=[0];}

        foreach($city as $key => $n ) { 
          $cc = rand(1000,9999);
          $data['resnum2'] = (int)(time()/$cc).rand(10,99);
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
             $this->add_client_history_2($mobiles);
             $this->edit_client_2($id,$mobiles,$names,$mobile2s,$mobile3s,0,$citys,$addresss);
             
         }else{
            $this->create_new_client_2($id,$mobiles,$names,$mobile2s,$mobile3s,0,$citys,$addresss); 
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
          // $data['kar'] = $kar_;
          // $data['kars'] = $kars_;
          // $data['karss'] = $karss_;
          // $data['karsss'] = $karsss_;
          // $data['ka'] = $ka_;
          // $data['kah'] = $kah_;
          // $data['kam'] = $kam_;
     
      
  
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
          /////end 

           for ($x = 0; $x < $numbers; $x++) {
               $reservation ++;
               $data['id'] = $get_info->id;
            $resId=$this->create_new_reservation_2($data,$loan);
            // $this->adahy_acc($data);
            $data['amount'] = $sak_price;
          if ($data['amount'] > 0) {
             $branchSafe = \App\Models\Safe::where('type', 'branch')
                 ->where(function($q) {
                     $q->where('id', Auth::user()->t_id)
                    //  ->orWhere('parent_id', Auth::user()->t_id)
                       ->orWhere('user_id', Auth::user()->t_id);
                 })->first();
                //  dd($branchSafe);
             if ($branchSafe) {
                 $branchSafe->increment('balance', $data['amount']);
                 \App\Models\SafeMovement::create([
                     'amount'              => $data['amount'],
                     'type'                => 'payment',
                     'destination_safe_id' => $branchSafe->id,
                     'reservation_id'      => $resId->id,
                     'created_by'          => Auth::id(),
                     'notes'               => 'دفعة حجز - ' . $data['name'] . ' - ' . $get_info->sak,
                 ]);
             }
         }
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
     // $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t); 
         
         
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
        $reason_t = "SYSTEM- استلام نقدية";
       // $data['amount'] = $data['pay'];
         $data['amount'] = $sak_price;
        $data['nots'] = 'دفعة';
           $check = treasury_sak::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
            //  $total = ($get->total + $data['amount']);تم التهميش بواسطة احمد جمال بتاريخ19-4-2025
            $total =$data['amount'];
         }else{
          $total =  (0 + $data['amount']) ; 
         }
         $this->create_new_treasury_sak_2($data,$total,$type_frome,$type,$reason_t); 

         // تسجيل الدفعة في safe_movements (خزنة الفرع)

             
        ///////treasury_account///////////////////////////////////////
        $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "  حجز الصك".$get_info->sak.' ('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
      $data['amount'] = $sak_price;
        
        $data['nots'] = 'حجز الصك';
         $check = treasury::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
          //  $total = ($get->total + $data['amount']);تم التهميش بواسطة احمد جمال بتاريخ19-4-2025
         }else{
          $total =  $data['amount'];  
         }
        $this->create_new_treasury_account_2($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            
               
           }
            
            
        }
             
           
      
         
         
       $free = ($get_info->free - $reservation);
          $reservation = ($get_info->reservation + $reservation) ;
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            $this->edit_adahyt_reservation_2($get_info->id,$free,$cases,$reservation); 
            DB::commit();
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("reservationsystem/".$data['resnum']);
         
         }
        
    }
    
    
    
    
    
                 protected function create_new_treasury_account_2(array $data , $total,$type_frome,$type,$reason_t)
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
   
   
   
            protected function create_new_treasury_sak_2(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
       $tr_name = treasures::where('id',Auth::user()->t_id??12)->first()->name;
        
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
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    } 
   
   
     protected function create_new_reservation_2(array $data , $loan)
    {  date_default_timezone_set("Africa/Kampala");  
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
        'gov_type' => htmlspecialchars($data['gov_type']),
        'code' => $get_sakc->code,
        'adahy' => $get_sakc->adahy,
        'saks' => $get_sakc->sak,
        'days' => $get_sakc->days,
        'name' => htmlspecialchars($data['name']),
        'mobile' => htmlspecialchars($data['mobile']),
        'mobile2' => htmlspecialchars($data['mobile2']),
        'mobile3' => htmlspecialchars($data['mobile3']),
         'description' => htmlspecialchars($data['description'])?? null ,
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
        'emp' => Auth::user()->email,
        'co_z' => htmlspecialchars($data['co_z']),
        'history' => htmlspecialchars($data['history']),
        'type' => htmlspecialchars($data['type']),
          'retype' => 0,   
          'calltype' => 0, 
          'resptype' => 0, 
          'rectype' => 0, 
          'qty' => 0,
        'treasury_id' => 1,
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }



    protected function edit_adahyt_reservation_2($id,$free,$cases,$reservation)
    {
        return adahyt::where("id", $id)->update([
        'free' => $free,
        'reservation' => $reservation,
        'cases' => $cases
      ]);  
    }
   
   
   
   
           protected function create_new_client_2($id,$mobile,$name,$mobile2,$mobile3,$mobile4,$zone,$address)
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
        
        'agent' => Auth::user()->email,
      
        
      ]);
      
   
    }
   
   
            protected function edit_client_2($id,$mobile,$name,$mobile2,$mobile3,$mobile4,$zone,$address)
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
        
        'agent' => Auth::user()->email,
      
        
      ]);
      
   
    }
   
            protected function add_client_history_2($mobile)
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
        
        'agent' => Auth::user()->email,
      
        
      ]);
        }
      
   
    } 
    ////////////////////////////////////////////////////////
    
    
    public function res_post2(Request $request){
        
        dd($request->all());
    }
   ////////////////////////////////////////////////////////////////////////////
   public function show_sak_select(Request $request)
   {
       $type =  htmlspecialchars($request->type);
       $selected = ' <select class="form-control" name="sak"  >
                                                        <option value="">
                                            نوع الصك
                                        </option>';
            $sak = adahyt::where('adahy', '=', $type)->select('sak')->distinct()->get();
            foreach($sak as $g){
             $selected .='<option value="'.$g->sak.'">'.$g->sak.'</option>';   
            }
            $selected .='</select>';
       echo $selected;
   }
   
   
   
   //////////////////////////////////new_account///////////////////////////////////////////////

       public function new_account(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users_c',
            'password' => 'required', 
       
            'address' => 'required',
          
            'gov' => 'required',
            'mobile' => 'required|unique:users_c',
           
        ], 
        [
            'name.required'=> 'Name is required!', 
            'email.required'=> 'Email is required!', 
            'password.required'=> 'password is required!', 
            'email.unique'=> 'This email is already exist!',
            'mobile.required'=> 'mobile is required!',
            'mobile.unique'=> 'This mobile is already exist!',
            'gov.required'=> 'Governorate is required!',
            'address.required'=> 'Address is required!',
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $key = (int)($rand.$now / $rands);
         $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/"; 
         
       $data = $request->all();
       $degree = 1;
      $p = 0; $p1 = 0; $p2 = 0; $p3 = 0; $p4 = 0; $p5 = 0; $p6 = 0; $p7 = 0; $p8 = 0; $p9 = 0; $p10 = 0;  $p11 = 0; 
       if(!empty($data['app_code'])){
         $check = users_c::where('my_code',$data['app_code'])->count(); 
         if($check > 0){
            $p = $data['app_code']; 
            $get_app_p = users_c::where('my_code',$data['app_code'])->first();
            if($get_app_p->app_code != 0){$p1 = $get_app_p->app_code;$degree = 1;}
            if($get_app_p->p1 != 0){$p2 = $get_app_p->p1;$degree = 2;}
            if($get_app_p->p2 != 0){$p3 = $get_app_p->p2;$degree = 3;}
            if($get_app_p->p3 != 0){$p4 = $get_app_p->p3;$degree = 4;}
            if($get_app_p->p4 != 0){$p5 = $get_app_p->p4;$degree = 5;}
            if($get_app_p->p5 != 0){$p6 = $get_app_p->p5;$degree = 6;}
            if($get_app_p->p6 != 0){$p7 = $get_app_p->p6;$degree = 7;}
            if($get_app_p->p7 != 0){$p8 = $get_app_p->p7;$degree = 8;}
            if($get_app_p->p8 != 0){$p9 = $get_app_p->p8;$degree = 9;}
            if($get_app_p->p9 != 0){$p10 = $get_app_p->p9;$degree = 10;}
            if($get_app_p->p10 != 0){$p11 = $get_app_p->p10;$degree = 11;}
             
         }
       }
       if(preg_match($password_regex, $data['password']) == 1){
           $check = users_c::where('my_code',$key)->count();
           if($check == 0){
       $this->create_user_c($data,$key,$p,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$degree);
          session()->flash("sucess", "successfully inserted data");
            return redirect("accounts");
           }else{
              session()->flash("fail", "wrong unique code please try again after 1 minute");
            return redirect("accounts")->withErrors($request->validate)->withInput();  
           }
       }else{
         session()->flash("fail", $data['password']." -wrong password verify  !
 minimum 8 characters in length &
 At least one uppercase English letter &
 At least one lowercase English letter &
 At least one digit &
 At least one special character");
            return redirect("accounts")->withErrors($request->validate)->withInput();   
       }
    }


   protected function create_user_c(array $data , $key ,$app_code,$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$degree)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;
       // $check= imgs::where('s_key', $data['secret_key'])->count();

      return users_c::create([
        'name' => htmlspecialchars($data['name']),
        'email' => htmlspecialchars($data['email']),
        'password' => Hash::make($data['password']),
        'address' => htmlspecialchars($data['address']),
        'gov' => htmlspecialchars($data['gov']),
        'mobile' => htmlspecialchars($data['mobile']),
        'app_code' => $app_code,
        'p1' => $p1,
        'p2' => $p2,
        'p3' => $p3,
        'p4' => $p4,
        'p5' => $p5,
        'p6' => $p6,
        'p7' => $p7,
        'p8' => $p8,
        'p9' => $p9,
        'p10' => $p10,
        'p11' => $p11,
        'p12' => 0,
        'my_code' => $key,
        'degree' => $degree,
        'agent' => Auth::user()->email,
        'status' => 0
        
      ]);
    } 
      

///////////////////////end new_account //////////////////////////////////////////////////


   //////////////////////////////////new_type///////////////////////////////////////////////

       public function new_type(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
            
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahy")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_adahy_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("adahy");
   }
  
    }

  protected function create_adahy_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return adahy_type::create([
        'name' => htmlspecialchars($data['name']),
        'price' => htmlspecialchars($data['price']),
        'price2' => 0,

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_type///////////////////////////////////////////////////////////////////////////////////////
          public function edit_type(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'price' => 'required|numeric'
            
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahy")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_adahy_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("adahy");
   }
  
    }
    
    
      protected function edit_adahy_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return adahy_type::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'price' => htmlspecialchars($data['price']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_type////////////////////////////////////////////////////////////////////// 
          public function del_type(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahy")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_adahy_type($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("adahy");
   }
  
    }
    
    protected function del_adahy_type(array $data)
    {
        
   return adahy_type::find($data['id'])->delete();
      
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
       //////////////////////////////////new_sak/////////////////////////////////////////////////////////////

       public function new_sak(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'price2' => 'required|numeric',
            'count' => 'required|numeric'
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("sak")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_sak_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("sak");
   }
  
    }

  protected function create_sak_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return sak::create([
        'name' => htmlspecialchars($data['name']),
        'price' => htmlspecialchars($data['price']),
        'price2' => htmlspecialchars($data['price2']),
        'counts' => htmlspecialchars($data['count']),

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
        //////////////////////////edit_sak///////////////////////////////////////////////////////////////////////////////////////
          public function edit_sak(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'price2' => 'required|numeric',
            'count' => 'required|numeric'
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
        /*
        $error = "لا يمكن تعديل  الصك لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = sak::where('id',$data['id'])->first();
 $check1 = adahyt::where('sak',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("sak")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_sak_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("sak");
   }
  
    }
    
    
      protected function edit_sak_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return sak::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'price' => htmlspecialchars($data['price']),
        'price2' => htmlspecialchars($data['price2']),
        'counts' => htmlspecialchars($data['count']),

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_type////////////////////////////////////////////////////////////////////// 
          public function del_sak(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        
            $error = "لا يمكن مسح نوع الصك لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = sak::where('id',$data['id'])->first();
 $check1 = adahyt::where('sak',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("sak")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_sak_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("sak");
   }
  
    }
    
    protected function del_sak_type(array $data)
    {
        
   return sak::find($data['id'])->delete();
      
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    
    
    
    
      
       //////////////////////////////////new_days/////////////////////////////////////////////////////////////

       public function new_days(Request $request)
    {
            $request->validate([
            'name' => 'required',
           
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("days")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_days_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("days");
   }
  
    }

  protected function create_days_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return days::create([
        'name' => htmlspecialchars($data['name']),
        'price' => 0,
        

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
        //////////////////////////edit_sak///////////////////////////////////////////////////////////////////////////////////////
          public function edit_days(Request $request)
    {
            $request->validate([
            'name' => 'required',
            
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
       /*  
     $error = "لا يمكن تعديل يوم الذبح  لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = days::where('id',$data['id'])->first();
 $check1 = adahyt::where('days',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("days")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_days_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("days");
   }
  
    }
    
    
      protected function edit_days_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return days::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'price' => 0,

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_type////////////////////////////////////////////////////////////////////// 
          public function del_days(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
         $data = $request->all();
        /*
              $error = "لا يمكن مسح يوم الذبح  لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = days::where('id',$data['id'])->first();
 $check1 = adahyt::where('days',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("days")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_days_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("days");
   }
  
    }
    
    protected function del_days_type(array $data)
    {
        
   return days::find($data['id'])->delete();
      
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    
    
          
       //////////////////////////////////new_days/////////////////////////////////////////////////////////////

       public function new_times(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'count' => 'required',
           
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("times")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_times_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("times");
   }
  
    }

  protected function create_times_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return times::create([
        'name' => htmlspecialchars($data['name']),
        'count' => htmlspecialchars($data['count']),
        

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
        //////////////////////////edit_sak///////////////////////////////////////////////////////////////////////////////////////
          public function edit_times(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'count' => 'required',
            
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
       /*  
     $error = "لا يمكن تعديل يوم الذبح  لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = days::where('id',$data['id'])->first();
 $check1 = adahyt::where('days',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("times")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_times_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("times");
   }
  
    }
    
    
      protected function edit_times_type(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return times::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
           'count' => htmlspecialchars($data['count']),

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_type////////////////////////////////////////////////////////////////////// 
          public function del_times(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $data = $request->all();
        /*
              $error = "لا يمكن مسح يوم الذبح  لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = days::where('id',$data['id'])->first();
 $check1 = adahyt::where('days',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("times")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_times_type($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("times");
   }
  
    }
    
    protected function del_times_type(array $data)
    {
        
   return times::find($data['id'])->delete();
      
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    
    
    
    //////////////////////////////////new_adhyat///////////////////////////////////////////////

       public function new_adhyat(Request $request)
    {
            $request->validate([
            'type' => 'required',
            'sak' => 'required',
            'code' => 'required|unique:adahyt',
            'days' => 'required',
            'times' => 'required',
            'is_available'=>'required',
            'gov'=>'required|in:01,12,24,13',
            '_token' => 'required',
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
            $rand = rand(1111,9999);
            $rands = rand(100001,999999);
            $now = time();
            $err = 0;
            $error = "";
            
            $data = $request->all();

       $token = $request->_token;
      
   
       
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahyt")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_adhyat($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("adahyt");
   }
       
    }

  protected function create_adhyat(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = sak::where('name',$data['sak'])->first()->counts;
        return adahyt::create([
        'adahy' => htmlspecialchars($data['type']),
        'code' => htmlspecialchars($data['code']),
        'sak' => htmlspecialchars($data['sak']),
        'days' => htmlspecialchars($data['days']),
        'times' => htmlspecialchars($data['times']),
        'is_available'=> htmlspecialchars($data['is_available']),
        'gov'=> htmlspecialchars($data['gov']),
        'sak_c' => $get_sakc,
        'kilo' => 0,
        'kilo_s' => 0,
        'vendor' => 0,
        'reservation' => 0,
        'free' => $get_sakc,
        'cases' => 1,
        'agent' => Auth::user()->email,
        '_token' => htmlspecialchars($data['_token']),
        
      ]);
      
   
    }
    
    //////////////////////////edit_adhyat///////////////////////////////////////////////////////////////////////////////////////
          public function edit_adhyat(Request $request)
    {
            $request->validate([
           'type' => 'required',
           'code' => 'required',
            'sak' => 'required',
            'id' => 'required',
            'days' => 'required',
            'times' => 'required'
        ], 
        [
            'name.required'=> 'Name is required!'
       
  
            ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
        $data = $request->all();
        $get_info = adahyt::where('id',$data['id'])->first();
        if($get_info->code == $data['code'])
        {}else{
            $check = adahyt::where('code',$data['code'])->count();
            if($check > 0)
            {
               $err = 1;
        $error = "يجب ان يكون رقم الأضحية فريد";  
            }
            
        }
        
    $error = "لا يمكن تعديل  الذبح  لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
      
 $check1 = reservation::where('ad_id',$data['id'])->count();
// $check1 = 0;
if($check1 > 0){$err = 1;}else{} 
       
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahyt")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_adhyats($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("adahyt");
   }
  
    }
    
    
      protected function edit_adhyats(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = sak::where('name',$data['sak'])->first()->counts;
              return adahyt::where("id", $data['id'])->update([
        'adahy' => htmlspecialchars($data['type']),
        'code' => htmlspecialchars($data['code']),
        'sak' => htmlspecialchars($data['sak']),
        'days' => htmlspecialchars($data['days']),
        'times' => htmlspecialchars($data['times']),
        'sak_c' => $get_sakc,
        'reservation' => 0,
        'free' => $get_sakc,
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_adhyat////////////////////////////////////////////////////////////////////// 
          public function del_adhyat(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
        $check = reservation::where('ad_id',$data['id'])->count();
        if($check > 0){
           $err = 1;
        $error = "لا يمكن مسح أضحية موجود عليها حجوزات";   
        }
        
         
      
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("adahyt")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_adhyats($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("adahyt");
   }
  
    }
    
    protected function del_adhyats(array $data)
    {
   return adahyt::find($data['id'])->delete();
   
   
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   

    public function new_reservation(Request $request)
    {
             $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11',
            'mobile2' => 'required|numeric|digits:11',
            'mobile3' => 'required|numeric|digits:11',
            'mobile4' => 'required|numeric',
            'zone' => 'required',
            'address' => 'required',
           
            'rec' => 'required|numeric|unique:reservation',
            'def' => 'required',
            
            'pay' => 'required',
            'id' => 'required'
        ], 
        [
        'name.required'=> 'Name is required!'
            ]);  
            
         $data = $request->all();
         if(isset($data['co_z'])){}else{$data['co_z'] = 0;}
          if(isset($data['nots'])){}else{$data['nots'] = 0;}
         if(isset($data['history'])){}else{$data['history'] = 0;}
         $id = $data['id'];
         $get_info = adahyt::where('id',$data['id'])->first();
         if($get_info->free < 1 ){
           
       session()->flash("fail", "لا يوجد صكوك متاحة");
            return redirect("reservation/".$data['id']);   
         }else{
             
             $sak_price = sak::where('name',$get_info->sak)->first()->price;
             if($data['types'] == 200){$data['pay'] = $sak_price; $data['type'] = 200;}else{$data['type'] = 1;}
             $loan = ($sak_price - $data['pay']);
           
           $free = ($get_info->free - 1);
           $reservation = ($get_info->reservation + 1) ;
           if($free < 1){$cases = 2;}else{$cases = 1;}
       
        
         
         
         ////////client new /////////////////////////////
         $c_client = clients::where('mob',$data['mobile'])->count();
         if($c_client > 0){
             $this->add_client_history($data['mobile']);
             $this->edit_client($data);
             
         }else{
            $this->create_new_client($data); 
         }
         
         /////////////////////////////////////////////
         
         
          $this->create_new_reservation($data,$loan); 
          
          
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
         $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t); 
         
         
             
        ///////treasury_account///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "  حجز الصك".$get_info->sak.' ('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'حجز الصك';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
        $this->create_new_treasury_account($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            $this->edit_adahyt_reservation($get_info->id,$free,$cases,$reservation); 
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("reservation/".$id);
         
         }
    } 
    
    
    
    
    //////شراء
  
     public function new_reservation_(Request $request)
    {
             $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11',
            'mobile2' => 'required|numeric|digits:11',
            'mobile3' => 'required|numeric|digits:11',
            'mobile4' => 'required|numeric',
            'zone' => 'required',
            'address' => 'required',
            
            'rec' => 'required|numeric|unique:reservation',
            'def' => 'required',
            
            'pay' => 'required',
            'id' => 'required'
        ], 
        [
        'name.required'=> 'Name is required!'
            ]);  
            
         $data = $request->all();
         if(isset($data['co_z'])){}else{$data['co_z'] = 0;}
          if(isset($data['nots'])){}else{$data['nots'] = 0;}
         if(isset($data['history'])){}else{$data['history'] = 0;}
         $id = $data['id'];
         $get_info = adahyt::where('id',$data['id'])->first();
         if($get_info->free < 1 ){
           
       session()->flash("fail", "لا يوجد صكوك متاحة");
            return redirect("pay/".$data['id']);   
         }else{
             $data['types'] = 200;
             $sak_price = sak::where('name',$get_info->sak)->first()->price;
             if($data['types'] == 200){$data['pay'] = $sak_price; $data['type'] = 200;}else{$data['type'] = 1;}
             $loan = ($sak_price - $data['pay']);
           
           $free = ($get_info->free - 1);
           $reservation = ($get_info->reservation + 1) ;
           if($free < 1){$cases = 2;}else{$cases = 1;}
       
        
         
         
         ////////client new /////////////////////////////
         $c_client = clients::where('mob',$data['mobile'])->count();
         if($c_client > 0){
             $this->add_client_history($data['mobile']);
             $this->edit_client($data);
             
         }else{
            $this->create_new_client($data); 
         }
         
         /////////////////////////////////////////////
         
         
          $this->create_new_reservation($data,$loan); 
          
          
         ///////treasury_sak///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
        $reason_t = "  قيمة الصك".$get_info->sak.'('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
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
         $reason_t = "  قيمة الصك".$get_info->sak.'('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
        $data['amount'] = $data['pay'];
        
        $data['nots'] = 'دفعة';
           $check = treasury_sak::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  (0 + $data['amount']) ; 
         }
         $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t); 
         
         
             
        ///////treasury_account///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
       $reason_t = "  قيمة الصك".$get_info->sak.'('.$get_info->id.')-'.$data['name'].'-'.$data['mobile'] ;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'حجز الصك';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
        $this->create_new_treasury_account($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            $this->edit_adahyt_reservation($get_info->id,$free,$cases,$reservation); 
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("pay/".$id);
         
         }
    } 
  
  
  
  ///////////////////تعديل
  
     public function edit_reservation(Request $request)
    {
             $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11',
            'mobile2' => 'required|numeric|digits:11',
            'mobile3' => 'required|numeric|digits:11',
            'mobile4' => 'required|numeric',
            'zone' => 'required',
            'address' => 'required',
            'description' => 'nullable',
            'rec' => 'required',
            'def' => 'required',
            
      
            'id' => 'required'
        ], 
        [
        'name.required'=> 'Name is required!'
            ]);  
            
         $data = $request->all();
         if(isset($data['co_z'])){}else{$data['co_z'] = 0;}
         if(isset($data['history'])){}else{$data['history'] = 0;}
         $id = $data['id'];
         $get_info = adahyt::where('id',$data['id'])->first();
         $skip = 10;
         if($skip == 1){
           
       session()->flash("fail", "لا يوجد صكوك متاحة");
            return redirect("reservation_E/".$data['id']);   
         }else{
             
           
       
        
         
         
         ////////client new /////////////////////////////
         $c_client = clients::where('mob',$data['mobile'])->count();
         if($c_client > 0){
             $this->add_client_history($data['mobile']);
             $this->edit_client($data);
             
         }else{
            $this->create_new_client($data); 
         }
         
         /////////////////////////////////////////////
         
         
       
          
          
  
         
         
             

         
         
       
         
         //////////////////////////////////////////////////
         //////////////////////////////////////////////////
            $this->edit_reservationss($data); 
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("reservation_E/".$id);
         
         }
    } 
  
  
  protected function edit_reservationss(array $data)
  {
      
       return reservation::where('id',$data['id'])->update([
       
        'name' => htmlspecialchars($data['name']),
        'mobile' => htmlspecialchars($data['mobile']),
        'mobile2' => htmlspecialchars($data['mobile2']),
        'zone' => htmlspecialchars($data['zone']),
        'address' => htmlspecialchars($data['address']),
        // لو موجود note احفظها، لو مش موجود سيبها زي ما هي
        'note' => array_key_exists('note', $data) ? htmlspecialchars($data['note']) : reservation::where('id', $data['id'])->first()->note,
        'description'=> htmlspecialchars($data['description']) ?? null,
        'co_z' => htmlspecialchars($data['co_z']),
        'history' => htmlspecialchars($data['history']),
        
                              
       
      
        
      ]);
      
  }
  
  ///////////////////////////////
       public function new_reservation2(Request $request)
    {
             $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|digits:11',
            'mobile2' => 'required|numeric|digits:11',
            'zone' => 'required',
            'address' => 'required',
            'note' => 'required',
            'id' => 'required'
        ], 
        [
        'name.required'=> 'Name is required!'
            ]);  
            
         $data = $request->all();
         $id = $data['id'];
         $get_info = adahyt::where('id',$data['id'])->first();
         if($get_info->free < 1 || $get_info->cases != 1){
           
       session()->flash("fail", "لا يوجد صكوك متاحة");
            return redirect("pay/".$data['id']);   
         }else{
             $sak_price = sak::where('name',$get_info->sak)->first()->price;
             $data['pay'] = $sak_price;
             $loan = ($sak_price - $data['pay']);
           
           $free = ($get_info->free - 1);
          $reservation = ($get_info->reservation + 1) ;
           if($free < 1){$cases = 2;}else{$cases = 1;}
       
        
         $this->create_new_reservation($data,$loan);  
         ///////treasury_sak///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
       $reason_t = "SYSTEM-  قيمة الصك" ;
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
             $total = ($get->total - $data['amount']);
         }else{
          $total =  (0 - $data['amount']) ; 
         }
         $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t); 
         
         //////////////////////////////////////////////////
         
        ///////treasury_account///////////////////////////////////////
         $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
       $reason_t = "SYSTEM-   قيمة حجز الصك" ;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'حجز الصك';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
        $this->create_new_treasury_account($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
         
         
            $this->edit_adahyt_reservation($get_info->id,$free,$cases,$reservation); 
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("pay/".$id);
         
         }
    } 
    
    
      protected function create_new_reservation(array $data , $loan)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$data['id'])->first();
        return reservation::create([
        'ad_id' => htmlspecialchars($data['id']),
        'code' => $get_sakc->code,
        'adahy' => $get_sakc->adahy,
        'saks' => $get_sakc->sak,
        'days' => $get_sakc->days,
        'name' => htmlspecialchars($data['name']),
        'mobile' => htmlspecialchars($data['mobile']),
        'mobile2' => htmlspecialchars($data['mobile2']),
        'zone' => htmlspecialchars($data['zone']),
        'address' => htmlspecialchars($data['address']),
        'sak' => 1,
        'pay' => htmlspecialchars($data['pay']),
        'price' => 0,
        'loan' => $loan,
        'note' => htmlspecialchars($data['note']),
        'rec' => htmlspecialchars($data['rec']),
        'def' => htmlspecialchars($data['def']),
        'emp' => Auth::user()->email,
        'co_z' => htmlspecialchars($data['co_z']),
        'history' => htmlspecialchars($data['history']),
        'type' => htmlspecialchars($data['type']),
          'retype' => 0,   
          'calltype' => 0, 
          'resptype' => 0, 
          'rectype' => 0, 
          'qty' => 0, 
        'treasury_id' => Auth::user()->t_id,
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }



    protected function edit_adahyt_reservation($id,$free,$cases,$reservation)
    {
        return adahyt::where("id", $id)->update([
        'free' => $free,
        'reservation' => $reservation,
        'cases' => $cases
      ]);  
    }
    
    
    
    
          protected function create_new_client(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$data['id'])->count();
        return clients::create([
        'name' => htmlspecialchars($data['name']),
        'mob' => htmlspecialchars($data['mobile']),
        'mob2' => htmlspecialchars($data['mobile2']),
        'mob3' => htmlspecialchars($data['mobile3']),
        'mob4' => htmlspecialchars($data['mobile4']),
        'zone' => htmlspecialchars($data['zone']),
        'address' => htmlspecialchars($data['address']),
        'type' => 1,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
    
    
            protected function edit_client(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc = adahyt::where('id',$data['id'])->count();
        return clients::where('mob',$data['mobile'])->update([
        'name' => htmlspecialchars($data['name']),
        
        'mob2' => htmlspecialchars($data['mobile2']),
        'mob3' => htmlspecialchars($data['mobile3']),
        'mob4' => htmlspecialchars($data['mobile4']),
        'zone' => htmlspecialchars($data['zone']),
        'address' => htmlspecialchars($data['address']),
        'type' => 1,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
    
    
    
            protected function add_client_history($mobile)
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
        
        'agent' => Auth::user()->email
      
        
      ]);
        }
      
   
    }
///////////////////////////////////////////////////////////////// //////////////////////////////////////////////////
     //////////////////////////////////////////////////////////new_treasury_sak ////////////////////////////////////////////////////////////////   

    public function new_treasury_sak(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = reservation::where('id',$data['id'])->first();
         $check = treasury_sak::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        $reason_t = "صرف نقدية - أضحية رقم" ."-".$get_info->ad_id." - ".$get_info->name;
         $this->create_new_treasury_sak($data,$total,$type_frome,$type,$reason_t);  
          DB::table('financial_transactions')->insert([
            'res_rec' => $get_info->rec,
            'adahy_code' => $get_info->code,
            'type'=> "صرف نقدية",
            'amount' => $data['amount'],
            'agent_name' => Auth::user()->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
        $reason_t = "صرف نقدية - أضحية رقم" ."-".$get_info->ad_id." - ".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب أضحية ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
        $this->create_new_treasury_account($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasury_sak/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_treasury_sak(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id??12)->first()->name;
        
        return treasury_sak::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots'])??0,
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   
           protected function create_new_treasury_account(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      
        
        return treasury::create([
        'treasury_id' => Auth::user()->t_id,
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t,
        'nots' => htmlspecialchars($data['nots'])??0,
        'trans_bill' => 0,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   //////////////////////////////////////////////////////////new_treasury_sak1
   
    public function new_treasury_sak1_(Request $request)
    {
      DB::beginTransaction();
      $request->validate([
        'amount' => 'required|numeric',
        
        'id' => 'required'
        ]
      );  
      
      $data = $request->all();
      
      $get_info = reservation::where('id',$data['id'])->first();
      if($get_info->emp == "website"){
        $get_all = reservation::where('rec',$get_info->rec)->get();
        foreach($get_all as $g){
          $message = adahyt::where('code', $g->code)->first();
          $data['amount'] = $g->loan;
          if ($data['amount'] > 0) {
            $branchSafe = \App\Models\Safe::where('type', 'branch')
            ->where(function ($q) {
              $q->where('id', Auth::user()->t_id)
              //  ->orWhere('parent_id', Auth::user()->t_id)
              ->orWhere('user_id', Auth::user()->t_id);
            })->first();
            //  dd($branchSafe);
            if ($branchSafe) {
              $branchSafe->increment('balance', $data['amount']);
              \App\Models\SafeMovement::create([
                //  'amount'              => $data['note'] ,
                'amount'              => $data['amount'],
                'type'                => 'payment',
                'destination_safe_id' => $branchSafe->id,
                'reservation_id'      => $g->id,
                'created_by'          => Auth::id(),
                'notes'               => 'دفعة حجز - ' .$g->name . ' - ' . $message->sak,
              ]);
            }
            $check = treasury_sak::where('treasury_id',$g->id)->count();
          }
        } // end foreach
         
          $this->upd_res($get_info->rec); 
       session()->flash("sucess", "تم الإضافة بنجاح");
       DB::commit();
            return redirect("reservationSystemWebsite/".$get_info->rec);
         }else{
            DB::rollBack();
             session()->flash("fail", "لا يمكن الاضافة لهذا الرقم");
             return redirect("reservationSystemWebsite/".$get_info->rec);
            // return redirect("/adahyt_r2/");  
         }
         
        
    }
   
   protected function upd_res($rec){
       ///
       date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i:s');
        $time=date('H:i:s');
        $type = 1;  
        
        return reservation::where("rec", $rec)->update([
        'emp' => Auth::user()->email,
        'updated_at' => $date,
      
      ]);
   }
   
   
    public function new_treasury_sak1(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'nullable',
            'id' => 'required'
        ]
      );  
             
         $data = $request->all();
         $get_info = reservation::where('id',$data['id'])->first();
         $check = treasury_sak::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  (0 + $data['amount']) ; 
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
        $reason_t = "استلام نقدية - أضحية رقم" ."-".$get_info->ad_id." - ".$get_info->name;
         $this->create_new_treasury_sak($data, $total, $type_frome, $type, $reason_t);  
         DB::table('financial_transactions')->insert([
            'res_rec' => $get_info->rec,
            'adahy_code' => $get_info->code,
            'type'=> "استلام نقدية",
            'amount' => $data['amount'],
            'agent_name' => Auth::user()->email,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
         ]);
           
                 ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // دائن 
      $reason_t = "استلام نقدية - أضحية رقم" ."-".$get_info->ad_id." - ".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب أضحية ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
        $this->create_new_treasury_account($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasury_sak/".$data['id']);
         
        
    }
   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    
    
       ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////new_treasury_daan دائن
    public function add_treasury_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'trans' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
       
         $check = treasures::where('id',$data['id'])->count();
         if($check > 0){
               $get_info = treasures::where('id',$data['id'])->first();
               $check2 = treasury::where('treasury_id',$data['id'])->count();
               if($check2 > 0){
             $get = treasury::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  (0 - $data['amount']) ; 
         }
         if($total < 0){
           session()->flash("fail", "لا يوجد رصيد كافى فى الخزينة");
         
              return redirect("/treasures/".$data['id']);  
         }
         else{
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
        if($data['trans'] == 1){//تحويل إلى خزينة
             $check_o = treasures::where('id',$data['treasury'])->count();
             if($check_o > 0){
                  $get_info_o = treasures::where('id',$data['treasury'])->first();
                  $check_o2 = treasury::where('treasury_id',$data['treasury'])->count();
                  if($check_o2 > 0){
                $get_o = treasury::where('treasury_id',$data['treasury'])->orderBy('id','desc')->first();
                 $total_o = ($get_o->total + $data['amount']);
                  }else{
                   $total_o =  (0 + $data['amount']) ;   
                  }
           $reason_t = "تحويل إلى خزينة -".$get_info_o->name;
            $reason_t_o = "تحويل من خزينة -".$get_info->name;
         $type_o = 1;
         $this->create_new_treasury($data,$data['id'], $total, $type_frome, $type, $reason_t); 
         $this->create_new_treasury($data,$data['treasury'], $total_o, $type_frome, $type_o, $reason_t_o); 
               
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasures/".$data['id']); 
            
             }else{
                 session()->flash("fail", "هذه الخزينة غير مسجلة لدينا");
         
              return redirect("/treasures/".$data['id']);  
                 
             }
        }
        
        if($data['trans'] == 2){//تسوية دائنة
            $reason_t = "تسوية دائنة";
                 $this->create_new_treasury($data,$data['id'], $total, $type_frome, $type, $reason_t);   
                 session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasures/".$data['id']); 
        }
         }
         }else{
             
              session()->flash("fail", "هذه الخزينة غير مسجلة لدينا");
         
              return redirect("/treasures/".$data['id']);
         }
       
     
         
        
    }
   
    protected function create_new_treasury(array $data ,$id, $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      
        
        return treasury::create([
        'treasury_id' => $id,
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => 0,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
      //////////////////////////////////////////////////////////new_treasury_mdeen مدين
    public function add_treasury_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'trans' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
       
         $check = treasures::where('id',$data['id'])->count();
         if($check > 0){
               $get_info = treasures::where('id',$data['id'])->first();
               $check2 = treasury::where('treasury_id',$data['id'])->count();
               if($check2 > 0){
             $get = treasury::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  (0 + $data['amount']) ; 
         }
        // if($total == null){
        if($total == "n"){
           session()->flash("fail", "لا يوجد رصيد كافى فى الخزينة");
         
              return redirect("/treasures/".$data['id']);  
         }
         else{
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        if($data['trans'] == 1){//تحويل من خزينة
             $check_o = treasures::where('id',$data['treasury'])->count();
             if($check_o > 0){
                  $get_info_o = treasures::where('id',$data['treasury'])->first();
                  $check_o2 = treasury::where('treasury_id',$data['treasury'])->count();
                  if($check_o2 > 0){
                $get_o = treasury::where('treasury_id',$data['treasury'])->orderBy('id','desc')->first();
                 $total_o = ($get_o->total - $data['amount']);
                  }else{
                   $total_o =  (0 - $data['amount']) ;   
                  }
                  if($total_o < 0){
                      session()->flash("fail", "لا يوجد رصيد كافى فى الخزينة");
         
              return redirect("/treasures/".$data['id']);  
                  }else{
           $reason_t = "تحويل من خزينة -".$get_info_o->name;
            $reason_t_o = "تحويل إلى خزينة -".$get_info->name;
         $type_o = 2;
         $this->create_new_treasury($data,$data['id'], $total, $type_frome, $type, $reason_t); 
         $this->create_new_treasury($data,$data['treasury'], $total_o, $type_frome, $type_o, $reason_t_o); 
               
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasures/".$data['id']); 
                  }
             }else{
                 session()->flash("fail", "هذه الخزينة غير مسجلة لدينا");
         
              return redirect("/treasures/".$data['id']);  
                 
             }
        }
        
        if($data['trans'] == 2){//تسوية مدينة
            $reason_t = "تسوية مدينة";
                 $this->create_new_treasury($data,$data['id'], $total, $type_frome, $type, $reason_t);   
                 session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/treasures/".$data['id']); 
        }
         }
         }else{
             
              session()->flash("fail", "هذه الخزينة غير مسجلة لدينا");
         
              return redirect("/treasures/".$data['id']);
         }
       
     
         
        
    }
    
       //////////////////////////////////new_per///////////////////////////////////////////////

       public function new_per(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'pass' => 'required',
            't_id' => 'required',
            'gov'=>'required',
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "هذه الخزينة غير مسجلة لدينا";
         
       $data = $request->all();
      
      $check = treasures::where('id',$data['t_id'])->count();
   
       
 
   if($check == 0){
      session()->flash("fail", $error);
            return redirect("per")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_per($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("per");
   }
       
    }

  protected function create_per(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
        return User::create([
        'name' => htmlspecialchars($data['name']),
        'email' => htmlspecialchars($data['name']),
         'gov' => htmlspecialchars($data['gov'])?? 0,
        'password' => Hash::make($data['pass']),
     
        'remember_token' => 'TVLqw08EHLYBH85YTYsWCTHzHxlSVYaxcGavbk8pE2hMKhrS2jhRIRbMEi5S',
        'status' => 0,
        't_case' => 0,
        't_id' => htmlspecialchars($data['t_id']),
        'pass_c' => htmlspecialchars($data['pass']),
        'agent' => Auth::user()->email
      ]);
      
   
    }
    
    //////////////////////////edit_per///////////////////////////////////////////////////////////////////////////////////////
           public function edit_per(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'pass' => 'required',
            't_id' => 'required',
            'id' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "هذه الخزينة غير مسجلة لدينا";
         
       $data = $request->all();
      
      $check = treasures::where('id',$data['t_id'])->count();
   
       
 
   if($check == 0){
      session()->flash("fail", $error);
            return redirect("per")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_pers($data);  
       session()->flash("sucess", "تم التعديل بنجاح");
            return redirect("per");
   }
       
    }
    
      protected function edit_pers(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
        return User::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'email' => htmlspecialchars($data['name']),
          
        'password' => Hash::make($data['pass']),
        'gov' => htmlspecialchars($data['gov'])?? 0,
        't_id' => htmlspecialchars($data['t_id']),
        'pass_c' => htmlspecialchars($data['pass']),
        'agent' => Auth::user()->email
      ]);
      
   
    }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////
          public function c_perm(Request $request)
          {
            $request->validate([
              'type' => 'required',
              'pages' => 'required|array',
              'id' => 'required'
            ]);
            $rand = rand(1111,9999);
            $rands = rand(100001,999999);
            $now = time();
            $err = 0;
            $error = "هذه الصفحة غير مسجلة لدينا";

            $data = $request->all();

            $pages = $data['pages'];
            if (!is_array($pages) || empty($pages)) {
              session()->flash("fail", "يجب اختيار صفحات");
              return redirect("per")->withErrors($request->validate)->withInput();
            }

            foreach ($pages as $page) {
              $check = pages::where('name', $page)->count();
              if ($check == 0) {
                session()->flash("fail", $error . " ($page)");
                return redirect("per")->withErrors($request->validate)->withInput();
              }
            }

            if ($data['type'] == 1) { // إضافة
              foreach ($pages as $page) {
                $page_ar = pages::where('name', $page)->first()->name_ar;
                $check2 = per::where('u_id', $data['id'])->where('page', $page)->count();
                if ($check2 == 0) {
                  $this->create_perm(['id' => $data['id'], 'page' => $page], $page_ar);
                }
              }
              session()->flash("sucess", "تم إضافة الصلاحيات بنجاح");
              return redirect("per");
            } else { // حذف
              foreach ($pages as $page) {
                $this->del_perm(['id' => $data['id'], 'page' => $page]);
              }
              session()->flash("sucess", "تم إلغاء الصلاحيات بنجاح");
              return redirect("per");
            }
          }

          protected function create_perm(array $data, $page_ar)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
        return per::create([
        'u_id' => htmlspecialchars($data['id']),
        'page' => htmlspecialchars($data['page']),
        'page_ar' => $page_ar,
        'agent' => Auth::user()->email
      ]);
      
   
    }
    
    
        protected function del_perm(array $data)
    {
        
   return per::where('u_id',$data['id'])->where('page',$data['page'])->delete();
      
    }
    
  
  
     //////////////////////////////////////////////////////////
           public function transfer_resv(Request $request)
    {
            $request->validate([
         
            'id' => 'required',
            'code' => 'required',
            'pay' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "هذا الصك غير متاح ";
         
       $data = $request->all();
      $check_sak = adahyt::where('code',$data['code'])->where('free','>',0)->count();
      $check = reservation::where('id',$data['id'])->count();
   
       
 
   if($check == 0 || $check_sak == 0){
      session()->flash("fail", $error);
            return redirect("sak_all")->withErrors($request->validate)->withInput();  
   }else{
  // نقل
     
    $data['code'] = adahyt::where('code',$data['code'])->first()->id;
      $total = @treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first()->total;  
      
  
      $get_new_sak = adahyt::where('id',$data['code'])->first();
     $get_res = reservation::where('id',$data['id'])->first(); 
     $get_adahyt = adahyt::where('id',$get_res->ad_id)->first();
      $get = @treasury::where('treasury_id',1)->orderBy('id','desc')->first();
      ///////////////////
     ////treasury hindeling new sak
    $totals2 = ((int)$get->total + (int)$data['pay']);
    $reason_t2 = "نقل صك ".$get_new_sak->sak.'-'.$get_new_sak->days.'-'.$get_res->name;
    $nots2 = "نقل صك";
      $id = 1;$type_frome = 2;$type2 = 1; // دائن 
      $loan = $get_new_sak->price - (int)$data['pay'];
      
        
        /////treasury sak
          $type_frome3 = 2; //الاكشن من انى صفحة
        $type3 = 2; // دائن 
        $reason_t3 = " استلام نقدية";
        $data['amount'] = $data['pay'];
        
        $data['nots'] = 'دفعة';
    
        
        
        
        /////end treasury sak
        
        
        
         $this->create_new_treasury2($nots2,$totals2 ,$id, (int)$data['pay'],$type_frome,$type2,$reason_t2);//صك جديد
         $this->edit_adahyt2_((int)$data['code']);//صك جديد
         $this->transfer_new_resv($data['code'],$data['id'],$data['pay'],$loan);//صك جديد
         $this->transfer_sak_treasury($data['code'],$data['pay'],$data['nots'],$data['pay'],$type_frome3,$type3,$reason_t3);//صك جديد
        
        
        
        $get_old = @treasury::where('treasury_id',1)->orderBy('id','desc')->first();
         $totals_old = ((int)$get_old->total - (int)$total);
         ////treasury hindeling old sak
        
        $reason_t_old = "نقل صك ".$get_adahyt->sak.'-'.$get_adahyt->days.'-'.$get_res->name;
      $nots = "نقل صك";
      $id = 1;$type_frome = 2;$type = 2; // دائن 
      ///end treasury hindeling
         
        $this->create_new_treasury2($nots,$totals_old ,$id, $total,$type_frome,$type,$reason_t_old);//صك قديم
         $this->edit_adahyt_($data);//صك قديم
         $this->ins_resv_del($data); //صك قديم
         $this->del_resvd($data); // صك قديم
         $this->del_sak_treasury($data); // صك قديم
        
         

       session()->flash("sucess", "تم نقل الحجز بنجاح");
            return redirect("sak_all");  
    
            
   }
       
    }  
    
    
        protected function transfer_new_resv($code,$id,$pay, $loan)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get_sakc_new = adahyt::where('id',$code)->first();
        $get_old_reservation = reservation::where('id',$id)->first();
 
        return reservation::create([
        'ad_id' => $get_sakc_new->id,
        'code' => $get_sakc_new->code,
        'adahy' => $get_sakc_new->adahy,
        'resnum' => $get_old_reservation->resnum,
        'c_persons' => $get_old_reservation->c_persons,
        'times' => $get_old_reservation->times,
        'whats' => $get_old_reservation->whats,
        'whats2' => $get_old_reservation->whats2,
        'city' => $get_old_reservation->city,
        'saks' => $get_sakc_new->sak,
        'days' => $get_sakc_new->days,
        'name' => $get_old_reservation->name,
        'mobile' => $get_old_reservation->mobile,
        'mobile2' => $get_old_reservation->mobile2,
        'mobile3' => $get_old_reservation->mobile3,
        'zone' => $get_old_reservation->zone,
        'address' => $get_old_reservation->address,
        'view' => $get_old_reservation->view,
        'c_sak' => $get_old_reservation->c_sak,
        'number' => $get_old_reservation->number,
        'sak' => 1,
        'pay' => $pay,
        'price' => 0,
        'loan' => $get_old_reservation->loan,
        'note' => $get_old_reservation->note,
        'rec' => $get_old_reservation->rec,
        'def' => $get_old_reservation->def,
        'emp' => Auth::user()->email,
        'co_z' => $get_old_reservation->co_z,
        'history' => $get_old_reservation->history,
        'type' => 1,
          'retype' => 0, 
        'calltype' => 0, 
          'resptype' => 0, 
          'rectype' => 0,
          'qty' => 0,
        'treasury_id' => Auth::user()->t_id,
        'agent' => Auth::user()->email
      
        
      ]);
      
    }
    
    
             protected function transfer_sak_treasury($id,$pay,$nots,$total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id??12)->first()->name;
        $new_id = reservation::where('ad_id',$id)->orderBy('id','desc')->first()->id;
        return treasury_sak::create([
        'treasury_id' => $new_id,
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => $pay,
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => $nots,
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
    //////////////////////////////////////////////////////////
           public function del_resv(Request $request)
    {
            $request->validate([
            'id' => 'required'
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "هذا الصك غير مسجل لدينا";
         
       $data = $request->all();
      
      $check = reservation::where('id',$data['id'])->count();
   
       
 
   if($check == 0){
      session()->flash("fail", $error);
            return redirect("sak_all")->withErrors($request->validate)->withInput();  
   }else{
     $info = reservation::where('id',$data['id'])->first();
    //   $get = reservation::where('rec',$info->rec)->get();
    //   foreach($get as $g){
    //   $data['id'] = $g->id; 
  // مسح
      $total = @treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first()->total;  
      
      ////treasury hindeling
        $get_res = reservation::where('id',$data['id'])->first(); 
     $get_adahyt = adahyt::where('id',$get_res->ad_id)->first();
      
       $get = @treasury::where('treasury_id',1)->orderBy('id','desc')->first();
        $totals = ((int)$get->total - (int)$total);
        $reason_t = "إلغاء صك ".$get_adahyt->sak.'-'.$get_adahyt->days.'-'.$get_res->name;
      $nots = "إلغاء صك";
      ///end treasury hindeling
        $id = 1;$type_frome = 2;$type = 2; // دائن 
        $this->create_new_treasury2($nots,$totals ,$id, $total,$type_frome,$type,$reason_t);
         $this->edit_adahyt_($data);
         $this->ins_resv_del($data);
         // حذف الأجزاء الخاصة بالحجز من adahy_acc
         DB::table('adahy_acc')->where('r_id', $info->rec)->delete();
         $this->del_resvd($data); 
         $this->del_sak_treasury($data);
        
      // }

       session()->flash("sucess", "تم إلغاء الحجز بنجاح");
            return redirect("sak_all");  
    
            
   }
       
    }
    
    
               public function dell_all(Request $request)
    {
        $startDate = "2024-05-31 00:00:00";  $endDate = "2024-06-02 00:00:00";
        $res = '<table style="border: 1px solid #ddd; width: 100%;text-align: center;">
        <tr style="border: 1px solid #ddd;">
        <td style="border: 1px solid #ddd;">نوع الصك</td>
        <td style="border: 1px solid #ddd;">يوم الذبح</td>
        <td style="border: 1px solid #ddd;">المضحى</td>
        <td style="border: 1px solid #ddd;">الهاتف</td>
        </tr>
        ';
       $get = reservation::whereBetween('created_at', [$startDate, $endDate])->where('emp','website')->get();
       foreach($get as $g){
           $res .= '<tr style="border: 1px solid #ddd;">
           <td style="border: 1px solid #ddd;">'.$g->saks.'</td>
            <td style="border: 1px solid #ddd;">'.$g->days.'</td>
           <td style="border: 1px solid #ddd;">'.$g->name.'</td>
           <td style="border: 1px solid #ddd;">'.$g->mobile.'</td>
          
           </tr>';
           
           
                   ////////////////////////delete
       
            $data['id'] = $g->id; 
            
      
  // مسح
      $total = @treasury_sak::where('treasury_id',$data['id'])->orderBy('id','desc')->first()->total;  
      
      ////treasury hindeling
        $get_res = reservation::where('id',$data['id'])->first(); 
     $get_adahyt = adahyt::where('id',$get_res->ad_id)->first();
      
       $get = @treasury::where('treasury_id',1)->orderBy('id','desc')->first();
        $totals = ((int)$get->total - (int)$total);
        $reason_t = "إلغاء صك ".$get_adahyt->sak.'-'.$get_adahyt->days.'-'.$get_res->name;
      $nots = "إلغاء صك";
      ///end treasury hindeling
        $id = 1;$type_frome = 2;$type = 2; // دائن 
        $this->create_new_treasury2($nots,$totals ,$id, $total,$type_frome,$type,$reason_t);
         $this->edit_adahyt_($data);
         $this->ins_resv_del($data); 
         $this->del_resvd($data); 
         $this->del_sak_treasury($data);
  
        
        ////////////////////////////
           
       }
        $res .= '</table>';
        
        
        

        return $res;
    }
    
        protected function create_new_treasury2($nots,$totals ,$id, $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
    
        return treasury::create([
        'treasury_id' => $id,
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => (int)$total,
        'total' => $totals,
        'reason' => $type,
        'reason_t' => $reason_t,
        'nots' => $nots,
        'trans_bill' => 0,
        
        'agent' => Auth::user()->email
      
        
      ]);

    }
    
    
    
             protected function edit_adahyt_(array $data)
    {
     $id = reservation::where('id',$data['id'])->first()->ad_id; 
     $get = adahyt::where('id',$id)->first();
        return adahyt::where("id", $id)->update([
        'free' => $get->free + 1,
        'reservation' => $get->reservation - 1,
      ]);
        
    } 
    
               protected function edit_adahyt2_($code)
    {
    
     $get = adahyt::where('id',$code)->first();
        return adahyt::where("id", $code)->update([
        'free' => $get->free - 1,
        'reservation' => $get->reservation + 1,
      ]);
        
    } 
    protected function ins_resv_del(array $data)
    {
        $get = reservation::where('id',$data['id'])->first();
        
              return reservation_del::create([
        'ad_id' => $get->ad_id,
        'name' => $get->name,
        'mobile' => $get->mobile,
        'mobile2' => $get->mobile2,
        'zone' => $get->zone,
        'address' => $get->address,
        'sak' => $get->sak,
        'pay' => $get->pay,
        'price' => $get->price,
        'loan' => $get->loan,
        'note' => $get->note,
        'rec' => $get->rec,
        'def' => $get->def,
        'emp' => $get->emp,
        'co_z' => $get->co_z,
        'history' => $get->history,
        'type' => $get->type,
                              
        'treasury_id' => $get->treasury_id,
        'agent' => Auth::user()->email
      
        
      ]);
    }
    
  
    
          protected function del_resvd(array $data)
    {
        
   return reservation::where('id',$data['id'])->delete();
      
    }
    
    
        protected function del_sak_treasury(array $data)
    {
        
   return treasury_sak::where('treasury_id',$data['id'])->delete();
      
    }
   
   
   /////////////////////////////////////////////////////////////////////
      //////////////////////////////////new_expense///////////////////////////////////////////////

       public function new_expense(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("expense")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_expense($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("expense");
   }
  
    }

  protected function create_expense(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return expense::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_expense///////////////////////////////////////////////////////////////////////////////////////
          public function edit_expense(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("expense")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_expense2($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("expense");
   }
  
    }
    
    
      protected function edit_expense2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return expense::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_expense////////////////////////////////////////////////////////////////////// 
          public function del_expense(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = expense::where('id',$data['id'])->first();
 $check1 = tr_expense::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("expense")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_expense2($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("expense");
   }
  
    }
    
    protected function del_expense2(array $data)
    {
        
   return expense::find($data['id'])->delete();
      
    }
    
    
    
         //////////////////////////////////////////////////////////expenses treasury ////////////////////////////////////////////////////////////////   

    public function add_expense_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = expense::where('id',$data['id'])->first();
         $check = tr_expense::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_expense::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
        $reason_t = "مصروف - استلام نقدية" ."-".$get_info->name;
         $this->create_new_tr_expense($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "مصروف - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب مصروف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/expense_tr/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_expense(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_expense::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   
           protected function create_new_treasury_account2(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      
        
        return treasury::create([
        'treasury_id' => Auth::user()->t_id,
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => 0,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
    
    
    
    
    
      public function add_expense_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = expense::where('id',$data['id'])->first();
         $check = tr_expense::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_expense::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        $reason_t = "مصروف - صرف نقدية" ."-".$get_info->name;
         $this->create_new_tr_expense($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "مصروف - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب مصروف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/expense_tr/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end expenses treasury
   
   
   
      //////////////////////////////////new_income///////////////////////////////////////////////

       public function new_income(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("income")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_income($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("income");
   }
  
    }

  protected function create_income(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return income::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_income///////////////////////////////////////////////////////////////////////////////////////
          public function edit_income(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("income")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_income2($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("income");
   }
  
    }
    
    
      protected function edit_income2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return income::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_expense////////////////////////////////////////////////////////////////////// 
          public function del_income(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = income::where('id',$data['id'])->first();
 $check1 = tr_income::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("income")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_income2($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("income");
   }
  
    }
    
    protected function del_income2(array $data)
    {
        
   return income::find($data['id'])->delete();
      
    }
   
   
   
   
            //////////////////////////////////////////////////////////income treasury ////////////////////////////////////////////////////////////////   

    public function add_income_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = income::where('id',$data['id'])->first();
         $check = tr_income::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_income::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
        $reason_t = "إيراد - استلام نقدية" ."-".$get_info->name;
         $this->create_new_tr_income($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "إيراد - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب إيراد ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/income_tr/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_income(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_income::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   

    
    
    
    
    
      public function add_income_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = income::where('id',$data['id'])->first();
         $check = tr_income::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_income::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        $reason_t = "مصروف - صرف نقدية" ."-".$get_info->name;
         $this->create_new_tr_income($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "إيراد - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب إيراد ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/income_tr/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end income treasury
   
   
   
   
         //////////////////////////////////new_butcher///////////////////////////////////////////////

       public function new_butcher(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_butcher($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher");
   }
  
    }

  protected function create_butcher(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return butcher::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_income///////////////////////////////////////////////////////////////////////////////////////
          public function edit_butcher(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher")->withErrors($request->validate)->withInput();  
   }else{
      $this->cedit_butcher($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher");
   }
  
    }
    
    
      protected function cedit_butcher(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return butcher::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_expense////////////////////////////////////////////////////////////////////// 
          public function del_butcher(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = butcher::where('id',$data['id'])->first();
 $check1 = tr_butcher::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher")->withErrors($request->validate)->withInput();  
   }else{
      $this->cdel_butcher($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("butcher");
   }
  
    }
    
    protected function cdel_butcher(array $data)
    {
        
   return butcher::find($data['id'])->delete();
      
    }
   
   
   
      
            //////////////////////////////////////////////////////////butcher treasury ////////////////////////////////////////////////////////////////   

    public function add_butcher_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = butcher::where('id',$data['id'])->first();
         $check = tr_butcher::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_butcher::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
       if($data['type'] == 1){
        $reason_t = "جزاريين - استلام نقدية" ."-".$get_info->name;
       }else{
         $reason_t = "جزاريين - تسوية دائنة" ."-".$get_info->name;   
       }
         $this->create_new_tr_butcher($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "جزار - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب جزار ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/butcher_tr/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_butcher(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_butcher::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   

    
    
    
    
    
      public function add_butcher_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = butcher::where('id',$data['id'])->first();
         $check = tr_butcher::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_butcher::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        if($data['type'] == 1){
        $reason_t = "جزاريين - صرف نقدية" ."-".$get_info->name;
        }else{
          $reason_t = "جزاريين - تسوية مدينة " ."-".$get_info->name;  
        }
         $this->create_new_tr_butcher($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "جزار - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب جزار ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/butcher_tr/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end butcher treasury
   
   
   
   
   
   
     
         //////////////////////////////////new_butcher2///////////////////////////////////////////////

       public function new_butcher2(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher2")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_butcher2($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher2");
   }
  
    }

  protected function create_butcher2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return butcher2::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_butcher2///////////////////////////////////////////////////////////////////////////////////////
          public function edit_butcher2(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher2")->withErrors($request->validate)->withInput();  
   }else{
      $this->cedit_butcher2($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher2");
   }
  
    }
    
    
      protected function cedit_butcher2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return butcher2::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_expense////////////////////////////////////////////////////////////////////// 
          public function del_butcher2(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = butcher2::where('id',$data['id'])->first();
 $check1 = tr_butcher2::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("butcher2")->withErrors($request->validate)->withInput();  
   }else{
      $this->cdel_butcher2($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("butcher2");
   }
  
    }
    
    protected function cdel_butcher2(array $data)
    {
        
   return butcher2::find($data['id'])->delete();
      
    }
   
   
   
      
            //////////////////////////////////////////////////////////butcher2 treasury ////////////////////////////////////////////////////////////////   

    public function add_butcher2_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = butcher2::where('id',$data['id'])->first();
         $check = tr_butcher2::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_butcher2::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
       if($data['type'] == 1){
        $reason_t = "معلم تنظيف - استلام نقدية" ."-".$get_info->name;
       }else{
         $reason_t = "معلم تنظيف - تسوية دائنة" ."-".$get_info->name;   
       }
         $this->create_new_tr_butcher2($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "معلم تنظيف - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب معلم تنظيف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/butcher_tr2/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_butcher2(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_butcher2::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   

    
    
    
    
    
      public function add_butcher_m2(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = butcher2::where('id',$data['id'])->first();
         $check = tr_butcher2::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_butcher2::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        if($data['type'] == 1){
        $reason_t = "معلم تنظيف - صرف نقدية" ."-".$get_info->name;
        }else{
          $reason_t = "معلم تنظيف - تسوية مدينة " ."-".$get_info->name;  
        }
         $this->create_new_tr_butcher2($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "معلم تنظيف - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب معلم تنظيف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/butcher_tr2/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end butcher2 treasury
   
   
   
   
     
         //////////////////////////////////new_follower///////////////////////////////////////////////

       public function new_follower(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("follower")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_follower($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("follower");
   }
  
    }

  protected function create_follower(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return follower::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_follower///////////////////////////////////////////////////////////////////////////////////////
          public function edit_follower(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("follower")->withErrors($request->validate)->withInput();  
   }else{
      $this->cedit_follower($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("follower");
   }
  
    }
    
    
      protected function cedit_follower(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return follower::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_follower////////////////////////////////////////////////////////////////////// 
          public function del_follower(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = follower::where('id',$data['id'])->first();
 $check1 = tr_follower::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("follower")->withErrors($request->validate)->withInput();  
   }else{
      $this->cdel_follower($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("follower");
   }
  
    }
    
    protected function cdel_follower(array $data)
    {
        
   return follower::find($data['id'])->delete();
      
    }
   
   
   
   
            //////////////////////////////////////////////////////////follower treasury ////////////////////////////////////////////////////////////////   

    public function add_follower_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = follower::where('id',$data['id'])->first();
         $check = tr_follower::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_follower::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
       if($data['type'] == 1){
        $reason_t = "مشرفيين - استلام نقدية" ."-".$get_info->name;
       }else{
         $reason_t = "مشرفيين - تسوية دائنة" ."-".$get_info->name;   
       }
         $this->create_new_tr_follower($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "مشرف - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب مشرف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/follower_tr/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_follower(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_follower::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   

    
    
    
    
    
      public function add_follower_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = follower::where('id',$data['id'])->first();
         $check = tr_follower::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_follower::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        if($data['type'] == 1){
        $reason_t = "مشرفيين - صرف نقدية" ."-".$get_info->name;
        }else{
          $reason_t = "مشرفيين - تسوية مدينة " ."-".$get_info->name;  
        }
         $this->create_new_tr_follower($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "مشرف - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب مشرف ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/follower_tr/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end follower treasury
   
   
   
            //////////////////////////////////new_vendor///////////////////////////////////////////////

       public function new_vendor(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("vendor")->withErrors($request->validate)->withInput();  
   }else{
      $this->create_vendor($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("vendor");
   }
  
    }

  protected function create_vendor(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return vendor::create([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    //////////////////////////edit_vendor///////////////////////////////////////////////////////////////////////////////////////
          public function edit_vendor(Request $request)
    {
            $request->validate([
            'name' => 'required',
            'note' => 'required'
            
        ]);
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         $data = $request->all();
         /*
        $error = "لا يمكن تعديل نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = adahy_type::where('id',$data['id'])->first();
 $check1 = adahyt::where('adahy',$get_info->name)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
 */
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("vendor")->withErrors($request->validate)->withInput();  
   }else{
      $this->edit_vendor2($data);  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("vendor");
   }
  
    }
    
    
      protected function edit_vendor2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        
              return vendor::where("id", $data['id'])->update([
        'name' => htmlspecialchars($data['name']),
        'note' => htmlspecialchars($data['note']),
       

      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
   ////////////////////////////////////////////delete_vendor////////////////////////////////////////////////////////////////////// 
          public function del_vendor(Request $request)
    {
            $request->validate([
            'id' => 'required'
          
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "لا يمكن مسح نوع الاضحية لوجود أضاحى بنفس النوع";
         
       $data = $request->all();
       $get_info = vendor::where('id',$data['id'])->first();
 $check1 = tr_vendor::where('treasury_id',$get_info->id)->count();
if($check1 > 0){$err = 1;}else{$err = 0;}
   if($err == 1){
      session()->flash("fail", $error);
            return redirect("vendor")->withErrors($request->validate)->withInput();  
   }else{
      $this->del_vendor2($data);  
       session()->flash("sucess", "تم المسح بنجاح");
            return redirect("vendor");
   }
  
    }
    
    protected function del_vendor2(array $data)
    {
        
   return vendor::find($data['id'])->delete();
      
    }
   
   
   
      
            //////////////////////////////////////////////////////////vendor treasury ////////////////////////////////////////////////////////////////   

    public function add_vendor_d(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = vendor::where('id',$data['id'])->first();
         $check = tr_vendor::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_vendor::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 2; // دائن 
       if($data['type'] == 1){
        $reason_t = "مورديين - استلام نقدية" ."-".$get_info->name;
       }else{
         $reason_t = "مورديين - تسوية دائنة" ."-".$get_info->name;   
       }
         $this->create_new_tr_vendor($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 1; // مدين 
         $reason_t = "مورد - استلام نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'استلام نقدية من حساب مورد ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total + $data['amount']);
         }else{
          $total =  0 + $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/vendor_tr/".$data['id']);
         
        
    }    
    
    
    ////
          protected function create_new_tr_vendor(array $data , $total,$type_frome,$type,$reason_t)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
      $tr_name = treasures::where('id',Auth::user()->t_id)->first()->name;
        
        return tr_vendor::create([
        'treasury_id' => htmlspecialchars($data['id']),
        'type_from' => $type_frome,
        'type' => $type,
        'amount' => htmlspecialchars($data['amount']),
        'total' => htmlspecialchars($total),
        'reason' => $type,
        'reason_t' => $reason_t.' - '.$tr_name,
        'nots' => htmlspecialchars($data['nots']),
        'trans_bill' => Auth::user()->t_id,
        
        'agent' => Auth::user()->email
      
        
      ]);
      
   
    }
   
   
   
   /////
   

    
    
    
    
    
      public function add_vendor_m(Request $request)
    {
             $request->validate([
            'amount' => 'required|numeric',
            'nots' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]
      );  
            
         $data = $request->all();
         $get_info = vendor::where('id',$data['id'])->first();
         $check = tr_vendor::where('treasury_id',$data['id'])->count();
         if($check > 0){
             $get = tr_vendor::where('treasury_id',$data['id'])->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  $data['amount'];  
         }
     
         $type_frome = 1; //الاكشن من انى صفحة
         $type = 1; // مدين 
        if($data['type'] == 1){
        $reason_t = "مورديين - صرف نقدية" ."-".$get_info->name;
        }else{
          $reason_t = "مورديين - تسوية مدينة " ."-".$get_info->name;  
        }
         $this->create_new_tr_vendor($data,$total,$type_frome,$type,$reason_t);  
         
          ///////treasury_account///////////////////////////////////////
        // $data['id'] = reservation::where('id','!=',0)->orderBy('id','desc')->first()->id;
        $type_frome = 2; //الاكشن من انى صفحة
        $type = 2; // دائن 
         $reason_t = "مورد - صرف نقدية" ."-".$get_info->name;
       // $data['amount'] = $sak_price;
        
        $data['nots'] = 'صرف نقدية من حساب مورد ';
         $check = treasury::where('treasury_id',Auth::user()->t_id)->count();
         if($check > 0){
             $get = treasury::where('treasury_id',Auth::user()->t_id)->orderBy('id','desc')->first();
             $total = ($get->total - $data['amount']);
         }else{
          $total =  0 - $data['amount'];  
         }
         if($data['type'] == 1){
        $this->create_new_treasury_account2($data,$total,$type_frome,$type,$reason_t); 
         }
         
       
         
         //////////////////////////////////////////////////
           
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("/vendor_tr/".$data['id']);
         
        
    }    
    
    
    ////
    
   //////////////////////////////////////////////////////////end butcher treasury
   
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
       //////////////////////////////////add weight/////////////////////////////////////////////////////////////

 public function ed_adhyat(Request $request)
 {
           $request->validate([
            'id' => 'required',
           
            'times' => 'required',
        
        ] 
      );
      $data = $request->all();
      reservation::where('code',$data['id'])->update([
      'times' => htmlspecialchars($data['times']),
      ]);
        adahyt::where('code',$data['id'])->update([
      'times' => htmlspecialchars($data['times']),
      ]);
     
       session()->flash("sucess", "تم التعديل بنجاح");
           // return redirect("rec_all"); 
  return redirect()->back(); 
     
 }

       public function add_weight(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'vendor' => 'required',
            'weight' => 'required',
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
     
       if(empty($data['note'])){$data['note'] = 0;}
      $get = adahyt::where('id',$data['code'])->first();
      $data['code'] = $get->code;
 $check = opt::where('code',$data['code'])->count();

 if($check > 0){
      $this->cedit_weight($data); 
      $this->cedit_adhyat($data);
       session()->flash("sucess", "تم الإضافة بنجاح");
            // return redirect("weight"); 
            return back();
 }else{
   $this->create_weight($data); 
   $this->cedit_adhyat($data);
       session()->flash("sucess", "تم الإضافة بنجاح");
            // return redirect("weight");
            return back();
 }

    }
    
    
           public function add_weight2(Request $request)
    {
            $request->validate([
            'code' => 'required',
           
            'weight' => 'required',
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
     $data['b_case'] = 0; $data['f_case'] = 0;
       if(empty($data['b_weight'])){$data['b_weight'] = 0;}
       if(empty($data['f_weight'])){$data['f_weight'] = 0;}
       if(empty($data['f_weight2'])){$data['f_weight2'] = 0;}
       if($data['b_weight'] > 0){
          $data['b_case'] = $data['b_weight'] * 100 / $data['weight']; // نسبة التصفية  
       }
       if($data['f_weight'] > 0 && $data['f_weight2'] > 0 ){
        $data['f_case'] = ($data['f_weight'] + $data['f_weight2']) * 100 /  $data['weight']; 
       }
    //   $get = adahyt::where('id',$data['code'])->first();
    //   $data['code'] = $get->code;
 $check = opt::where('code',$data['code'])->count();

 if($check > 0){
    // dd($data);
      $this->cedit_weight2($data); 
    $opt = opt::where('code',$data['code'])->first();
   $adahyt =adahyt::where('code',$data['code'])->first();
   $adahyt->update([ 
    'vendor' => $opt->w_vendor,
    'kilo' => htmlspecialchars($data['weight']),
    'kilo_s' => number_format((float)($data['weight'] / $adahyt->sak_c), 2, '.', ''),
    ]);
    //  $this->cedit_adhyat($data);
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("weight_edit"); 
 }else{
  
       session()->flash("sucess", "يجب اضافة الاضحية فى التغيل اولا");
            return redirect("weight_edit");
 }

    }
    ///
    
           protected function cedit_weight2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
      'w_weight' => htmlspecialchars($data['weight']),
      'b_weight' => htmlspecialchars($data['b_weight']),
      'f_weight' => htmlspecialchars($data['f_weight']),
      'f_weight2' => htmlspecialchars($data['f_weight2']),
      'b_case' => htmlspecialchars($data['b_case']),
       'f_case' => htmlspecialchars($data['f_case']),
     
   

 
        
      ]);
        
    }
    
      protected function create_weight(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 0;  
        $get = adahyt::where('code',$data['code'])->first();
      return opt::create([
        'code' => htmlspecialchars($data['code']),
        'adahy' => $get->adahy,
        'sak' => $get->sak,
        'gov'=> $get->gov,
        'days' => $get->days,
      'w_vendor' => htmlspecialchars($data['vendor']),
      'w_weight' => htmlspecialchars($data['weight']),
      'w_note' => htmlspecialchars($data['note']),
      'w_date' => $date,
      'w_agent' => Auth::user()->email,
      'wb_entry_date' => 0,
      'wb_exit_date' => 0,
      'wb_deff_date' => 0,
      'wb_note1' => 0,
      'wb_note' => 0,
      'wb_agent' =>Auth::user()->email,
      'fb_entry_date' => 0,
      'fb_exit_date' => 0,
      'fb_deff_date' => 0,
      'fb_note1' => 0,
      'fb_note' => 0,
      'fb_agent' => 0,
      'b_room' => 0,
      'b_follower' => 0,
      'b_butcher' => 0,
      'b_entry_date' => 0,
      'b_case' => 0,
      'b_weight' => 0,
      'b_aduit' => 0,
      'b_note' => 0,
      'b_exit_date' => 0,
      'b_deff_date' => 0,
      'b_date' => 0,
      'b_agent' => 0,
      's_room' => 0,
      's_follower' => 0,
      's_entry_date' => 0,
      's_weight' => 0,
      's_weight2' => 0,
      's_note' => 0,
      's_exit_date' => 0,
      's_deff_date' => 0,
      's_date' => 0,
      's_agent' => 0,
      'd_room' => 0,
      'd_follower' => 0,
      'd_teacher' => 0,
      'd_entry_date' => 0,
      'd_aduit' => 0,
      'd_note' => 0,
      'd_exit_date' => 0,
      'd_deff_date' => 0,
      'd_date' => 0,
      'd_agent' => 0,
      'f_room' => 0,
      'f_follower' => 0,
      'f_entry_date' => 0,
      'f_weight' => 0,
      'f_weight2' => 0,
      'f_note' => 0,
      'f_exit_date' => 0,
      'f_deff_date' => 0 ,
      'f_case' => 0,
      'f_date' => 0,
      'f_agent' => 0,
      'r_room' => 0,
      'r_follower' => 0,
      'r_entry_date' => 0,
      'r_note' => 0,
      'r_acc' => 0,
      'r_exit_date' => 0,
      'r_deff_date' => 0,
      'r_type' => 0,
      'r_date' => 0,
      'r_agent' => 0,
      'deff_date' => 0,
      'type' => 1,


      
        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    
         protected function cedit_weight(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
       'gov'=> $get->gov,
      'w_vendor' => htmlspecialchars($data['vendor']),
      'w_weight' => htmlspecialchars($data['weight']),
      'w_note' => htmlspecialchars($data['note']),
      'w_agent' => Auth::user()->email,

 
        
      ]);
        
    }
    
    
             protected function cedit_adhyat(array $data)
    {
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get = adahyt::where('code',$data['code'])->first();
        return adahyt::where('code',$data['code'])->update([
        
      'vendor' => htmlspecialchars($data['vendor']),
      'kilo' => htmlspecialchars($data['weight']),
      'kilo_s' => number_format((float)($data['weight'] / $get->sak_c), 2, '.', ''),
     
      ]);
        
    }
   
   
   
   /////////////////////////////////////////////////////////////butcher step//////////////////////////////////////////////
   
          //////////////////////////////////add weight/////////////////////////////////////////////////////////////
       
       
                        public function add_fb(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'fb_entry_date' => 'required'
       
           
            
            
          
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       if(empty($data['fb_note'])){$data['fb_note'] = 0;}


if(empty($data['fb_exit_date'])){$data['fb_exit_date'] = date('H:i');
    $to_time = strtotime($data['fb_exit_date']);
$from_time = strtotime($data['fb_entry_date']);
$data['fb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
    
}else{
$to_time = strtotime($data['fb_exit_date']);
$from_time = strtotime($data['fb_entry_date']);
$data['fb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cedit_opt_fb($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("f_b"); 


    }
    
                            public function add_fb2(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'fb_exit_date' => 'required'
       
           
            
            
          
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
         $fb_entry_date = opt::where('code',$data['code'])->first()->fb_entry_date;
       if(empty($data['fb_note'])){$data['fb_note'] = 0;}



    $to_time = strtotime($data['fb_exit_date']);
$from_time = strtotime($fb_entry_date);
$data['fb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
    

      $this->cedit_opt_fb2($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("f_b"); 


    }
               protected function cedit_opt_fb(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 2;
     
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'fb_entry_date' => htmlspecialchars($data['fb_entry_date']),

      'fb_agent' => Auth::user()->email,

 
        
      ]);
        
    }
   
   
   
              protected function cedit_opt_fb2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 5;
     
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        

'fb_note1' => htmlspecialchars($data['fb_note1']),
      'fb_note' => htmlspecialchars($data['fb_note']),
      'fb_exit_date' => htmlspecialchars($data['fb_exit_date']),
      'fb_deff_date' => htmlspecialchars($data['fb_deff_date']),
  
     'type' => $type,
      'fb_agent' => Auth::user()->email,

 
        
      ]);
        
    }
   
          
          
          
                 public function add_wb(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'wb_entry_date' => 'required'
      
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       if(empty($data['wb_note'])){$data['wb_note'] = 0;}


if(empty($data['wb_exit_date'])){$data['wb_exit_date'] = date('H:i');
    $to_time = strtotime($data['wb_exit_date']);
$from_time = strtotime($data['wb_entry_date']);
$data['wb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
    
}else{
$to_time = strtotime($data['wb_exit_date']);
$from_time = strtotime($data['wb_entry_date']);
$data['wb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cedit_opt_wb($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("w_b"); 


    }
    
    
              
                 public function add_wb_ex(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'wb_exit_date' => 'required'

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
       $data = $request->all();
       $wb_entry_date = opt::where('code',$data['code'])->first()->wb_entry_date;
       if(empty($data['wb_note'])){$data['wb_note'] = 0;}
$to_time = strtotime($data['wb_exit_date']);
$from_time = strtotime($wb_entry_date);
$data['wb_deff_date'] = round(abs($to_time - $from_time) / 60,2);
    
    $this->cedit_opt_wb_ex($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("w_b"); 


    }
    
    
             protected function cedit_opt_wb(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;
     
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'wb_entry_date' => htmlspecialchars($data['wb_entry_date']),
'wb_note1' => 0,
      'wb_note' => htmlspecialchars($data['wb_note']),

      'wb_agent' => Auth::user()->email,

 
        
      ]);
        
    }
    
    
                protected function cedit_opt_wb_ex(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;
     
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'wb_exit_date' => htmlspecialchars($data['wb_exit_date']),
      'wb_deff_date' => htmlspecialchars($data['wb_deff_date']),
  
     'type' => $type,
      'wb_agent' => Auth::user()->email,

 
        
      ]);
        
    }
          

       public function add_butcher_s(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'b_entry_date' => 'required',
            'b_room' => 'required',
            'b_follower' => 'required',
            'b_butcher' => 'required',
            
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       if(empty($data['b_case'])){$data['b_case'] = 0;}
if(empty($data['b_weight'])){$data['b_weight'] = 0;}
if(empty($data['b_aduit'])){$data['b_aduit'] = 0;}
if(empty($data['b_note'])){$data['b_note'] = 0;}
if(empty($data['b_exit_date'])){$data['b_exit_date'] = 0;$data['b_deff_date'] = 0;}else{
$to_time = strtotime($data['b_exit_date']);
$from_time = strtotime($data['b_entry_date']);
$data['b_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cedit_opt_b($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher_s"); 


    }
    
    
    
           public function add_butcher_s2(Request $request)
    {
            $request->validate([
            'code' => 'required',
            
            'b_weight' => 'required|numeric|min:0.01',
       
            
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       $b_entry_datee = opt::where('code',$data['code'])->first()->b_entry_date;
       $w_weight = opt::where('code',$data['code'])->first()->w_weight;
      $data['b_case'] = $data['b_weight'] * 100 / $w_weight; // نسبة التصفية
if(empty($data['b_weight'])){$data['b_weight'] = 0;}
if(empty($data['b_aduit'])){$data['b_aduit'] = 0;}
if(empty($data['b_note'])){$data['b_note'] = 0;}
if(empty($data['b_exit_date'])){$data['b_exit_date'] = 0;$data['b_deff_date'] = 0;}else{
$to_time = strtotime($data['b_exit_date']);
$from_time = strtotime($b_entry_datee);
$data['b_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cedit_opt_b2($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("butcher_s"); 


    }
   
   
   
               protected function cedit_opt_b(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $old_type = opt::where('code',$data['code'])->first()->type;
       if($data['b_exit_date'] == 0){$type = $old_type;}else{$type = 901;}
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'b_entry_date' => htmlspecialchars($data['b_entry_date']),
      'b_room' => htmlspecialchars($data['b_room']),
      'b_follower' => htmlspecialchars($data['b_follower']),
      'b_butcher' => htmlspecialchars($data['b_butcher']),
    
     'b_date' => $date,
   
      'b_agent' => Auth::user()->email,

 
        
      ]);
        
    }
    
    
                  protected function cedit_opt_b2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
          $old_type = opt::where('code',$data['code'])->first()->type;
       if($data['b_exit_date'] == 0){$type = $old_type;}else{$type = 901;}
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
      'b_case' => htmlspecialchars($data['b_case']),
      'b_weight' => htmlspecialchars($data['b_weight']),
      'b_aduit' => htmlspecialchars($data['b_aduit']),
      'b_note' => htmlspecialchars($data['b_note']),
      'b_exit_date' => htmlspecialchars($data['b_exit_date']),
      'b_deff_date' => htmlspecialchars($data['b_deff_date']),
     'b_date' => $date,
     'type' => $type,
      'b_agent' => Auth::user()->email,

 
        
      ]);
        
    }
   
   

   
   
   

   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   
     /////////////////////////////////////////////////////////////accessories step//////////////////////////////////////////////
   
          //////////////////////////////////add accessories/////////////////////////////////////////////////////////////

       public function add_accessories(Request $request)
    {
            $request->validate([
            'code' => 'required',
            's_entry_date' => 'required',
            's_room' => 'required',
            's_follower' => 'required',
      
          
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
if(empty($data['s_weight'])){$data['s_weight'] = 0;}
if(empty($data['s_weight2'])){$data['s_weight2'] = 0;}

if(empty($data['s_note'])){$data['s_note'] = 0;}
if(empty($data['s_exit_date'])){$data['s_exit_date'] = 0;$data['s_deff_date'] = 0;}else{
$to_time = strtotime($data['s_exit_date']);
$from_time = strtotime($data['s_entry_date']);
$data['s_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cedit_opt_s($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("accessories"); 


    }
   
   
   
            protected function cedit_opt_s(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      's_entry_date' => htmlspecialchars($data['s_entry_date']),
      's_room' => htmlspecialchars($data['s_room']),
      's_follower' => htmlspecialchars($data['s_follower']),
      's_weight' => htmlspecialchars($data['s_weight']),
      's_weight2' => htmlspecialchars($data['s_weight2']),
    
      's_note' => htmlspecialchars($data['s_note']),
      's_exit_date' => htmlspecialchars($data['s_exit_date']),
      's_deff_date' => htmlspecialchars($data['s_deff_date']),
     's_date' => $date,
    
      's_agent' => Auth::user()->email,

 
        
      ]);
        
    }
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
        /////////////////////////////////////////////////////////////cleanup step//////////////////////////////////////////////
   
          //////////////////////////////////add cleanup/////////////////////////////////////////////////////////////

       public function add_cleanup(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'd_entry_date' => 'required',
            'd_room' => 'required',
            'd_follower' => 'required',
            'd_teacher' => 'required',
      
          
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
if(empty($data['d_aduit'])){$data['d_aduit'] = 0;}
if(empty($data['d_note'])){$data['d_note'] = 0;}


if(empty($data['d_exit_date'])){$data['d_exit_date'] = 0;$data['d_deff_date'] = 0;}else{
$to_time = strtotime($data['d_exit_date']);
$from_time = strtotime($data['d_entry_date']);
$data['d_deff_date'] = round(abs($to_time - $from_time) / 60,2);
}
      $this->cledit_opt_s($data); 
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("cleanup"); 


    }
   
   
   
            protected function cledit_opt_s(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        $type = 1;  
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'd_entry_date' => htmlspecialchars($data['d_entry_date']),
      'd_room' => htmlspecialchars($data['d_room']),
      'd_follower' => htmlspecialchars($data['d_follower']),
      'd_teacher' => htmlspecialchars($data['d_teacher']),
      'd_aduit' => htmlspecialchars($data['d_aduit']),
    
      'd_note' => htmlspecialchars($data['d_note']),
      'd_exit_date' => htmlspecialchars($data['d_exit_date']),
      'd_deff_date' => htmlspecialchars($data['d_deff_date']),
     'd_date' => $date,
     
      'd_agent' => Auth::user()->email,

 
        
      ]);
        
    }
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   
       /////////////////////////////////////////////////////////////pkg step//////////////////////////////////////////////
   
          //////////////////////////////////add pkg/////////////////////////////////////////////////////////////

       public function add_pkg(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'f_entry_date' => 'required',
            'f_room' => 'required',
            'f_follower' => 'required',
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
if(empty($data['f_weight'])){$data['f_weight'] = 0;}
if(empty($data['f_weight2'])){$data['f_weight2'] = 0;}
if(empty($data['f_note'])){$data['f_note'] = 0;}
 $data['f_case'] = 0;
$get_opt = opt::where('code',$data['code'])->first();

if(empty($data['f_exit_date'])){$data['f_exit_date'] = 0;$data['f_deff_date'] = 0;$data['deff_date'] = 0;}else{
   if($get_opt->f_weight == 0 && $data['f_weight'] == 0){
         session()->flash("fail", "يجب ادخال وزن اللحمة بعد التشفية و وزن الكبدة");
            return redirect("pkg");  
            die();
       
   } 

      if($get_opt->f_weight2 == 0 && $data['f_weight2'] == 0){
         session()->flash("fail", "يجب ادخال وزن اللحمة بعد التشفية و وزن الكبدة");
            return redirect("pkg");  
            die();
       
   } 
   if($data['f_weight'] != 0){$f_weight = $data['f_weight'];}else{$f_weight = $get_opt->f_weight;}
if($data['f_weight2'] != 0){$f_weight2 = $data['f_weight2'];}else{$f_weight2 = $get_opt->f_weight2;}
 $data['f_case'] = ($f_weight + $f_weight2) * 100 /  $get_opt->w_weight; 
$to_time = strtotime($data['f_exit_date']);
$from_time = strtotime($data['f_entry_date']);
$from_time2 = strtotime($get_opt->s_entry_date);
$data['f_deff_date'] = round(abs($to_time - $from_time) / 60,2);
$data['deff_date'] = round(abs($to_time - $from_time2) / 60,2);
}
      $this->cfedit_opt_s($data); 
  $get_optn = opt::where('code',$data['code'])->first();
  if($get_optn->f_weight2 > 0 && $get_optn->f_weight > 0){
      $data['f_case'] = ((float)$get_optn->f_weight + (float)$get_optn->f_weight2) * 100 /  (float)$get_optn->w_weight; 
      $this->cfedit_opt_s2($data); 
  }
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("pkg"); 


    }
   
   
   
            protected function cfedit_opt_s(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
       if(empty($data['f_exit_date'])){$type = 5;}else{$type = 6;}
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'f_entry_date' => htmlspecialchars($data['f_entry_date']),
      'f_room' => htmlspecialchars($data['f_room']),
      'f_follower' => htmlspecialchars($data['f_follower']),
      'f_weight' => htmlspecialchars($data['f_weight']),
      'f_weight2' => htmlspecialchars($data['f_weight2']),
'f_case' => htmlspecialchars($data['f_case']),
    
      'f_note' => htmlspecialchars($data['f_note']),
      'f_exit_date' => htmlspecialchars($data['f_exit_date']),
      'f_deff_date' => htmlspecialchars($data['f_deff_date']),
      'deff_date' => htmlspecialchars($data['deff_date']),
     'f_date' => $date,
     'type' => $type,
      'f_agent' => Auth::user()->email,

 
        
      ]);
        
    }
    
    
                protected function cfedit_opt_s2(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
       if(empty($data['f_exit_date'])){$type = 5;}else{$type = 6;}
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
    
'f_case' => htmlspecialchars($data['f_case']),
    
     

 
        
      ]);
        
    }
    
    
    
    
    
           /////////////////////////////////////////////////////////////rec step//////////////////////////////////////////////
   
          //////////////////////////////////add rec/////////////////////////////////////////////////////////////

       public function add_rec(Request $request)
    {
            $request->validate([
            'code' => 'required',
            'r_entry_date' => 'required',
            'r_room' => 'required',
            'r_follower' => 'required',
            
      
          
        
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();


$get_opt = opt::where('code',$data['code'])->first();


      $this->credit_opt_s($data); 
      
      $this->credit_opt_r($data);
  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("rec"); 


    }
   
 
 
             protected function credit_opt_r(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('code',$data['code'])->update(['retype' => 1,]);
        
    }
 
   
   
            protected function credit_opt_s(array $data)
    {  date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
     
        $get = adahyt::where('code',$data['code'])->first();
        return opt::where('code',$data['code'])->update([
        
      'r_entry_date' => htmlspecialchars($data['r_entry_date']),
      'r_room' => htmlspecialchars($data['r_room']),
      'r_follower' => htmlspecialchars($data['r_follower']),
      'r_acc' => 0,

    
   
     'r_date' => $date,
     'type' => 7,
      'r_agent' => Auth::user()->email,

 
        
      ]);
        
    }
    
    
    
    /////////////////////////////////////////////rec action/////////////////////////////////////////////////////
              //////////////////////////////////add rec/////////////////////////////////////////////////////////////


       public function edit_R(Request $request)
    {
            $request->validate([
            'id' => 'required',
            'type' => 'required',
    

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       

 $this->edits_R($data);  
 


  
       session()->flash("sucess", "تم الإزالة بنجاح");
           // return redirect("rec_all"); 
  return redirect()->back();

    }
    
            protected function edits_R(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return callcenter::where('re_id',$data['id'])->where('tcall',$data['type'])->update(['tcall' => 1]);
        
    }


       public function edit_res_action(Request $request)
    {
      //mobile3
            $request->validate([
            'id' => 'required',
            'mob' => 'required',
            'mob2' => 'required',
            'add' => 'required',
            'mobile3' => 'nullable',

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       

 $this->edit_res_d($data);  
 


  
       session()->flash("sucess", "تم الإضافة بنجاح");
           // return redirect("rec_all"); 
  return redirect()->back();

    }
    

        protected function edit_res_d(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['mobile' => $data['mob'] , 'mobile2' => $data['mob2'] ,'mobile3' => $data['mobile3'] ??0, 'address' => $data['add']]);
        
    }


       public function rec_action(Request $request)
    {
            $request->validate([
            'id' => 'required',

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
 
 if($data['action'] == 6){ // التسليم مع التبرع 
 $this->credit_opt_dd($data);    
  $this->c_freez($data); 
 
    
}
       
if($data['action'] == 5){ // تم التسليم
 $this->credit_opt_ds($data);  
 
    
}

if($data['action'] == 2){ // تحويل الثلاجة 
 $this->credit_opt_d($data);    
  $this->c_freez($data);  
}



if($data['action'] == 3){ // توصيل  
 $this->credit_opt_d($data);    
  $this->c_trans($data);  
}



if($data['action'] == 4){  //////// تبرع  
$code = DB::table('reservation')->where('id',$data['id'])->first()->code;
$g = DB::table('opt')->where('code',$code)->first();
 $adahyt_sak = DB::table('adahyt')->where('code',$code)->first()->sak_c;
 $data['qty'] = ($g->f_weight + $g->f_weight2) / $adahyt_sak;
 $this->credit_opt_dd($data);    
  $this->c_freez($data);  
}

  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("rec_all"); 


    }
    
   
        protected function credit_opt_dd(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['retype' => $data['action'],'qty' => $data['qty']]);
        
    }
    
        protected function credit_opt_d(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['retype' => $data['action']]);
        
    }
    
            protected function credit_opt_ds(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['retype' => $data['action'],'rectype' => $data['note']]);
        
    }
    
    
    protected function c_freez(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
            return freez::create([
        're_id' => htmlspecialchars($data['id']),
        'code' => $get->code,
        'type' => htmlspecialchars($data['action']),
        'freez' => htmlspecialchars($data['freezer']),
        'follower' => htmlspecialchars($data['follower']),
        'rec' => htmlspecialchars($data['rec']),
        't_name' => 0,
        't_dis' => 0,
        't_date' => 0,
        't_agent' => 0,
        'cases' => 0,

        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    
        protected function c_trans(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
            return trans::create([
        're_id' => htmlspecialchars($data['id']),
        'code' => $get->code,
        'type' => htmlspecialchars($data['action']),
        'rip' => htmlspecialchars($data['rip']),
        'follower' => htmlspecialchars($data['follower']),
       

        'agent' => Auth::user()->email,
 
        
      ]);
        
    }
    
    
    
    
                  //////////////////////////////////freez/////////////////////////////////////////////////////////////

       public function freez_action(Request $request)
    {
            $request->validate([
            'id' => 'required',

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       
if($data['action'] == 5){ // تم التسليم
 $this->credit_opt_ds($data);    
    
}





if($data['action'] == 3){ // توصيل  
 $this->credit_opt_d($data);    
  $this->c_trans($data);  
}



if($data['action'] == 4){ // تبرع  
$data['t_dis'] = 0; $data['t_name'] = 0;
$code = DB::table('reservation')->where('id',$data['id'])->first()->code;
$g = DB::table('opt')->where('code',$code)->first();
 $adahyt_sak = DB::table('adahyt')->where('code',$code)->first()->sak_c;
 $data['qty'] = ($g->f_weight + $g->f_weight2) / $adahyt_sak;
 $this->credit_opt_d_t2($data);    
  $this->c_freez_t($data);  
}

if($data['action'] == 6){ //// تسليم وتبرع  
$data['t_dis'] = 0; $data['t_name'] = 0;
 $this->credit_opt_d_t2($data);    
  $this->c_freez_t($data);  
}

  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("freez"); 


    }
    
    
   protected function credit_opt_d_t(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['retype' => 5,'qty' => $data['qty']]);
        
    }
    
       protected function credit_opt_d_t2(array $data)
    {
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
        return reservation::where('id',$data['id'])->update(['retype' => $data['action'],'qty' => $data['qty']]);
        
    }
    
    
    protected function c_freez_t(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
            return freez::where('re_id',$data['id'])->update([

        't_name' => htmlspecialchars($data['t_name']),
        't_dis' => htmlspecialchars($data['t_dis']),
        't_date' => $date,
        't_agent' => Auth::user()->email,
      
 
        
      ]);
        
    }
    
    
      
                  //////////////////////////////////ship/////////////////////////////////////////////////////////////

       public function ship_action(Request $request)
    {
            $request->validate([
            'id' => 'required',

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       $data['qty'] = $request->mnd;
if($data['action'] == 5){ // تم التسليم
 $this->credit_opt_dd($data);    
    
}






  
       session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("ship"); 


    }
    

    
 
                    //////////////////////////////////callcenter/////////////////////////////////////////////////////////////

       public function callcenter_action(Request $request)
    {
            $request->validate([
            'id' => 'required',
            'action' => 'required',
            'tcall' => 'required',
            'c_call' => 'required'
        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       $parts = $request->get('parts');
      if (!empty($parts) && is_array($parts)) {
        foreach ($parts as $part) {
          DB::table('adahy_acc')->insert([
            'r_id' => $data['rec'],
            'name' => $part,
            'code_adahy' => $data['adahyId'],
          ]);
        }
      }
 
if(empty($data['dis'])){$data['dis'] = 0;}
 $this->c_callcenter($data);    

       session()->flash("sucess", "تم الإضافة بنجاح");
            //return redirect("callcenter"); 
             return redirect()->back();
        


    }  
  
  
  
      protected function c_callcenter(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
             $get->description = $data['description'];
             $get->save();
             if(isset($data['acc'])){
                          return callcenter::create([

        're_id' => htmlspecialchars($data['id']),
        'code' => $get->code,
        'acc' => json_encode($data['acc'],JSON_UNESCAPED_UNICODE),
        'view' => $data['c_view'],
        'type' => htmlspecialchars($data['action']),
        'dis' => htmlspecialchars($data['dis']),
        'tcall' => htmlspecialchars($data['tcall']),
        'c_call' => htmlspecialchars($data['c_call']),
        'agent' => Auth::user()->email,
      
 
        
      ]);   
             }else{
            return callcenter::create([

        're_id' => htmlspecialchars($data['id']),
        'code' => $get->code,
       
        'view' => $data['c_view'],
        'type' => htmlspecialchars($data['action']),
        'dis' => htmlspecialchars($data['dis']),
        'tcall' => htmlspecialchars($data['tcall']),
        'c_call' => htmlspecialchars($data['c_call']),
        'agent' => Auth::user()->email,
      
 
        
      ]);
             }
        
    }
    
    
    
                        //////////////////////////////////reception/////////////////////////////////////////////////////////////

       public function reception_action(Request $request)
    {
            $request->validate([
            'id' => 'required',
            'tcall' => 'required',
          
           
            

        ] 
      );
        $rand = rand(1111,9999);
        $rands = rand(100001,999999);
        $now = time();
        $err = 0;
        $error = "";
         
       $data = $request->all();
       
if(empty($data['dis'])){$data['dis'] = 0;}
if($data['tcall'] == "60"){
   $this->c_reception_out($data); 
   $this->c_reception($data);
}else{
 $this->c_reception($data);    
}
       session()->flash("sucess", "تم الإضافة بنجاح");
           // return redirect("reception"); 

 return redirect()->back();
    }  
  
  
  
      protected function c_reception(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
             $get->description = $data['description'];
             $get->save();

                 return callcenter::create([

        're_id' => htmlspecialchars($data['id']),
        'code' => $get->code,
        'type' => 1,
        'dis' => htmlspecialchars($data['dis']),
        'tcall' => htmlspecialchars($data['tcall']),
        'c_call' => 0,
        'agent' => Auth::user()->email,
      
 
        
      ]);
 
        
    }
    
    
    
         protected function c_reception_out(array $data)
    { 
         date_default_timezone_set("Africa/Kampala");  
        $date=date('Y-m-d H:i');
        $time=date('H:i:s');
             $get = reservation::where('id',$data['id'])->first();
          

                 return callcenter::where('re_id',$data['id'])->where('tcall',6)->update([

      
        'tcall' => 0,
    
      
 
        
      ]);
 
        
    }
  
  
   //////////////////////////review///////////////////////////////////////////////////////////////////////////////////////////
         public function res_rev(Request $request)
    {
              $request->validate([
            'r_id' => 'required',
       
        ] 
      );
        
       $data = $request->all();
      $this->review($data);
          session()->flash("sucess", "تم الإضافة بنجاح");
            return redirect("sak_all"); 
    }
   
   
              protected function review(array $data)
    {
        return reservation::where('id',$data['r_id'])->update([
            'type' => 2,
            ]);
        
    }
    
    
      
   //////////////////////////agreement///////////////////////////////////////////////////////////////////////////////////////////
         public function agreement(Request $request)
    {
              $request->validate([
            'id' => 'required',
       
        ] 
      );
        
       $data = $request->all();
      $this->agreement_ok($data);
          session()->flash("sucess", "تم الإضافة بنجاح");
             return redirect("/treasury_sak/".$data['id']);
    }
   
   
              protected function agreement_ok(array $data)
    {
        return agreement::create([
            'r_id' => htmlspecialchars($data['id']),
            'type' => 1,
            'agent' => Auth::user()->email,
            
            ]);
        
    }
    
    
       //////////////////////////agreementn///////////////////////////////////////////////////////////////////////////////////////////
         public function agreementn(Request $request)
    {
              $request->validate([
            'id' => 'required',
       
        ] 
      );
        
       $data = $request->all();
      $this->agreement_no($data);
          session()->flash("sucess", "تم الإضافة بنجاح");
             return redirect("/treasury_sak/".$data['id']);
    }
   
   
              protected function agreement_no(array $data)
    {
        return agreement::where('r_id',$data['id'])->delete();
     
        
    }
   
   /////////////////////////////////////////////////////////////////////////////////////////////////////////
             public function get_excel_callcenter(Request $request)
 {
date_default_timezone_set("Africa/Cairo");
$date=date('Y-m-d');
$time=date('H:i:s');
         

        
   function getcase1($x)
  {
      if($x == 1){return "مرحلة التسليم";}
      if($x == 2){return "الثلاجة";}
      if($x == 3){return "االتوصيل";}
      if($x == 4){return "تبرع الثلاجة";}
      if($x == 5){return "تم التسليم";}
  }
  
  function ucase($x){
      return DB::connection('mysql2')->table('reservation')->where('mobile',$x)->count();
  }
    function getcase2($x)
  {
      $c1 = DB::table('opt')->where('code',$x)->count();
      if($c1 > 0){
          $ch = DB::table('opt')->where('code',$x)->where('b_room',0)->count();
          if($ch > 0)
          {
            return "مرحلة الوزن";   
          }else{
        $c =  DB::table('opt')->where('code',$x)->whereIN('type',[1,2,3,4])->where('b_entry_date','!=',0)->count();
        if($c > 0){
            return "مرحلة الجزارة";
        }else{
            $c2 = DB::table('opt')->where('code',$x)->whereIN('type',[5,6])->where('f_exit_date','=',0)->count();
            if($c2 > 0)
            {
                return "مرحلة التعبئة";
            }else{
                return "مرحلة التسليم";
            }
        }
          }
      }else{
       return "جارى النقل";   
      }
   
  }
 function get_tcall($x,$y)
  {
      $c = DB::table('callcenter')->where('re_id',$x)->count();
      if($c > 0){
          if($y == 7){return @DB::table('callcenter')->where('re_id',$x)->whereRaw('LENGTH(dis) > 3')->orderBy('id','desc')->first()->dis;}
          elseif($y == 8){return DB::table('callcenter')->where('re_id',$x)->orderBy('id','desc')->first()->c_call;}
          elseif($y == 4){
return @DB::table('callcenter')->where('re_id',$g->id)->whereRaw('LENGTH(view) > 1')->orderBy('id','desc')->first()->view;
             }elseif($y == 30){
                return @DB::table('callcenter')->where('re_id',$g->id)->whereRaw('LENGTH(acc) > 1')->orderBy('id','desc')->first()->acc;
          }else{
          $c2 = DB::table('callcenter')->where('re_id',$x)->where('tcall',$y)->count(); 
          if($c2 > 0){
              return "نعم";
          }else{
              return "لا شئ";
          }
          }
      }else{
          return "-";
      }
  }
  
  function get_view($x){
          $gviewc = DB::table('callcenter')->where('re_id',$x)->whereNotNull('view')->count();
                                                if($gviewc > 0){
                                                    return @DB::table('callcenter')->where('re_id',$x)->whereNotNull('view')->orderBy('id','desc')->first()->view;
                                                }
      
  }
  
function get_acc($x){
      return @DB::table('callcenter')->where('re_id',$x)->whereNotNull('acc')->orderBy('id','desc')->first()->acc;
  }
    global $getcase; global $get_tcall1; global $get_tcall2; global $get_tcall3; global $get_tcall4;  global $get_tcall5; global $get_tcall6; global $get_tcall7; global $get_tcall8;  global $get_tcall71;  
     $table_name = 'reservation';
      echo ''; 
         echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
        <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>'; 
echo "<table id = 'mytable' style='width : 0px; height:0px; visibility: collapse;'>
<tr>
<td>
رقم الصك
</td>

<td>
رقم الأضحية
</td>
<td>
النوع 
</td>
<td>
المحافظة
</td>
<td>
الصك 
</td>
<td>
يوم الذبح 
</td>

<td>
الحالة
</td>

<td>
العميل
</td>

<td>
موبيل 
</td>

<td>
موبيل2 
</td>

<td>
ملاحظات 
</td>
 
 <td>
أحدث ملاحظة 
</td>
<td>
حالة المكالمة 
</td>
 <td>
 حالة المضحى
 </td>
 <td>
 حضور المضحى
 </td>

<td>
توصيل  
</td>

<td>
تبرع
</td>

<td>
مشاهدة الذبح
</td>

<td>
ايداع الثلاجة
</td>
<td>الملحق المحجوز </td>

</tr>
";

DB::table($table_name)

  ->orderBy('id', 'ASC')->chunk(100, function ($items)use($get_tcall1 , $get_tcall2 , $get_tcall3 ,$get_tcall4,$get_tcall5, $get_tcall6,$get_tcall7,$get_tcall8, $getcase,$get_tcall71) {
      $tables = "";
  	foreach($items as $item){
        $acc = "";
        $parts = DB::table('adahy_acc')->where('r_id',$item->rec)->select('name')->distinct()->get();
        foreach ($parts as $part){
        $acc .= $part->name." + ";   
        }
  	   if($item->retype > 0){ 
  	     $getcase =  getcase1($item->retype);
  	   }else{
  	    $getcase =  getcase2($item->code);   
  	   } 
  $get_tcall1 = get_tcall($item->id,6);
  $get_tcall2 = get_tcall($item->id,2);
  $get_tcall3 = get_tcall($item->id,3);
  $get_tcall4 = get_tcall($item->id,8);
  $get_tcall5 = get_tcall($item->id,5);
  // $get_tcall6 = get_view($item->id);
  $get_tcall6 = $item->view;
  $get_tcall7 = get_tcall($item->id,7);
  // $get_tcall8 = get_acc($item->id);
  $get_tcall8 = $acc;
    $get_tcall71 = ucase($item->mobile);
  	    $tables .= "<tr>
  	    <td>".$item->ad_id."</td>
  	    <td>".$item->code."</td>
  	  <td>".$item->adahy."</td>  
      <td>".$item->gov_type."</td>
  	  <td>".$item->sak."</td>  
  	  <td>".$item->days."</td> 
  	   <td>".$getcase."</td> 
  	  <td>".$item->name."</td>  
  	  <td>".$item->mobile."</td>  
  	  <td>".$item->mobile2."</td>  
  	  <td>".$item->description."</td> 
  	  
  	 <td>".$get_tcall7."</td> 
  
  	 
  	   <td>".$get_tcall4."</td> 
  	 <td>".$get_tcall71."</td>
   <td>".$get_tcall1."</td> 
   <td>".$get_tcall2."</td> 
   <td>".$get_tcall3."</td> 
   <td>".$get_tcall6."</td> 
   <td>".$get_tcall5."</td> 
     <td>".$get_tcall8."</td> 
 
  	  </tr>";
  	}
      
    echo $tables;  
  });

     echo '
   <script>
$( document ).ready(function(){
   

    
        var workbook = XLSX.utils.book_new();
        
      
      
        var worksheet_data  = document.getElementById("mytable");
        var worksheet = XLSX.utils.table_to_sheet(worksheet_data);
        
        workbook.SheetNames.push("Test");
        workbook.Sheets["Test"] = worksheet;
      
         exportExcelFile(workbook);
      
     
  
})

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "reservation.xls");
}   
 

    </script>
   
   
   ';

    }
    
    
       /////////////////////////////////////////////////////////////////////////////////////////////////////////
             public function get_excel_sak(Request $request)
 {
date_default_timezone_set("Africa/Cairo");
$date=date('Y-m-d');
$time=date('H:i:s');
         

        
   function getcase1($x)
  {
      if($x == 1){return "مرحلة التسليم";}
      if($x == 2){return "الثلاجة";}
      if($x == 3){return "االتوصيل";}
      if($x == 4){return "تبرع الثلاجة";}
      if($x == 5){return "تم التسليم";}
  }
  
  
  
    function getcase2($x)
  {
      $c1 = DB::table('opt')->where('code',$x)->count();
      if($c1 > 0){
          $ch = DB::table('opt')->where('code',$x)->where('b_room',0)->count();
          if($ch > 0)
          {
            return "مرحلة الوزن";   
          }else{
        $c =  DB::table('opt')->where('code',$x)->whereIN('type',[1,2,3,4])->where('b_entry_date','!=',0)->count();
        if($c > 0){
            return "مرحلة الجزارة";
        }else{
            $c2 = DB::table('opt')->where('code',$x)->whereIN('type',[5,6])->where('f_exit_date','=',0)->count();
            if($c2 > 0)
            {
                return "مرحلة التعبئة";
            }else{
                return "مرحلة التسليم";
            }
        }
          }
      }else{
       return "جارى النقل";   
      }
   
  }
  function get_tcall($x,$y)
  {
      $c = DB::table('callcenter')->where('re_id',$x)->count();
      if($c > 0){
          $c2 = DB::table('callcenter')->where('re_id',$x)->where('tcall',$y)->count(); 
          if($c2 > 0){
              return "نعم";
          }else{
              return "لا شئ";
          }
      }else{
          return "-";
      }
  }
  
  function getprice($id){
        $get_info = DB::table('adahyt')->where('id',$id)->first();
  $adahy_type_info = DB::table('adahy_type')->where('name',$get_info->adahy)->first();
 return (float)$get_info->kilo_s * $adahy_type_info->price;
  }
  
    function getprice2($id){
        $get_info = DB::table('adahyt')->where('id',$id)->first();
  $sak_price2 = DB::table('sak')->where('name',$get_info->sak)->first()->price2;
 return (float)$sak_price2;
  }
  
    function getprice3($id){
 return (float) @DB::table('treasury_sak')->where('treasury_id',$id)->orderBy('id','desc')->first()->total;
  }
  

    global $getcase; global $getprice; global $getprice2; global $getprice3; global $getprice4;  global $gettype; 
     $table_name = 'reservation';
      echo ''; 
         echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
        <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>'; 
echo "<table id = 'mytable' style='width : 0px; height:0px; visibility: collapse;'>
<tr>

<td>
إيصال 
</td>

<td>
دفتر 
</td>

<td>
رقم الأضحية 
</td>

<td>
النوع 
</td>
<td>
المحافظة
<td>
<td>
الصك 
</td>
<td>
يوم الذبح 
</td>

<td>
الحالة
</td>

<td>
العميل
</td>

<td>
العنوان
</td>

<td>
موبيل 
</td>

<td>
موبيل2 
</td>

 <td>
 الملاحظات
 </td>

<td>
حساب الذبيحة   
</td>

<td>
مصروفات الذبح
</td>

<td>
مدفوعات العميل
</td>

<td>
االحساب النهائى
</td>
<td>
طريقة الحجز 
</td>
<td>
الموظف 
</td>

</tr>
";

DB::table($table_name)->where('emp','!=','website')

  ->orderBy('id', 'ASC')->chunk(100, function ($items)use($getprice , $getprice2 , $getprice3 ,$getprice4, $getcase,$gettype) {
      $tables = "";
  	foreach($items as $item){
  	   if($item->agent != "website"){
  	      $gettype = "system"; 
  	   }else{
  	    $gettype = $item->agent;   
  	   }
  	   if($item->retype > 0){ 
  	     $getcase =  getcase1($item->retype);
  	   }else{
  	    $getcase =  getcase2($item->code);   
  	   } 
  $getprice = getprice($item->ad_id);
  $getprice2 = getprice2($item->ad_id);
  $getprice3 = getprice3($item->id);
$getprice4 = $getprice + $getprice2 - $getprice3 ;

  	    $tables .= "<tr>
  	    <td>".$item->rec."</td>
  	    <td>".$item->def."</td>
  	    <td>".$item->code."</td>
  	  <td>".$item->adahy."</td>  
      <td>".$item->gov_type."</td>
  	  <td>".$item->sak."</td>  
  	  <td>".$item->days."</td> 
  	   <td>".$getcase."</td> 
  	  <td>".$item->name."</td>  
  	  <td>".$item->address."</td>  
  	  <td>".$item->mobile."</td>  
  	  <td>".$item->mobile2."</td>  
  	  <td>".$item->description."</td>  
   <td>".$getprice."</td> 
   <td>".$getprice2."</td> 
   <td>".$getprice3."</td> 
   <td>".number_format((float)$getprice4, 2, '.', '')."</td> 
 

  <td>".$gettype."</td>
   <td>".$item->emp."</td> 
  	  </tr>";
  	}
      
    echo $tables;  
  });

     echo '
   <script>
$( document ).ready(function(){
   

    
        var workbook = XLSX.utils.book_new();
        
      
      
        var worksheet_data  = document.getElementById("mytable");
        var worksheet = XLSX.utils.table_to_sheet(worksheet_data);
        
        workbook.SheetNames.push("Test");
        workbook.Sheets["Test"] = worksheet;
      
         exportExcelFile(workbook);
      
     
  
})

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "SAK.xls");
}   
 

    </script>
   
   
   ';

    }
    
    
    
           /////////////////////////////////////////////////////////////////////////////////////////////////////////
             public function get_excel_opt(Request $request)
 {
date_default_timezone_set("Africa/Cairo");
$date=date('Y-m-d');
$time=date('H:i:s');
         

        
   function getcase1($x)
  {
      if($x == 1){return "مرحلة التسليم";}
      if($x == 2){return "الثلاجة";}
      if($x == 3){return "االتوصيل";}
      if($x == 4){return "تبرع الثلاجة";}
      if($x == 5){return "تم التسليم";}
  }
  
  
  
    function getcase2($x)
  {
      $c1 = DB::table('opt')->where('code',$x)->count();
      if($c1 > 0){
          $ch = DB::table('opt')->where('code',$x)->where('b_room',0)->count();
          if($ch > 0)
          {
            return "مرحلة الوزن";   
          }else{
        $c =  DB::table('opt')->where('code',$x)->whereIN('type',[1,2,3,4])->where('b_entry_date','!=',0)->count();
        if($c > 0){
            return "مرحلة الجزارة";
        }else{
            $c2 = DB::table('opt')->where('code',$x)->whereIN('type',[5,6])->where('f_exit_date','=',0)->count();
            if($c2 > 0)
            {
                return "مرحلة التعبئة";
            }else{
                return "مرحلة التسليم";
            }
        }
          }
      }else{
       return "جارى النقل";   
      }
   
  }
  function get_tcall($x,$y)
  {
      $c = DB::table('callcenter')->where('re_id',$x)->count();
      if($c > 0){
          $c2 = DB::table('callcenter')->where('re_id',$x)->where('tcall',$y)->count(); 
          if($c2 > 0){
              return "نعم";
          }else{
              return "لا شئ";
          }
      }else{
          return "-";
      }
  }
  
  function getprice($id){
        $get_info = DB::table('adahyt')->where('id',$id)->first();
  $adahy_type_info = DB::table('adahy_type')->where('name',$get_info->adahy)->first();
 return (float)$get_info->kilo_s * $adahy_type_info->price;
  }
  
    function getprice2($id){
        $get_info = DB::table('adahyt')->where('id',$id)->first();
  $sak_price2 = DB::table('sak')->where('name',$get_info->sak)->first()->price2;
 return (float)$sak_price2;
  }
  
    function getprice3($id){
 return (float) @DB::table('treasury_sak')->where('treasury_id',$id)->orderBy('id','desc')->first()->total;
  }
  

    global $getcase; global $getprice; global $getprice2; global $getprice3; global $getprice4;  
     $table_name = 'opt';
      echo ''; 
         echo '
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script type="text/javascript" src="//unpkg.com/xlsx/dist/shim.min.js"></script>
        <script type="text/javascript" src="//unpkg.com/xlsx/dist/xlsx.full.min.js"></script>'; 
echo "<table id = 'mytable' style='width : 0px; height:0px; visibility: collapse;'>
<tr>
<td>رقم الاضحية</td>
<td>نوع الاضحية</td>
<td>الصك</td>
<td>يوم الذبح</td>
<td>المورد</td>
<td>وزن الاضحية قائم</td>
<td>ملاحظات الوزن</td>
<td>تاريخ الوزن</td>
<td>موظف الوزن</td>

<td>تاريخ دخول ق الجزارة</td>
<td>وقت الخروج</td>
<td>الوقت المستغرق</td>
<td>ملاحظات </td>
<td>الموظف</td>

<td>رقم غرفة الجزارة</td>
<td>مشرف الجزارة</td>
<td>الجزار</td>
<td>تاريخ دخول الجزارة</td>

<td>تقييم الجزار</td>
<td>وقت الخروج</td>
<td>الوقت المستغرق</td>
<td>موظف الجزارة</td>



<td>تاريخ دخول التبريد</td>
<td>وقت الخروج</td>
<td>الوقت المستغرق</td>
<td>ملاحظات </td>
<td>الموظف</td>

<td>رقم غرفة الملحقات</td>
<td>مشرف الملحقات</td>
<td>تاريخ دخول الملحقات</td>
<td>وزن الدهن</td>
<td>وزن الكبدة-القلب-الكلاوى</td>
<td>ملاحظات </td>
<td>وقت الخروج</td>
<td>الوقت المستغرق</td>
<td>موظف الملحقات</td>

<td>غرفة تنظيف السقط</td>
<td>مشرف السقط</td>
<td>معلم التنظيف</td>
<td>تاريخ الدخول للتنظيف</td>
<td>تقييم معلم التنظيف</td>
<td>ملاحظات التنظيف</td>
<td>تاريخ الخروج من التنظيف</td>
<td>الوقت المستغرق تنظيف</td>
<td>موظف التنظيف</td>
<td>غرفة التعبئة</td>
<td>متابع التعبئة</td>
<td>تاريخ الدخول فى التعبئة</td>
<td>وزن اللحم مشفى</td>
<td>وزن الكبدة</td>
<td>ملاحظات التعبئة</td>
<td>وقت الخروج</td>
<td>الوقت المستغرق</td>
<td>موظف التعبئة</td>
<td>غرفة التسليم</td>
<td>مشرف التسليم</td>
<td>وقت دخول التسليم</td>


</tr>
";

DB::table($table_name)

  ->orderBy('id', 'ASC')->chunk(100, function ($items)use($getprice , $getprice2 , $getprice3 ,$getprice4, $getcase) {
      $tables = "";
  	foreach($items as $item){
  	   
  

  	    $tables .= "<tr>
  	    <td>".$item->code."</td>
  	    <td>".$item->adahy."</td>
  	    <td>".$item->sak."</td>
  	  <td>".$item->days."</td>  
  	  <td>".$item->w_vendor."</td>  
  	  <td>".$item->w_weight."</td> 
 
  	  <td>".$item->w_note."</td>  
  	  <td>".$item->w_date."</td>  
  	  <td>".$item->w_agent."</td> 
  	  
  
  	 <td>".$item->wb_entry_date."</td>
  	 <td>".$item->wb_exit_date."</td>
  	 <td>".$item->wb_deff_date."</td>
  	 <td>".$item->wb_note1."</td>
  	  <td>".$item->wb_agent."</td>
  	 
  	  <td>".$item->b_room."</td>  
  	   <td>".$item->b_follower."</td>
  	 <td>".$item->b_butcher."</td> 
  	 <td>".$item->b_entry_date."</td>
  	
  	 
  	 <td>".$item->b_aduit."</td>
  	
  	 <td>".$item->b_exit_date."</td>
  	 <td>".$item->b_deff_date."</td>
  	
  	 <td>".$item->b_agent."</td>
  	 
  	  <td>".$item->fb_entry_date."</td>
  	 <td>".$item->fb_exit_date."</td>
  	 <td>".$item->fb_deff_date."</td>
  	 <td>".$item->fb_note1."</td>
  	  <td>".$item->fb_agent."</td>
  	 
  	 <td>".$item->s_room."</td>
  	 <td>".$item->s_follower."</td>
  	 <td>".$item->s_entry_date."</td>
  	 <td>".$item->s_weight."</td>
  	 <td>".$item->s_weight2."</td>
  	 <td>".$item->s_note."</td>
  	 <td>".$item->s_exit_date."</td>
  	 <td>".$item->s_deff_date."</td>
  	
  	 <td>".$item->s_agent."</td>
  	 
  	 <td>".$item->d_room."</td>
  	 <td>".$item->d_follower."</td>
  	 <td>".$item->d_teacher."</td>
  	 <td>".$item->d_entry_date."</td>
  	 <td>".$item->d_aduit."</td>
  	 
  	 <td>".$item->d_note."</td>
  	 <td>".$item->d_exit_date."</td>
  	 <td>".$item->d_deff_date."</td>
  	
  	 <td>".$item->d_agent."</td>
  	 
  	 <td>".$item->f_room."</td>
  	 <td>".$item->f_follower."</td>
  	 <td>".$item->f_entry_date."</td>
  	 <td>".$item->f_weight."</td>
  	 <td>".$item->f_weight2."</td>
  	 <td>".$item->f_note."</td>
  	 <td>".$item->f_exit_date."</td>
  	 <td>".$item->f_deff_date."</td>
  	
  	 <td>".$item->f_agent."</td>
  	 
  	 <td>".$item->r_room."</td>
  	 <td>".$item->r_follower."</td>
  	 <td>".$item->r_entry_date."</td>
  	

  	  

 
 
  	  </tr>";
  	}
      
    echo $tables;  
  });

     echo '
   <script>
$( document ).ready(function(){
   

    
        var workbook = XLSX.utils.book_new();
        
      
      
        var worksheet_data  = document.getElementById("mytable");
        var worksheet = XLSX.utils.table_to_sheet(worksheet_data);
        
        workbook.SheetNames.push("Test");
        workbook.Sheets["Test"] = worksheet;
      
         exportExcelFile(workbook);
      
     
  
})

function exportExcelFile(workbook) {
    return XLSX.writeFile(workbook, "opt.xls");
}   
 

    </script>
   
   
   ';

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>