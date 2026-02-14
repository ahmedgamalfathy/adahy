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
  use App\Models\tr_income;
  
  
     function getcase2($x)
  {
      $c1 = DB::table('opt')->where('code',$x)->count();
      if($c1 > 0){
          $ch = DB::table('opt')->where('code',$x)->where('b_room',0)->count();
          if($ch > 0)
          {
            return "مرحلة الوزن";   
          }else{
        $c =  DB::table('opt')->where('code',$x)->whereIN('type',[1,2,3,4,901])->where('b_entry_date','!=',0)->count();
        if($c > 0){
            return "مرحلة الجزارة";
        }else{
            $c2 = DB::table('opt')->where('code',$x)->whereIN('type',[5,6])->where('f_exit_date','=',0)->count();
            if($c2 > 0)
            {
                return "مرحلة التعبئة";
            }else{
                return "مرحلة التسليم";
            }
        }
          }
      }else{
       return "جارى النقل";   
      }
   
  }
  ?>
	<!-- PAGE TITLE HERE -->
	<title>بيانات الأضحية  </title>
	
	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
	 <!-- Datatable -->
    <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->

    
	<link href="/{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link rel="stylesheet" href="/{{$theme1}}/vendor/nouislider/nouislider.min.css">
	<!-- Style css -->
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
    
    <style>
        
        .rtl-input-text {
  border-radius: 0px 12px 12px 0px !important;
  -webkit-border-radius: 0px 12px 12px 0px !important;
  -moz-border-radius: 0px 12px 12px 0px !important;
  -ms-border-radius: 0px 12px 12px 0px !important;
  -o-border-radius: 0px 12px 12px 0px !important;
  width: 95px !important;
  text-align: center !important;
}

.rtl-input {
  border-radius: 16px 0px 0px 16px !important;
  -webkit-border-radius: 16px 0px 0px 16px !important;
  -moz-border-radius: 16px 0px 0px 16px !important;
  -ms-border-radius: 16px 0px 0px 16px !important;
  -o-border-radius: 16px 0px 0px 16px !important;
  text-align: center !important;
}

.frm-round {
  border: 1px solid #dddd;
  border-radius: 16px !important;
}

.form-control {
  height: 41px !important;
}

