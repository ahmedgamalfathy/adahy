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
						    نوع الأضحية
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
                <div class="row">
		   <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                        إضافة حساب جديد  
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                                <form method="post" action="/new_per">
                                        @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> حساب جديد </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                                                <div class="mb-12 col-md-12">
                                                <label class="form-label">الاسم*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="الاسم" Required>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>

                                            <div class="mb-12 col-md-12">
                                                <label class="form-label">المحافظة*</label>
                                                <select name='gov' class=" form-control">
                                                    <option value="05" >الكل</option>
                                                    <option value="12" >الدقهلية</option>
                                                    <option value="24" >المنيا</option>
                                                    <option value="01" >القاهرة</option>
                                                </select>
                                                @error('gov')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">كلمة السر*</label>
                        <input type="text"  class="form-control @error('pass') is-invalid @enderror" name="pass" value="{{ old('pass') }}" placeholder="كلمة السر" Required>
                                                   @error('pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                                                                 <div class="mb-12 col-md-12">
                                                <label class="form-label">الخزينة*</label>
                                                <select name="t_id"  class="form-control " Required>
                                                @foreach($get2 as $g2)
                                                <option value="{{$g2->id}}">{{$g2->name}}</option>
                                                @endforeach
                       </select>
                                                   @error('count')
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
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <!-- Modal edit-->
                                    <div class="modal fade" id="Modaledit">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                               <form method="post" action="/edit_per">
                                        @csrf
                                         <input type="hidden" name="id" id="edit_id" >
                                                <div class="modal-header">
                                                    <h5 class="modal-title"> تعديل الحساب  </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body" style="direction: rtl;
    font-size: 18px;
    padding: 25px;
    font-weight: bold;">
                                      
                                                                <div class="mb-12 col-md-12">
                                                <label class="form-label">الاسم*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="edit_name" name="name" value="{{ old('name') }}" placeholder="الاسم" Required>
                                                   @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                <div class="mb-12 col-md-12">
                <label class="form-label">المحافظة*</label>
                <select name='gov' class=" form-control">
                    <option value="05" {{ old('gov') == 05 ? "selected" :"" }} >الكل</option>
                    <option value="12" {{ old('gov') == 12 ? "selected" :"" }} >الدقهلية</option>
                    <option value="24" {{ old('gov') == 24 ? "selected" :"" }} >المنيا</option>
                    <option value="01" {{ old('gov') == 01 ? "selected" :"" }} >القاهرة</option>
                </select>
                @error('gov')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>


                                            
                                                                    <div class="mb-12 col-md-12">
                                                <label class="form-label">كلمة السر*</label>
                        <input type="text"  class="form-control @error('pass') is-invalid @enderror" id="edit_pass" name="pass" value="{{ old('pass') }}" placeholder="كلمة السر" Required>
                                                   @error('pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                            </div>
                                            
                                            
                                                                                 <div class="mb-12 col-md-12">
                                                <label class="form-label">الخزينة*</label>
                                                <select name="t_id"  class="form-control note-t_id" Required>
                                                @foreach($get2 as $g2)
                                                <option value="{{$g2->id}}">{{$g2->name}}</option>
                                                @endforeach
                       </select>
                                                   @error('count')
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
                                    <table class="table table-striped table-responsive-sm" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>كود</th>
                                                <th>الاسم</th>
                                                <th>كلمة السر</th>
                                                <th>الخزينة</th>
                                                <th>تعديل</th>
                                                <th>صلاحيات</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get as $g)
                                            <tr>
                                                <td>{{$g->id}}</td>
                                                <td>{{$g->email}}</td>
                                                 <td>{{$g->pass_c}}</td>
                                                <td>{{DB::table('treasures')->where('id',$g->t_id)->first()->name}}</td>
                                                
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#Modaledit" class="btn btn-primary c_edit shadow btn-xs sharp me-1" data-id="{{$g->id}}" data-name="{{$g->name}}" data-pass="{{$g->pass_c}}" data-t_id="{{$g->t_id}}"><i class="fa fa-pencil"></i></a></td>
                                                <td><a href="#" data-bs-toggle="modal" data-bs-target="#Modaldel{{$g->id}}" class="btn btn-warning c_del shadow btn-xs sharp me-1" data-id="{{$g->id}}" data-name="{{$g->name}}" data-pass="{{$g->pass}}" class="btn btn-danger shadow btn-xs sharp"><i class="flaticon-381-user-7"></i></a></td>
                                                
                                                
                                                         <!-- Modal delete-->
                                    <div class="modal fade" id="Modaldel{{$g->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="c_perm">
                                                    @csrf
                                                    <input type="hidden" name="id" id="_id" value="{{$g->id}}" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> إضافة / إلغاء صلاحية </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-12 col-md-12">
                                                            <div class="bootstrap-badge">
                                                                <?php
                                                                $get_perm = DB::table('per')->where('u_id',$g->id)->get();
                                                                foreach($get_perm as $get_p){
                                                                ?>
                                                                <span class="badge badge-primary">{{$get_p->page_ar}}</span>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">نوع الإضافة*</label>
                                                            <select name="type" class="form-control" required>
                                                                <option value="1">إضافة</option>
                                                                <option value="2">إلغاء</option>
                                                            </select>
                                                            @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-12 col-md-12">
                                                            <label class="form-label">الصفحات*</label>
                                                            <select name="pages[]" class="form-control" multiple required style="display:none;">
                                                                @foreach($pages as $page)
                                                                    <option value="{{$page->name}}">{{$page->name_ar}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="d-flex flex-wrap" id="pages-tags-{{$g->id}}">
                                                                @foreach($pages as $page)
                                                                    <span class="badge badge-secondary m-1 page-tag" data-value="{{$page->name}}" style="cursor:pointer;">
                                                                        {{$page->name_ar}}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                            <small class="text-muted">اضغط على الصلاحية لاختيارها أو إزالتها</small>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    var tagsContainer = document.getElementById('pages-tags-{{$g->id}}');
                                                                    var select = tagsContainer.previousElementSibling;
                                                                    tagsContainer.querySelectorAll('.page-tag').forEach(function(tag) {
                                                                        tag.addEventListener('click', function() {
                                                                            var value = this.getAttribute('data-value');
                                                                            var option = Array.from(select.options).find(opt => opt.value === value);
                                                                            if(option.selected) {
                                                                                option.selected = false;
                                                                                this.classList.remove('badge-primary');
                                                                                this.classList.add('badge-secondary');
                                                                            } else {
                                                                                option.selected = true;
                                                                                this.classList.remove('badge-secondary');
                                                                                this.classList.add('badge-primary');
                                                                            }
                                                                        });
                                                                    });
                                                                });
                                                            </script>
                                                            @error('pages')
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
                                                            تنفيذ
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                            </tr>
                                     @endforeach
                                 
                         
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                              <th>كود</th>
                                                <th>الاسم</th>
                                                <th>كلمة السر</th>
                                                <th>الخزينة</th>
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
      let pass=$(this).attr('data-pass');
      let t_id=$(this).attr('data-t_id');
     

  
      
     $('#edit_id').val(id);
 
  
  $('#edit_name').val(name); 
     $('#edit_pass').val(pass);  
    //  $('#edit_t_id').val(t_id);  

  $(".note-t_id select").val(t_id);
  

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