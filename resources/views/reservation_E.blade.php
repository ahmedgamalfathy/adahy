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
						    الأضاحى
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    تعديل صك   
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
        
					
					
	
					
					
						

                                   
		 
		 <div class="col-xl-12 col-lg-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                  
                                    {{$get->name}}
                                   
                                    </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                       <form method="post" action="/edit_reservation">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$get->id}}">

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">
                                                    الاسم
                                                </label>
                                                                          
<input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value ="{{$get->name}}" placeholder="الاسم" Required>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                
                                                             <label class="form-label">الموبيل*</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value ="{{$get->mobile}}"  placeholder="الموبيل" >
                                                   @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                
                                                <label class="form-label">الموبيل2*</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('mobile2') is-invalid @enderror" name="mobile2" value ="{{$get->mobile2}}"  placeholder="الموبيل2" Required>
                                                   @error('mobile2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                                    <div class="mb-3 col-md-6">
                                                
                                                <label class="form-label">رقم واتس اب*</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('mobile3') is-invalid @enderror" name="mobile3" value ="{{@$get_client->mob3}}" placeholder="رقم واتس اب" Required>
                                                   @error('mobile3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                                         <div class="mb-3 col-md-6">
                                                
                                                <label class="form-label">رقم المنزل *</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('mobile4') is-invalid @enderror" name="mobile4" value ="{{@$get_client->mob4}}" placeholder="رقم  المنزل" Required>
                                                   @error('mobile4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                            <div class="mb-3 col-md-6">
                                              
                                                                                        
                                                <label class="form-label">المنطقة*</label>
<input type="text" class="form-control @error('zone') is-invalid @enderror" name="zone" value="{{$get->zone}}" placeholder="المنطقة" Required>
                                                   @error('zone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                              
                                            </div>
                                            
                                            
                                      
                                            
                                                        
                                            <div class="mb-3 col-md-6">
                                              
                                                                  
                                                <label class="form-label">العنوان*</label>
<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$get->address}}" placeholder="العنوان" Required>
                                                   @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                              
                                            </div>
                                            
                                            
                              
                                            
                                            
                                                            <div class="mb-3 col-md-6">
                                              
                                                                                            
                                                <label class="form-label">ملاحظات *</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$get->description}}" placeholder="ملاحظات " >
                                                   @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                              
                                            </div>
                                            
                                            
                                                                      <div class="mb-3 col-md-6">
                                                
                                                {{-- <label class="form-label">رقم الإيصال *</label> --}}
                        <input type="hidden" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('rec') is-invalid @enderror" name="rec" value="{{$get->rec}}" placeholder="رقم الإيصال " Required>
                                                   @error('rec')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                                                         <div class="mb-3 col-md-6">
                                                
                                                {{-- <label class="form-label">رقم الدفتر*</label> --}}
                        <input type="hidden" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('def') is-invalid @enderror" name="def" value="{{$get->def}}" placeholder="رقم الدفتر " Required>
                                                   @error('def')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                             
                                            
                                            
                                                                                                 <div class="mb-3 col-md-3">
                                                
                                                <label class="form-label">عدد مرات الحجز</label>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58"  class="form-control @error('co_z') is-invalid @enderror" name="co_z" value="{{$get->co_z}}" placeholder="عدد مرات الذبح " >
                                                   @error('co_z')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                            
                                                                                                 <div class="mb-6 col-md-3">
                                                
                                                <label class="form-label">تواريخ الحجز </label>
                        <input type="text"  class="form-control @error('history') is-invalid @enderror" name="history" value="{{$get->history}}" placeholder="تواريخ الحجز" >
                                                   @error('history')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                                       
                                         
                                            
                                            
                                        </div>
                                   
                                        <button type="submit" style="width: 50%;float: left;" class="btn btn-primary"> 
                                        تعديل بيانات الحجز
                                        </button>
                                    </form>
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
	    
	    



	  
	
</body>
</html>