.v-data {
  background-color: white;
  border: 1px solid #dddd;
  padding: 4px 16px 4px 8px;
  width: 100% !important;
}
.col{
    direction: rtl;
}
@media (max-width: 399px) {
  .emp-info {
    width: 100% !important;
  }
}
    </style>
	
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
		   <div class="container-fluid" style="direction: rtl;">
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
		       
		<?
		/////get data
		$c = DB::table('adahyt')->where('code',$id)->count();
		if($c > 0){
		$info = DB::table('adahyt')->where('code',$id)->first();
		$opt_c = DB::table('opt')->where('code',$id)->count();
		if($opt_c > 0){
		 $opt = DB::table('opt')->where('code',$id)->first();   
		}
		
		}else{
		    
		    dd('رقم الاضحية غير موجود لدينا');
		}
		
		?>
		
		    
        <!--***********************************-->
    
            <!-- row -->
			<div class="container-fluid">
				<div class="text-center text-sm-end" style="direction:rtl">
					<h3 class="text-dark mb-4 d-inline-block">بيانات الأضحية : </h3>
					<h3 id="odNum" class="mb-4 d-inline-block text-primary" name="odNum">{{$id}}</h3>
					<h3 class="text-dark mb-4 d-inline-block me-5">حالة الأضحية : </h3>
					<h3 id="odCase" class="mb-4 d-inline-block text-primary" name="odCase">
					    
					 {{getcase2($id)}}   
					</h3>
				</div>
				<div class="row flex-column flex-md-row mb-3" style="direction: rtl;">
					<div class="col col-lg-5 mb-3">
						<div class="card shadow mb-0 h-auto">
							<div class="card-header py-3" style="height: 58.1875px;">
								<h6 class="text-primary fw-bold m-0">البيانات الأساسية</h6>
							</div>
							<div class="card-body">
								<form>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">نوع الأضحية</span><input id="tanzefEnterTime-3" class="form-control rtl-input" type="text" value="{{$info->adahy}}" placeholder="نوع الأضحية" name="tanzefEnterTime" readonly /></div>
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">مقدار الصك</span><input id="tanzefOutTime-3" class="form-control rtl-input" type="text" value="{{$info->sak}}" placeholder="مقدار الصك" name="tanzefOutTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">يوم الذبح</span><input id="tanzefFullTime-3" class="form-control rtl-input" type="text" value="{{$info->days}}" placeholder="يوم الذبح" name="tanzefFullTime" readonly /></div>
					<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">الفترة</span><input id="tanzefRoom-3" class="form-control rtl-input" type="text" value="{{@DB::table('times')->where('id',$info->times)->first()->name}}" placeholder="الفترة" name="tanzefRoom" readonly /></div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?
					if($opt_c < 1){
					?>
					<div class="col col-lg-7 pe-1 mb-3">
						<div class="row">
							<div class="col">
								<div class="card shadow h-auto mb-0">
									<div class="card-header py-3">
										<p class="text-primary fw-bold m-0">بيانات الوزن</p>
									</div>
									<div class="card-body">
										<form>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن القائم</span><input id="waznQa2em" class="form-control rtl-input" type="text" placeholder="الوزن القائم" name="waznQa2em" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الشقين</span><input id="waznSheqen" class="form-control rtl-input" type="text" placeholder="وزن الشقين" name="waznSheqen" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الصك</span><input id="waznDehn" class="form-control rtl-input" type="text" placeholder="وزن الدهن" name="waznDehn" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الملحقات</span><input id="waznMol7qat" class="form-control rtl-input" type="text" placeholder="الكبدة / القلب / الكلاوي" name="waznMol7qat" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن المشفى</span><input id="waznShafy" class="form-control rtl-input" type="text"  placeholder="الوزن المشفى" name="waznShafy" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن الصافي</span><input id="waznSafy" class="form-control rtl-input" type="text" placeholder="الوزن الصافي" name="waznSafy" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">نسبة التشفية</span><input id="waznShafy-1" class="form-control rtl-input" value="{{}}" type="text" placeholder="نسبة التشفية" name="waznShafy" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">نسبة التصفية</span><input id="waznSafy-1" class="form-control rtl-input" type="text" placeholder="نسبة التصفية" name="waznSafy" readonly /></div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?}else{
					?>
					<div class="col col-lg-7 pe-1 mb-3">
						<div class="row">
							<div class="col">
								<div class="card shadow h-auto mb-0">
									<div class="card-header py-3">
										<p class="text-primary fw-bold m-0">بيانات الوزن</p>
									</div>
									<div class="card-body">
										<form>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن القائم</span><input id="waznQa2em" class="form-control rtl-input" type="text" value="{{$opt->w_weight}}" placeholder="الوزن القائم" name="waznQa2em" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الشقين</span><input id="waznSheqen" class="form-control rtl-input" value="{{$opt->b_weight}}" type="text" placeholder="وزن الشقين" name="waznSheqen" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													@php
													$sak_c = DB::table('adahyt')->where('code',$opt->code)->first()->sak_c;
													$totalSak = ((float)($opt->f_weight + $opt->f_weight2)) / $sak_c;
													@endphp
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الصك</span><input id="waznDehn" class="form-control rtl-input" type="text" value="{{ number_format($totalSak,2) }}" placeholder="وزن الدهن" name="waznDehn" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وزن الملحقات</span><input id="waznMol7qat" class="form-control rtl-input" value="{{$opt->f_weight2}}" type="text" placeholder="الكبدة / القلب / الكلاوي" name="waznMol7qat" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن المشفى</span><input id="waznShafy" class="form-control rtl-input" value="{{$opt->f_weight}}" type="text" placeholder="الوزن المشفى" name="waznShafy" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوزن الصافي</span><input id="waznSafy" class="form-control rtl-input" value="{{$opt->f_weight + $opt->f_weight2}}" type="text" placeholder="الوزن الصافي" name="waznSafy" readonly /></div>
												</div>
											</div>
											<div class="row flex-column flex-sm-row">
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">نسبة التشفية</span><input id="waznShafy-1" class="form-control rtl-input" value="{{number_format($opt->f_case,2) }}" type="text" placeholder="نسبة التشفية" name="waznShafy" readonly /></div>
												</div>
												<div class="col">
													<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">نسبة التصفية</span><input id="waznSafy-1" class="form-control rtl-input" value="{{ number_format($opt->b_case,2) }}" type="text" placeholder="نسبة التصفية" name="waznSafy" readonly /></div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?}?>
				</div>
				
				
					<div class="row">
					<div class="col">
						<div class="card shadow mb-3 h-auto">
							<div class="card-header py-3">
								<p class="text-primary fw-bold m-0">بيانات التشغيل للصكوك</p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center">*</th>
												<th class="text-center">طباعة</th>
												<th class="text-center" style="min-width: 70px;max-width: 70px;">رقم الصك</th>
												<th class="text-center">المضحي</th>
												<th class="text-center" style="min-width: 110px;max-width: 110px;">الملحق المحجوز</th>
												<th class="text-center" style="min-width: 90px;max-width: 90px;">مشاهدة الذبح</th>
												<th class="text-center" style="min-width: 80px;max-width: 80px;">إيداع بالثلاجة</th>
												<th class="text-center" style="min-width: 40px;max-width: 50px;">التوصيل</th>
												<th class="text-center" style="min-width: 100px;max-width: 100px;">ملاحظات</th>
											</tr>
										</thead>
										<tbody>
										    <?
										    $x = 1;
										    $get_sak = DB::table('reservation')->where('code',$id)->get();
										    foreach($get_sak as $gs){
										    ?>
											<tr>
												<td class="text-center">{{$x}}</td>
												<td class="text-center"><a href="/print2/{{$gs->id}}">طباعة</a></td>
												<td class="text-center">{{$gs->rec}}</td>
												<td>{{$gs->name}}</td>
												<td class="text-center">
												    <?
												    $g_acc = DB::table('callcenter')->where('re_id',$gs->id)->whereNotNull('acc')->take(1)->orderBy('id','desc')->get();
												    foreach($g_acc as $g){
												        echo $g->acc."-";
												    }
												    ?>
												    
												  
												    
												</td>
												<td class="text-center">
												    <?
												    $view = 0;
										$gviewc = DB::table('callcenter')->where('re_id',$gs->id)->whereNotNull('view')->count();
                                                if($gviewc > 0){
                                        $view = DB::table('callcenter')->where('re_id',$gs->id)->whereNotNull('view')->orderBy('id','desc')->first()->view;
                                                }
												    
												    ?>
													<div class="form-check form-switch form-check-inline form-check-reverse">
													    <input id="formCheck-1" class="form-check-input" type="checkbox" <?if($view == "نعم"){?>checked<?}?> /><label class="form-check-label" for="formCheck-1"></label></div>
												</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-5" class="form-check-input" type="checkbox" 
													<? if($gs->retype == 2 || $gs->retype == 4){echo "checked";} ?>
													
													 /><label class="form-check-label" for="formCheck-5"></label></div>
												</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-4" class="form-check-input" type="checkbox" 
													<? if($gs->retype == 3){echo "checked";} ?>
													/><label class="form-check-label" for="formCheck-4"></label></div>
												</td>
												<td class="text-center">-</td>
											</tr>
											<? $x++; }?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
						<?
					if($opt_c < 1){
					?>
		
				<div class="row">
				<div class="col">
					<div class="card-header py-3">
						<p class="text-primary fw-bold m-0">بيانات التشغيل</p>
					</div>
					<div class="card-body">
						<div class="row">
							{{-- <div class="col-md-6 mb-3 d-none">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-warning badge badge-xl w-100" style="margin-bottom: 16px !important;">في انتظار  الذبح</h3>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت البداية</span><input id="entzarEnterTime" class="form-control rtl-input" type="text" placeholder="وقت البداية" name="entzarEnterTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="entzarOutTime" class="form-control rtl-input" type="text" placeholder="وقت الخروج" name="entzarOutTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="entzarNotes" class="form-control rtl-input" name="entzarNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div> --}}
							<div class="col-md-6 mb-3">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-primary badge badge-xl w-100" style="margin-bottom: 16px !important;">الجزارة</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="gzEnterTime" class="form-control rtl-input" type="text" placeholder="وقت الدخول" name="gzEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="gzOutTime" class="form-control rtl-input" type="text" placeholder="وقت الخروج" name="gzOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="gzFullTime" class="form-control rtl-input" type="text" placeholder="الوقت المستغرق" name="gzFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="gzRoom" class="form-control rtl-input" type="text" placeholder="رقم الغرفة" name="gzRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="gzNotes" class="form-control rtl-input" name="gzNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6 mb-3" style="direction: rtl;">
								<form class="rounded-4 frm-round p-3 shadow h-100">
									<h3 class="badge-success badge badge-xl w-100" style="margin-bottom: 16px !important;">التبريد</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="coolingEnterTime" class="form-control rtl-input" type="text" placeholder="وقت الدخول" name="coolingEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="coolingOutTime" class="form-control rtl-input" type="text" placeholder="وقت الخروج" name="coolingOutTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="coolingFullTime" class="form-control rtl-input" type="text" placeholder="الوقت المستغرق" name="coolingFullTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="coolingNotes" class="form-control rtl-input" name="coolingNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						{{-- <div class="row">
							<div class="col-md-6 mb-3 d-none" style="direction: rtl;">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-info badge badge-xl w-100" style="margin-bottom: 16px !important;">تنظيف السقط</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="tanzefEnterTime" class="form-control rtl-input" type="text" placeholder="وقت الدخول" name="tanzefEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="tanzefOutTime" class="form-control rtl-input" type="text" placeholder="وقت الخروج" name="tanzefOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="tanzefFullTime" class="form-control rtl-input" type="text" placeholder="الوقت المستغرق" name="tanzefFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="tanzefRoom" class="form-control rtl-input" type="text" placeholder="رقم الغرفة" name="tanzefRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="gzNotes-1" class="form-control rtl-input" name="gzNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>							
						</div> --}}
						<div class="row">
							<div class="col-md-6 mb-3">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-warning badge badge-xl w-100" style="margin-bottom: 16px !important;">التعبئة</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="ta3b2aEnterTime" class="form-control rtl-input" type="text" placeholder="وقت الدخول" name="ta3b2aEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="ta3b2aOutTime-2" class="form-control rtl-input" type="text" placeholder="وقت الخروج" name="ta3b2aOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="ta3b2aFullTime" class="form-control rtl-input" type="text" placeholder="الوقت المستغرق" name="ta3b2aFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="ta3b2aRoom" class="form-control rtl-input" type="text" placeholder="رقم الغرفة" name="ta3b2aRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="ta3b2aNotes" class="form-control rtl-input" name="ta3b2aNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6 mb-3">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-primary badge badge-xl w-100" style="margin-bottom: 16px !important;">تجهيز للتسليم</h3>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="taghezEnterTime" class="form-control rtl-input" type="text" placeholder="وقت الدخول" name="taghezEnterTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="taghezRoom" class="form-control rtl-input" type="text" placeholder="رقم الغرفة" name="taghezRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="taghezNotes" class="form-control rtl-input" name="taghezNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-info badge badge-xl w-100" style="margin-bottom: 16px !important;">الثلاجة</h3>
									<div class="row">
										<div class="col px-4">
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th class="text-center">*</th>
															<th class="text-center">رقم الصك</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الدخول</th>
															<th class="text-center">مندوب النقل</th>
															<th class="text-center">موظف الثلاجة</th>
															<th class="text-center" style="min-width: 80px;max-width: 80px;">الوزن</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الخروج</th>
															<th>موظف التسليم</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">المستلم</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">ملاحظات</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="text-center">1</td>
															<td class="text-center">Cell 2</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 7</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 3</td>
															<td class="text-center">Cell 3</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card shadow mb-3 h-auto">
							<div class="card-header py-3">
								<p class="text-primary fw-bold m-0">بيانات تسليم الصكوك</p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center">*</th>
												<th class="text-center">المضحي</th>
												<th class="text-center">الموبايل</th>
												<th class="text-center" style="min-width: 120px;max-width: 120px;">الملحق المستلم</th>
												<th class="text-center px-0" style="min-width: 100px;max-width: 100px;">الوزن المشفى</th>
												<th class="text-center" style="min-width: 50px;max-width: 60px;">قام بتبرع</th>
												<th class="text-center px-0" style="min-width: 70px;max-width: 70px;">كمية التبرع</th>
												<th class="text-center" style="min-width: 40px;max-width: 50px;">بالثلاجة</th>
												<th class="text-center px-0" style="min-width: 60px;max-width: 70px;">تم الاستلام</th>
												<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الاستلام</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center">1</td>
												<td>Cell 2</td>
												<td class="text-center">Cell 3</td>
												<td class="text-center">Cell 3</td>
												<td class="text-center">Cell 3</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-2" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-2"></label></div>
												</td>
												<td class="text-center">Cell 7</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-6" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-6"></label></div>
												</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-3" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-3"></label></div>
												</td>
												<td class="text-center">Cell 3</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card shadow h-auto mb-0">
					<div class="card-header py-3">
						<h6 class="text-primary fw-bold m-0">بيانات الأفراد</h6>
					</div>
					<div class="card-body">
						<form>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#gazzarName">الجزار</label><input id="gazzarName" class="form-control" type="text" placeholder="الجزار" name="gazzarName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#gezaraSupervisor">مشرف الجزارة</label><input id="gezaraSupervisor" class="form-control" type="text" placeholder="مشرف الجزارة" name="gezaraSupervisor" /></div>
							</div>
							{{-- <div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#tanzefName">معلم التنظيف</label><input id="tanzefName" class="form-control" type="text" placeholder="معلم التنظيف" name="tanzefName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#tanzefSupervisor">مشرف التنظيف</label><input id="tanzefSupervisor" class="form-control" type="text" placeholder="مشرف التنظيف" name="tanzefSupervisor" /></div>
							</div> --}}
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#transMandub">مندوب النقل</label><input id="transMandub" class="form-control" type="text" placeholder="مندوب النقل" name="transMandub" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#ta3b2aSupervisor">مشرف التعبئة</label><input id="ta3b2aSupervisor" class="form-control" type="text" placeholder="مشرف التعبئة" name="ta3b2aSupervisor" /></div>
							</div>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#taslemSupervisor">مشرف التجهيز للتسليم</label><input id="taslemSupervisor" class="form-control" type="text" placeholder="مشرف التجهيز للتسليم" name="taslemSupervisor" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#taslemSakSupervisor">مشرف تسليم الصكوك</label><input id="taslemSakSupervisor" class="form-control" type="text" placeholder="مشرف تسليم الصكوك" name="taslemSakSupervisor" /></div>
							</div>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#MowardName">المورد</label><input id="MowardName" class="form-control" type="text" placeholder="المورد" name="MowardName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#mostalemName">مستلم الصك</label><input id="mostalemName" class="form-control" type="text" placeholder="مستلم الصك" name="mostalemName" /></div>
							</div>
						</form>
					</div>
				</div>
				<?}else{?>
				
				<div class="row" style="background:#fff">
					<div class="card-header py-3">
						<p class="text-primary fw-bold m-0">بيانات التشغيل</p>
					</div>
					<div class="card-body">
						<div class="row" style="direction:rtl">
							<div class="col-md-6 mb-3 d-none">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-warning badge badge-xl w-100" style="margin-bottom: 16px !important;">في انتظار  الذبح</h3>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت البداية</span><input id="entzarEnterTime" class="form-control rtl-input" type="text" value="{{$opt->wb_entry_date}}" placeholder="وقت البداية" name="entzarEnterTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="entzarOutTime" class="form-control rtl-input" value="{{$opt->wb_exit_date}}" type="text" placeholder="وقت الخروج" name="entzarOutTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="entzarNotes" class="form-control rtl-input" value="{{$opt->wb_note}}" name="entzarNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6 mb-3">
								<form class="rounded-4 frm-round p-3 shadow" style="    direction: rtl;">
									<h3 class="badge-primary badge badge-xl w-100" style="margin-bottom: 16px !important;">الجزارة</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="gzEnterTime" class="form-control rtl-input" type="text" value="{{$opt->b_entry_date}}" placeholder="وقت الدخول" name="gzEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="gzOutTime" class="form-control rtl-input" type="text" value="{{$opt->b_exit_date}}" placeholder="وقت الخروج" name="gzOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="gzFullTime" class="form-control rtl-input" type="text" value="{{$opt->b_deff_date}}" placeholder="الوقت المستغرق" name="gzFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="gzRoom" class="form-control rtl-input" type="text" value="{{$opt->b_room}}" placeholder="رقم الغرفة" name="gzRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="gzNotes" class="form-control rtl-input" name="gzNotes">{{$opt->b_note}}</textarea></div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6 mb-3" style="direction: rtl;">
								<form class="rounded-4 frm-round p-3 shadow h-100">
									<h3 class="badge-success badge badge-xl w-100" style="margin-bottom: 16px !important;">التبريد</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="coolingEnterTime" class="form-control rtl-input" type="text" value="{{$opt->fb_entry_date}}" placeholder="وقت الدخول" name="coolingEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="coolingOutTime" class="form-control rtl-input" type="text" value="{{$opt->fb_exit_date}}" placeholder="وقت الخروج" name="coolingOutTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="coolingFullTime" class="form-control rtl-input" type="text" value="{{$opt->fb_deff_date}}" placeholder="الوقت المستغرق" name="coolingFullTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-success"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="coolingNotes" class="form-control rtl-input" value="{{$opt->fb_note}}" name="coolingNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-3 d-none" style="direction: rtl;">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-info badge badge-xl w-100" style="margin-bottom: 16px !important;">تنظيف السقط</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="tanzefEnterTime" class="form-control rtl-input" type="text" value="{{$opt->d_entry_date}}" placeholder="وقت الدخول" name="tanzefEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="tanzefOutTime" class="form-control rtl-input" type="text" value="{{$opt->d_exit_date}}" placeholder="وقت الخروج" name="tanzefOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="tanzefFullTime" class="form-control rtl-input" type="text" value="{{$opt->d_deff_date}}" placeholder="الوقت المستغرق" name="tanzefFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="tanzefRoom" class="form-control rtl-input" type="text" placeholder="رقم الغرفة" name="tanzefRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-info"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="gzNotes-1" class="form-control rtl-input" name="gzNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-6 mb-3" style="direction:rtl">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-warning badge badge-xl w-100" style="margin-bottom: 16px !important;">التعبئة</h3>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="ta3b2aEnterTime" class="form-control rtl-input" type="text" value="{{$opt->f_entry_date}}" placeholder="وقت الدخول" name="ta3b2aEnterTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">وقت الخروج</span><input id="ta3b2aOutTime-2" class="form-control rtl-input" type="text" value="{{$opt->f_exit_date}}" placeholder="وقت الخروج" name="ta3b2aOutTime" readonly /></div>
										</div>
									</div>
									<div class="row flex-column flex-sm-row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">الوقت المستغرق</span><input id="ta3b2aFullTime" class="form-control rtl-input" type="text" value="{{$opt->f_deff_date}}" placeholder="الوقت المستغرق" name="ta3b2aFullTime" readonly /></div>
										</div>
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="ta3b2aRoom" class="form-control rtl-input" type="text" value="{{$opt->f_room}}" placeholder="رقم الغرفة" name="ta3b2aRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-warning"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="ta3b2aNotes" class="form-control rtl-input" value="{{$opt->s_note}}" name="ta3b2aNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-6 mb-3">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-primary badge badge-xl w-100" style="margin-bottom: 16px !important;">تجهيز للتسليم</h3>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">وقت الدخول</span><input id="taghezEnterTime" class="form-control rtl-input" type="text" value="{{$opt->d_entry_date}}" placeholder="وقت الدخول" name="taghezEnterTime" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">رقم الغرفة</span><input id="taghezRoom" class="form-control rtl-input" type="text" value="{{$opt->d_room}}" placeholder="رقم الغرفة" name="taghezRoom" readonly /></div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="mb-3 input-group input-primary"><span class="input-group-text rtl-input-text">ملاحظات</span><textarea id="taghezNotes" class="form-control rtl-input" value="{{$opt->d_note}}" name="taghezNotes"></textarea></div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<form class="rounded-4 frm-round p-3 shadow">
									<h3 class="badge-info badge badge-xl w-100" style="margin-bottom: 16px !important;">الثلاجة</h3>
									<div class="row">
										<div class="col px-4">
											<div class="table-responsive">
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th class="text-center">*</th>
															<th class="text-center">طباعة</th>
															<th class="text-center">رقم الصك</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الدخول</th>
															<th class="text-center">مندوب النقل</th>
															<th class="text-center">موظف الثلاجة</th>
															<th class="text-center" style="min-width: 80px;max-width: 80px;">الوزن</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الخروج</th>
															<th>موظف التسليم</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">المستلم</th>
															<th class="text-center" style="min-width: 100px;max-width: 100px;">ملاحظات</th>
														</tr>
													</thead>
													<tbody>
													    
													    <?
													  $x = 1;
										    $get_sakss = DB::table('reservation')->where('code',$id)->whereIN('retype',[2,4])->get();
										    foreach($get_sakss as $gz){
										      $gzz = DB::table('freez')->where('re_id',$gz->id)->first();
										      $gz_opt = DB::table('opt')->where('code',$id)->first();
										      $gz_skc = DB::table('adahyt')->where('code',$id)->first();
										      $weight_sak = $gz_opt->f_weight + $gz_opt->f_weight2 / $gz_skc->sak_c;
													    ?>
														<tr>
															<td class="text-center">{{$x}}</td>
															<td class="text-center"><a href="/print4/{{$gs->id}}">طباعة</a></td>
															<td class="text-center">{{$gz->rec}}</td>
															<td class="text-center">{{$gzz->created_at}}</td>
															<td class="text-center">{{$gzz->follower}}</td>
															<td class="text-center">{{$gzz->follower}}</td>
															<td class="text-center">{{$gz_opt->f_weight + $gz_opt->f_weight2 / $gz_skc->sak_c}}</td>
															<td class="text-center"></td>
															<td class="text-center"></td>
															<td class="text-center"></td>
															<td class="text-center"></td>
														</tr>
														<?$x++; }?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="card shadow mb-3 h-auto">
							<div class="card-header py-3">
								<p class="text-primary fw-bold m-0">بيانات تسليم الصكوك</p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<th class="text-center">*</th>
													<th class="text-center">طباعة</th>
												<th class="text-center">المضحي</th>
												<th class="text-center">الموبايل</th>
												<th class="text-center" style="min-width: 120px;max-width: 120px;">الملحق المستلم</th>
												<th class="text-center px-0" style="min-width: 100px;max-width: 100px;">الوزن المشفى</th>
												<th class="text-center" style="min-width: 50px;max-width: 60px;">قام بتبرع</th>
												<th class="text-center px-0" style="min-width: 70px;max-width: 70px;">كمية التبرع</th>
												<th class="text-center" style="min-width: 40px;max-width: 50px;">بالثلاجة</th>
												<th class="text-center px-0" style="min-width: 60px;max-width: 70px;">تم الاستلام</th>
												<th class="text-center" style="min-width: 100px;max-width: 100px;">وقت الاستلام</th>
											</tr>
										</thead>
										<tbody>
										    <?
										    $x = 1;
										    $get_saks = DB::table('reservation')->where('code',$id)->where('retype',1)->get();
										    foreach($get_saks as $get){
										        
										    ?>
											<tr>
												<td class="text-center">{{$x}}</td>
												<td class="text-center"><a href="/print4/{{$gs->id}}">طباعة</a></td>
												<td>{{$get->name}}</td>
												<td class="text-center">{{$get->mobile}}</td>
												<td class="text-center">
												    	    <?
												    $g_acc = DB::table('adahy_acc')->where('r_id',$get->rec)->get();
												    foreach($g_acc as $g){
												        echo $g->name."-";
												    }
												    ?>
												</td>
												<td class="text-center">
												    
												</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-2" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-2"></label></div>
												</td>
												<td class="text-center">{{@$weight_sak}}</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-6" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-6"></label></div>
												</td>
												<td class="text-center">
													<div class="form-check form-switch form-check-inline form-check-reverse"><input id="formCheck-3" class="form-check-input" type="checkbox" /><label class="form-check-label" for="formCheck-3"></label></div>
												</td>
												<td class="text-center"></td>
											</tr>
											<?$x++; }?>
										</tbody>
										
										
										
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card shadow h-auto mb-0">
					<div class="card-header py-3">
						<h6 class="text-primary fw-bold m-0">بيانات الأفراد</h6>
					</div>
					<div class="card-body">
						<form>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#gazzarName">الجزار</label><input id="gazzarName" class="form-control" type="text" value="{{$opt->b_butcher}}" placeholder="الجزار" name="gazzarName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#gezaraSupervisor">مشرف الجزارة</label><input id="gezaraSupervisor" class="form-control" value="{{$opt->b_follower}}" type="text" placeholder="مشرف الجزارة" name="gezaraSupervisor" /></div>
							</div>
							{{-- <div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#tanzefName">معلم التنظيف</label><input id="tanzefName" class="form-control" type="text" value="{{$opt->d_teacher}}"  placeholder="معلم التنظيف" name="tanzefName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#tanzefSupervisor">مشرف التنظيف</label><input id="tanzefSupervisor" class="form-control" type="text" value="{{$opt->d_follower}}" placeholder="مشرف التنظيف" name="tanzefSupervisor" /></div>
							</div> --}}
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#transMandub">مندوب النقل</label><input id="transMandub" class="form-control" type="text" value="{{$opt->f_follower}}" placeholder="مندوب النقل" name="transMandub" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#ta3b2aSupervisor">مشرف التعبئة</label><input id="ta3b2aSupervisor" class="form-control" type="text" value="{{$opt->r_follower}}" placeholder="مشرف التعبئة" name="ta3b2aSupervisor" /></div>
							</div>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" value="{{$opt->r_follower}}" for="#taslemSupervisor">مشرف التجهيز للتسليم</label><input id="taslemSupervisor" class="form-control" type="text" placeholder="مشرف التجهيز للتسليم" name="taslemSupervisor" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#taslemSakSupervisor">مشرف تسليم الصكوك</label><input id="taslemSakSupervisor" class="form-control" type="text" value="{{$opt->r_follower}}" placeholder="مشرف تسليم الصكوك" name="taslemSakSupervisor" /></div>
							</div>
							<div class="d-sm-flex justify-content-between align-items-xl-center gap-2">
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" for="#MowardName">المورد</label><input id="MowardName" class="form-control" type="text" value="{{$opt->w_vendor}}" placeholder="المورد" name="MowardName" /></div>
								<div class="mb-3 w-50 emp-info"><label class="form-label me-2" value="{{$opt->r_follower}}" for="#mostalemName">مستلم الصك</label><input id="mostalemName" class="form-control" type="text" placeholder="مستلم الصك" name="mostalemName" /></div>
							</div>
						</form>
					</div>
				</div>
				
				<?}?>
				
				
				
				
				
			</div>
     
        <!--**********************************
            Content body end
        ***********************************-->
		
	
		 
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
	
</body>
</html>