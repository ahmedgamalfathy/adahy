<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="p2p :  Admin " />
	<meta property="og:title" content="p2p :  Admin " />
	<meta property="og:description" content="p2p :  Admin " />
	
	<meta name="format-detection" content="telephone=no">
    <?php
    use App\Models\treasury_sak;
    use App\Models\adahyt;
    use App\Models\sak;
    use App\Models\adahy_type;
    use App\Models\trans;
  $theme1 = "theme1";
  
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
        $c =  DB::table('opt')->where('code',$x)->whereIN('type',[1,2,3,4,901])->where('b_entry_date','!=',0)->count();
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
          if($y == 7){return @DB::table('callcenter')->where('re_id',$x)->whereRaw('LENGTH(dis) > 3')->orderBy('id', 'desc')->first()->dis;}
          elseif($y == 8){return DB::table('callcenter')->where('re_id',$x)->orderBy('id','desc')->first()->c_call;}
          else{
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
   $all_f = "";
  $all_b = "";
  foreach($followers as $v){
      $all_f .='<option value="'.$v->name.'">'.$v->name.'</option>'; 
  }
  ?>
	<!-- PAGE TITLE HERE -->
	<title>Islah :  Admin </title>
	
	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
	 <!-- Datatable -->
    <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->

    
	<link href="/{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="/{{$theme1}}/vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
   <!-- jQuery -->

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" defer></script>
<style>
    .table {color: #000000;}
    .table-striped > tbody > tr:nth-of-type(odd){
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: #000000;
    font-weight: bold;
    font-size: 17px;
}
.table td{color: #000000; font-weight: bold;font-size: 17px;}
.table th, .table td {
    border-right: 1px solid #dbdbdb !important;
    text-align: center;
}
</style>	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
		   <span style="--i:1">L</span>
		   <span style="--i:2">o</span>
		   <span style="--i:3">a</span>
		   <span style="--i:4">d</span>
		   <span style="--i:5">i</span>
		   <span style="--i:6">n</span>
		   <span style="--i:7">g</span>
		   <span style="--i:8">.</span>
		   <span style="--i:9">.</span>
		   <span style="--i:10">.</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

          @include('layouts.nav_header')
      
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		@include('layouts.chatbox')
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        @include('layouts.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
       @include('layouts.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
		   <div class="container-fluid">
		                <div class="row layout-top-spacing" id="cancel-row">
                                         @if(session()->has('sucess'))
            <div class="alert alert-success" style="font-size: 25px;
    font-weight: bold;">
                <p style="color : #000">
                    {{ session('sucess') }}
                </p>
            </div>
            @endif
            
            @if(session()->has('fail'))
            <div class="alert alert-danger" style="font-size: 25px;
    font-weight: bold;">
                <p>
                    {{ session('fail') }}
                </p>
            </div>
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger" style="font-size: 25px;
    font-weight: bold;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
		       
				<div class="row page-titles" style="direction: rtl;">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">
						    المتابعة
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    كول سنتر    
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
          <div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon">
								  الصكوك 
								</span>
							</div>
							<div class="row">
							    
							    	<div class="col-4 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$free + $reservation}}
										</span> </h4>
										<p class="m-0">إجمالى</p>
									</div>
								</div>
							    
								<div class="col-4 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$free}}
										</span> </h4>
										<p class="m-0">متبقى</p>
									</div>
								</div>
								<div class="col-4">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$reservation}}
										</span> </h4>
										<p class="m-0">محجوز</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon">
								    البحث عن صك
								     </span>
							</div>
							<div class="row">
								<div class="col-12 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
									    <a href="get_excel_callcenter" target="_blank">
										<button type="button" class="btn btn-whatsapp">
								    تحميل أكسل
								     <span class="btn-icon-end"><i class="fa fa-download"></i></span>
                                </button>
								</a>
									
									
									<button type="button" class="btn btn-vimeo" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
									    بحث مفصل
									     <span class="btn-icon-end"><i class="flaticon-381-search-2"></i></span>
                                </button>
										
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
					<!--  Modal -->
			  <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                 
                 
                 
                 <form method="get" action="callcenter">
                                                                 
    @csrf
            <div class="modal-header">
                <h5 class="modal-title">  بحث عن صك    </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" style="direction: rtl;
font-size: 18px;
padding: 25px;
font-weight: bold;">


       
       <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">
                الاسم
            </label>
                                      
<input type="text" class="form-control" name="name" value="" placeholder="الاسم" >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>


        </div>
        <div class="mb-3 col-md-6">
            
                         <label class="form-label">الموبيل*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="mobile" value="" placeholder="الموبيل" >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        <div class="mb-3 col-md-6">
            
            <label class="form-label">الموبيل2*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="mobile2" value="" placeholder="الموبيل2" >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
        
        
                     <div class="mb-3 col-md-6">
          

                                                   
            <label class="form-label">مبلغ الحجز*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="pay" value=""  placeholder="مبلغ الحجز" >
             
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

                  
                 

          
        </div>
        
        
                        <div class="mb-3 col-md-6">
          
                                                        
            <label class="form-label">ملاحظات *</label>
<input type="text" class="form-control " name="note" value="" placeholder="ملاحظات " >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>
          
        </div>
        
        
                                  <div class="mb-3 col-md-6">
            
            <label class="form-label">رقم الإيصال *</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="rec" value="" placeholder="رقم الإيصال " >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
                                     <div class="mb-3 col-md-6">
            
            <label class="form-label">رقم الدفتر*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="def" value="" placeholder="رقم الدفتر " >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
                                               <div class="mb-3 col-md-6">
            
            <label class="form-label">رقم الأضحية  *</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="code" value="" placeholder="رقم الأضحية" >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
                                                    <div class="mb-3 col-md-6">
            
            <label class="form-label">يوم الذبح   *</label>
<select name="days" class="form-control">
    <option value=""></option>
    @foreach($days2 as $g)
    <option value="{{$g->name}}">{{$g->name}}</option>
    @endforeach
</select>
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
                
                                                    <div class="mb-3 col-md-6">
            
            <label class="form-label"> مراجعة *</label>
<select name="type" class="form-control">
    <option value=""></option>
    <option value="1">لم يتم المراجعة</option>
     <option value="2">تم المراجعة</option>
</select>
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        

        

        
        
        
        
                   
     
        
        
    </div>
       
       
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                    أغلاق
                </button>
                <button type="submit" class="btn btn-primary">
                    بحث
                </button>
            </div>
            </form>
                 
                 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END Modal -->
                             
		 
		 
	  <div class="row">
                    <div class="col-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    بيانات الجدول
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm"  style="width: 100%;">
                                        <thead>
                                               
                                        </thead>
                                        <tbody>
                                            <?
                                            $u_adhya = array(0);
                                            ?>
                                            @foreach($get as $g)
                                        <?
                                       	$c1 = DB::table('per')->where('page','del_trans')->where('u_id',Auth::user()->id)->count();//مسح ونقل
                                        
                                        $get_info = adahyt::where('id',$g->ad_id)->first();
                                        $sak_price = @sak::where('name',$get_info->sak)->first()->price;
                                        $sak_price2 = @sak::where('name',$get_info->sak)->first()->price2;
                                        $adahy_type_info = adahy_type::where('name',$get_info->adahy)->first();
                                         $get_ship = trans::where('re_id',$g->id)->first();
                                      $l_total =(float) @treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total;
                                      
                                        $gs = DB::table('reservation')->where('code',$get_info->code)->first();
                                        ?>
                                        <?
                                        if(in_array($get_info->code,$u_adhya)){
                                        ?>
                                        
                                        <?}else{?>
                                        <tr>
                                            <td colspan="19" style="font-size: 19px;
   
    background: var(--title);
    color: #fff;
    font-weight: bold;">
                                                {{$get_info->sak}} - {{$get_info->days}}-
                                                
                                              أضحية رقم  
                                              	<a href="/reservation/{{$g->ad_id}}">
                                              <span class="badge px-2 py-0 badge-success" style="font-weight:bold;font-size:15px;color:black;">{{$get_info->code}}</span>
                                              </a>
                                               - 
                                            متبقى
                                            <span class="badge light badge-success">{{$get_info->free}}</span>
                                            -
                                            محجوز
                                            <span class="badge light badge-warning">{{$get_info->reservation}}</span>
                                            
                                            {{$g->days}} - {{DB::table('times')->where('id',$g->times)->first()->name}}
                                            </td>
                                        </tr>
                                        
                                                      <tr>
                                                <th style="text-align: center;">Action</th>
                                               <th>
                                                   مكالمات وملاحظات
                                               </th>
                                               
                                               <th>
                                                   الحالة
                                               </th>
                                                
                                               
                                                
                                                
                                                <th>اسم العميل</th>
                                                <th>موبيل</th>
                                                <th>موبيل2</th>
                                                <th>العنوان</th>
                                                <th>مدفوع العميل</th>
                                                  <th>أحدث ملاحظة</th>
                                                  
                                                    <th>حالة المكالمة </th>
                                                 <th>حضور المضحى</th>
                                                 <th>توصيل</th>
                                                 <th>تبرع</th>
                                                 <th>مشاهدة الذبح</th>
                                                 <th>الملحق المحجوز </th>
                                                 <th>إيداع ثلاجة</th>
                                                
                                            
                                            </tr>
                                        
                                        
                                        <?array_push($u_adhya,$get_info->code);}?>
                                            <tr>
                                                <td>
                                                  <div class="d-flex">
                                                      
                                           
                                                      
												
												  
										
														
														<a href="#" data-bs-toggle="modal" data-bs-target="#Modaltransfer{{$g->id}}" title="المكالمات">
														    <span class="me-2 oi-icon bgl-success">
														<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<g clip-path="url(#clip23)">
															<path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#2BC155"></path>
															<path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#2BC155"></path>
															</g>
															<defs>
															<clipPath id="clip23">
															<rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
															</clipPath>
															</defs>
														</svg>
													</span>
														    
														</a>
														
														            <!-- Modal transfer-->
                                    <div class="modal fade" id="Modaltransfer{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="callcenter_action">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> متابعة </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                                    <div>
                                                        <label for=""> عنوان المكالمة</label>
                    <select class="form-control "  id="actions" name="action"  Required>
                        <option value="1">
                            مكالمة صادرة
                        </option>
                        <option value="2">
                            مكالمة واردة
                        </option>
              
                        </select>
                        </div>
                        
                        
                                                                <div style="margin-top:10px">
                    <label for="">  توجية الصك</label>
                    <select class="form-control "  id="tcall" name="tcall"  Required>
                        <option value="1">
                           لا شئ
                        </option>
                        <option value="2">
                           توصيل
                        </option>
                        <option value="3">
                          تبرع
                        </option>
                     
                        
                         <option value="5">
                          ايداع ثلاجة
                        </option>
              
                        </select>
                        </div>
                        
                        
                                  
                                                                <div style="margin-top:10px">
                    <label for=""> حالة المكالمة</label>
                    <select class="form-control "  id="c_call" name="c_call"  Required>
                        <option value="تم الرد">
                           تم الرد 
                        </option>
                        <option value="مغلق">
                           مغلق
                        </option>
                        <option value="غير متاح">
                          غير متاح
                        </option>
                          <option value="لم يرد">
                          لم يرد 
                        </option>
                        
                        
              
                        </select>
                        </div>
                        
                        
                                                    <div style="margin-top:10px">
                    <label for="">  مشاهدة الذبح </label>
                    <select class="form-control "  id="c_view" name="c_view"  >
                        <option value=" ">
                             مشاهدة الذبح
                        </option>
                        <option value="نعم">
                           نعم
                        </option>
                        <option value="لا">
                          لا 
                        </option>
                        
                        
                        
              
                        </select>
                        </div>
                        
                        
<div class="parent2">
    <?

    $get_sak = DB::table('adahyt')->where('code',$get_info->code)->first()->sak_c;
     $selectedParts = DB::table('adahy_acc')
    ->where('code_adahy', $g->ad_id)
    ->pluck('name')
    ->toArray();
    if($get_sak > 1){ ?>

<!-- كارع4,كارع3,كارع1 ,كارع2-->
<!-- المخ ,العكوة ,الطحال-->
       <input type="hidden" name="rec" value="{{$g->rec}}">
       <input type="hidden" name="adahyId" value="{{$g->ad_id}}">
        <label for="">  ملحقات الأضحية</label>
        <select class="multi-select" id="options{{$g->id}}" multiple="multiple" name="parts[]" style="margin-top: 15px; width: 100%; border-radius: 5px; border-color: #ebebeb;">
            @php
                $allParts = ['كارع1', 'كارع2', 'كارع3', 'كارع4', 'العكوة', 'المخ', 'الطحال'];
            @endphp
            @foreach($allParts as $part)
                <option value="{{ $part }}" 
                    @if(in_array($part, $selectedParts)) disabled @endif>
                    {{ $part }}
                </option>
            @endforeach
        </select>
       <script>
        // Initialize Select2
        $(document).ready(function() {
            $('#options{{$g->id}}').select2({
                placeholder: 'Select options',
                allowClear: true
            });
        });
    </script>
              							
              							
              							<?}?>
            						</div>
                        
                   
                        
                                      
                     
                        <div style="margin-top:10px">
                        <label for="">  ملاحظات</label>
                        <textarea class="form-control" id="dis" name="description" rows="4" placeholder="ملاحظات">{{ $g->description }}</textarea>
                        </div>
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
											
											
											
											
											
											
											
											
                								<a href="#" data-bs-toggle="modal" data-bs-target="#Modaltransfers{{$g->id}}" title="حضور المضحي">
														    <span class="me-2 oi-icon bgl-success" style="background: #2196F3;">
														<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<g clip-path="url(#clip23)">
															<path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#fff"></path>
															<path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#fff"></path>
															</g>
															<defs>
															<clipPath id="clip23">
															<rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
															</clipPath>
															</defs>
														</svg>
													</span>
														    
														</a>
														
														            <!-- Modal transfer-->
                                    <div class="modal fade" id="Modaltransfers{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="reception_action">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> متابعة </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                     
                        
                        
                                                                <div style="margin-top:10px">
                    <select class="form-control "  id="tcall" name="tcall"  Required>
                        <option value="1">
                           لا شئ
                        </option>
                     
                        
                         <option value="6">
                          حضور المضحى 
                        </option>
                        
                              <option value="60">
                          انصراف المضحى
                        </option>
              
                        </select>
                        </div>
                        
                        
                                  
                                                             
                              <div style="margin-top:10px">
                                 <textarea class="form-control" id="dis" name="description" rows="4" placeholder="ملاحظات">{{ $g->description }}</textarea>
                                   </div>
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>	
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    			<a href="#" data-bs-toggle="modal" data-bs-target="#Modaltransferse{{$g->id}}" title="تعديل البيانات">
														    <span class="me-2 oi-icon bgl-success" style="background: #FF9800;">
														<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
															<g clip-path="url(#clip23)">
															<path d="M11.4238 16.2304C11.2206 15.8106 11.4001 15.3027 11.8199 15.0996C12.9878 14.5376 13.9764 13.6642 14.6805 12.5707C15.4016 11.4501 15.7842 10.1501 15.7842 8.80952C15.7842 4.96369 12.6561 1.83556 8.81022 1.83556C4.96439 1.83556 1.83626 4.96369 1.83626 8.80952C1.83626 10.1501 2.21881 11.4501 2.93652 12.5741C3.6373 13.6676 4.62923 14.541 5.7972 15.103C6.21699 15.3061 6.39642 15.8106 6.19329 16.2337C5.99017 16.6535 5.48574 16.833 5.06256 16.6298C3.61022 15.9324 2.38131 14.8491 1.51126 13.4882C0.617512 12.0934 0.143554 10.4751 0.143554 8.80952C0.143554 6.49389 1.04408 4.31707 2.68262 2.68192C4.31777 1.04337 6.4946 0.142853 8.81022 0.142854C11.1258 0.142854 13.3027 1.04337 14.9378 2.68192C16.5764 4.32046 17.4769 6.4939 17.4769 8.80952C17.4769 10.4751 17.0029 12.0934 16.1058 13.4882C15.2324 14.8457 14.0034 15.9324 12.5545 16.6298C12.1313 16.8296 11.6269 16.6535 11.4238 16.2304Z" fill="#fff"></path>
															<path d="M12.1045 9.2598C12.2704 9.42569 12.3516 9.64235 12.3516 9.85902C12.3516 10.0757 12.2704 10.2924 12.1045 10.4582L9.97506 12.5877C9.66361 12.8991 9.25059 13.0684 8.81387 13.0684C8.37715 13.0684 7.96074 12.8957 7.65267 12.5877L5.52324 10.4582C5.19147 10.1265 5.19147 9.59157 5.52324 9.2598C5.85501 8.92803 6.38991 8.92803 6.72168 9.2598L7.9709 10.509L7.9709 5.69834C7.9709 5.23116 8.35007 4.85199 8.81725 4.85199C9.28444 4.85199 9.66361 5.23116 9.66361 5.69834L9.66361 10.5124L10.9128 9.26319C11.2378 8.93142 11.7727 8.93142 12.1045 9.2598Z" fill="#fff"></path>
															</g>
															<defs>
															<clipPath id="clip23">
															<rect width="17.3333" height="17.3333" fill="white" transform="matrix(-9.93477e-08 1 1 9.93477e-08 0.143555 0.142853)"></rect>
															</clipPath>
															</defs>
														</svg>
													</span>
														    
														</a>
														
														            <!-- Modal transfer-->
                                    <div class="modal fade" id="Modaltransferse{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="edit_res_action">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> تعديل </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                     
                        
                        
                                                                <div style="margin-top:10px">
                                                                    <h5 for="">رقم الهاتف</h5>
               <input type="text" name="mob" class="form-control" required="required" value="{{$g->mobile}}">
                        </div>
                        
                                                                      <div style="margin-top:10px">
                                                          <h5 for="">رقم هاتف اخر </h5>
               <input type="text" name="mob2" class="form-control" required="required" value="{{$g->mobile2}}">
                        </div>
                        
                                                                                <div style="margin-top:10px">
                                                            <h5 for="">رقم الارضي </h5>
               <input type="text" name="mobile3" class="form-control"  value="{{$g->mobile3}}" placeholder="الرقم الأرضي">
                        </div>        
                                  
                                                             
                              <div style="margin-top:10px">
                          <h5 for="">  العنوان</h5>
                                <input type="text" name="add" class="form-control" required="required" value="{{$g->address}}"> 
                                   </div>
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>	
													</div>  
                                                </td>
                                          <td>
                                           <a href="#" onclick="window.open('/com/{{$g->id}}','popup','width=783,height=475,scrollbars=no,resizable=no,toolbar=no,directories=no,location=no,menubar=no,status=no,left=350,top=50'); return false">
         <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M27 7.88883C27 5.18897 24.6717 3 21.8 3C17.4723 3 10.5277 3 6.2 3C3.3283 3 1 5.18897 1 7.88883V23.7776C1 24.2726 1.31721 24.7174 1.80211 24.9069C2.28831 25.0963 2.8473 24.9912 3.2191 24.6417C3.2191 24.6417 5.74629 22.2657 7.27769 20.8272C7.76519 20.3688 8.42561 20.1109 9.11591 20.1109H21.8C24.6717 20.1109 27 17.922 27 15.2221V7.88883ZM24.4 7.88883C24.4 6.53951 23.2365 5.44441 21.8 5.44441C17.4723 5.44441 10.5277 5.44441 6.2 5.44441C4.7648 5.44441 3.6 6.53951 3.6 7.88883V20.8272L5.4382 19.0989C6.4132 18.1823 7.73661 17.6665 9.11591 17.6665H21.8C23.2365 17.6665 24.4 16.5726 24.4 15.2221V7.88883ZM7.5 15.2221H17.9C18.6176 15.2221 19.2 14.6745 19.2 13.9999C19.2 13.3252 18.6176 12.7777 17.9 12.7777H7.5C6.7824 12.7777 6.2 13.3252 6.2 13.9999C6.2 14.6745 6.7824 15.2221 7.5 15.2221ZM7.5 10.3333H20.5C21.2176 10.3333 21.8 9.7857 21.8 9.11104C21.8 8.43638 21.2176 7.88883 20.5 7.88883H7.5C6.7824 7.88883 6.2 8.43638 6.2 9.11104C6.2 9.7857 6.7824 10.3333 7.5 10.3333Z" fill="#4f7086"></path>
									</svg>
                </a> 
                
                
                
                                          </td>
                                          
                                                 <td>
                                              <?
                                              
                                              if($g->retype > 0){
                                              ?>
                                              {{getcase1($g->retype)}}
                                              <?}else{?>
                                               {{getcase2($g->code)}}
                                              <?}?>
                                          </td>
                                        
                                        

                                               
                                                
                                                <?
                                                $get_user = DB::connection('mysql2')->table('reservation')->where('mobile',$g->mobile)->count();
                                                $gviewc = DB::table('callcenter')->where('re_id',$g->id)->whereNotNull('view')->count();
                                               
                                                if($gviewc > 0){
                                                    $view = DB::table('callcenter')->where('re_id',$g->id)->whereNotNull('view')->orderBy('id','desc')->first()->view;

                                                }
                                                
                                                //  $gacc = DB::table('callcenter')->where('re_id',$g->id)->whereNotNull('acc')->count();
                                                // if($gacc > 0){
                                                //  $acc = DB::table('callcenter')->where('re_id',$g->id)->whereNotNull('acc')->orderBy('id','desc')->first()->acc;
                                                // }
                                                $acc = "";
                                                $parts = DB::table('adahy_acc')->where('r_id',$g->rec)->select('name')->distinct()->get();
                                                foreach ($parts as $part){
                                                $acc .= $part->name." + ";   
                                                }
                                                // $parts= DB::table('adahy_acc')->where('r_id',$g->def)->get();
                                                // if($parts->count() > 0){
                                                //     foreach($parts as $part){
                                                //     $acc = $part->name;
                                                //     }
                                                // }else{
                                                // $acc = 0;
                                                // }
                                         
                                                
                                                ?>
                                                
                                                <td>{{$g->name}}
                                                <?
                                                if($get_user == 0){
                                                ?>
                                                <span class="badge badge-danger">مضحى جديد</span>
                                                <?}?>
                                                </td>
                                                <td>{{$g->mobile}}</td>
                                                <td>{{$g->mobile2}}</td>
                                                <td>{{$g->address}}</td>
                                                <td>{{$l_total}}</td>
                                                
                                                {{-- <td>{{get_tcall($g->id,7)}}</td> --}}
                                                <td title ="{{ $g->description && strlen(trim($g->description)) > 0 ? $g->description  : '-' }}" >
                                                    @php
                                                        $data = $g->description;
                                                    @endphp
                                                    {{ $data && strlen(trim($data)) > 0 ? 'يوجد ملاحظات' : '-' }}
                                                </td>
                                              
                             <td>{{get_tcall($g->id,8)}}</td>  
                            <td>{{get_tcall($g->id,6)}}</td>                     
                          <td>	<a href="#" data-bs-toggle="modal" data-bs-target="#Moda{{$g->id}}">{{get_tcall($g->id,2)}}</a>
                          
                          
                          								            <!-- Modal transfer-->
                                    <div class="modal fade" id="Moda{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="edit_R">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                  <input type="hidden" name="type" id="rec_id" value="2">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">إزالة </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                     
                  <span>
                      سوف يتم المسح ؟
                  </span>      
                        
    
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>	
                          </td>
                            <td>	<a href="#" data-bs-toggle="modal" data-bs-target="#Modas{{$g->id}}">{{get_tcall($g->id,3)}}</a>
                          
                          
                          								            <!-- Modal transfer-->
                                    <div class="modal fade" id="Modas{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="edit_R">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                  <input type="hidden" name="type" id="rec_id" value="3">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">إزالة </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                     
                  <span>
                      سوف يتم المسح ؟
                  </span>      
                        
    
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>	
                          </td>
                          
                     @php
                            $checkView = DB::table('reservation')->where('id', $g->id)->first()->view;
                            $view = null;
                            $gviewc = DB::table('callcenter')->where('re_id', $g->id)->whereNotNull('view')->count();
                            if ($gviewc > 0) {
                                $view = DB::table('callcenter')->where('re_id', $g->id)->whereNotNull('view')->orderBy('id', 'desc')->first()->view;
                            }
                            $displayView = '';
                            if ($checkView === 'yes' &&  $view === 'نعم') {
                                $displayView = 'نعم';
                            } elseif ($checkView === 'yes' &&  $view === 'لا') {
                                $displayView = 'نعم';
                            } elseif ($checkView === '0' && $checkView ==='نعم') {
                                $displayView = 'نعم';
                            } elseif ($view === 'لا' && $checkView === 'yes') {
                                $displayView = 'نعم';
                            } elseif ($view === null && $checkView ==='yes') {
                                $displayView = 'نعم';
                            }elseif ($view === 'نعم' && $checkView ==="0") {
                                $displayView = 'نعم';
                            } else {
                                $displayView = '';
                            }
                        @endphp 
                         <td>{{ $displayView }}</td>
                          <td>

                            @if ($acc)
                            <span class="badge badge-primary">{{$acc}}</span>    
                            @else
                            <span class="badge badge-danger">لا يوجد</span>
                            @endif
                          </td>
                          
                              <td>	<a href="#" data-bs-toggle="modal" data-bs-target="#Modass{{$g->id}}">{{get_tcall($g->id,5)}}</a>
                          
                          
                          								            <!-- Modal transfer-->
                                    <div class="modal fade" id="Modass{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="edit_R">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="rec_id" value="{{$g->id}}">
                                                  <input type="hidden" name="type" id="rec_id" value="5">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">إزالة </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                     
                  <span>
                      سوف يتم المسح ؟
                  </span>      
                        
    
                        <div id="show">
                            
                        </div>
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تنفيذ 
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>	
                          </td>
                                              
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                           <tr>
                                                <th style="text-align: center;">Action</th>
                                              
                                                
                                                
                                               
                                                
                                                
                                                <th>اسم العميل</th>
                                                <th>موبيل</th>
                                                <th>موبيل2</th>
                                                
                                            
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 
				</div>
		 
		  {{$get->withQueryString()->links("pagination::bootstrap-4")}}
	
		 
		 </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <!--**********************************
            Footer start
        ***********************************-->
@include('layouts.footer')
        <!--**********************************
            Footer end
        ***********************************-->

		


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/{{$theme1}}/vendor/global/global.min.js"></script>
	<script src="/{{$theme1}}/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="/{{$theme1}}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="/{{$theme1}}/vendor/apexchart/apexchart.js"></script>
	<script src="/{{$theme1}}/vendor/nouislider/nouislider.min.js"></script>
	<script src="/{{$theme1}}/vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="/{{$theme1}}/vendor/js/dashboard/dashboard-1.js"></script>
	
	
	 <script src="/{{$theme1}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/{{$theme1}}/js/plugins-init/datatables.init.js"></script>

    <script src="/{{$theme1}}/js/custom.min.js"></script>
	<script src="/{{$theme1}}/js/dlabnav-init.js"></script>
	<script>



	</script>
           	<?
	if(Session::has('thems')){
	 if(Session::get('thems') == 'dark'){
	     ?>
	     <style>
	         .nice-select.wide .list {
    left: 0 !important;
    right: 0 !important;
    color: #000;
}
	     </style>
	            <script>
		jQuery(document).ready(function(){
			setTimeout(function() {
				dezSettingsOptions.version = 'dark';
				new dezSettings(dezSettingsOptions);
			},500)
		});
	</script>
	 
	     <?
	     
	 }   
	}
	    ?> 
	    
	    
<script>
$(document).ready(function(){
     
       $("#action").change(function(){
 var res = $("#action").val();
 if(res == ""){
    $("#show").html(``);  
 }
      if(res == 5){
       $("#show").html(``);   
      }
      
       if(res == 2){
       $("#show").html(`
       <div style="margin-top: 10px;">
          <select  id="freezer" name="freezer" class="form-control" Required>
                                                                                <option value="">
                                                                                    اختر الثلاجة
                                                                                </option>
                                                                              
                                                                                <option value="الهانجر"> 
                                                                                الهانجر
                                                                                </option>
                                                                                
                                                                                     
                                                                                
                                                                                
                                                                                </select>
                                                                                   </div>
                                                                                   <div style="margin-top: 10px;">
                                                           <input type="text" class="form-control" name="rec" id="rec" placeholder="رقم الإيصال" Required>          
                                                                                   </div>
                                                                                   
                             <div style="margin-top: 10px;">
                    
                        <select class="form-control"   id="follower" name="follower"  Required>
                        <option value="">
                        اختر المشرف
                        </option>
                     <? echo $all_f; ?>
                 
                            </select>         
                            </div>                                                           
       `);   
      }
    
    
    
      
         if(res == 3){
       $("#show").html(`
       <div style="margin-top: 10px;">
        <input type="text" class="form-control" name="rip" id="rip" placeholder="مندوب التوصيل " Required>          
                                                                                   </div>
                                                                                
                                                                                   
                             <div style="margin-top: 10px;">
                    
                        <select class="form-control"   id="follower" name="follower"  Required>
                        <option value="">
                        اختر المشرف
                        </option>
                     <? echo $all_f; ?>
                 
                            </select>         
                            </div>                                                           
       `);   
      }
      
      
      
   if(res == 4){
       $("#show").html(`
        <div style="margin-top: 10px;">
        <input type="text" class="form-control" name="t_name" id="t_name" placeholder="جهة التبرع  " Required>          
                                                                                   </div>
                                                                                   
                                                                                        <div style="margin-top: 10px;">
        <input type="text" class="form-control" name="t_dis" id="t_dis" placeholder="تفاصيل التبرع  " Required>          
                                                                                   </div>
       `);   
      }
      
      
        
      
      
                
      
      
  

      

     });
});
</script>

    <script>
        // jQuery code to initialize Select2
        $(document).ready(function() {
            $('.multi-select').select2({
                placeholder: 'Select options',
                allowClear: true
            });
        });
    </script>	 
    <script>
function activateTooltips() {
			// تدمير أي تولتيب موجود مسبقًا لتجنّب التكرار
			document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
				if (bootstrap.Tooltip.getInstance(el)) {
					bootstrap.Tooltip.getInstance(el).dispose();
				}
				new bootstrap.Tooltip(el);
			});
		}

		document.addEventListener("DOMContentLoaded", function () {
			activateTooltips();
		});
</script> 
	
</body>
</html>