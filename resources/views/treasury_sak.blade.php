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
  $theme1 = "theme1";
  use App\Models\agreement;

    function arday($y)
{
 // return $y;
$dayss = strtotime($y);
$x = date("D" , $dayss );


    if($x == "Fri"){return "الجمعة";}
   if($x == "Sat"){return "السبت";}
    if($x == "Sun"){return "الأحد";}
    if($x == "Mon"){return "الإثنين";}
     if($x == "Tue"){return "الثلاثاء";}
    if($x == "Wed"){return "الأربعاء";}
    if($x == "Thu"){return "الخميس";}
  
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
						
							 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						   	{{$get_info->name}}
						</a></li>
					
						<a href="/print/{{$id}}" style="color: #fff;" class="btn btn-primary d-sm-inline-block ">
						   طباعة التقرير
						</a>
					</ol>
                </div>
                <!-- row -->
        
        		
									<div class="col-sm-4" style="direction: rtl;text-align: center;">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title mt-2">
										    الوزن الفعلى
										</h4>
										<div class="d-flex align-items-center mt-3 mb-2" style="direction: rtl;text-align: center;">
											<h2 class="fs-38 mb-0 me-3" style="margin-right: 35% !important;">
									{{(float)$get_info2->kilo_s}}
											   كيلو
											</h2>
											
										</div>
									</div>
								</div>
							</div>
        
							
							<div class="col-sm-4" style="direction: rtl;text-align: center;">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title mt-2">
										    سعر الكيلو
										</h4>
										<div class="d-flex align-items-center mt-3 mb-2" style="direction: rtl;text-align: center;">
											<h2 class="fs-38 mb-0 me-3" style="margin-right: 35% !important;">
											    {{$adahy_type_info->price}}
											</h2>
											
										</div>
									</div>
								</div>
							</div>
					
							
							
							
							     <div class="col-sm-4" style="direction: rtl;text-align: center;">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title mt-2">
										    سعر الصك
										</h4>
										<div class="d-flex align-items-center mt-3 mb-2" style="direction: rtl;text-align: center;">
											<h2 class="fs-38 mb-0 me-3" style="margin-right: 35% !important;">
											    {{(float)$sak_info->price}}
											</h2>
										
										</div>
									</div>
								</div>
							</div>
							
							
          <div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon">
								   كشف حساب الصك  
							-{{$sak_info->name}}
							-{{$get_info->name}}
						
								</span>
							</div>
							<div class="row">
								<div class="col-3 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
                @php
                    // حساب القيمة النهائية
                    $finalValue = (float)$get_info2->kilo_s * $adahy_type_info->price + (float)$sak_info->price2 - $total;
                    // إذا كانت القيمة بين 0 و 1 أو بين 0 و -1 (أي كسور فقط)، خليها صفر
                    if (abs($finalValue) < 1) {
                        $finalValue = 0;
                    }
                @endphp
				<h4 class="m-1"><span class="counter"> {{ $finalValue}}</span> </h4>
										<p class="m-0">
										    الحساب النهائى 
										</p>
									</div>
								</div>
								
									<div class="col-3">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{$total}}</span> </h4>
										<p class="m-0">
										   مدفوعات العميل    
										</p>
									</div>
								</div>
								
								
											<div class="col-3">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{(float)$sak_info->price2}}</span> </h4>
										<p class="m-0">
										     مصروفات الذبح
										</p>
									</div>
								</div>
								
								<div class="col-3">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										  {{(float)$get_info2->kilo_s * $adahy_type_info->price}}  
										</span> </h4>
										<p class="m-0">
										    حساب الذبيحة   
										</p>
									</div>
								</div>
								
								
								
							
							
								
								
							</div>
						</div>
					</div>
					
					
			
				<?
						$c1 = DB::table('per')->where('page','treasury_sak_p1')->where('u_id',Auth::user()->id)->count();//صرف
						$c2 = DB::table('per')->where('page','treasury_sak_p2')->where('u_id',Auth::user()->id)->count();//استلام
						?>
			

                    
                    
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
							<div class="card-body  p-4">
								<div class="media ai-icon">
									<span class="me-3 bgl-success  text-success">
										<svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
											<line x1="12" y1="1" x2="12" y2="23"></line>
											<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
										</svg>
									</span>
									<div class="media-body">
										<h4 class="mb-0">
						@if($c2 > 0)					    
				<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block " data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
				    إستلام نقدية
				    <i class="las la-signal ms-3 scale5"></i></a>
						@endif				    	
										    	
										    	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/new_treasury_sak1">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$get_info->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> إستلام نقدية  </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                       
                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">المبلغ*</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="المبلغ" Required>
                                                   @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                               
                        
                                            
                                            
                                                                                 <div class="mb-12 col-md-12">
                                                <label class="form-label">التفاصيل*</label>
                        <input type="text" class="form-control @error('nots') is-invalid @enderror" name="nots" value="{{ old('nots') }}" placeholder="التفاصيل" >
                                                   @error('nots')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                        
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        إضافة
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
						
						
						@if($c1 > 0)
					<a href="javascript:void(0);" class="btn btn-danger d-sm-inline-block " data-bs-toggle="modal" data-bs-target="#exampleModalCenter1">
										        صرف نقدية
										        <i class="las la-signal ms-3 scale5"></i></a>
										        
										     @endif   
										        
										        		    	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter1">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/new_treasury_sak">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$get_info->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> صرف نقدية  </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                       
                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">المبلغ*</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="المبلغ" Required>
                                                   @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                               
                        
                                            
                                            
                                                                                 <div class="mb-12 col-md-12">
                                                <label class="form-label">التفاصيل*</label>
                        <input type="text" class="form-control @error('nots') is-invalid @enderror" name="nots" value="{{ old('nots') }}" placeholder="التفاصيل" Required>
                                                   @error('nots')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                        
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        إضافة
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
										        
									
						
						
						
						<?
						
						$check_agreement = agreement::where('r_id',$id)->count();
						if($check_agreement > 0){
						?>
						<div style="    margin-top: 10px;">
						 		<span class="badge badge-success" style="    cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModalCenter_rn">
								    تمت الموافقة على التسليم
								</span>   
						    
						</div>
						
						  
										        	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter_rn">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/agreementn">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$get_info->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> 
                                                     غير موافق على التسليم 
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                       
                    <input type="hidden" value="{{$id}}" name="id" id="id" >                    
                                  
                       <span>
                           غير موافق على التسليم للعميل
                       </span>                     
                               
                        
                                            
                                
                                            
                        
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                         رفض تسليم
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
						
										        
										   <?}else{?>
										   	<a href="javascript:void(0);" class="btn btn-info d-sm-inline-block " data-bs-toggle="modal" data-bs-target="#exampleModalCenter_r">
										        موافقة تسليم
										        <i class="las la-signal ms-3 scale5"></i></a>
										   
										   <?}?>
										        
										        	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter_r">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/agreement">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$get_info->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> 
                                                     موافقة تسليم
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                       
                    <input type="hidden" value="{{$id}}" name="id" id="id" >                    
                                  
                       <span>
                          موافقة على تسليم الصك للعميل
                       </span>                     
                               
                        
                                            
                                
                                            
                        
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                         موافقة تسليم
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
									
										</h4>
									</div>
								</div>
							</div>
						</div>
                    </div>
	
		 
		 
		 
		 
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
                                    <table id="example" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>كود</th>
                                                 <th>اليوم</th>
                                                 <th>التاريخ</th>
                                                 
                                                <th>نوع الحركة</th>
                                                <th> الحركة</th>
                                                <th>مدين </th>
                                                <th>دائن </th>
                                                <th>الرصيد </th>
                                                <th>التفاصيل </th>
                                                
                                                <th>الموظف</th>
                                                <th>طباعة</th>
                                           
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get as $g)
                                       
                                            <tr>
                                                <td>{{$g->id}}</td>
                                                <td>{{arday($g->created_at)}}</td>
                                                <td>{{$g->created_at}}</td>
                                                
                                                <td><? if($g->type == 1){?>
                                                		<a href="javascript:void(0);" class="btn btn-danger d-sm-inline-block ">
										        مدين
										        <i class="las la-signal ms-3 scale5"></i></a>
                                                <?}else{?>
                                               								    
				<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block " >دائن<i class="las la-signal ms-3 scale5"></i></a> 
                                                <?}?>
                                                </td>
                                                 <td>{{$g->reason_t}}</td>
                                                <td><? if($g->type == 1){?>{{$g->amount}}<?}else{echo 0;}?></td>
                                                <td><? if($g->type != 1){?>{{$g->amount}}<?}else{echo 0;}?></td>
                                               
                                                <td>{{$g->total}}</td>
                                                <td>{{$g->nots}}</td>
                                                
                                         
                                                <td>{{$g->agent}}</td>
                                                <td>
                                                   
                      <span class="btn-icon-start text-primary"><i class="flaticon-072-printer"></i>
                                    </span>
                                  
                                                </td>
                         
                                              
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                           <th>كود</th>
                                           <th>اليوم</th>
                                                 <th>التاريخ</th>
                                                 
                                                <th>نوع الحركة</th>
                                                <th> الحركة</th>
                                                <th>مدين </th>
                                                <th>دائن </th>
                                                <th>الرصيد </th>
                                                <th>التفاصيل </th>
                                                
                                                <th>الموظف</th>
                                                <th>طباعة</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                 
				</div>
	
		 
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