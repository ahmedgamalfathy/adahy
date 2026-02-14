<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users_c;
use App\Http\Middleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\adahy_type;
use App\Models\adahyt;
use App\Models\expense;
use App\Models\tr_expense;
use App\Models\income;
use App\Models\tr_income;
use App\Models\butcher;
use App\Models\tr_butcher;
use App\Models\vendor;
use App\Models\tr_vendor;
use App\Models\butcher2;
use App\Models\tr_butcher2;
use App\Models\follower;
use App\Models\tr_follower;
use App\Models\sak;
use App\Models\days;
use App\Models\times;
use App\Models\treasury_sak;
use App\Models\treasures;
use App\Models\treasury;
use App\Models\opt;
use App\Models\pages;
use App\Models\clients;
use App\Models\reservation;
use App\Models\reservation_del;
use App\Models\freez;
use App\Models\trans;
use App\Models\callcenter;
use App\Models\Supplier;
use \Illuminate\Http\Response;
use Illuminate\Validation\Rules\Password;
use Session;
use DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/suppliers', function () {
    $get = Supplier::all();
    $vendors = Vendor::all();
    $adahy_type = adahy_type::all();
    return view('suppliers',compact('get','vendors', 'adahy_type'));
})->middleware('auth','per1');
Route::get('/suppliers/{name}',function ($name){
   $get = Supplier::where('name',$name)->first();
   $totalDuse = DB::table('suppliers')->where('name',$name)->sum('total');
   $totalWeight = DB::table('suppliers')->where('name',$name)->sum('total_weight');

   $totalDuseCo = DB::table('suppliers')->where('name',$name)->where('type', 'بقرى')->sum('total');
   $totalWeightCo = DB::table('suppliers')->where('name',$name)->where('type', 'بقرى')->sum('total_weight');
   $totalCountCo = DB::table('suppliers')->where('name',$name)->where('type', 'بقرى')->sum('count');

   $totalDuseBuf = DB::table('suppliers')->where('name',$name)->where('type', 'جمسى')->sum('total');
   $totalWeightBuf = DB::table('suppliers')->where('name',$name)->where('type', 'جمسى')->sum('total_weight');
   $totalCountBuf = DB::table('suppliers')->where('name',$name)->where('type', 'جمسى')->sum('count');

   $totalDuseShe = DB::table('suppliers')->where('name',$name)->where('type', 'خراف')->sum('total');
   $totalWeightShe = DB::table('suppliers')->where('name',$name)->where('type', 'خراف')->sum('total_weight');
   $totalCountShe = DB::table('suppliers')->where('name',$name)->where('type', 'خراف')->sum('count');

   $totalDuseGo = DB::table('suppliers')->where('name',$name)->where('type', 'ماعز')->sum('total');
   $totalWeightGo = DB::table('suppliers')->where('name',$name)->where('type', 'ماعز')->sum('total_weight');
   $totalCountGo = DB::table('suppliers')->where('name',$name)->where('type', 'ماعز')->sum('count');

   return view('supplierRepo',compact('get','totalDuse','totalWeight','totalDuseCo','totalWeightCo','totalCountCo','totalDuseBuf','totalWeightBuf','totalCountBuf','totalDuseShe','totalWeightShe','totalCountShe','totalDuseGo','totalWeightGo','totalCountGo'));
})->middleware('auth');

Route::post('/new_supplier',function(Request $request){
   $validated = $request->validate([
      'name' => 'required|string|max:255',
      'type' => 'required|string|max:255',
      'count' => 'required|integer|min:1',
      'total_weight' => 'required|numeric|min:1',
      'price' => 'required|numeric|min:1',
   ]);

   $total = $validated['price'] * $validated['total_weight'];

   Supplier::create([
      'name' => $validated['name'],
      'type' => $validated['type'],
      'count' => $validated['count'],
      'total_weight' => $validated['total_weight'],
      'price' => $validated['price'],
      'total' => $total,
   ]);

   return redirect()->back()->with('success', 'تم إضافة المورد بنجاح');
})->middleware('auth');
Route::post('/edit_supplier',function(Request $request){
   $validated = $request->validate([
      'id' => 'required|integer|exists:suppliers,id',
      'name' => 'required|string|max:255',
      'type' => 'required|string|max:255',
      'count' => 'required|integer|min:1',
      'total_weight' => 'required|numeric|min:1',
      'price' => 'required|numeric|min:1',
   ]);

   $supplier = Supplier::find($validated['id']);
   if ($supplier) {
      $supplier->name = $validated['name'];
      $supplier->type = $validated['type'];
      $supplier->count = $validated['count'];
      $supplier->total_weight = $validated['total_weight'];
      $supplier->price = $validated['price'];
      $supplier->total = $validated['price'] * $validated['total_weight'];
      $supplier->save();
      return redirect()->back()->with('success', 'تم تحديث المورد بنجاح');
   }
   return redirect()->back()->with('fail', 'المورد غير موجود');
})->middleware('auth');
Route::post('/delete_supplier', function (Request $request) {
   $id = $request->input('id');
   $supplier = Supplier::find($id);
   if ($supplier) {
       $supplier->delete();
       return redirect()->back()->with('success', 'تم حذف المورد بنجاح.');
   }
   return redirect()->back()->with('fail', 'المورد غير موجود.');
})->middleware('auth');

Route::get('/sak_parts', function () {
   $parts =DB::table('adahy_acc')->get();
    return view('sak_parts' ,compact('parts'));
})->middleware('auth','per1');
Route::delete('/adahy_acc/delete', function (Request $request) {
   $id = $request->input('id');
   $acc = DB::table('adahy_acc')->where('id', $id)->first();
   if (!$acc) {
       return redirect()->back()->with('fail', 'العنصر غير موجود.');
   }
   DB::table('adahy_acc')->where('id', $id)->delete();
   return redirect()->back()->with('success', 'تم حذف الجزء بنجاح.');
});
Route::get('/adahy_type_search', function (Request $request) {
   $query = $request->input('q');
   $results = DB::table('adahy_acc')
       ->where('code_adahy',$query)
       ->orWhere('r_id', $query)
       ->get();
   return view('sak_parts', ['results' => $results, 'q' => $query]);
});
// ->middleware('auth','per1')
Route::post('/res_post', [Controller::class, 'res_post'])->name('res_post');

