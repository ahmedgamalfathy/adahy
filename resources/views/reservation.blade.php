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
  $theme1 = "theme1";
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
						    حجز صك   
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
          <div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon">
								   {{$get_info->id}}- {{$get_info->adahy}}/{{$get_info->sak}}
								</span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{$get_info->free}}</span> </h4>
										<p class="m-0">متبقى</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{$get_info->reservation}}</span> </h4>
										<p class="m-0">محجوز</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-googleplus">
								<span class="s-icon">ثمن الصك</span>
							</div>
							<div class="row">
								<div class="col-12 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{$sak_price}}</span> </h4>
										<p class="m-0">هذا الثمن تقريبى</p>
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
					
							<div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon">حجز صك</span>
							</div>
							<div class="row">
								<div class="col-12 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center" style="width: 90%;">
									    @if($get_info->free != 0)
									   <form method="get" action="/reservationd">  
								<div class="input-group mb- input-primary" style="padding-left: 5%;">
								   
								        
								        <input type="hidden" name="id" value="{{$id}}" >
								        <input type="hidden" name="types" value="10" >
                                            <input type="text" class="form-control" name="mob" required="required" maxlength="11" onkeypress="return event.charCode >= 46 && event.charCode <= 58"   placeholder="رقم موبيل العميل">
											<input type="submit"  class="input-group-text" style="width: 33%;" value="حجز">
											
                                        </div>
                                          </form>  
                                          @else
                                           <button type="button" class="btn btn-danger mb-2" >
                                    لا يوجد صكوك متاحة
                                    </button>
                                          
                                          @endif
									</div>
								</div>
							
							</div>
						</div>
					</div>

                                    <!-- Modal -->
                             
		 
		 
		 		 <?
		 $c_per = DB::table('per')->where('page','sak_table')->where('u_id',Auth::user()->id)->count();
		 if($c_per > 0){
		 ?>
		 
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
                                    <table class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                  <th>Action</th>
                                                <th>رقم الأضحية</th>
                                                
                                                <th>نوع الأضحية</th>
                                                <th>نوع الصك</th>
                                                <th>يوم الذبح</th>
                                                <th>اسم العميل</th>
                                                <th>موبيل</th>
                                                <th>موبيل2</th>
                                                <th>المنطقة</th>
                                                <th>العنوان</th>
                                                <th>تفاصيل التبرع</th>
                                                
                                                <th>حساب الذبيحة </th>
                                                <th>مصروفات الذبح</th>
                                                <th>مدفوعات العميل </th>
                                                <th>الحساب النهائى</th>
                                                
                                                <th>الحساب</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get as $g)
                                              <?
                                        $get_info = adahyt::where('id',$g->ad_id)->first();
                                        $sak_price = sak::where('name',$get_info->sak)->first()->price;
                                        $sak_price2 = sak::where('name',$get_info->sak)->first()->price2;
                                        
                                      $l_total =(int) @treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total;
                                        ?>
                                            <tr>
                                                    <td>
                                                  <div class="d-flex">
														<a href="/reservation_E/{{$g->id}}" >
														    <span class="me-2 oi-icon bgl-success">
														    <i class="fa fa-pencil"></i>
														    </span>
														    </a>
														<a href="#" data-bs-toggle="modal" data-bs-target="#Modaldel{{$g->id}}" >
														    
														    <span class="me-2 oi-icon bgl-danger">
														<svg width="18" height="18" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6.57624 0.769646C6.77936 1.18944 6.59993 1.69725 6.18014 1.90038C5.01217 2.46236 4.02363 3.33579 3.31947 4.42928C2.59837 5.54986 2.21582 6.84986 2.21582 8.19048C2.21582 12.0363 5.34394 15.1644 9.18978 15.1644C13.0356 15.1644 16.1637 12.0363 16.1637 8.19048C16.1637 6.84986 15.7812 5.54985 15.0635 4.4259C14.3627 3.33241 13.3708 2.45897 12.2028 1.89699C11.783 1.69387 11.6036 1.18944 11.8067 0.766262C12.0098 0.34647 12.5143 0.167042 12.9374 0.370167C14.3898 1.06756 15.6187 2.1509 16.4887 3.51183C17.3825 4.90663 17.8564 6.52486 17.8564 8.19048C17.8564 10.5061 16.9559 12.6829 15.3174 14.3181C13.6822 15.9566 11.5054 16.8571 9.18978 16.8571C6.87415 16.8571 4.69733 15.9566 3.06217 14.3181C1.42363 12.6795 0.523111 10.5061 0.523111 8.19048C0.523111 6.52486 0.99707 4.90663 1.89421 3.51183C2.76764 2.15428 3.99655 1.06756 5.44551 0.370167C5.86868 0.170427 6.37311 0.34647 6.57624 0.769646Z" fill="#FF2E2E"></path>
															<path d="M5.89551 7.7402C5.72962 7.57431 5.64837 7.35765 5.64837 7.14098C5.64837 6.92431 5.72962 6.70765 5.89551 6.54176L8.02493 4.41233C8.33639 4.10088 8.74941 3.93161 9.18613 3.93161C9.62285 3.93161 10.0393 4.10426 10.3473 4.41233L12.4768 6.54176C12.8085 6.87353 12.8085 7.40843 12.4768 7.7402C12.145 8.07197 11.6101 8.07197 11.2783 7.7402L10.0291 6.49098L10.0291 11.3017C10.0291 11.7688 9.64993 12.148 9.18275 12.148C8.71556 12.148 8.33639 11.7688 8.33639 11.3017L8.33639 6.4876L7.08717 7.73681C6.76217 8.06858 6.22728 8.06858 5.89551 7.7402Z" fill="#FF2E2E"></path>
															</svg>

													</span>
														    
														</a>
														
														            <!-- Modal delete-->
                                    <div class="modal fade" id="Modaldel{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="/del_resv">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="del_id" value="{{$g->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">  إلغاء الحجز</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                                             <span>
                                                                 هل انت متأكد من إلغاء الحجز ؟
                                                             </span>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        مسح
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
														
														<a href="#" data-bs-toggle="modal" data-bs-target="#Modaltransfer{{$g->id}}">
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
                                                                <form method="post" action="/transfer_resv">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="del_id" value="{{$g->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">  نقل الحجز</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                               <input type="text" class="form-control" onkeypress="return event.charCode >= 46 && event.charCode <= 58" required="required" name="code"
                               placeholder="رقم الأضحية الجديد"/>   
                               <br>
                         <input type="text" class="form-control" onkeypress="return event.charCode >= 46 && event.charCode <= 58" value="{{$l_total}}" required="required" name="pay"
                               placeholder="ثمن الحجز"
                               />   
                                                             
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        نقل الحجز
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
														
													</div>  
                                                </td>
                                                <td>{{$get_info->code}}</td>
                                                <td>{{$get_info->adahy}}</td>
                                                <td>{{$get_info->sak}}</td>
                                                <td>{{$get_info->days}}</td>
                                                <td>{{$g->name}}</td>
                                                <td>{{$g->mobile}}</td>
                                                <td>{{$g->mobile2}}</td>
                                                <td>{{$g->zone}}</td>
                                                <td>{{$g->address}}</td>
                                                <td>{{$g->note}}</td>
                                                 <td>0</td>
                                                <td>{{(int)$sak_price2}}</td>
                                                <td>{{@treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total}}</td>
                                                <td>{{(int)$sak_price2 - @treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total}}</td>
                                                <td>
                                                    <a href="/treasury_sak/{{$g->id}}" target="_blank">
                                <button type="button" class="btn btn-rounded btn-primary"><span class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i>
                                    </span></button>
                                    </a>
                                                </td>
                         
                                              
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Action</th>
                                                 <th>رقم الأضحية</th>
                                                <th>نوع الأضحية</th>
                                                <th>نوع الصك</th>
                                                <th>يوم الذبح</th>
                                                <th>اسم العميل</th>
                                                <th>موبيل</th>
                                                <th>موبيل2</th>
                                                <th>المنطقة</th>
                                                <th>العنوان</th>
                                                <th>تفاصيل التبرع</th>
                                                
                                                <th>حساب الذبيحة </th>
                                                <th>مصروفات الذبح</th>
                                                <th>مدفوعات العميل </th>
                                                <th>الحساب النهائى</th>
                                                
                                                <th>الحساب</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 
				</div>
	
		 <?}?>
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
	    
	    



	  
	
</body>
</html>