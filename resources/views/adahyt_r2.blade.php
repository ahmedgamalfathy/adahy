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
						    حجز أضحية  
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12" style="direction: rtl;">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    بحث عن أضحية
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="row">
                                  
                                            <div class="col-sm-2 mt-2 mt-sm-0">
                                                <input class="form-control @error('type') is-invalid @enderror" name="rec" id="rec" placeholder="رقم الحجز">
                                
                                            </div>
                                                <div class="col-sm-2 mt-2 mt-sm-0" id="show_sak">
                              <input class="form-control @error('type') is-invalid @enderror" name="name" id="name" placeholder="اسم المضحى">
                                            </div>
                                            
                                                      <div class="col-sm-2">
                          <input class="form-control @error('type') is-invalid @enderror" name="mobile" id="mobile" placeholder="هاتف المضحى">
                                            </div>
                                            
                                      
                                              <div class="col-sm-4 mt-2 mt-sm-0">
                                                <input type="submit" class="form-control btn btn-primary" value="بحث">
                                            </div>
                                        </div>
                                    </form>
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
                                                <th>رقم الحجز</th>
                                                <th>اسم المضحى</th>
                                                <th>رقم الهاتف</th>
                                                
                                                <th>نوع الصك</th>
                                                <th>مقدار الصك</th>
                                                <th>عدد الصكوك</th>
                                                <th>القيمة المالية</th>
                                                 <th>يوم الذبح</th>
                                                 <th>الفترة </th>
                                                 <th>التاريخ </th>
                                                 <th>اجراء</th>
                                               
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                            $rep = array();
                                            ?>
                                            @foreach($get as $g)
                                            <?
                                                if(in_array($g->rec , $rep)){
		        
		    }else{
		    array_push($rep,$g->rec);
                                            
                                            $loan = DB::table('reservation')->where('rec',$g->rec)->sum('loan');
                                            
                                            ?>
                                            @php
                                            $cleanDate = trim($g->created_at);
                                            $createdAt =\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cleanDate , 'Africa/Cairo');
                                            $now = \Carbon\Carbon::now('Africa/Cairo');
                                            @endphp

                                            <tr style="background-color: {{ $createdAt->diffInHours($now) > 24 ? 'yellow !important' : 'white' }}"  >
                                                <td >{{$g->rec}}</td>
                                                 <td>{{$g->name}}</td>
                                                <td>{{$g->mobile}}</td>
                                                <td>{{$g->adahy}}</td>
                                                <td>{{$g->saks}}</td>
                                                <td>{{$g->number}}</td>
                                                <td>{{$loan}}</td>
                                                 <td>{{$g->days}}</td>
                                                  <td>{{DB::table('times')->where('id',$g->times)->first()->name}}</td>
                                                 <td>{{$g->created_at}}</td>
                                                <td>
                                                    
                                                    <?
                                                    	$c1 = DB::table('per')->where('page','website_m')->where('u_id',Auth::user()->id)->count();//مسح ونقل
                                                    	$c2 = DB::table('per')->where('page','website_m')->where('u_id',Auth::user()->id)->count();//مسح ونقل
                                                    if($c1 > 0){
                                                    ?>
                                    		<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block " data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{$g->id}}">
				    إستلام نقدية
				    <i class="las la-signal ms-3 scale5"></i></a>
				    <?}?>
				    <a href="/reservationsystem/{{$g->resnum}}" class="btn btn-primary light me-1 px-3" target="_blank">
                               <i class="flaticon-072-printer"></i>
                                    </a>
                                  
                                    <?
                                    if($c2 > 0){
                                    ?>
                                    	<a href="#" data-bs-toggle="modal" data-bs-target="#Modaldel{{$g->id}}" >
														    
														    <span class="me-2 oi-icon bgl-danger">
														<svg width="18" height="18" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6.57624 0.769646C6.77936 1.18944 6.59993 1.69725 6.18014 1.90038C5.01217 2.46236 4.02363 3.33579 3.31947 4.42928C2.59837 5.54986 2.21582 6.84986 2.21582 8.19048C2.21582 12.0363 5.34394 15.1644 9.18978 15.1644C13.0356 15.1644 16.1637 12.0363 16.1637 8.19048C16.1637 6.84986 15.7812 5.54985 15.0635 4.4259C14.3627 3.33241 13.3708 2.45897 12.2028 1.89699C11.783 1.69387 11.6036 1.18944 11.8067 0.766262C12.0098 0.34647 12.5143 0.167042 12.9374 0.370167C14.3898 1.06756 15.6187 2.1509 16.4887 3.51183C17.3825 4.90663 17.8564 6.52486 17.8564 8.19048C17.8564 10.5061 16.9559 12.6829 15.3174 14.3181C13.6822 15.9566 11.5054 16.8571 9.18978 16.8571C6.87415 16.8571 4.69733 15.9566 3.06217 14.3181C1.42363 12.6795 0.523111 10.5061 0.523111 8.19048C0.523111 6.52486 0.99707 4.90663 1.89421 3.51183C2.76764 2.15428 3.99655 1.06756 5.44551 0.370167C5.86868 0.170427 6.37311 0.34647 6.57624 0.769646Z" fill="#FF2E2E"></path>
															<path d="M5.89551 7.7402C5.72962 7.57431 5.64837 7.35765 5.64837 7.14098C5.64837 6.92431 5.72962 6.70765 5.89551 6.54176L8.02493 4.41233C8.33639 4.10088 8.74941 3.93161 9.18613 3.93161C9.62285 3.93161 10.0393 4.10426 10.3473 4.41233L12.4768 6.54176C12.8085 6.87353 12.8085 7.40843 12.4768 7.7402C12.145 8.07197 11.6101 8.07197 11.2783 7.7402L10.0291 6.49098L10.0291 11.3017C10.0291 11.7688 9.64993 12.148 9.18275 12.148C8.71556 12.148 8.33639 11.7688 8.33639 11.3017L8.33639 6.4876L7.08717 7.73681C6.76217 8.06858 6.22728 8.06858 5.89551 7.7402Z" fill="#FF2E2E"></path>
															</svg>

													</span>
														    
														</a>
														
														<?}?>
                                                </td>
                                                
                                       
                         
                                              
                                            </tr>
                                            
                                            
                                              <!-- Modal delete-->
                                    <div class="modal fade" id="Modaldel{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="del_resv">
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
                                            
                                            
                                            
                                            
                                            		    	    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        <form method="post" action="/new_treasury_sak1_">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$g->id}}">
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
                                                <input type="hidden" name="amount" value="{{$loan}}" Required>
                        <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('amount') is-invalid @enderror" name="amount2" value="{{$loan}}" placeholder="المبلغ" disabled />
                                                   @error('amount')
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
                                    <?}?>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>رقم الحجز</th>
                                                <th>اسم المضحى</th>
                                                <th>رقم الهاتف</th>
                                                
                                                <th>نوع الصك</th>
                                                <th>مقدار الصك</th>
                                                <th>عدد الصكوك</th>
                                                <th>القيمة المالية</th>
                                                 <th>يوم الذبح</th>
                                                 <th>الفترة </th>
                                                 <th>التاريخ </th>
                                                 <th>اجراء</th>
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
    <script src="/{{$theme1}}/js/plugins-init/datatables2.init.js"></script>

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
	    
	    
           <script type="text/javascript">
    $(document).ready(function(){
    $("#type").change(function(){
     var n = $("#type").val();
     $('#show_sak').html(`<div class="spinner-border text-primary" role="status">
  <span class="visually-hidden"></span>
</div>`);
   $.get("show_sak_select",{type:n},function(date1){
$('#show_sak').html(date1);

});
  
    });
    
    });
     </script>

	  
	
</body>
</html>