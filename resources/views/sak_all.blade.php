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
    use App\Models\treasury_sak;
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
						    الصكوك    
						</a></li>
					</ol>
                </div>
                <!-- row -->
             
          <div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-twitter">
								<span class="s-icon">
								  الصكوك 
								</span>
							</div>
							<div class="row">
							    
							    	<div class="col-4 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$free + $reservation}}
										</span> </h4>
										<p class="m-0">إجمالى</p>
									</div>
								</div>
							    
								<div class="col-4 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$free}}
										</span> </h4>
										<p class="m-0">متبقى</p>
									</div>
								</div>
								<div class="col-4">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter">
										    {{$reservation}}
										</span> </h4>
										<p class="m-0">محجوز</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="col-xl-6 col-xxl-6 col-sm-6">
						<div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon">
								    البحث عن صك
								     </span>
							</div>
							<div class="row">
								<div class="col-12 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
									
								<button type="button" class="btn btn-whatsapp">
								    تحميل أكسل
								     <span class="btn-icon-end"><i class="fa fa-download"></i></span>
                                </button>	
									
									
									<button type="button" class="btn btn-vimeo" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
									    بحث مفصل
									     <span class="btn-icon-end"><i class="flaticon-381-search-2"></i></span>
                                </button>
										
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
					<!--  Modal -->
			  <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                 
                 
                 
                 <form method="get" action="sak_all">
                                                                 
    @csrf
            <div class="modal-header">
                <h5 class="modal-title">  بحث عن صك    </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body" style="direction: rtl;
font-size: 18px;
padding: 25px;
font-weight: bold;">


       
       <div class="row">
        <div class="mb-3 col-md-6">
            <label class="form-label">
                الاسم
            </label>
                                      
<input type="text" class="form-control" name="name" value="" placeholder="الاسم" >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>


        </div>
        <div class="mb-3 col-md-6">
            
                         <label class="form-label">الموبيل*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="mobile" value="" placeholder="الموبيل" >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        <div class="mb-3 col-md-6">
            
            <label class="form-label">الموبيل2*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="mobile2" value="" placeholder="الموبيل2" >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
        
        
                     <div class="mb-3 col-md-6">
          

                                                   
            <label class="form-label">مبلغ الحجز*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="pay" value=""  placeholder="مبلغ الحجز" >
             
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

                  
                 

          
        </div>
        
        
                        <div class="mb-3 col-md-6">
          
                                                        
            <label class="form-label">ملاحظات *</label>
<input type="text" class="form-control " name="note" value="" placeholder="ملاحظات " >
               
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>
          
        </div>
        
        
                                  <div class="mb-3 col-md-6">
            
            <label class="form-label">رقم الإيصال *</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="rec" value="" placeholder="رقم الإيصال " >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
                                     <div class="mb-3 col-md-6">
            
            <label class="form-label">رقم الدفتر*</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="def" value="" placeholder="رقم الدفتر " >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        
                                               <div class="mb-3 col-md-6">
            
            <label class="form-label">كود السيستم *</label>
<input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control " name="code" value="" placeholder="كود السيستم" >
              
<span class="invalid-feedback" role="alert">
    <strong></strong>