Route::get('/get_sak_data', [Controller::class, 'get_sak_data'])->name('get_sak_data');

Route::get('/get_sak_data2', [Controller::class, 'get_sak_data2'])->name('get_sak_data2');
Route::get('/get_sak_adahy', [Controller::class, 'get_sak_adahy'])->name('get_sak_adahy');

Route::get('/reservationStep1',[ReservWebsiteController::class,'reservationStep1']);
Route::get('/live/', function () {

 $get = 0;
      return view('live', compact('get'));
  
});

Route::get('/liven/', function () {

 $get = 0;
      return view('liven', compact('get'));
  
});

Route::get('/reservationweb/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);


 $get = 0;
      return view('reservationweb', compact('get','id'));
  
});
Route::get('/reservationSystemWebsite/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);


 $get = 0;
      return view('reservationSytemWebsite', compact('get','id'));
  
});
Route::get('/reservationsystem/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);


 $get = 0;
      return view('reservationsystem', compact('get','id'));
  
});
Route::get('/reservationsystempay/{id}', function (Request $request, int $id) {
   $id = (int) htmlspecialchars($id);


$get = 0;
    return view('reservationsystempay', compact('get','id'));

});
Route::get('/ad_info/{id}', function (Request $request, int $id) {
    $id = (int) htmlspecialchars($id);
    $get = 0;
      return view('ad_info', compact('get','id'));
    
})->middleware('auth','per1');
    
    
Route::get('/resrv/', function () {

 $get = 0;
      return view('resrv', compact('get'));
  
});

Route::get('/resrv1/', function () {

 $get = 0;

      return view('resrv1', compact('get'));

});

Route::get('/resrv2/', function (Request $request) {
 $get = 0;
$request->validate([
   'gov'=>'required',
 ]);
 $gov = $request->get('gov');
      return view('resrv2', compact('get','gov'));
  
});

Route::get('resrv_dash',function (){
   $get = 0;
    return view('resrv_dash',compact('get'));
})->middleware('auth','per1');
Route::get('adahy_show',function (){
   $get = 0;
   $request->validate([
      'gov'=>'required',
    ]);
    $gov = $request->get('gov');
    return view('adahy_show',compact('get','gov'));
});

Route::get('/resrv2_/', function () {

 $get = 0;
      return view('resrv2_', compact('get'));
  
});

Route::get('/resrv3/', function () {

 $get = 0;
      return view('resrv3', compact('get'));
  
});



Route::post('logind','controller@logind');

Auth::routes();
Route::get('/permission_denied', function (){
    return view('permission_denied');
});
Route::get('/', function (){
    return view('home');
})->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/widget_mani', function (){
   return view('widget_mani');
})->middleware('auth');

Route::get('/widget_cairo', function (){
   return view('widget_cairo');
})->middleware('auth');
// ->middleware('auth');

// Route::group(['prefix' => 'admin',  'middleware' => 'per1'], function()
// {



Route::get('/accounts', function () {
    return view('accounts');
})->middleware('auth','per1');

Route::get('/accounts_t', function () {
    return view('accounts_t');
})->middleware('auth','per1');

Route::get('/types', function () {
    return view('types');
})->middleware('auth','per1');


Route::get('/adahy', function () {
    $get = adahy_type::all();
    return view('adahy',compact('get'));
})->middleware('auth','per1');

Route::get('/times', function () {
     $get = times::all();
    return view('times',compact('get'));
})->middleware('auth','per1');

Route::get('/adahyt', function () {
    $get = adahyt::all();
    $sak = sak::all();
    $days = days::all();
    $times = times::all();
 $adahy_type = adahy_type::all();
    return view('adahyt',compact('get','adahy_type','sak','days','times'));
})->middleware('auth','per1');


Route::get('/exc_p', function () {
    $get = adahyt::all();
    $sak = sak::all();
    $days = days::all();
    $times = times::all();
 $adahy_type = adahy_type::all();
    return view('exc_p',compact('get','adahy_type','sak','days','times'));
})->middleware('auth','per1');


Route::get('/adahyt_r', function (Request $request) {
        $request->validate([
            'gov'=>'required',
        ]);
        $gov = $request->get('gov');

        return view('adahyt_r',compact('gov'));
})->middleware('auth','per1');
Route::get('/adahy_dash', function (Request $request) {
    $get = 0;
   return view('adahy_dash',compact('get'));
})->middleware('auth','per1');
// ->middleware('auth','per1');
Route::get('/adahyt_rss', function (Request $request) {
   $request->validate([
      'gov'=>'required',
  ]);
  $gov = $request->get('gov');
        return view('adahyt_rss',compact('gov'));
})->middleware('auth','per1');

