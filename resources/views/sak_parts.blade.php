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
					{{-- <ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">
						    الأضاحى
						</a></li>
					 	/ 
						<li class="breadcrumb-item"><a href="javascript:void(0)">
						    نوع الأضحية
						</a></li>
					</ol> --}}
                    <form method="GET" action="/adahy_type_search" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="ابحث عن نوع الأضحية..." value="{{ request('q') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">بحث</button>
                            </div>

                        </div>
                    </form>
                    <div class="input-group-append">
                        <a href="/sak_parts"><button class="btn btn-primary" >الرجوع للخلف</button></a>
                    </div>
                </div>
                <!-- row -->
             
                <div class="row">
		   <!-- Button trigger modal -->

                                    <!-- Modal -->

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <!-- Modal edit-->

                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                         <!-- Modal delete-->

		
		 </div>
		 
		 
		 
		 
		 
		 
		    <div class="row">
                    <div class="col-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    بيانات الجدول
                                </h4>
                            </div>
                        @if(isset($results))
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th>الجزء</th>
                                        <th> معرف المضحي</th>
                                        <th>معرف الاضحية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($results as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->r_id }}</td>
                                            <td>{{ $row->code_adahy }}</td>
                                            <td>
                                                <form method="POST" action="/adahy_acc/delete" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <button type="submit" class="btn btn-danger shadow btn-xs sharp me-1">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4">لا توجد نتائج</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        @elseif(isset($parts))

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الكود</th>
                                                <th>الجزء</th>
                                                <th>رقم الاضحية</th>
                                                
                                                {{-- <th>مسح</th> --}}
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($parts as $part)
                                            <tr>
                                                <td>{{$part->id}}</td>
                                                <td>{{$part->r_id}}</td>
                                                <td>{{$part->name}}</td>
                                                <td>{{$part->code_adahy}}</td>
                                                {{-- <td><a href="#" 
                                                class="btn btn-danger c_del shadow btn-xs sharp me-1" 
                                                data-toggle="modal" 
                                                data-target="#Modaldel" 
                                                data-id="{{ $part->id }}" 
                                                data-name="{{ $part->name }}">
                                                <i class="fa fa-trash"></i>
                                             </a></td> --}}
                                              
                                            </tr>
                                            <!-- مودال الحذف -->

  
                                     @endforeach
                                     <div class="modal fade" id="Modaldel" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <form method="POST" action="/adahy_acc/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $part->id }}" id="delete-id">
                                            
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">تأكيد الحذف</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="إغلاق">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                هل أنت متأكد من حذف <strong id="delete-name"></strong>؟
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                <button type="submit" class="btn btn-danger">نعم، احذف</button>
                                            </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                         
                                        </tbody>
                                        @endif
                                        <tfoot>
                                           <tr>
                                                <th>#</th>
                                                <th>الكود</th>
                                                <th>الجزء</th>
                                                <th>رقم الاضحية</th>
                                                
                                                <th>مسح</th>
                                            
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
    <script>
        $(document).on('click', '.c_del', function () {
          var id = $(this).data('id');
          var name = $(this).data('name');
          
          $('#delete-id').val(id);
          $('#delete-name').text(name);
        });
      </script>
      
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
      let name=$(this).attr('data-name');
      let price=$(this).attr('data-price');
 
     

  
      
     $('#edit_id').val(id);
 
  
  $('#edit_name').val(name); 
     $('#edit_price').val(price); 
   

  
  

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
	
</body>
</html>