</span>

        </div>
        
        

        

        
        
        
        
                   
     
        
        
    </div>
       
       
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">
                    أغلاق
                </button>
                <button type="submit" class="btn btn-primary">
                    بحث
                </button>
            </div>
            </form>
                 
                 
                                            </div>
                                        </div>
                                    </div>

                                    <!-- END Modal -->
                             
		 
		 
		 <div class="row">
		     @foreach($get as $g)
		              <?
                           $get_sak_info = DB::table('adahyt')->where('id',$g->ad_id)->first();
                            $get_sak = DB::table('sak')->where('name',$get_sak_info->sak)->first();
                           $adahy_type_info = DB::table('adahy_type')->where('name',$get_sak_info->adahy)->first();
                           $total = @treasury_sak::where('treasury_id',$g->id)->orderBy('id','desc')->first()->total;
                           ?>
                    <div class="col-lg-12 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row m-b-30">
                                    <div class="col-md-5 col-xxl-12">
                                        <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                            <div class="new-arrivals-img-contnent">
                                           
                                           
                           <div class="card-body">
                               
                               
                               <div class="card overflow-hidden">
							<div class="social-graph-wrapper widget-facebook">
								<span class="s-icon">
								    {{$get_sak_info->days}}
								</span>
							</div>
							<div class="row">
								<div class="col-6 border-end">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter"></h4>
										<p class="m-0">{{$get_sak_info->adahy}}</p>
									</div>
								</div>
								<div class="col-6">
									<div class="pt-3 pb-3 ps-0 pe-0 text-center">
										<h4 class="m-1"><span class="counter"></h4>
										<p class="m-0">{{$get_sak_info->sak}}</p>
									</div>
								</div>
							</div>
						</div>
						
						
                               
             <div id="dlab_W_Todo3" class="widget-media dlab-scroll height370 ps ps--active-y" style="background: aliceblue;padding: 10px;background: aliceblue;
    padding: 10px;
    border-radius: 10px;
    text-align: center;">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="#">
                                             
                                                <?
                                                $get_info_client = DB::table('clients')->where('mob',$g->mobile)->first();
                                                ?>
                                                <h6 class="mb-0"> 
                                                {{$get_info_client->mob}}
                                                {{$get_info_client->mob2}}</h6>
                                                
                                              
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                             
                                                <h6 class="mb-0" style="padding-left: 20%;">{{$get_info_client->mob3}}</h6>
												
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                            
                                                <h6 class="mb-0" style="padding-left: 20%;">{{$get_info_client->mob4}} <strong class="text-warning"></strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success">
                                            </div>
                                           <a class="timeline-panel text-muted" href="#">
                                       
                                                <h6 class="mb-0" style="padding-left: 20%;">{{$get_info_client->zone}} <strong class="text-warning"></strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning">
                                            </div>
                                             <a class="timeline-panel text-muted" href="#">
                                             
                                                <h6 class="mb-0" style="padding-left: 20%;">{{$get_info_client->address}}</h6>
                                            </a>
                                        </li>
                                        
                                            <li>
                                            <div class="timeline-badge warning">
                                            </div>
                                             <a class="timeline-panel text-muted" href="#">
                                             
                                                <h6 class="mb-0" style="padding-left: 20%;">{{$g->created_at}}</h6>
                                            </a>
                                        </li>
                                    
                                    </ul>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 370px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 325px;"></div></div></div>
                                
                                
                                
                  
                          
                         <a class="btn btn-warning  me-3" style="margin-top: 20%;
    margin-left: 10%;" href="/treasury_sak/{{$g->id}}"><i class="flaticon-022-copy"></i>
                         حساب الصك
                         </a>       
                  
                                
                            </div>
                                           
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-xxl-12">
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="#">
                                                {{$g->name}}
                                            </a></h4>
                                            <div class="comment-review star-rating">
                                            
												<p class="price">{{(int)$get_sak->price2 -  $total}}</p>
                                            </div>
                                       
                                       
                                       
                                       <div class="card-body pt-3">
								<p class="description" style="font-size: 11px;">
								    @if($total == 0)
								    <div>
								        
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
								        
							<span class="me-2 oi-icon bgl-danger" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#Modaldel{{$g->id}}">
														<svg width="18" height="18" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6.57624 0.769646C6.77936 1.18944 6.59993 1.69725 6.18014 1.90038C5.01217 2.46236 4.02363 3.33579 3.31947 4.42928C2.59837 5.54986 2.21582 6.84986 2.21582 8.19048C2.21582 12.0363 5.34394 15.1644 9.18978 15.1644C13.0356 15.1644 16.1637 12.0363 16.1637 8.19048C16.1637 6.84986 15.7812 5.54985 15.0635 4.4259C14.3627 3.33241 13.3708 2.45897 12.2028 1.89699C11.783 1.69387 11.6036 1.18944 11.8067 0.766262C12.0098 0.34647 12.5143 0.167042 12.9374 0.370167C14.3898 1.06756 15.6187 2.1509 16.4887 3.51183C17.3825 4.90663 17.8564 6.52486 17.8564 8.19048C17.8564 10.5061 16.9559 12.6829 15.3174 14.3181C13.6822 15.9566 11.5054 16.8571 9.18978 16.8571C6.87415 16.8571 4.69733 15.9566 3.06217 14.3181C1.42363 12.6795 0.523111 10.5061 0.523111 8.19048C0.523111 6.52486 0.99707 4.90663 1.89421 3.51183C2.76764 2.15428 3.99655 1.06756 5.44551 0.370167C5.86868 0.170427 6.37311 0.34647 6.57624 0.769646Z" fill="#FF2E2E"></path>
															<path d="M5.89551 7.7402C5.72962 7.57431 5.64837 7.35765 5.64837 7.14098C5.64837 6.92431 5.72962 6.70765 5.89551 6.54176L8.02493 4.41233C8.33639 4.10088 8.74941 3.93161 9.18613 3.93161C9.62285 3.93161 10.0393 4.10426 10.3473 4.41233L12.4768 6.54176C12.8085 6.87353 12.8085 7.40843 12.4768 7.7402C12.145 8.07197 11.6101 8.07197 11.2783 7.7402L10.0291 6.49098L10.0291 11.3017C10.0291 11.7688 9.64993 12.148 9.18275 12.148C8.71556 12.148 8.33639 11.7688 8.33639 11.3017L8.33639 6.4876L7.08717 7.73681C6.76217 8.06858 6.22728 8.06858 5.89551 7.7402Z" fill="#FF2E2E"></path>
															</svg>

													</span>
													إلغاء الحجز
												</div>
								    @else
								    لا يمكن إلغاء الصك إلا فى حالة ان تكون مدفوعات العميل 0 جنيه
								@endif
								</p>
								<ul class="specifics-list">
								    
								    
								
											<li>
										<span class="bg-primary"></span>
										<div>
											<h4>{{@$get_sak->price2}} </h4>
											<span>
											    مصروفات الذبح
											    
											</span>
										</div>
									</li>
									
											<li>
										<span class="bg-orange"></span>
										<div>
											<h4>
											  {{@$get_sak->price}}  
											</h4>
											<span>
											    سعر الصك
											</span>
										</div>
									</li>
									
									
													<li>
										<span class="bg-danger"></span>
										<div>
											<h4>0</h4>
											<span>
											    الوزن الفعلى 
											</span>
										</div>
									</li>
									
										<li>
										<span class="bg-blue"></span>
										<div>
											<h4>
											    {{$adahy_type_info->price}}
											</h4>
											<span>
											    سعر الكيلو
											</span>
										</div>
									</li>
									
									
									
							
											<li>
										<span class="bg-secondary"></span>
										<div>
											<h4>{{(int)$get_sak->price2 -  $total}}</h4>
											<span>
											    حساب العميل
											</span>
										</div>
									</li>
									
									<li>
										<span class="bg-success"></span>
										<div>
											<h4>{{$total}}</h4>
											<span>
											    مدفوعات العميل
											</span>
										</div>
									</li>
									
								
									
							
									
							
									
									
								</ul>
							</div>
                                       
                                       
                                            <p>ملاحظات <span class="item">
                                                
                                            </span></p>
                                            <p class="text-content">
                                                {{$g->note}}
                                            </p>
                                        </div>
                                        
                                        
               <div class="card-body pb-0" style="    direction: rtl;">
							
								<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>
										    ثمن الحجز
										</strong>
										<span class="mb-0">
										    {{$g->pay}}
										</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>عدد مرات الحجز</strong>
										<span class="mb-0">{{$g->co_z}}</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong>تواريخ الحجز</strong>
										<span class="mb-0">
										  {{$g->history}}  
										</span>
									</li>
									<li class="list-group-item d-flex px-0 justify-content-between">
										<strong> 
										الموظف
										</strong>
										<span class="mb-0">
										    {{$g->agent}}
										    
										</span>
									</li>
										<li class="list-group-item d-flex px-0 justify-content-between">
										<strong> 
										الفرع
										</strong>
										<span class="mb-0">
										   <?
										   echo DB::table('treasures')->where('id',$g->treasury_id)->first()->name;
										   ?>
										    
										</span>
									</li>
								</ul>
                            </div>
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="card-footer pt-0 pb-0 text-center">
                                <div class="row">
									<div class="col-4 pt-3 pb-3 border-end">
										<h3 class="mb-1 text-primary">{{$g->id}}</h3>
										<span>كود</span>
									</div>
									<div class="col-4 pt-3 pb-3 border-end">
										<h3 class="mb-1 text-primary">{{$g->rec}}</h3>
										<span>رقم الايصال</span>
									</div>
									<div class="col-4 pt-3 pb-3">
										<h3 class="mb-1 text-primary">{{$g->def}}</h3>
										<span>رقم الدفتر</span>
                                    </div>
                                </div>
                            </div>
                                
                                
                            </div>
                        </div>
					</div>
					
					<!-- review -->
				@endforeach	
                </div>
		 
		  {{$get->withQueryString()->links("pagination::bootstrap-4")}}
	
		 
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
	    
	    



	  
	
</body>
</html>