Route::get('/adahyt_r2', function (Request $request) {
       $rec = htmlspecialchars($request->get('rec'));
    $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
 
  
         $get = reservation::where(function($query) use ($rec,$name,$mobile) {
        if($rec){$query->where('rec', '=', $rec);}
        if($name){$query->where('name', 'LIKE', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
  })->where('emp','=','website')->where('gov_type',12)->get();
      return view('adahyt_r2',compact('get','rec','name','mobile'));
       
})->middleware('auth','per1');
Route::get('/adahyt_r2_cairo', function (Request $request) {
   $rec = htmlspecialchars($request->get('rec'));
$name = htmlspecialchars($request->get('name'));
$mobile = htmlspecialchars($request->get('mobile'));


     $get = reservation::where(function($query) use ($rec,$name,$mobile) {
    if($rec){$query->where('rec', '=', $rec);}
    if($name){$query->where('name', 'LIKE', '%'.$name.'%');}
    if($mobile){$query->where('mobile', '=', $mobile);}
})->where('emp','=','website')->where('gov_type',01)->get();
  return view('adahyt_r2',compact('get','rec','name','mobile'));
   
})->middleware('auth','per1');
Route::get('/adahyt_r2_mani', function (Request $request) {
   $rec = htmlspecialchars($request->get('rec'));
$name = htmlspecialchars($request->get('name'));
$mobile = htmlspecialchars($request->get('mobile'));


     $get = reservation::where(function($query) use ($rec,$name,$mobile) {
    if($rec){$query->where('rec', '=', $rec);}
    if($name){$query->where('name', 'LIKE', '%'.$name.'%');}
    if($mobile){$query->where('mobile', '=', $mobile);}
})->where('emp','=','website')->where('gov_type',24)->get();
  return view('adahyt_r2',compact('get','rec','name','mobile'));
   
})->middleware('auth','per1');

Route::get('/adahyt_r3', function (Request $request) {
        return view('adahyt_r3');
})->middleware('auth','per1');


Route::get('/adahyt_r3_', function (Request $request) {
        return view('adahyt_r3_');
})->middleware('auth','per1');

Route::get('/adahyt_r4', function (Request $request) {
        return view('adahyt_r4');
})->middleware('auth','per1');
    
// Route::get('/adahyt_r', function (Request $request) {
//     $type = htmlspecialchars($request->get('type'));
//     $sak = htmlspecialchars($request->get('sak'));
//     $days = htmlspecialchars($request->get('days'));
//     $cases = (int) htmlspecialchars($request->get('cases'));
  
//           $get = adahyt::where(function($query) use ($type,$sak,$days,$cases) {
//         if($type){$query->where('adahy', '=', $type);}
//         if($sak){$query->where('sak', '=', $sak);}
//         if($days){$query->where('days', '=', $days);}
//         if($cases == 1){$query->where('free','>', 0);}
//          if($cases == 2){$query->where('free','=', 0);}
       
//   })->get();
//     $sak = sak::all();
//     $days = days::all();
//  $adahy_type = adahy_type::all();
//     return view('adahyt_r',compact('get','adahy_type','sak','days'));
// })->middleware('auth','per1');



Route::get('/adahyt_r_t', function (Request $request) {
    $type = htmlspecialchars($request->get('type'));
    $sak = htmlspecialchars($request->get('sak'));
    $days = htmlspecialchars($request->get('days'));
    $cases = (int) htmlspecialchars($request->get('cases'));
  
          $get = adahyt::where(function($query) use ($type,$sak,$days,$cases) {
        if($type){$query->where('adahy', '=', $type);}
        if($sak){$query->where('sak', '=', $sak);}
        if($days){$query->where('days', '=', $days);}
        if($cases == 1){$query->where('free','>', 0);}
         if($cases == 2){$query->where('free','=', 0);}
       
  })->get();
    $sak = sak::all();
    $days = days::all();
 $adahy_type = adahy_type::all();
    return view('adahyt_r_t',compact('get','adahy_type','sak','days'));
});



Route::get('/expense', function () {
    $get = expense::all();
    return view('expense',compact('get'));
})->middleware('auth','per1');

Route::get('/expense_tr/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = expense::where('id',$id)->count();
if($check > 0){
$get_info = expense::where('id',$id)->first();
$total_m = tr_expense::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_expense::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_expense::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_expense::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('expense_tr',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');


Route::get('/income', function () {
    $get = income::all();
    return view('income',compact('get'));
})->middleware('auth','per1');


Route::get('/income_tr/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = income::where('id',$id)->count();
if($check > 0){
$get_info = income::where('id',$id)->first();
$total_m = tr_income::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_income::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_income::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_income::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('income_tr',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');



Route::get('/butcher', function () {
    $get = butcher::all();
    return view('butcher',compact('get'));
})->middleware('auth','per1');
Route::get('/butcher-repo', function () {
    $get = butcher::all();
    return view('butcherRepo',compact('get'));
})->middleware('auth');


Route::get('/butcher_tr/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = butcher::where('id',$id)->count();
if($check > 0){
$get_info = butcher::where('id',$id)->first();
$total_m = tr_butcher::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_butcher::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_butcher::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_butcher::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('butcher_tr',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');

Route::get('/follower', function () {
    $get = follower::all();
    return view('follower',compact('get'));
})->middleware('auth','per1');


Route::get('/follower_tr/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = follower::where('id',$id)->count();
if($check > 0){
$get_info = follower::where('id',$id)->first();
$total_m = tr_follower::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_follower::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_follower::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_follower::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('follower_tr',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');

Route::get('/butcher2', function () {
    $get = butcher2::all();
    return view('butcher2',compact('get'));
})->middleware('auth','per1');

Route::get('/butcher_tr2/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = butcher2::where('id',$id)->count();
if($check > 0){
$get_info = butcher2::where('id',$id)->first();
$total_m = tr_butcher2::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_butcher2::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_butcher2::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_butcher2::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('butcher_tr2',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');


Route::get('/vendor', function () {
    $get = vendor::all();
    return view('vendor',compact('get'));
})->middleware('auth','per1');

Route::get('/vendor-repo', function () {
    $get = vendor::select('name','note','id')->distinct()->get();
    return view('vendorRepo',compact('get'));
})->middleware('auth');

Route::get('/vendor_tr/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = vendor::where('id',$id)->count();
if($check > 0){
$get_info = vendor::where('id',$id)->first();
$total_m = tr_vendor::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = tr_vendor::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_t = tr_vendor::where('treasury_id',$id)->orderBy('id','DESC')->first(); 
$get = tr_vendor::where('treasury_id',$id)->orderBy('id','DESC')->get(); 
    return view('vendor_tr',compact('get', 'get_t','total_d','total_m','get_info' ,'id'));
}
})->middleware('auth','per1');


Route::get('/per', function () {
     $get = User::all();
     $get2 = treasures::all();
     $pages = pages::all();
    return view('per',compact('get','get2','get2','pages'));
  
})->middleware('auth','per1');


Route::get('/sak', function () {
     $get = sak::all();
    return view('sak',compact('get'));
  
})->middleware('auth','per1');

Route::get('/days', function () {
       $get = days::all();
    return view('days',compact('get'));
})->middleware('auth','per1');



Route::get('/reservation/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = adahyt::where('id',$id)->count();
   if($check > 0){
$get_info = adahyt::where('id',$id)->first();
$sak_price = sak::where('name',$get_info->sak)->first()->price;
$sak_price2 = sak::where('name',$get_info->sak)->first()->price2;
$get = reservation::where('ad_id',$id)->get();

      return view('reservation', compact('get','get_info','sak_price' , 'sak_price2' ,  'id'));
   }
})->middleware('auth','per1');

Route::get('/reservation_E/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){

$get = reservation::where('id',$id)->first();
$get_client = clients::where('mob',$get->mobile)->first();
      return view('reservation_E', compact('get','id','get_client'));
   }
})->middleware('auth','per1');


Route::get('/reservationd', function (Request $request) {
     $id = (int) htmlspecialchars($request->id);
      $mob =  htmlspecialchars($request->mob);
       $types =  htmlspecialchars($request->types);
     if($types == 200){}else{$types = 0;}
   $check = adahyt::where('id',$id)->count();
   if($check > 0){
       $check_clients = clients::where('mob',$mob)->count();
       if($check_clients > 0){
           $c_client = 1;
           $get_clients = clients::where('mob',$mob)->first();
       }else{
         $get_clients = 0 ;
         $c_client = 0;
       }
$get_info = adahyt::where('id',$id)->first();
$sak_price = sak::where('name',$get_info->sak)->first()->price;
$get = reservation::where('ad_id',$id)->get();

      return view('reservationd', compact('get','get_info','sak_price' , 'id' , 'get_clients' , 'c_client' , 'mob' , 'types'));
   }
})->middleware('auth','per1');


Route::get('/reservationd2', function (Request $request) {
     $id = (int) htmlspecialchars($request->id);
      $mob =  htmlspecialchars($request->mob);
       $types =  htmlspecialchars($request->types);
     if($types == 200){}else{$types = 0;}
   $check = adahyt::where('id',$id)->count();
   if($check > 0){
       $check_clients = clients::where('mob',$mob)->count();
       if($check_clients > 0){
           $c_client = 1;
           $get_clients = clients::where('mob',$mob)->first();
       }else{
         $get_clients = 0 ;
         $c_client = 0;
       }
$get_info = adahyt::where('id',$id)->first();
$sak_price = sak::where('name',$get_info->sak)->first()->price;
$get = reservation::where('ad_id',$id)->get();

      return view('reservationd2', compact('get','get_info','sak_price' , 'id' , 'get_clients' , 'c_client' , 'mob' , 'types'));
   }
})->middleware('auth','per1');



Route::get('/pay/{id}', function (Request $request, int $id) {
      $id = (int) htmlspecialchars($id);
   $check = adahyt::where('id',$id)->count();
   if($check > 0){
$get_info = adahyt::where('id',$id)->first();
$sak_price = sak::where('name',$get_info->sak)->first()->price;
$get = reservation::where('ad_id',$id)->get();

      return view('pay', compact('get','get_info','sak_price' , 'id'));
   }
})->middleware('auth','per1');

Route::get('/treasury_sak/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get_info = reservation::where('id',$id)->first();
$get_info2 = adahyt::where('id',$get_info->ad_id)->first();
$adahy_type_info = adahy_type::where('name',$get_info2->adahy)->first();
$sak_info = sak::where('name',$get_info2->sak)->first();
$get = treasury_sak::where('treasury_id',$id)->get();
 $total = @treasury_sak::where('treasury_id',$id)->orderBy('id','desc')->first()->total;
$last_date = @treasury_sak::where('treasury_id',$id)->orderBy('id','desc')->first()->created_at;
      return view('treasury_sak', compact('get','get_info' , 'get_info2' , 'total','last_date' , 'id' , 'sak_info' , 'adahy_type_info'));
   }
})->middleware('auth','per1');


Route::get('/treasures/{id}', function (Request $request, int $id) {
    $c1 = DB::table('per')->where('page','treasury_all')->where('u_id',Auth::user()->id)->count();
    if($c1 > 0){
    $id = (int) htmlspecialchars($id);
    }else{
      $id = (int) Auth::user()->t_id;   
    }
    $type = (int) htmlspecialchars($request->type);
   $check = treasures::where('id',$id)->count();
   if($check > 0){
$get_info = treasures::where('id',$id)->first();
$total_m = treasury::where('treasury_id',$id)->where('type',1)->sum('amount');
$total_d = treasury::where('treasury_id',$id)->where('type',2)->sum('amount');
$get_all = treasures::all();
$get_t = treasury::where('treasury_id',$id)->orderBy('id','DESC')->first();
if(!empty($type)){
 if($type == 1){$get = treasury::where('treasury_id',$id)->where('type',1)->orderBy('id','ASC')->paginate('3000');}  
 if($type == 2){$get = treasury::where('treasury_id',$id)->where('type',2)->orderBy('id','ASC')->paginate('3000');}  
}else{
$get = treasury::where('treasury_id',$id)->orderBy('id','ASC')->paginate('3000');
}
return view('treasures', compact('get','get_info','get_t','id' , 'get_all' , 'total_m' , 'total_d'));

   }
    
})->middleware('auth','per1');


Route::get('/sak_all', function (Request $request) {

$free = adahyt::where('id','!=',0)->where('gov',12)->sum('free');
$days2 = days::all();
$reservation = adahyt::where('id','!=',0)->where('gov',12)->sum('reservation');


      $name = htmlspecialchars($request->get('name'));
      $mobile = htmlspecialchars($request->get('mobile'));
      $mobile2 = htmlspecialchars($request->get('mobile2'));
      $pay = htmlspecialchars($request->get('pay'));
      $note = htmlspecialchars($request->get('note'));
      $rec = htmlspecialchars($request->get('rec'));
      $def = htmlspecialchars($request->get('def'));
      $code = htmlspecialchars($request->get('code'));
      $days = htmlspecialchars($request->get('days'));
      $type = htmlspecialchars($request->get('type'));

      $hasFilter = $name || $mobile || $mobile2 || $pay || $note || $rec || $def || $code || $days || $type;

      if ($hasFilter) {
         $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
            if($name){$query->where('name','like', '%'.$name.'%');}
            if($mobile){$query->where('mobile', '=', $mobile);}
            if($mobile2){$query->where('mobile2', '=', $mobile2);}
            if($pay){$query->where('pay', $pay);}
            if($days){$query->where('days', $days);}
            if($note){$query->where('note','like', '%'.$note.'%');}
            if($rec){$query->where('rec', $rec);}
            if($def){$query->where('def', $def);}
            if($code){$query->where('code', $code);}
            if($type){$query->where('type', $type);}
         })->where('emp','!=','website')->orderBy('code','ASC')->paginate('30');
      } else {
         $get = reservation::where('emp','!=','website')->where('gov_type',12)->orderBy('code','ASC')->paginate('30');
      }


//$get = reservation::where('id','!=',0)->orderBy('id','ASC')->paginate('10');

return view('sak_all2', compact('get','free','reservation' , 'days2'));


   
})->middleware('auth','per1');
Route::get('/sak_all_cairo', function (Request $request) {

$free = adahyt::where('id','!=',0)->where('gov',01)->sum('free');
$days2 = days::all();
$reservation = adahyt::where('id','!=',01)->where('gov',01)->sum('reservation');


   $name = htmlspecialchars($request->get('name'));
   $mobile = htmlspecialchars($request->get('mobile'));
   $mobile2 = htmlspecialchars($request->get('mobile2'));
   $pay = htmlspecialchars($request->get('pay'));
   $note = htmlspecialchars($request->get('note'));
   $rec = htmlspecialchars($request->get('rec'));
   $def = htmlspecialchars($request->get('def'));
   $code = htmlspecialchars($request->get('code'));
   $days = htmlspecialchars($request->get('days'));
      $type = htmlspecialchars($request->get('type'));
   
   
         $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
         if($name){$query->where('name','like', '%'.$name.'%');}
         if($mobile){$query->where('mobile', '=', $mobile);}
         if($mobile2){$query->where('mobile2', '=', $mobile2);}
         if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
         if($note){$query->where('note','like', '%'.$note.'%');}
         if($rec){$query->where('rec', $rec);}
         if($def){$query->where('def', $def);}
         if($code){$query->where('code', $code);}
         if($type){$query->where('type', $type);}
      
   })->where('emp','!=','website')->where('gov_type',01)->orderBy('code','ASC')->paginate('30');


//$get = reservation::where('id','!=',0)->orderBy('id','ASC')->paginate('10');

return view('sak_all2', compact('get','free','reservation' , 'days2'));

   
   
})->middleware('auth','per1');
Route::get('/sak_all_mani', function (Request $request) {

$free = adahyt::where('id','!=',0)->where('gov',24)->sum('free');
$days2 = days::all();
$reservation = adahyt::where('id','!=',0)->where('gov',24)->sum('reservation');


   $name = htmlspecialchars($request->get('name'));
   $mobile = htmlspecialchars($request->get('mobile'));
   $mobile2 = htmlspecialchars($request->get('mobile2'));
   $pay = htmlspecialchars($request->get('pay'));
   $note = htmlspecialchars($request->get('note'));
   $rec = htmlspecialchars($request->get('rec'));
   $def = htmlspecialchars($request->get('def'));
   $code = htmlspecialchars($request->get('code'));
   $days = htmlspecialchars($request->get('days'));
      $type = htmlspecialchars($request->get('type'));
   
   
         $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
         if($name){$query->where('name','like', '%'.$name.'%');}
         if($mobile){$query->where('mobile', '=', $mobile);}
         if($mobile2){$query->where('mobile2', '=', $mobile2);}
         if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
         if($note){$query->where('note','like', '%'.$note.'%');}
         if($rec){$query->where('rec', $rec);}
         if($def){$query->where('def', $def);}
         if($code){$query->where('code', $code);}
         if($type){$query->where('type', $type);}
      
   })->where('emp','!=','website')->where('gov_type',24)->orderBy('code','ASC')->paginate('30');


//$get = reservation::where('id','!=',0)->orderBy('id','ASC')->paginate('10');

return view('sak_all2', compact('get','free','reservation' , 'days2'));

   
   
})->middleware('auth','per1');


Route::get('/sak_all2', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
 

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('id', $code);}
       
  })->orderBy('code','ASC')->paginate('30');

 
//$get = reservation::where('id','!=',0)->orderBy('id','ASC')->paginate('10');

return view('sak_all', compact('get','free','reservation'));

  
    
})->middleware('auth','per1');


Route::get('/account_info/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = users_c::where('id',$id)->count();
   if($check > 0){
$get = users_c::where('id',$id)->first();
 
      return view('account_info', compact('get'));
   }
})->middleware('auth','per1');

