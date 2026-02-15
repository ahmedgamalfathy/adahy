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
  use App\Models\opt;
   date_default_timezone_set("Africa/Kampala");  
  $all_f = "";
  $all_b = "";
  foreach($followers as $v){
      $all_f .='<option value="'.$v->name.'">'.$v->name.'</option>'; 
  }
  
    foreach($butchers as $b){
      $all_b .='<option value="'.$b->name.'">'.$b->name.'</option>'; 
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
	<style>
        .card-header {
	padding: 1.0rem 1.5rem !important;

    #example2_wrapper .dataTables_scrollBody {
max-height: 700px !important; // بحسب الإرتفاع الذي أريده للجدول
}
}

thead, tbody, tfoot, tr, td, th {
        white-space: normal !important;
        white-space-collapse: collapse !important;
        text-wrap-mode: wrap !important;
}

@media only screen and (max-width: 575px) {
  .card-body {
    padding: 20px 10px;
  }
  .dataTables_length {
	display: inline-block;
	width: 40%;
  }
  .dataTables_filter {
        display: inline-block;
	width: 25%;
  }
   table.dataTable thead th {
	font-size: 14px !important;
        padding: 10px 15px !important;
  }
   table#example {
	padding: 0rem 0 10px 0;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.previous, .dataTables_wrapper .dataTables_paginate .paginate_button.next {
	height: 30px;
	width: 50px;
	line-height: 20px;
  }
 .dataTables_wrapper .dataTables_paginate .paginate_button.previous i, .dataTables_wrapper .dataTables_paginate .paginate_button.next i {
	font-size: 20px;
	padding: 5px 0px;
	margin: 0px;
  }
  .dataTables_wrapper .dataTables_paginate .paginate_button.previous i, .dataTables_wrapper .dataTables_paginate .paginate_button.next i {
	font-size: 20px;
	padding: 5px 0px;
	margin: 0px;
  }
 .dataTables_wrapper .dataTables_paginate span .paginate_button {
	height: 30px;
	width: 50px;
	line-height: 30px;
 }
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
						    التشغيل
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						  الجزارة
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
                <div class="row">
		   <!-- Button trigger modal -->
                                 <div class="row invoice-card-row">
					<div class="col-xl-3 col-xxl-6 col-sm-6 d-none d-sm-block">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg width="33px" height="32px">
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"></path>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num">
									    	    {{DB::table('adahyt')->count();}}
									</h2>
									<span class="text-white fs-18">
									    عدد الأضاحى
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6 d-none d-sm-block">
						<div class="card bg-success invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg width="35px" height="34px">
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"></path>
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"></path>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num"> 
										    {{DB::table('opt')->whereIN('type',[1,2,3,4])->count()}}
									</h2>
									<span class="text-white fs-18">
									    مرحلة الجزارة
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6 d-none d-sm-block">
						<div class="card bg-info invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg width="35px" height="34px">
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M33.002,9.728 C31.612,6.787 29.411,4.316 26.638,2.583 C22.781,0.179 18.219,-0.584 13.784,0.438 C9.356,1.454 5.585,4.137 3.178,7.989 C0.764,11.840 -0.000,16.396 1.023,20.825 C2.048,25.247 4.734,29.013 8.584,31.417 C11.297,33.110 14.409,34.006 17.594,34.006 L17.800,34.006 C20.973,33.967 24.058,33.050 26.731,31.363 C27.509,30.872 27.735,29.849 27.243,29.072 C26.751,28.296 25.727,28.070 24.949,28.561 C22.801,29.922 20.314,30.660 17.761,30.693 C15.141,30.726 12.581,30.002 10.346,28.614 C7.241,26.675 5.080,23.647 4.262,20.088 C3.444,16.515 4.056,12.850 5.997,9.748 C10.001,3.353 18.473,1.401 24.876,5.399 C27.110,6.793 28.879,8.779 29.996,11.143 C31.087,13.447 31.513,16.004 31.227,18.527 C31.126,19.437 31.778,20.260 32.696,20.360 C33.607,20.459 34.432,19.809 34.531,18.892 C34.884,15.765 34.352,12.591 33.002,9.728 L33.002,9.728 Z"></path>
									<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M23.380,11.236 C22.728,10.585 21.678,10.585 21.026,11.236 L17.608,14.656 L14.190,11.243 C13.539,10.592 12.488,10.592 11.836,11.243 C11.184,11.893 11.184,12.942 11.836,13.593 L15.254,17.006 L11.836,20.420 C11.184,21.071 11.184,22.120 11.836,22.770 C12.162,23.096 12.588,23.255 13.014,23.255 C13.438,23.255 13.864,23.096 14.190,22.770 L17.608,19.357 L21.026,22.770 C21.352,23.096 21.777,23.255 22.203,23.255 C22.629,23.255 23.054,23.096 23.380,22.770 C24.031,22.120 24.031,21.071 23.380,20.420 L19.962,17.000 L23.380,13.587 C24.031,12.936 24.031,11.887 23.380,11.236 L23.380,11.236 Z"></path>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num">
									    	    {{DB::table('opt')->count();}}
									</h2>
									<span class="text-white fs-18"> 
								مرحلة التشغيل
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-6 col-sm-6">
				
							<div class="card" style="
    padding: 15px;
    background: aliceblue;
    direction: rtl;
">
                          
                              <form>
                                        <div class="mb-3">
                                            <input type="text" name="code" class="form-control input-default " placeholder="رقم الأضحية">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" style="    width: 100%;" class="btn btn-warning" value="بحث">
                                        </div>
                                    </form>
                        </div>
                        
                        
					</div>
				</div>
                              
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                             
		
		 </div>
		 
		 
		 
		 
		 
		 
		    <div class="row m-0 p-0">
                    <div class="col-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    بيانات الجدول
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table  id="example2" class="display" style="width: 100%;min-width: 845px;">
                                        <thead>
                                            <tr>
                                                
                                                <th>رقم الأضحية</th>
                                                <th>نوع الأضحية</th>
                                                <th>نوع الصك</th>
                                                <th>يوم الذبح</th>
                                                <th>الوزن قائم</th>
                                                <th>الوزن شقتين</th>
                                                <th>التصفية</th>
                                                <th>إجراء</th>
                                             <th>دخول التبريد </th>

                                                <th class="d-none">مندوب النقل</th>
                                                <th >
                                                    ملاحظات
                                                     </th>
                                                <th>
                                                    خروج
                                                      </th>
                                                
                                                       
                                                      
                                                 
                                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get as $g)
                                            <tr>
                                               
                                                <td>{{$g->code}}</td>
                                                <td>{{$g->adahy}}</td>
                                                <td>{{$g->sak}}</td>
                                                <td>{{$g->days}}</td>
                                                <td>
                                    <a href="#" style="width: 40px;" class="btn btn-warning  shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#Modaleinfo{{$g->id}}">
                                                    {{$g->w_weight}}
                            </a>
                                                                           <!-- Modal info-->
                                    <div class="modal fade" id="Modaleinfo{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                              
                                                
                                    
                                                <div class="modal-header">
                                                    <h5 class="modal-title">  
                                                    بيانات الوزن
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                         <div class="mb-12 col-md-12"> 
                         
                         <table class="table">
                             <tr>
                            <td>المورد</td>
                            <td>{{$g->w_vendor}}</td>
                             </tr>
                                  <tr>
                            <td>الوزن</td>
                            <td>{{$g->w_weight}}</td>
                             </tr>
                                  <tr>
                            <td>ملاحظات</td>
                            <td>{{$g->w_note}}</td>
                             </tr>
                                  <tr>
                            <td>تاريخ الإجراء</td>
                            <td>{{$g->w_date}}</td>
                             </tr>
                                  <tr>
                            <td>الموظف</td>
                            <td>{{$g->w_agent}}</td>
                             </tr>
                         </table>
                         
                        
                        
                                            </div>
                         
                         
                                
                                            
                                            
                         
                         
                         
                                            
                                                            
                                            
                            
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                         
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                         </td>
                                         <td>{{ $g->b_weight }}</td>
                                <td>{{ number_format($g->b_case,2)}}</td>
                               
                                            @php
                                     
                                            if($g->b_room != 0){
                                          
                                                
                                            @endphp
                               
                                         
                                                 <td>
                                            
                                         
                                            
                                            
                                                    
                                                         <!-- Modal edit-->
                                         <!-- Modal edit-->
                                    <div class="modal fade" id="Modaladd{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="add_fb">
                                        @csrf
                                                
                                                <input type="hidden" name="code" id="edit_id" value="{{$g->code}}">
                                                <div class="modal-header">
                                                      <h5 class="modal-title">
                                                       التبريد
                                                           - أضحية رقم -  {{$g->code}}
                                                         </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                                    
                                                              <div class="mb-12 col-md-12">
                                                <label class="form-label">وقت دخول الذبيحة *</label>
                                          <input type="time" name="fb_entry_date" id="fb_entry_date" class="form-control" value="@php echo date('H:i'); @endphp">        
                                                  
                                                                             @error('fb_entry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                                    
   
                         
                         @php
                         $cl = 1;
                         if($cl = 0){
                         @endphp
                         
                                              <div class="mb-12 col-md-12">
                                                <label class="form-label">مندوب النقل   *</label>
                        
                          <select class="form-control  @error('fb_note1') is-invalid @enderror" id="fb_note1" name="fb_note1"  Required>
                     @php echo $all_f; @endphp
                 
                            </select>
                        
                                                   @error('fb_note1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                         
                
                                            
                                               <div class="mb-12 col-md-12">
                                                <label class="form-label">ملاحظات   </label>
                        
                                <input type="text"  class="form-control @error('fb_note') is-invalid @enderror" name="fb_note" id="fb_note" value="{{$g->fb_note}}" placeholder="ملاحظات   " >
                        
                                                   @error('fb_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                       
                         
                         
                                                                         <div class="mb-12 col-md-12">
                                                <label class="form-label">وقت خروج الذبيحة  </label>
                                          <input type="time" name="fb_exit_date" id="fb_exit_date" class="form-control" >        
                                                  
                                                                             @error('fb_exit_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                                            
                                            
                            }
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تعديل
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                       
                        <a href="#" class="btn btn-success  shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#Modaladd{{$g->id}}"><i class="fa fa-pencil"></i></a>                            
               
                                                </td>
                                         
                                         
                                                <td>{{$g->fb_entry_date}}</td>
                                                <td class="d-none"></td>
                                                <td >{{ $g->b_note >0 ? $g->b_note : "لاتوجد" }}</td>
                                                   <td>
                                            
                                         
                                            @php
                                            if($g->fb_entry_date != 0){
                                            @endphp
                                            
                                                    
                                                         <!-- Modal edit-->
                                         <!-- Modal edit-->
                                    <div class="modal fade" id="Modaladds{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="add_fb2">
                                        @csrf
                                                
                                                <input type="hidden" name="code" id="edit_id" value="{{$g->code}}">
                                                <div class="modal-header">
                                                      <h5 class="modal-title">
                                                       التبريد
                                                         - أضحية رقم -  {{$g->code}}
                                                         </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                                    
                             
                                                    
   
                         
                         @php
                         $cl = 0;
                         if($cl == 0){
                         @endphp
                         
                                              <div class="mb-12 col-md-12">
                                                <label class="form-label"> مشرف غرفة التبريد  *</label>
                        
                          <select class="form-control  @error('fb_note1') is-invalid @enderror" id="fb_note1" name="fb_note1"  Required>
                     @php echo $all_f; @endphp
                 
                            </select>
                        
                                                   @error('fb_note1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                         
                
                                            
                                               <div class="mb-12 col-md-12">
                                                <label class="form-label">ملاحظات   </label>
                        
                                <input type="text"  class="form-control @error('fb_note') is-invalid @enderror" name="fb_note" id="fb_note"  placeholder="ملاحظات   " >
                        
                                                   @error('fb_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                       
                         
                         
                                                                         <div class="mb-12 col-md-12">
                                                <label class="form-label">وقت خروج الذبيحة  </label>
                                          <input type="time" name="fb_exit_date" id="fb_exit_date" required="required" class="form-control" value="@php echo date('H:i'); @endphp" >        
                                                  
                                                                             @error('fb_exit_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                                            
                                            
                            }
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                                                        أغلاق
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        تعديل
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                       
                        <a href="#" class="btn btn-success  shadow btn-xs sharp me-1" data-bs-toggle="modal" data-bs-target="#Modaladds{{$g->id}}"><i class="fa fa-pencil"></i></a>
                        
                        }
               
                                                </td>
                                                
                                         
                                            
                                      
                                             }
                                             
                                             
                                
                                           
                                     @endforeach
                                 
                         
                                        </tbody>
                                  
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
$(document).ready(function() {
    $(".c_edit").on('click',function(){
      
      let id=$(this).attr('data-id');
      let type=$(this).attr('data-type');
      let sak=$(this).attr('data-sak');
      let days=$(this).attr('data-days');
      let code=$(this).attr('data-code');
     

  
      
$('#edit_id').val(id);
$('#edit_code').val(code);


  $("div.note-adahy select").val(type);
  $("div.note-sak select").val(sak);
  $("div.note-days select").val(days);

  

    }); 
});
</script>


	    <script>
$(document).ready(function() {
    $(".c_del").on('click',function(){
      
      let id=$(this).attr('data-id');
    
     

  
      
     $('#del_id').val(id);
 
 

  
  

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



