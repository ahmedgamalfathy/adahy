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
						    المورديين
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    إضافة مورد  
						</a></li>
					</ol>
                </div>
                <!-- row -->

		 
		 
		 
		 
		 
		 
		    <div class="row">
                <div class="col-12 mb-3" style="direction: rtl;">
                    <form method="GET" action="/repo-supplier-opt" class="row g-3 align-items-center">
                        <div class="col-auto">
                            <input type="text" name="search" class="form-control" placeholder="ابحث عن مورد أو كود..." value="{{ request('search') }}">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">بحث</button>
                        </div>
                        <div class="col-auto">
                            <a href="/repo-supplier-opt" class="btn btn-secondary">إعادة تعيين</a>
                        </div>
                    </form>
                </div>
                    <div class="col-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="card-title">
                                    بيانات الجدول
                                </h4>
                                <form method="GET" action="/export_excel_times">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-file-excel-o"></i> تصدير Excel
                                    </button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>كود</th>
                                                <th>المورد</th>
                                                <th>نوع الاضحية </th>
                                                <th>الوزن قائم</th>
                                                <th>الوزن شقتين</th>
                                                <th>نسبة التصفية</th>
                                                <th>الوزن المشفى</th>
                                                <th>نسبة التشفية</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($get as $g)
                                            <tr>
                                                <td>{{$g->code}}</td>
                                                <td>{{$g->w_vendor}}</td>
                                                <td>{{$g->adahy}}</td>
                                                <td>{{$g->w_weight}}</td>
                                                <td>{{ $g->b_weight }}</td>
                                                <td>{{number_format($g->b_case,2)}}</td>
                                                <td>{{ $g->f_weight }}</td>
                                                <td>{{number_format($g->f_case,2)}}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center" style="font-weight:bold;">لا توجد بيانات</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>كود</th>
                                                <th>المورد</th>
                                                <th>نوع الاضحية </th>
                                                <th>الوزن قائم</th>
                                                <th>الوزن شقتين</th>
                                                <th>نسبة التصفية</th>
                                                <th>الوزن المشفى</th>
                                                <th>نسبة التشفية</th>
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