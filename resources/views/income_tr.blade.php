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
    @php $theme1 = "theme1";
  
 // Http::get('https://hijri.habibur.com/api01/date/', ['date' => date("Y-m-d", strtotime($g->created_at))])
  
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
  @endphp
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
						    الإيرادات
						</a></li>
					 
				/
						
							
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						   	{{$get_info->name}}
						</a></li>
						
					
					</ol>
                </div>
                <!-- row -->
             
          <div class="col-xl-8 col-xxl-8 col-sm-8">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon">
								   رصيد  بند الإيرادات
							-{{$get_info->name}}
								</span>
							</div>
							<div class="row">
								<div class="col-3 border-end">
								     <a href="/treasures/{{$id}}">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{@$get_t->total}}</span> </h4>
										<p class="m-0">
										    رصيد البند
										</p>
									</div>
									</a>
								</div>
								<div class="col-3">
								 
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{@$total_d}}</span> </h4>
										<p class="m-0">
										    اجمالى المنصرف
										</p>
									</div>
								
								</div>
								
										<div class="col-3">
									
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">{{@$total_m}}</span> </h4>
										<p class="m-0">
										    اجمالى الوارد
										</p>
									</div>
									
								</div>
								
								
								
						
								
								
							</div>
						</div>
					</div>
					
					
			
			
					@php
						$c1 = 1;//صرف
						$c2 = 1;//استلام
						@endphp

                    
                    
                    <div class="col-xl-4 col-xxl-4 col-sm-4">
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
				<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block " data-bs-toggle="modal" data-bs-target="#exampleModalCenter">استلام نقدية<i class="las la-signal ms-3 scale5"></i></a>
							@endif				    	
										    	
										    	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/add_income_d">
                                        @csrf
                                        
                                        <input type="hidden" name="id" value="{{$get_info->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> استلام نقدية  </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                   
                         
                                            
                                            <div id="showd"></div>
                                       
                                            
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
                                                    <button type="submit" id="follow" class="btn btn-primary">
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
                                        <form method="post" action="/add_income_m">
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
                                      
              
                                             <div id="showm"></div>
                                            
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
                                                    <button type="submit" id="follow1" class="btn btn-primary">
                                                        إضافة
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
                                    <table id="example" class="display dataTable" style="width: 100%;">
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
                                                
                                                <td>@if($g->type == 1)
                                                		<a href="javascript:void(0);" class="btn btn-danger d-sm-inline-block ">
										        مدين
										        </a> 
                                                @else
                                               								    
				<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block " >
				    دائن
				    </a> 
                                                }
                                                </td>
                                                 <td>{{$g->reason_t}}</td>
                                                <td>@if($g->type == 1){{$g->amount}}@else 0 @endif</td>
                                                <td>@if($g->type != 1){{$g->amount}}@else 0 @endif</td>
                                               
                                                <td>{{$g->total}}</td>
                                                <td>{{$g->nots}}</td>
                                               
                                         
                                                <td>{{$g->agent}}</td>
                                                <td>
                                <a class="btn btn-dark light me-3" href="javascript:void(0);"><i class="las la-print me-3 scale5"></i></a>
                                    </a>
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
	
           	@php
	if(Session::has('thems')){
	 if(Session::get('thems') == 'dark'){
	     @endphp
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
	 
	     @php
	     
	 }   
	}
	    @endphp 
	    
	    
<script>
    $(document).ready(function(){
     
       $("#transm").change(function(){
 var res = $("#transm").val();
 if(res == ""){
    $("#showm").html(``);  
 }
      if(res == 2){
       $("#showm").html(``);   
      }
      
       if(res == 1){
       $("#showm").html(`
         <label class="form-label">الخزينة *</label>

       
       `);   
      }
      
      

     });
});
    
</script>

<script>
    $(document).ready(function(){
     
       $("#transd").change(function(){
 var res = $("#transd").val();
 if(res == ""){
    $("#showd").html(``);  
 }
      if(res == 2){
       $("#showd").html(``);   
      }
      
       if(res == 1){
       $("#showd").html(`
        <label class="form-label">الخزينة *</label>

       
       `);   
      }
      
      

     });
});
    
</script>

<script>
    
    
    jQuery(document).ready(function(){
        
        $("#follow1").click(function(){
  $("#follow1").hide();
   setTimeout(function() {
       $("#follow1").show();
 }, 1000);
});
        
    });
</script>

<script>
    
    
    jQuery(document).ready(function(){
        
        $("#follow").click(function(){
  $("#follow").hide();
   setTimeout(function() {
       $("#follow").show();
 }, 1000);
});
        
    });
</script>
	
</body>
</html>





