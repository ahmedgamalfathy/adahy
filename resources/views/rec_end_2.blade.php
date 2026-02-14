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

<style>
    .table {color: #000000;}
    .table-striped > tbody > tr:nth-of-type(odd){
    --bs-table-accent-bg: var(--bs-table-striped-bg);
    color: #000000;
    font-weight: bold;
    font-size: 17px;
}
.table td{color: #000000; font-weight: bold;font-size: 17px;}
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
						    الأضاحى
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    الصكوك    
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
									
								<button type="button" class="btn btn-whatsapp">
								    تحميل أكسل
								     <span class="btn-icon-end"><i class="fa fa-download"></i></span>
                                </button>	
									
									
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
                 
                 
                 
                 <form method="get" action="rec_end">
                                                                 
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
                                        $sak_price = sak::where('name',$get_info->sak)->first()->price;
                                        $sak_price2 = sak::where('name',$get_info->sak)->first()->price2;
                                        $adahy_type_info = adahy_type::where('name',$get_info->adahy)->first();
                                        
                                      $l_total =(float) @treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total;
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
                                              <span class="badge light badge-danger">{{$get_info->code}}</span>
                                              </a>
                                               - 
                                            متبقى
                                            <span class="badge light badge-success">{{$get_info->free}}</span>
                                            -
                                            محجوز
                                            <span class="badge light badge-warning">{{$get_info->reservation}}</span>
                                            </td>
                                        </tr>
                                        
                                                      <tr>
                                                <th style="text-align: center;">Action</th>
                                          
                                               
                                                
                                                 <th>إيصال</th>
                                                  <th>دفتر</th>
                                                <th>ملاحظة تسليم</th>
                                                
                                                
                                                <th>اسم العميل</th>
                                                <th>موبيل</th>
                                                <th>موبيل2</th>
                                                <th>المنطقة</th>
                                                <th>العنوان</th>
                                                <th>مقدار التبرع</th>
                                                
                                                <th>حساب الذبيحة </th>
                                                <th>مصروفات الذبح</th>
                                                <th>مدفوعات العميل </th>
                                                <th>الحساب النهائى</th>
                                                
                                                <th>الحساب</th>
                                            
                                            </tr>
                                        
                                        
                                        <?array_push($u_adhya,$get_info->code);}?>
                                            <tr>
                                                <td>
                                 تم التسليم
                                                </td>
                               
                                        
                                                
                                                <td>{{$g->rec}}</td>
                                                <td>{{$g->def}}</td>
                                                <td>{{$g->rectype}}</td>
                                                
                                                
                                                <td>{{$g->name}}</td>
                                                <td>{{$g->mobile}}</td>
                                                <td>{{$g->mobile2}}</td>
                                                <td>{{$g->zone}}</td>
                                                <td>{{$g->address}}</td>
                                                <td>{{$g->qty}}</td>
                                                 <td>{{(float)$get_info->kilo_s * $adahy_type_info->price}}</td>
                                                <td>{{(float)$sak_price2}}</td>
                                                <td>{{$l_total}}</td>
                                                 <? $total = (float)$get_info->kilo_s * $adahy_type_info->price + (float)$sak_price2 - $l_total ;?>
                                                <td <? if($total < 0){?>style="color:red"<?}?>>
                                                   
                                                 {{number_format((float)$total, 2, '.', '')}}   
                                                    </td>
                                                <td>
                                                    <div class="d-flex">
                                                  
                                                    <a href="/treasury_sak/{{$g->id}}" class="btn btn-primary light me-1 px-3" target="_blank">
                               <i class="flaticon-022-copy"></i>
                                    </a>
                                    </div>
                                                </td>
                         
                                              
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                    
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
                                                                                
                                                                                       
                                                                                <option value="جديلة"> 
                                                                                جديلة
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

	  
	
</body>
</html>