//});
Route::get('/weight', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = adahyt::where('code',$id)->get();   
    }else{
    $get = adahyt::where('gov',12)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $vendors = vendor::all();
 $adahy_type = adahy_type::all();
    return view('weight',compact('get','adahy_type','sak','days','vendors'));
})->middleware('auth','per1');
Route::get('/weight-cairo', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = adahyt::where('code',$id)->get();   
    }else{
    $get = adahyt::where('gov',01)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $vendors = vendor::all();
 $adahy_type = adahy_type::all();
    return view('weight',compact('get','adahy_type','sak','days','vendors'));
})->middleware('auth');
Route::get('/weight-mani', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = adahyt::where('code',$id)->get();   
    }else{
    $get = adahyt::where('gov',24)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $vendors = vendor::all();
 $adahy_type = adahy_type::all();
    return view('weight',compact('get','adahy_type','sak','days','vendors'));
})->middleware('auth');


Route::get('/weight_edit', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = adahyt::where('code',$id)->get();   
    }else{
    $get = adahyt::all();
    }
    $sak = sak::all();
    $days = days::all();
    $vendors = vendor::all();
 $adahy_type = adahy_type::all();
    return view('weight_edit',compact('get','adahy_type','sak','days','vendors'));
})->middleware('auth','per1');


  Route::get('/w_b', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->whereIN('type',[0])->where('wb_agent',0)->get();   
    }else{
    $get = opt::whereIN('type',[0])->where('wb_agent',0)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::all();
    $butchers = butcher::all();
 $adahy_type = adahy_type::all();
    return view('w_b',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');


  Route::get('/f_b', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->whereIN('type',[901])->where('fb_agent',0)->get();   
    }else{
    $get = opt::whereIN('type',[901])->where('fb_agent',0)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::where('note','مشرف غرفة التبريد')->get();
    $butchers = butcher::all();
 $adahy_type = adahy_type::all();
    return view('f_b',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');

  Route::get('/butcher_s', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->where('gov',12)->whereIN('type',[1,2,3,4])->get();   
    }else{
    $get = opt::where('gov',12)->whereIN('type',[1,2,3,4])->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::where('note','مشرف جزار')->get();
    $butchers = butcher::all();
 $adahy_type = adahy_type::all();
    return view('butcher_s',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');


  Route::get('/accessories', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->where('s_exit_date','=',0)->whereIN('type',[1,2,3,4,5,6])->get();   
    }else{
    $get = opt::whereIN('type',[1,2,3,4,5,6])->where('s_exit_date','=',0)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::all();
    $butchers = butcher::all();
 $adahy_type = adahy_type::all();
    return view('accessories',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');


  Route::get('/cleanup', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->whereIN('type',[1,2,3,4,5,6,901])->where('d_exit_date','=',0)->get();   
    }else{
    $get = opt::whereIN('type',[1,2,3,4,5,6,901])->where('d_exit_date','=',0)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::where('note','مشرف سقط')->get();
    $butchers = butcher2::all();
 $adahy_type = adahy_type::all();
    return view('cleanup',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');


  Route::get('/pkg', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->whereIN('type',[5,6])->where('f_exit_date','=',"0")->get();   
    }else{
    $get = opt::whereIN('type',[5,6])->where('f_exit_date','=',"0")->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::where('note','مشرف تعبئة')->get();
    $butchers = butcher2::all();
 $adahy_type = adahy_type::all();
    return view('pkg',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');


  Route::get('/rec', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->whereIN('type',[6,7])->where('r_exit_date','=',0)->get();   
    }else{
    $get = opt::whereIN('type',[6,7])->where('r_exit_date','=',0)->get();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::where('note','like','%'.'تسليم'.'%')->get();
    $butchers = butcher2::all();
 $adahy_type = adahy_type::all();
    return view('rec',compact('get','adahy_type','sak','days','followers','butchers'));
})->middleware('auth','per1');




Route::get('/rec_all', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->where('retype',1)->orderBy('ad_id','ASC')->paginate('30');
  
  return view('rec_all', compact('get','free','reservation' ,'followers', 'days2'));

  
    
})->middleware('auth','per1');
  
  Route::get('/freez', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->whereIN('retype',[2,4])->orderBy('ad_id','ASC')->paginate('30');
return view('freez', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');




  Route::get('/ship', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->whereIN('retype',[3])->orderBy('ad_id','ASC')->paginate('30');

return view('ship', compact('get','free','reservation' ,'followers', 'days2'));

})->middleware('auth','per1');



  Route::get('/rec_end', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->whereIN('retype',[5,6,4])->orderBy('ad_id','ASC')->paginate('30');

return view('rec_end', compact('get','free','reservation' ,'followers', 'days2'));

})->middleware('auth','per1');


  Route::get('/rec_end_2', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->whereIN('retype',[6,4])->orderBy('ad_id','ASC')->paginate('30');

return view('rec_end_2', compact('get','free','reservation' ,'followers', 'days2'));

})->middleware('auth','per1');

  Route::get('/callcenter', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->orderBy('code','ASC')->paginate('30');
return view('callcenter', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');

  Route::get('/callcenter_mans', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->where('gov',12)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->where('gov',12)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->where('gov_type',12)->orderBy('code','ASC')->paginate('30');
return view('callcenter', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');
  Route::get('/callcenter_cairo', function (Request $request) {
  $free = adahyt::where('id','!=',0)->where('gov',01)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->where('gov',01)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->where('gov_type',01)->orderBy('code','ASC')->paginate('30');
return view('callcenter', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');
 Route::get('/callcenter_mani', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->where('gov',24)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->where('gov',24)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->where('gov_type',24)->orderBy('code','ASC')->paginate('30');
return view('callcenter', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');
  Route::get('/reception', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->orderBy('code','ASC')->paginate('30');
return view('callcenter', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');


  Route::get('/receptionss', function (Request $request) {
 
 $free = adahyt::where('id','!=',0)->sum('free');
 $days2 = days::all();
 $reservation = adahyt::where('id','!=',0)->sum('reservation');
  $followers = follower::all();

   $name = htmlspecialchars($request->get('name'));
    $mobile = htmlspecialchars($request->get('mobile'));
    $mobile2 = htmlspecialchars($request->get('mobile2'));
    $pay = htmlspecialchars($request->get('pay'));
    $note = htmlspecialchars($request->get('note'));
    $rec = htmlspecialchars($request->get('rec'));
    $def = htmlspecialchars($request->get('def'));
    $code = htmlspecialchars($request->get('code'));
    $days = htmlspecialchars($request->get('days'));
     $type = htmlspecialchars($request->get('type'));
  
  
        $get = reservation::where(function($query) use ($name,$mobile,$mobile2,$pay,$note,$rec,$def,$code,$days,$type) {
        if($name){$query->where('name','like', '%'.$name.'%');}
        if($mobile){$query->where('mobile', '=', $mobile);}
        if($mobile2){$query->where('mobile2', '=', $mobile2);}
        if($pay){$query->where('pay', $pay);}
         if($days){$query->where('days', $days);}
        if($note){$query->where('note','like', '%'.$note.'%');}
        if($rec){$query->where('rec', $rec);}
        if($def){$query->where('def', $def);}
        if($code){$query->where('code', $code);}
        if($type){$query->where('type', $type);}
       
  })->orderBy('ad_id','ASC')->paginate('30');
return view('reception', compact('get','free','reservation' ,'followers', 'days2'));
})->middleware('auth','per1');

Route::get('/note/{id}', function (Request $request, int $id) {
$id = (int) htmlspecialchars($id);
$check = callcenter::where('code',$id)->count();
$res = reservation::where('code',$id)->get();
if($check > 0){
$get = callcenter::where('code',$id)->get();

return view('comNote', compact('get','res'));
}else{
$get = [];
return view('comNote', compact('res','get'));
}
})->middleware('auth');
Route::get('/com/{id}', function (Request $request, int $id) {
$id = (int) htmlspecialchars($id);
$check = callcenter::where('re_id',$id)->count();
$res = reservation::where('id',$id)->first();
if($check > 0){
$get = callcenter::where('re_id',$id)->get();

return view('com', compact('get','res'));
}else{
$get = [];
return view('com', compact('res','get'));
}
})->middleware('auth','per1');


Route::get('/print/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get = reservation::where('id',$id)->first();
 
      return view('print', compact('get','id'));
   }
})->middleware('auth','per1');

Route::get('/print1/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get = reservation::where('id',$id)->first();
 
      return view('print1', compact('get','id'));
   }
});


Route::get('/print2/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get = reservation::where('id',$id)->first();
 
      return view('print2', compact('get','id'));
   }
});

Route::get('/print3/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get = reservation::where('id',$id)->first();
 
      return view('print3', compact('get','id'));
   }
});

Route::get('/print4/{id}', function (Request $request, int $id) {
     $id = (int) htmlspecialchars($id);
   $check = reservation::where('id',$id)->count();
   if($check > 0){
$get = reservation::where('id',$id)->first();
 
      return view('print4', compact('get','id'));
   }
});



Route::group(['middleware' => ['auth', 'per1' , 'Ratereq']], function() {
  // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
  
  Route::get('/test_ratelimiter', function (Request $request) {
    $id = (int) htmlspecialchars($request->code);
    if(!empty($id)){
     $get = opt::where('code',$id)->get();   
    }else{
    $get = opt::all();
    }
    $sak = sak::all();
    $days = days::all();
    $followers = follower::all();
    $butchers = butcher::all();
 $adahy_type = adahy_type::all();
    return view('butcher_s',compact('get','adahy_type','sak','days','followers','butchers'));
});
  
  
});




Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout_', [HomeController::class, 'logout_'])->name('logout_');
Route::get('/dark', [HomeController::class, 'dark'])->name('dark');


/////////////////////////RouteController//////////////////////////////////////////////////////

Route::get('accounts_all', [RouteController::class, 'accounts_all'])->middleware('auth','per1');
Route::get('types_all', [RouteController::class, 'types_all'])->middleware('auth','per1');


/////////////////////////////////AccountController////////////////////////////////////////////
Route::post('/new_account', [AccountController::class, 'new_account'])->name('new_account');

Route::post('/res_posts', [AccountController::class, 'res_posts'])->name('res_posts');

Route::post('/res_posts_', [AccountController::class, 'res_posts_'])->name('res_posts_');

////////////
Route::post('/new_type', [AccountController::class, 'new_type'])->name('new_type');
Route::post('/edit_type', [AccountController::class, 'edit_type'])->name('edit_type');
Route::post('/del_type', [AccountController::class, 'del_type'])->name('del_type');
//////
////////////
Route::post('/new_sak', [AccountController::class, 'new_sak'])->name('new_sak');
Route::post('/edit_sak', [AccountController::class, 'edit_sak'])->name('edit_sak');
Route::post('/del_sak', [AccountController::class, 'del_sak'])->name('del_sak');
//////
////////////
Route::post('/new_days', [AccountController::class, 'new_days'])->name('new_days');
Route::post('/edit_days', [AccountController::class, 'edit_days'])->name('edit_days');
Route::post('/del_days', [AccountController::class, 'del_days'])->name('del_days');
//////


////////////
Route::post('/new_times', [AccountController::class, 'new_times'])->name('new_times');
Route::post('/edit_times', [AccountController::class, 'edit_times'])->name('edit_times');
Route::post('/del_times', [AccountController::class, 'del_times'])->name('del_times');
//////


////////////
Route::post('/new_adhyat', [AccountController::class, 'new_adhyat'])->name('new_adhyat');
Route::post('/edit_adhyat', [AccountController::class, 'edit_adhyat'])->name('edit_adhyat');
Route::post('/del_adhyat', [AccountController::class, 'del_adhyat'])->name('del_adhyat');
//////
////////////
Route::post('/new_expense', [AccountController::class, 'new_expense'])->name('new_expense');
Route::post('/edit_expense', [AccountController::class, 'edit_expense'])->name('edit_expense');
Route::post('/del_expense', [AccountController::class, 'del_expense'])->name('del_expense');
//////
Route::post('/new_income', [AccountController::class, 'new_income'])->name('new_income');
Route::post('/edit_income', [AccountController::class, 'edit_income'])->name('edit_income');
Route::post('/del_income', [AccountController::class, 'del_income'])->name('del_income');
//////
//////
Route::post('/new_butcher', [AccountController::class, 'new_butcher'])->name('new_butcher');
Route::post('/edit_butcher', [AccountController::class, 'edit_butcher'])->name('edit_butcher');
Route::post('/del_butcher', [AccountController::class, 'del_butcher'])->name('del_butcher');
//////
Route::post('/new_butcher2', [AccountController::class, 'new_butcher2'])->name('new_butcher2');
Route::post('/edit_butcher2', [AccountController::class, 'edit_butcher2'])->name('edit_butcher2');
Route::post('/del_butcher2', [AccountController::class, 'del_butcher2'])->name('del_butcher2');
//////
Route::post('/new_follower', [AccountController::class, 'new_follower'])->name('new_follower');
Route::post('/edit_follower', [AccountController::class, 'edit_follower'])->name('edit_follower');
Route::post('/del_follower', [AccountController::class, 'del_follower'])->name('del_follower');
//////
//////
Route::post('/new_vendor', [AccountController::class, 'new_vendor'])->name('new_vendor');
Route::post('/edit_vendor', [AccountController::class, 'edit_vendor'])->name('edit_vendor');
Route::post('/del_vendor', [AccountController::class, 'del_vendor'])->name('del_vendor');
//////
////////////
Route::post('/new_per', [AccountController::class, 'new_per'])->name('new_per');
Route::post('/edit_per', [AccountController::class, 'edit_per'])->name('edit_per');
Route::post('/del_per', [AccountController::class, 'del_per'])->name('del_per');
//////

////////////
Route::post('/new_reservation', [AccountController::class, 'new_reservation'])->name('new_reservation');
Route::post('/new_reservation_', [AccountController::class, 'new_reservation_'])->name('new_reservation_');
Route::post('/new_reservation2', [AccountController::class, 'new_reservation2'])->name('new_reservation2');
Route::post('/edit_reservation', [AccountController::class, 'edit_reservation'])->name('edit_reservation');
Route::post('/del_reservation', [AccountController::class, 'del_reservation'])->name('del_reservation');
//////

Route::post('/new_treasury_sak', [AccountController::class, 'new_treasury_sak'])->name('new_treasury_sak');
Route::post('/new_treasury_sak1', [AccountController::class, 'new_treasury_sak1'])->name('new_treasury_sak1');

Route::post('/new_treasury_sak1_', [AccountController::class, 'new_treasury_sak1_'])->name('new_treasury_sak1_');

//////////
Route::post('/add_treasury_d', [AccountController::class, 'add_treasury_d'])->name('add_treasury_d');
Route::post('/add_treasury_m', [AccountController::class, 'add_treasury_m'])->name('add_treasury_m');
/////////
//////////
Route::post('/add_expense_d', [AccountController::class, 'add_expense_d'])->name('add_expense_d');
Route::post('/add_expense_m', [AccountController::class, 'add_expense_m'])->name('add_expense_m');
//////////
//////////
Route::post('/add_income_d', [AccountController::class, 'add_income_d'])->name('add_income_d');
Route::post('/add_income_m', [AccountController::class, 'add_income_m'])->name('add_income_m');
//////////
//////////
Route::post('/add_butcher_d', [AccountController::class, 'add_butcher_d'])->name('add_butcher_d');
Route::post('/add_butcher_m', [AccountController::class, 'add_butcher_m'])->name('add_butcher_m');
//////////
Route::post('/add_butcher_d2', [AccountController::class, 'add_butcher_d2'])->name('add_butcher_d2');
Route::post('/add_butcher_m2', [AccountController::class, 'add_butcher_m2'])->name('add_butcher_m2');
//////////
Route::post('/add_follower_d', [AccountController::class, 'add_follower_d'])->name('add_follower_d');
Route::post('/add_follower_m', [AccountController::class, 'add_follower_m'])->name('add_follower_m');
//////////
//////////
Route::post('/add_vendor_d', [AccountController::class, 'add_vendor_d'])->name('add_vendor_d');
Route::post('/add_vendor_m', [AccountController::class, 'add_vendor_m'])->name('add_vendor_m');
//////////

Route::post('/c_perm', [AccountController::class, 'c_perm'])->name('c_perm');
/////////
/////////
Route::post('/del_resv', [AccountController::class, 'del_resv'])->name('del_resv');
/////////
Route::post('/transfer_resv', [AccountController::class, 'transfer_resv'])->name('transfer_resv');
////////
Route::get('/show_sak_select', [AccountController::class, 'show_sak_select'])->name('show_sak_select');
//////////
Route::get('/c_test', [AccountController::class, 'c_test'])->name('c_test');

Route::get('/res_rev', [AccountController::class, 'res_rev'])->name('res_rev');

Route::post('/ed_adhyat', [AccountController::class, 'ed_adhyat'])->name('ed_adhyat');
Route::post('/add_weight', [AccountController::class, 'add_weight'])->name('add_weight');
Route::post('/add_weight2', [AccountController::class, 'add_weight2'])->name('add_weight2');
Route::post('/add_wb', [AccountController::class, 'add_wb'])->name('add_wb');
Route::post('/add_wb_ex', [AccountController::class, 'add_wb_ex'])->name('add_wb_ex');
Route::post('/add_fb', [AccountController::class, 'add_fb'])->name('add_fb');
Route::post('/add_fb2', [AccountController::class, 'add_fb2'])->name('add_fb2');
Route::post('/add_butcher_s', [AccountController::class, 'add_butcher_s'])->name('add_butcher_s');
Route::post('/add_butcher_s2', [AccountController::class, 'add_butcher_s2'])->name('add_butcher_s2');
Route::post('/add_accessories', [AccountController::class, 'add_accessories'])->name('add_accessories');
Route::post('/add_cleanup', [AccountController::class, 'add_cleanup'])->name('add_cleanup');
Route::post('/add_pkg', [AccountController::class, 'add_pkg'])->name('add_pkg');
Route::post('/add_rec', [AccountController::class, 'add_rec'])->name('add_rec');
Route::post('/rec_action', [AccountController::class, 'rec_action'])->name('rec_action');
Route::post('/edit_res_action', [AccountController::class, 'edit_res_action'])->name('edit_res_action');
Route::post('/freez_action', [AccountController::class, 'freez_action'])->name('freez_action');
Route::post('/ship_action', [AccountController::class, 'ship_action'])->name('ship_action');
Route::post('/callcenter_action', [AccountController::class, 'callcenter_action'])->name('callcenter_action');
Route::post('/reception_action', [AccountController::class, 'reception_action'])->name('reception_action');
Route::post('/agreement', [AccountController::class, 'agreement'])->name('agreement');
Route::post('/agreementn', [AccountController::class, 'agreementn'])->name('agreementn');

Route::post('/edit_R', [AccountController::class, 'edit_R'])->name('edit_R');

Route::get('/get_excel_callcenter', [AccountController::class, 'get_excel_callcenter'])->name('get_excel_callcenter');
Route::get('/get_excel_sak', [AccountController::class, 'get_excel_sak'])->name('get_excel_sak');
Route::get('/get_excel_opt', [AccountController::class, 'get_excel_opt'])->name('get_excel_opt');


Route::get('/dell_all', [AccountController::class, 'dell_all'])->name('dell_all');

//////////////////
