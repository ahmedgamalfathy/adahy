<!DOCTYPE html>
<html data-bs-theme="light" lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>adahi-Live</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo&amp;display=swap">
    <link rel="stylesheet" href="assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/editStyles.css">
    <link rel="stylesheet" href="assets/css/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/theme1/vendor/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/theme1/vendor/jquery-nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/theme1/vendor/nouislider/nouislider.min.css">
    <link rel="stylesheet" href="/theme1/css/style.css">
    
    	<meta http-equiv="refresh" content="300">
    <?php
  $theme1 = "theme1";
  date_default_timezone_set("Africa/Kampala"); 
    use App\Models\treasury_sak;
    use App\Models\adahyt;
    use App\Models\sak;
     use App\Models\opt;
     use App\Models\reservation;
     use App\Models\adahy_type;
  
  ?>
  
  <style>
.rtl-input-text {
  border-radius: 0px 12px 12px 0px !important;
  -webkit-border-radius: 0px 12px 12px 0px !important;
  -moz-border-radius: 0px 12px 12px 0px !important;
  -ms-border-radius: 0px 12px 12px 0px !important;
  -o-border-radius: 0px 12px 12px 0px !important;
  width: 95px !important;
}

.rtl-input {
  border-radius: 16px 0px 0px 16px !important;
  -webkit-border-radius: 16px 0px 0px 16px !important;
  -moz-border-radius: 16px 0px 0px 16px !important;
  -ms-border-radius: 16px 0px 0px 16px !important;
  -o-border-radius: 16px 0px 0px 16px !important;
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

.fixed-header-table {
  position: relative;
  max-height: 700px;
  overflow-y: auto;
}

.fixed-header-table thead th {
  position: sticky;
  top: 52px;
  z-index: 10;
}

.fixed-header-table .fixed-caption {
  position: sticky;
  top: 0;
  z-index: 10;
  margin-top: 0;
  background-color: white;
}

@media (max-width: 399px) {
  .emp-info {
    width: 100% !important;
  }
}



        .th2 {
            position: sticky !important;
            top: 110px !important;
            z-index: 11 !important;

            min-width: 60px !important;
            max-width: 90px !important;
            font-weight: bold;
        }

        .th-1 {
            min-width: 80px !important;
            max-width: 180px !important;
            font-weight: bold;
        }

        .cell-right {
            border-right-color: rgb(211, 211, 211) !important;
        }

        .cell-left {
            border-left-color: rgb(211, 211, 211) !important;
        }

        .num {
                font-size: 18px;
            }

        @media (max-width: 600px) {
            .th2 {
                min-width: 30px !important;
                font-size: 13px !important;
                font-weight: bold !important;
                top: 106px !important;
            }
            .th-1 {
                min-width: 60px !important;
                max-width: 80px !important;
                font-size: 15px !important;
                font-weight: bold !important;
            }
            .num {
                font-size: 14px;
            }
        }
    </style>
</head>

<body style="font-family: Cairo, sans-serif;direction: rtl !important;font-weight: bold;">
    <div class="container-fluid">
        <div class="row">
            <div class="col px-0">
                <div class="card h-auto">
                
                    <div class="card-body d-flex d-lg-flex flex-column align-items-start flex-lg-row pt-0 px-0 gap-2">
                        <div class="col col-12 col-lg-6">
                            <div class="table-responsive fixed-header-table">
                                  <table class="table table-bordered">
                                    <caption class="text-center fixed-caption caption-top"
                                        style="text-align: right;font-size: 24px;color: rgb(0,166,81);">العجول</caption>
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="10%" class="text-center th-1"
                                                style="font-weight: bold;border-top-right-radius: 16px;padding-bottom:35px;background-color: #d7cbe1;">
                                                رقم<br>الأضحية</th>
                                            <!-- <th class="text-center" style="font-weight: bold;max-width: 90px !important;min-width: 80px !important;">بانتظار<br>الذبح</th> -->
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #e7c0c0;">
                                                مرحلة الجزارة</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #c1daef;">
                                                مرحلة التبريد</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #dcd0e5;">
                                                مرحلة التعبئة</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="border-top-left-radius: 16px;background-color: #a5d3cf;">
                                                مرحلة التسليم</th>
                                        </tr>
                                        @php
                                        $day = "اليوم  الثالث";
                                        $type =['بقرى','جمسى','من الخارج'];
                                         $gets =DB::table('adahyt')->whereIN('adahy',$type)->whereNOTIN('code',[227,229])->where('days',$day)->get();
                                         $gets = collect($gets)->reverse();
                                        @endphp
                                        <tr>
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($gets as $get )
                                        @php
                                            $opt = DB::table('opt')->where('code',$get->code)->first();
                                        @endphp
                                        @if ($opt && $opt->b_entry_date > 0)
                                            <tr>
                                                <td class="text-center cell-left num">{{ $get->code }}</td>
                                                <!-- مرحلة الجزارة -->
                                                <td class="cell-right text-center text-success">{{ $opt->b_entry_date ??null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->b_exit_date ?? null }}</td>
                                                <!-- مرحلة التبريد -->
                                                <td class="cell-right text-center text-success">{{ $opt->fb_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->fb_exit_date ?? null }}</td>
                                                <!-- مرحلة التعبئة -->
                                                <td class="cell-right text-center text-success">{{ $opt->f_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->f_exit_date ?? null }}</td>
                                                <!-- مرحلة التسليم -->
                                                <td class="cell-right text-center text-success">{{ $opt->r_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->r_date ? \Carbon\Carbon::parse($opt->r_date)->format('H:i') : null }}</td>
                                                
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-12 col-lg-6">
                            <div class="table-responsive fixed-header-table">
                                  <table class="table table-bordered">
                                    <caption class="text-center fixed-caption caption-top"
                                        style="text-align: right;font-size: 24px;color: rgb(220, 114, 33);">الخراف والماعز</caption>
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="10%" class="text-center th-1"
                                                style="font-weight: bold;border-top-right-radius: 16px;padding-bottom:35px;background-color: #d7cbe1;">
                                                رقم<br>الأضحية</th>
                                            <!-- <th class="text-center" style="font-weight: bold;max-width: 90px !important;min-width: 80px !important;">بانتظار<br>الذبح</th> -->
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #e7c0c0;">
                                                مرحلة الجزارة</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #c1daef;">
                                                مرحلة التبريد</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="background-color: #dcd0e5;">
                                                مرحلة التعبئة</th>
                                            <th colspan="2" class="text-center th-1"
                                                style="border-top-left-radius: 16px;background-color: #a5d3cf;">
                                                مرحلة التسليم</th>
                                        </tr>
                                        <tr><!-- مرحلة الجزارة -->
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            <!-- مرحلة التبريد -->
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            <!-- مرحلة التعبئة -->
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>
                                            
                                            <th class="table-success text-center th2 cell-right">
                                                دخول</th>
                                            <th class="table-warning text-center th2 cell-left">
                                                خروج</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        
                                         $gets =DB::table('adahyt')->whereNOTIN('adahy',$type)->where('days',$day)->get();
                                         $gets = collect($gets)->reverse();
                                        @endphp
                                    @foreach ($gets as $get )
                                        @php
                                            $opt = DB::table('opt')->where('code',$get->code)->first();
                                        @endphp
                                        @if ($opt && $opt->b_entry_date > 0)
                                            <tr>
                                                <td class="text-center cell-left num">{{ $get->code }}</td>
                                                <!-- مرحلة الجزارة -->
                                                {{-- <td class="cell-right text-center text-success">
                                                    {{ $opt->b_entry_date ? \Carbon\Carbon::parse($opt->b_entry_date)->format('h:i A') : null }}
                                                </td> --}}
                                                <td class="cell-right text-center text-success">{{ $opt->b_entry_date ??null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->b_exit_date ?? null }}</td>
                                                <!-- مرحلة التبريد -->
                                                <td class="cell-right text-center text-success">{{ $opt->fb_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->fb_exit_date ?? null }}</td>
                                                <!-- مرحلة التعبئة -->
                                                <td class="cell-right text-center text-success">{{ $opt->f_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->f_exit_date ?? null }}</td>
                                                <!-- مرحلة التسليم -->
                                                <td class="cell-right text-center text-success">{{ $opt->r_entry_date ?? null }}</td>
                                                <td class="cell-left text-center text-warning">{{ $opt->r_date ? \Carbon\Carbon::parse($opt->r_date)->format('H:i') : null }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/vendor/global/global.min.js"></script>
    <script src="assets/js/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="assets/js/vendor/apexchart/apexchart.js"></script>
    <script src="assets/js/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/js/plugins-init/datatables.init.js"></script>
    <script src="assets/js/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/js/custom.min.js"></script>
    <script src="assets/js/js/dlabnav-init.js"></script>
    <script src="/theme1/vendor/global/global.min.js"></script>
    <script src="/theme1/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/theme1/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="/theme1/vendor/apexchart/apexchart.js"></script>
    <script src="/theme1/vendor/nouislider/nouislider.min.js"></script>
    <script src="/theme1/vendor/wnumb/wNumb.js"></script>
    <script src="/theme1/vendor/js/dashboard/dashboard-1.js"></script>
    <script src="/theme1/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/theme1/js/plugins-init/datatables2.init.js"></script>
    <script src="/theme1/js/custom.min.js"></script>
    <script src="/theme1/js/dlabnav-init.js"></script>
</body>

</html>