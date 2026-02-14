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
  use App\Models\tr_vendor;
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
						 الحركة اليومية للحسابات
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    إضافة حركة  
						</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row" dir="rtl">
                    <div class="col-xl-3 col-xxl-6 col-sm-6">
                            <div class="card bg-warning invoice-card">
                                <div class="card-body d-flex">
                                    <div class="icon me-3">
                                        <svg  width="33px" height="32px">
                                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                        d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        @php
                                           $totalResev = DB::table('safe_transactions')
                                                ->where('type', 'استلام نقدية')
                                                ->sum('amount'); 
                                        @endphp
 
                                        <h2 class="text-white invoice-num">
                                          {{ $totalResev }}
                                        </h2>
                                        <span class="text-white fs-18">
                                            اجمالي الوارد
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="col-xl-3 col-xxl-6 col-sm-6">
						<div class="card bg-warning invoice-card">
							<div class="card-body d-flex">
								<div class="icon me-3">
									<svg  width="33px" height="32px">
									<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
									 d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
									</svg>
								</div>
								<div>
									<h2 class="text-white invoice-num">
                                         @php
                                           $totalEex = DB::table('safe_transactions')
                                                ->where('type', 'صرف نقدية')
                                                ->sum('amount'); 
                                        @endphp
                                        {{ $totalEex }}
									</h2>
									<span class="text-white fs-18">
									    اجمالي المنصرف 
									</span>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-xl-3 col-xxl-6 col-sm-6">
                            <div class="card bg-warning invoice-card">
                                <div class="card-body d-flex">
                                    <div class="icon me-3">
                                        <svg  width="33px" height="32px">
                                        <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                        d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-white invoice-num">
                                            @php
                                             $totalSafe = $totalResev - $totalEex;
                                            @endphp
                                            {{ $totalSafe }}
                                        </h2>
                                        <span class="text-white fs-18">
                                            اجمالي الخزنة
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- row -->
             
                <div class="row">
		   <!-- Button trigger modal -->
                                 @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','new_safe')->count() > 0)    
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        توريد الحسابات     
                                    </button>
                                 @endif
                                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form method="post" action="new_safe">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">توريد</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body" style="direction: rtl; font-size: 18px; padding: 25px; font-weight: bold;">
                                        @php
                                            $agents = \DB::table('financial_transactions')
                                                ->where('returned_to_main_safe', 0)
                                                ->pluck('agent_name')
                                                ->unique()
                                                ->filter()
                                                ->values();
                                        @endphp
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">اسم المحاسب*</label>
                                            <select class="form-control @error('source') is-invalid @enderror" name="source" id="agentDropdown" required>
                                                <option value="">اختر المحاسب</option>
                                                @foreach($agents as $agent)
                                                    @php
                                                        $totalCredit = \DB::table('financial_transactions')
                                                            ->where('agent_name', $agent)
                                                            ->where('type', 'استلام نقدية')
                                                            ->where('returned_to_main_safe', 0)
                                                            ->sum('amount');
                                                        $totalDebit = \DB::table('financial_transactions')
                                                            ->where('agent_name', $agent)
                                                            ->where('type', 'صرف نقدية')
                                                            ->where('returned_to_main_safe', 0)
                                                            ->sum('amount');
                                                        $agentBalance = $totalCredit - $totalDebit;
                                                    @endphp
                                                    <option value="{{ $agent }}" data-balance="{{ $agentBalance }}">{{ $agent }}</option>
                                                @endforeach
                                            </select>
                                            @error('source')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">رصيد المحاسب الحالي</label>
                                            <input type="text" class="form-control" id="agentBalance" readonly>
                                        </div>
                                        <div class="mb-12 col-md-12">
                                            <label class="form-label">المبلغ المستلم*</label>                                        
                                            <input type="hidden" name="total" id="amountInput" value="{{ old('amount') }}">
                                            <input type="number" step="any" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amountInput" value="{{ old('amount') }}" placeholder="المبلغ" required>
                                            @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function () {
                                                var dropdown = document.getElementById('agentDropdown');
                                                var balanceInput = document.getElementById('agentBalance');
                                                var amountInput = document.getElementById('amountInput');
                                                dropdown.addEventListener('change', function () {
                                                    var selected = dropdown.options[dropdown.selectedIndex];
                                                    var balance = selected.getAttribute('data-balance') || '';
                                                    balanceInput.value = balance;
                                                    amountInput.value = balance;
                                                });
                                            });
                                        </script>
                                        <input type="hidden" name="type" value="استلام نقدية">
                                        <input type="hidden" name="agent" value="{{ Auth::user()->name }}">
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
                                     <!-- Modal edit-->
                                    {{-- <div class="modal fade" id="Modaledit">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="edit_supplier">
                                                    @csrf
                                                    <input type="hidden" name="id" id="edit_id">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">تعديل دفعة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body" style="direction: rtl; font-size: 18px; padding: 25px; font-weight: bold;">
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">اسم المورد*</label>
                                                            <select class="form-control @error('name') is-invalid @enderror" name="name" id="edit_name" required>
                                                                <option value="">اختر المورد</option>
                                                                @foreach($vendors as $vendor)
                                                                    <option value="{{ $vendor->name }}">{{ $vendor->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">نوع الاضحية*</label>
                                                            <select class="form-control @error('type') is-invalid @enderror" name="type" id="edit_type" required>
                                                                <option value="">اختر النوع</option>
                                                                @foreach($adahy_type as $type)
                                                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">عدد*</label>
                                                            <input type="number" step="any" class="form-control @error('count') is-invalid @enderror" name="count" id="edit_count" placeholder="العدد" required>
                                                            @error('count')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الوزن الاجمالي*</label>
                                                            <input type="number" step="any" class="form-control @error('total_weight') is-invalid @enderror" name="total_weight" id="edit_total_weight" placeholder="الوزن الاجمالي" required>
                                                            @error('total_weight')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">السعر قائم*</label>
                                                            <input type="number" step="any" class="form-control @error('price') is-invalid @enderror" name="price" id="edit_price" placeholder="السعر قائم" required>
                                                            @error('price')
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
                                                            تعديل
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="modal fade" id="Modaldel">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="checks-delete">
                                                    @csrf
                                                    <input type="hidden" name="id" id="del_id">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">معاملة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body" style="direction: rtl; font-size: 18px; padding: 25px; font-weight: bold;">
                                                        <span>
                                                            هل انت متأكد من المسح ؟
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
		
		 </div>
		 
		 
		 
		 
		 <div>
                            <div class="card-body" dir="rtl">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>المحاسب</th>
                                                <th>استلام نقدية</th>
                                                <th>صرف نقدية</th>
                                                <th>تصفية خزنة</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $agents = \DB::table('financial_transactions')
                                                    ->where('returned_to_main_safe', 0)
                                                    ->pluck('agent_name')
                                                    ->unique()
                                                    ->filter()
                                                    ->values();
                                            @endphp
                                            @foreach ($agents as $agent)
                                                @php
                                                    $totalCredit = \DB::table('financial_transactions')
                                                        ->where('agent_name', $agent)
                                                        ->where('type', 'استلام نقدية')
                                                        ->where('returned_to_main_safe', 0)
                                                        ->sum('amount');

                                                    $totalDebit = \DB::table('financial_transactions')
                                                        ->where('agent_name', $agent)
                                                        ->where('type', 'صرف نقدية')
                                                        ->where('returned_to_main_safe', 0)
                                                        ->sum('amount');
                                                    $agentBalance = $totalCredit - $totalDebit;
                                                @endphp
                                                <tr>
                                                    <td>{{ $agent }}</td>
                                                    <td>{{ $totalCredit }}</td>
                                                    <td>{{ $totalDebit }}</td>
                                                    <td>{{  $agentBalance }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                                                   
                                        </tbody>
                                    </table>
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
                                <!-- زرار فتح مودال mount -->
                             @if (DB::table('per')->where('u_id', Auth::user()->id)->where('page', 'push_safe')->count() > 0)
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#mountModal">
                                   تغزية الخزنة
                                </button>                  
                             @endif

                                <!-- مودال mount -->
                                <div class="modal fade" id="mountModal" tabindex="-1" aria-labelledby="mountModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form method="post" action="push_safe">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="mountModalLabel">تغذية الخزنة</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;">
                                                    <div class="mb-3">
                                                        <label class="form-label">المبلغ</label>
                                                        <input type="number" name="amount" class="form-control" required>
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label class="form-label">نوع المعاملة</label>
                                                        <select name="type" class="form-control" required>
                                                            <option value="استلام نقدية">استلام نقدية</option>
                                                            <option value="صرف نقدية">صرف نقدية</option>
                                                        </select>
                                                    </div> --}}
                                                    {{-- <input type="hidden" name="type" value="استلام نقدية"> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">إغلاق</button>
                                                    <button type="submit" class="btn btn-primary">إضافة</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>كود</th>
                                                <th>مسؤول الخزنة</th>
                                                <th> بيانات المودع  </th>
                                                <th>المبلغ </th>
                                                <th>نوع المعاملة </th>
                                                <th>تاريخ المعاملة</th>
                                                {{-- <th>مسح</th> --}}
                                                <th>تقارير</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($safes as $g)
                                            <tr>
                                                <td>{{$g->id}}</td>
                                                <td>{{$g->agent }}</td>
                                                <td>{{$g->source}}</td>
                                                <td>{{$g->amount}}</td>
                                                <td>{{$g->type}}</td>
                                                <td>{{$g->created_at}}</td>

                                                {{-- <td><a href="#" data-bs-toggle="modal" data-bs-target="#Modaldel" class="btn btn-danger c_del shadow btn-xs sharp me-1" data-id="{{$g->id}}" data-name="{{$g->agent}}"  class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a></td> --}}
                                                <td>
                                                    <a href="#">
                                                        <div class="icon me-3">
                                                            <svg width="33px" height="32px">
                                                            <path fill-rule="evenodd" fill="rgb(0, 0, 0)" d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"></path>
                                                            </svg>
                                                        </div>
                                                    </a>
                                                </td>
                                            </tr>
                                     @endforeach
                                 
                         {{$safes->withQueryString()->links("pagination::bootstrap-4")}}
                                        </tbody>
                                        <tfoot>
                                             <tr>
                                                <th>كود</th>
                                                <th>مسؤول الخزنة</th>
                                                <th> بيانات المودع  </th>
                                                <th>المبلغ </th>
                                                <th>نوع المعاملة </th>
                                                <th>تاريخ المعاملة</th>
                                                {{-- <th>مسح</th> --}}
                                                <th>تقارير</th>
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
	    
	    
	    <script>
$(document).ready(function() {
    $(".c_edit").on('click',function(){
      
      let id=$(this).attr('data-id');
      let name=$(this).attr('data-name');
      let note=$(this).attr('data-note');
 
     

  
      
     $('#edit_id').val(id);
 
  
  $('#edit_name').val(name); 
     $('#edit_note').val(note); 
   

  
  

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
$(document).ready(function() {
    $(".c_edit").on('click',function(){
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let type = $(this).attr('data-type');
        let count = $(this).attr('data-count');
        let total_weight = $(this).attr('data-total_weight');
        let price = $(this).attr('data-price');

        $('#edit_id').val(id);

        // Set select value for name
        $('#edit_name').val(name).trigger('change');
        // Set select value for type
        $('#edit_type').val(type).trigger('change');
        // Set input values
        $('#edit_count').val(count);
        $('#edit_total_weight').val(total_weight);
        $('#edit_price').val(price);
    });
});
</script>
	
</body>
</html>