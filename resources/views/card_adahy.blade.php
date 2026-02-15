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
  use App\Models\tr_follower;
  @endphp
	<!-- PAGE TITLE HERE -->
	<title>Islah :  Admin </title>
	
	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
	 <!-- Datatable -->
    <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->

    
	{{-- <link href="/{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet"> --}}
	{{-- <link rel="stylesheet" href="/{{$theme1}}/vendor/nouislider/nouislider.min.css"> --}}
	<!-- Style css -->
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
	    <style>
        .body {
            font-weight: bold;
        }

        .right-cell {
            min-width: 80px !important;
            max-width: 50% !important;
            width: 28% !important;
            font-weight: bold;
            border-right-width: 6px !important;
            border-left-width: 6px !important;
            background-color: rgb(158, 201, 202) !important;
        }

        .left-cell {
            min-width: 50% !important;
            width: 72%;
            border-left-width: 6px !important;
        }

        .left-cell-2 {
            width: 48% !important;
        }

        .left-cell-3 {
            width: 24% !important;
        }

        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            border-color: rgb(0, 0, 0) !important;
            border-style: solid !important;
            border-width: 2px !important;
            /* padding-top: 8px !important;
            padding-bottom: 8px !important; */
            font-size: 20px !important;
            color: black !important;
            font-weight: bold !important;
        }

        .table-1 thead th {
            border-color: rgb(0, 0, 0) !important;
            border-width: 2px !important;
            border-top-width: 6px !important;
            /* padding-top: 8px !important;
            padding-bottom: 8px !important; */
        }

        .note-r {
            height: 175px !important;
            vertical-align: middle;
        }
        
        .row-2 {
            vertical-align: middle;
        }

        .head-cell {
            background-color: burlywood !important;
        }

        .head-cell-2 {
            background-color: rgb(190, 227, 205) !important;
        }

        /* إعدادات الطباعة */
        @media print {
            body * {
                visibility: hidden;
            }

            .printable-area,
            .printable-area * {
                visibility: visible;
            }

            .printable-area {
                position: absolute;
                left: 0;
                top: 0;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
            }

            /* حجم A4 أفقي */
            @page {
                size: A4 ;
                margin: 0.8cm;
            }

            /* حجم A5 عمودي */
            .a5-print {
                @page {
                    size: A5;
                    margin: 0;
                }
            }

            table {
                font-size: 14px !important;
            }

            .no-print {
                display: none !important;
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
    {{-- <div id="main-wrapper"> --}}
    <div >

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
            <div class="container-fluid my-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary btn-sm px-5 my-3 no-print" onclick="window.print()">طباعة</button>
                        <span class="mx-3 badge badge-info" style="font-size: 18px;">
                            عدد الكروت: {{ $get->count() }}
                        </span>
                        <form action="/card_adahy" method="GET" class="d-inline-block no-print">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="ابحث برقم الأضحية " value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">بحث</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="direction: rtl; page-break-after: always;">
                <div class="row printable-area">
                    <div class="col px-0">
                        @foreach($get as $item)
                        <div class="card h-auto m-0 rounded-0">
                            <div class="card-header py-3">
                                <img src="ad_logo.png" height="40px">
                                <h2>كارت أضحية</h2>
                                <img src="mark-islah.png" height="40px">
                            </div>
                            <div class="card-body d-flex d-lg-flex flex-column align-items-start flex-lg-row pt-2 px-2">
                                <div class="col col-12">
                                    <!-- الجدول الأول العرضي -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0 table-1">
                                            <thead>
                                                <tr>
                                                    <th class="head-cell text-center"
                                                        style="min-width: 80px !important;font-weight: bold;border-right-width: 6px !important;width: 28% !important;">
                                                        رقم الأضحية</th>
                                                    <th class="head-cell text-center"
                                                        style="font-weight: bold;max-width: 90px !important;min-width: 80px !important;">
                                                        النوع</th>
                                                    <th class="head-cell text-center"
                                                        style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">
                                                        عدد المشاركين</th>
                                                    <th class="head-cell text-center"
                                                        style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;border-left-width: 6px !important;">
                                                        الوزن قائم</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center py-2"
                                                        style="font-size: 26px !important;border-right-width: 6px !important;width: 28% !important;">
                                                        {{ $item->code }}
                                                    </td>
                                                    <td class="text-center">{{ $item->adahy }}</td>
                                                    <td class="text-center">{{ $item->sak_c }}</td>
                                                    <td class="text-center" style="border-left-width: 6px !important;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- الجدول الثاني - الرأسي -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="font-size:20px !important">
                                            <tbody>
                                                <tr>
                                                    <th class="text-center right-cell">رقم غرفة الذبح</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center right-cell">اسم جزار الذبح</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center right-cell">وزن الشقين والكبدة</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center right-cell">عدد الأقفاص</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr style="border-top-width: 6px !important;">
                                                    <th class="text-center right-cell">رقم غرفة التعبئة</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-center right-cell">وزن الدهن</th>
                                                    <td colspan="3" class="text-center left-cell"></td>
                                                </tr>
                                                <tr style="border-top-width: 4px !important;">
                                                    <th rowspan="2" class="text-center right-cell row-2">الوزن المشفى</th>
                                                    <td class="text-center left-cell-3 head-cell-2">وزن اللحم</td>
                                                    <td class="text-center left-cell-3 head-cell-2">وزن الكبدة</td>
                                                    <td class="text-center left-cell-3 head-cell-2" style="border-left-width: 6px !important;">الوزن الإجمالي</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center left-cell-3 text-white">-</td>
                                                    <td class="text-center left-cell-3"></td>
                                                    <td class="text-center left-cell-3" style="border-left-width: 6px !important;"></td>
                                                </tr>
                                                <tr style="border-top-width: 4px !important;">
                                                    <th rowspan="2" class="text-center right-cell row-2">أخــــرى</th>
                                                    <td class="text-center left-cell-3 head-cell-2">وزن الصك</td>
                                                    <td></td>
                                                    <td class="text-center left-cell-3 head-cell-2" style="border-left-width: 6px !important;">عدد الشكائر</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center left-cell-3 text-white">ـ</td>
                                                    <td class="text-center left-cell-3 "></td>
                                                    <td class="text-center left-cell-3" style="border-left-width: 6px !important;"></td>
                                                </tr>
                                                <tr style="border-width: 6px !important;" class="note-r">
                                                    <th class="text-center right-cell"
                                                        style="border-bottom-right-radius: 16px;">ملاحظات إضافية</th>
                                                                                                                @php
                                                            $notes = DB::table('adahyt')
                                                                ->join('reservation', 'adahyt.id', '=', 'reservation.ad_id')
                                                                ->where('reservation.ad_id', $item->id)
                                                                ->pluck('reservation.description')
                                                                ->filter()
                                                                ->implode(' | ');
                                                        //    $des= Str::limit($notes, 250, '...');
                                                        //    echo $des;
                                                        @endphp
                                                    <td colspan="3" class="text-center left-cell" style="{{ mb_strlen($notes) > 250 ? 'font-size:16px !important;' : 'font-size: 18px !important;'}}">
                                                        {{-- هنا يمكنك استخدام الكود الخاص بك لعرض الملاحظات --}}
                                                            {{ $notes }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
	{{-- <script src="/{{$theme1}}/vendor/chart.js/Chart.bundle.min.js"></script> --}}
	{{-- <script src="/{{$theme1}}/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script> --}}
	
	<!-- Apex Chart -->
	{{-- <script src="/{{$theme1}}/vendor/apexchart/apexchart.js"></script> --}}
	{{-- <script src="/{{$theme1}}/vendor/nouislider/nouislider.min.js"></script> --}}
	{{-- <script src="/{{$theme1}}/vendor/wnumb/wNumb.js"></script> --}}
	
	<!-- Dashboard 1 -->
	{{-- <script src="/{{$theme1}}/vendor/js/dashboard/dashboard-1.js"></script> --}}
	
	
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

