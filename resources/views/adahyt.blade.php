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
						    إضافة أضحية  
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
                <div class="row">
		   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        إضافة أضحية  
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="new_adhyat">
                                                                 
                                        @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">  إضافة أضحية   </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                           
                           
                                                             <div class="mb-12 col-md-12">
                                                <label class="form-label">رقم الأضحية*</label>
                        
                                <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" placeholder="رقم الأضحية" Required>
                        
                                                   @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                      
                                                                <div class="mb-12 col-md-12">
                                                <label class="form-label">نوع الأضحية*</label>
                        <select class="form-control  @error('type') is-invalid @enderror" id="select_adha_type" name="type"  Required>
                            @foreach($adahy_type as $g)
                            <option value="{{$g->name}}">{{$g->name}}</option>
                            @endforeach
                            </select>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">الصك*</label>
                       <select class="form-control @error('sak') is-invalid @enderror" id="select_sak"  name="sak"  Required>
                            @foreach($sak as $saks)
                            <option value="{{$saks->name}}">{{$saks->name}}</option>
                            @endforeach
                            </select>
                                                   @error('sak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                <div class="mb-12 col-md-12">
                                                <label class="form-label">يوم الذبح*</label>
                       <select class="form-control @error('days') is-invalid @enderror" name="days"  Required>
                            @foreach($days as $dayss)
                            <option value="{{$dayss->name}}">{{$dayss->name}}</option>
                            @endforeach
                            </select>
                                                   @error('days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
    <div class="mb-12 col-md-12">
        <label class="form-label">التوقيت *</label>
        <select class="form-control @error('times') is-invalid @enderror" name="times"  Required>
            @foreach($times as $time)
            <option value="{{$time->id}}">{{$time->name}}</option>
            @endforeach
        </select>
    @error('times')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-12 col-md-12">
        <label class="form-label">المحافظة *</label>
        <select class="form-control @error('times') is-invalid @enderror" name="gov"  Required>
            <option value="12">الدقهلية</option> 
            <option value="01">القاهرة</option> 
            <option value="24">المنيا</option> 
        </select>
    @error('gov')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-12 col-md-12">
        <label class="form-label">صكوك متاحة للتبرع بالكامل *</label>
        <select class="form-control @error('times') is-invalid @enderror" name="is_available"  Required>
            <option value="0">غير متاح</option>
            <option value="1"> متاح</option>
        </select>
    @error('is_available')
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
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <!-- Modal edit-->
                                    <div class="modal fade" id="Modaledit">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="edit_adhyat">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="edit_id" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> تعديل الأضحية</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                         <div class="mb-12 col-md-12"> 
                         
                         
                         
                                               <div class="mb-12 col-md-12">
                                                <label class="form-label">رقم الأضحية*</label>
                        
                                <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control @error('code') is-invalid @enderror" name="code" id="edit_code" value="{{ old('code') }}" placeholder="رقم الأضحية" Required>
                        
                                                   @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                         
                         
                                                       <label class="form-label">نوع الأضحية* 
                                                       <span id="e_type_v"></span>
                                                       </label>
                                                       <div class="note-adahy">
                        <select class="form-control  @error('type') is-invalid @enderror" id="edit_type" name="type"  Required>
                           
                            @foreach($adahy_type as $g)
                            <option value="{{$g->name}}">{{$g->name}}</option>
                            @endforeach
                            </select>
                                    </div>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                                            </div>
                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">الصك*</label>
                                                 <div class="note-sak">
                       <select class="form-control note-sak @error('sak') is-invalid @enderror" id="edit_sak" name="sak"  Required>
                            @foreach($sak as $sak)
                            <option value="{{$sak->name}}">{{$sak->name}}</option>
                            @endforeach
                            </select>
                            </div>
                                                   @error('sak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                <div class="mb-12 col-md-12">
                                                <label class="form-label">يوم الذبح*</label>
                       <div class="note-days">
                       <select class="form-control note-days @error('days') is-invalid @enderror" id="edit_days" name="days"  Required>
                            @foreach($days as $days)
                            <option value="{{$days->name}}">{{$days->name}}</option>
                            @endforeach
                            </select>
                             </div>
                                                   @error('days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                                                         <div class="mb-12 col-md-12">
                                                <label class="form-label">التوقيت *</label>
                       <select class="form-control @error('times') is-invalid @enderror" name="times"  Required>
                            @foreach($times as $time)
                            <option value="{{$time->id}}">{{$time->name}}</option>
                            @endforeach
                            </select>
                                                   @error('times')
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
                                    </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                         <!-- Modal delete-->
                                    <div class="modal fade" id="Modaldel">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form method="post" action="del_adhyat">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="del_id" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> مسح الأضحية</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
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
                                    <table  class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>كود</th>
                                                <th>رقم الأضحية</th>
                                                <th>نوع الأضحية</th>
                                                <th>نوع الصك</th>
                                                <th>يوم الذبح</th>
                                                 <th>التوقيت </th>
                                                 <th>المحافظة </th>
                                                <th>تعديل</th>
                                                <th>مسح</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get as $g)
                                            <tr>
                                                <td>{{$g->id}}</td>
                                                <td>{{$g->code}}</td>
                                                <td>{{$g->adahy}}</td>
                                                <td>{{$g->sak}}</td>
                                                <td>{{$g->days}}</td>
 
                                                <td><span style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#Modaledita{{$g->id}}">{{@DB::table('times')->where('id',$g->times)->first()->name}}</span>
                                                    <td>
                                                        @switch($g->gov)
                                                            @case(01)
                                                                القاهرة
                                                                @break
                                                            @case(12)
                                                                الدقهلية
                                                                @break
                                                            @case(24)
                                                                 المنيا
                                                                @break  
                                                        @endswitch
                                                    </td>
                                                     <!-- Modal delete-->
                                    <div class="modal fade" id="Modaledita{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form method="post" action="ed_adhyat">
                                        @csrf
                                                
                                                <input type="hidden" name="id" id="dela_id" value="{{$g->code}}" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{$g->code}} - {{$g->adahy}} تعديل الفترة</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                                    
                                                                              <div class="mb-12 col-md-12">
                                                <label class="form-label">التوقيت *</label>
                       <select class="form-control @error('times') is-invalid @enderror" name="times"  Required>
                            @foreach($times as $time)
                            <option value="{{$time->id}}" @php if($g->times == $time->id){echo "selected";} @endphp>{{$time->name}}</option>
                            @endforeach
                            </select>
                                                   @error('times')
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
                                    </div>
                                                </td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#Modaledit" class="btn btn-primary c_edit shadow btn-xs sharp me-1" data-id="{{$g->id}}" data-type="{{$g->adahy}}" data-sak="{{$g->sak}}" data-code="{{$g->code}}" data-days="{{$g->days}}"><i class="fa fa-pencil"></i></a></td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#Modaldel" class="btn btn-danger c_del shadow btn-xs sharp me-1" data-id="{{$g->id}}" data-adahy="{{$g->adahy}}" data-sak="{{$g->sak}}" data-days="{{$g->days}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a></td>
                                              
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>كود</th>
                                            <th>رقم الأضحية</th>
                                                <th>نوع الأضحية</th>
                                                <th>نوع الصك</th>
                                                <th>يوم الذبح</th>
                                                 <th>التوقيت </th>
                                                <th>تعديل</th>
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
<script>
    $(document).ready(function() {
        $("#select_adha_type").on('change', function() {
            var adhaType = $(this).val();
            $("#select_sak").html('<option>جاري التحميل...</option>');

            $.get("{{ url('get_sak_adahy') }}", { gov: adhaType }, function(data) {
                // نتوقع أن يرجع السيرفر HTML يحتوي على options فقط
                $('#select_sak').html(data);
            });
        });
    });
</script>

</body>
</html>



