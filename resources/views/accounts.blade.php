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
	<title>p2p :  Admin </title>
	
	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="image/png" href="{{$theme1}}/images/favicon.png" />
	
	<link href="{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="{{$theme1}}/vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
    <link href="{{$theme1}}/css/style.css" rel="stylesheet">
	
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
		       
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Account</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">Create New Account</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
			<div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create New Account</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="new_account">
                                        @csrf

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">First Name*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" Required>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Email*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" Required>
                                                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Password*</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"  name="password" value="{{ old('password') }}" placeholder="Password" Required>
                                                   @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Address*</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" placeholder="1234 Main St" Required>
                                                                   @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">State*</label>
                                                <select id="inputState" name="gov" class="default-select form-control wide @error('state') is-invalid @enderror" Required>
                                                    <option value="">Choose...</option>
                                                    <option value="Cairo">Cairo</option>
                                                    <option value="Giza">Giza</option>
                                                    <option value="Helwan">Helwan</option>
                                                    <option value="Qalioubiya">Qalioubiya</option>
                                                    <option value="Alexandria">Alexandria</option>
                                                    <option value="Daqahliya">Daqahliya</option>
                                                    
                                                   
                                                    <option value="Gharbiya">Gharbiya</option>
                                                    <option value="Damietta">Damietta</option>
                                                    <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                                                    <option value="Monofiya">Monofiya</option>
                                                   
                                                    <option value="Sharqiya">Sharqiya</option>
                                                    <option value="Tanta">Tanta</option>
                                                    <option value="Beheira">Beheira</option>
                                                    <option value="Ismailia">Ismailia</option>
                                                    <option value="Port Said">Port Said</option>
                                                    <option value="Suez">Suez</option>
                                                    <option value="Red Sea">Red Sea</option>
                                                    <option value="Marsa Matrouh">Marsa Matrouh</option>
                                                    <option value="Bani Suef">Bani Suef</option>
                                                    <option value="Minya">Minya</option>
                                                    <option value="Assiut">Assiut</option>
                                                    <option value="Sohag">Sohag</option>
                                                    <option value="Qena">Qena</option>
                                                    <option value="Luxor">Luxor</option>
                                                    <option value="Aswan">Aswan</option>
                                                    <option value="Sinai">Sinai</option>
                                                    <option value="New Valley">New Valley</option>
                                                     
                                                </select>
                                             @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                              <div class="mb-3 col-md-3">
                                                <label class="form-label">Mobile</label>
                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  placeholder="Mobile" Required>
                                             @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-3">
                                                <label class="form-label">Activation Code (option)</label>
    <input type="text" class="form-control @error('app_code') is-invalid @enderror" name="app_code" style="background: var(--rgba-primary-1);" value="{{ old('app_code') }}" placeholder="Activation Code">
                                                    @error('app_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                        </div>
                                     
                                        <button type="submit" class="btn btn-primary" style="width: 100%;">Sign in</button>
                                    </form>
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
    <script src="{{$theme1}}/vendor/global/global.min.js"></script>
	<script src="{{$theme1}}/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="{{$theme1}}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="{{$theme1}}/vendor/apexchart/apexchart.js"></script>
	<script src="{{$theme1}}/vendor/nouislider/nouislider.min.js"></script>
	<script src="{{$theme1}}/vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{$theme1}}/js/dashboard/dashboard-1.js"></script>

    <script src="{{$theme1}}/js/custom.min.js"></script>
	<script src="{{$theme1}}/js/dlabnav-init.js"></script>
	
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

