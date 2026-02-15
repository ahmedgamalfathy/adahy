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
    use App\classes\Getinfo;
    $Gets_info = new Getinfo;
  @endphp
	<!-- PAGE TITLE HERE -->
	<title>p2p :  Admin </title>
	
	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
	
	 <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
	
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
		       
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Account</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0)">{{$get->name}}</a></li>
					</ol>
                </div>
                <!-- row -->
               
               
       	
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body pb-3">
								<div class="row align-items-center">
									<div class="col-xl-4 mb-3">
										<p class="mb-2">ID Payment</p>
										<h2 class="mb-0">#00{{$get->id}}</h2>
									</div>
									<div class="col-xl-8 d-flex flex-wrap justify-content-between align-items-center">
										<div class="d-flex me-3 mb-3 ms-2 align-items-start">
											<i class="fa fa-phone scale-2 me-4 mt-2"></i>
											<div>
												<p class="mb-2">Telephone</p>
												<h4 class="mb-0">{{$get->mobile}}</h4>
											</div>
										</div>
										<div class="d-flex me-3 mb-3 ms-2 align-items-start">
											<i class="fa fa-envelope scale-2 me-4 mt-2"></i>
											<div>
												<p class="mb-2">Email</p>
												<h4 class="mb-0">{{$get->email}}</h4>
											</div>
										</div>
										<div class="d-flex mb-3">
											<a class="btn btn-dark light me-3" href="javascript:void(0);"><i class="las la-print me-3 scale5"></i>Print</a>
											<a href="javascript:void(0);" class="btn btn-primary"><i class="las la-download scale5 me-3"></i>Download Report</a>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body pb-3 transaction-details d-flex flex-wrap justify-content-between align-items-center">
								<div class="user-bx-2 me-3 mb-3">
									<img src="/{{$theme1}}/images/avatar/1.png" class="rounded" alt="">
									<div>
										<h3></h3>
										<span></span>
									</div>
								</div>
								<div class="me-3 mb-3">
									<p class="mb-2">Activation Code</p>
									<h4 class="mb-0">{{$get->my_code}}</h4>
								</div>
							
								<div class="me-3 mb-3">
									<p class="mb-2">Due Date</p>
									<h4 class="mb-0">{{$get->created_at}}</h4>
								</div>
							
								<div class="amount-bx mb-3">
									<i class="fa fa-usd"></i>
									<div>
										<p class="mb-1">Amount</p>
										<h3 class="mb-0">$ 986.23</h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-12">
						<div class="card">	
							<div class="card-body">
								<div class="d-xl-flex d-block align-items-start description-bx">
									<div style="    width: 100%;">
										<h4 class="card-title">{{$get->gov}}</h4>
										<span class="fs-12">{{$get->address}}</span>
										<p class="description mt-4">
									<div class="card-body">
									    
									    <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                              <a href="/account_info/{{$Gets_info->getidu($get->app_code)}}">                                  
            <button type="button" class="btn btn-rounded btn-warning"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->app_code)}}
                                    /{{$get->p1}}
                                    </button>
                                    </a>
                                        </li>
                                        <li class="list-group-item list-group-item-primary">
                                                 <a href="/account_info/{{$Gets_info->getidu($get->p1)}}">                                  
            <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p1)}}
                                    /{{$get->p1}}
                                    </button>
                                    </a>   
                                        </li>
                                        <li class="list-group-item list-group-item-secondary">
                                                    <a href="/account_info/{{$Gets_info->getidu($get->p2)}}">  
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p2)}}
                                    /{{$get->p2}}
                                    </button>
                                     </a>   
                                        </li>
                                        <li class="list-group-item list-group-item-success">
                                                     <a href="/account_info/{{$Gets_info->getidu($get->p3)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p3)}}
                                    /{{$get->p3}}
                                    </button>
                                     </a>  
                                        </li>
                                        <li class="list-group-item list-group-item-danger">
                                                     <a href="/account_info/{{$Gets_info->getidu($get->p4)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p4)}}
                                    /{{$get->p4}}
                                    </button>
                                     </a>  
                                        </li>
                                        <li class="list-group-item list-group-item-warning">
                                               <a href="/account_info/{{$Gets_info->getidu($get->p5)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p5)}}
                                    /{{$get->p5}}
                                    </button>
                                     </a>    
                                        </li>
                                        <li class="list-group-item list-group-item-info">
                                                      <a href="/account_info/{{$Gets_info->getidu($get->p6)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p6)}}
                                    /{{$get->p6}}
                                    </button>
                                     </a>   
                                        </li>
                                        <li class="list-group-item list-group-item-light">
                                                       <a href="/account_info/{{$Gets_info->getidu($get->p7)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p7)}}
                                    /{{$get->p7}}
                                    </button>
                                     </a>   
                                        </li>
                                        <li class="list-group-item list-group-item-dark">
                                                   <a href="/account_info/{{$Gets_info->getidu($get->p8)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p8)}}
                                    /{{$get->p8}}
                                    </button>
                                     </a>  
                                        </li>
                                        
                                        <li class="list-group-item list-group-item-dark">
                                                  <a href="/account_info/{{$Gets_info->getidu($get->p9)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p9)}}
                                    /{{$get->p9}}
                                    </button>
                                     </a> 
                                             </li>
                                             
                                                <li class="list-group-item list-group-item-dark">
                                                        <a href="/account_info/{{$Gets_info->getidu($get->p10)}}"> 
                                       <button type="button" class="btn btn-rounded btn-secondary"><span class="btn-icon-start text-success"><img class="rounded-circle img-fluid" src="/{{$theme1}}/images/avatar/1.png" alt="" width="30">
                                    </span>{{$Gets_info->getnameu($get->p10)}}
                                    /{{$get->p10}}
                                    </button>
                                </a> 
                                             </li>
                                    </ul>
                                </div>
                            </div>
									    
                                <div class="bootstrap-badge" >
          
           
          
          
                           
                           
                           
                               
                         
                        
                             
                               
                         
                                   
                                  
                               
                                </div>
                                
                       
                            </div>
										    </p>
									</div>
									<div class="card-bx bg-dark-blue ms-xl-5 ms-0">
										<img class="pattern-img" src="/{{$theme1}}/images/pattern/pattern11.png" alt="">
										<div class="card-info text-white">
											<img src="/{{$theme1}}/images/pattern/circle.png" class="mb-4" alt="">
											<h2 class="text-white card-balance" style="text-align: center; letter-spacing: 15px;">
											    {{$get->my_code}}
											</h2>
											<p class="fs-16">Activation Code</p>
											<span>+0,8% than last week</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-9">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<div>
									<h4 class="card-title mb-2">Chart Activity</h4>
									<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
								</div>
								<div class="dropdown">
									<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
									</a>
									<div class="dropdown-menu dropdown-menu-right" style="margin: 0px;">
										<a class="dropdown-item" href="javascript:void(0);">Delete</a>
										<a class="dropdown-item" href="javascript:void(0);">Edit</a>
									</div>
								</div>
							</div>
							<div class="card-body py-0 px-2">
								<div id="activityChart"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-3">
						<div class="card">
							<div class="card-header border-0 pb-0">
								<div>
									<h4 class="card-title mb-2">Specifics</h4>
									<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
								</div>
							</div>
							<div class="card-body pt-3">
								<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tem</p>
								<ul class="specifics-list">
									<li>
										<span class="bg-blue"></span>
										<div>
											<h4>63,876</h4>
											<span>Property Sold</span>
										</div>
									</li>
									<li>
										<span class="bg-orange"></span>
										<div>
											<h4>97,125</h4>
											<span>Income</span>
										</div>
									</li>
									<li>
										<span class="bg-primary"></span>
										<div>
											<h4>872,235</h4>
											<span>Expense</span>
										</div>
									</li>
									<li>
										<span class="bg-danger"></span>
										<div>
											<h4>21,224</h4>
											<span>Property Ranted</span>
										</div>
									</li>
								</ul>
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
	


	<script src="/{{$theme1}}/js/dashboard/transaction-details.js"></script>
	<!-- Apex Chart -->
	<script src="/{{$theme1}}/vendor/apexchart/apexchart.js"></script>
	<script src="/{{$theme1}}/vendor/nouislider/nouislider.min.js"></script>
	<script src="/{{$theme1}}/vendor/wnumb/wNumb.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="/{{$theme1}}/js/dashboard/dashboard-1.js"></script>
	
	    <!-- Datatable -->
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

