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
      .fixed-header-table {
  position: relative;
  max-height: 1700px;
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
                                    <caption class="text-center caption-top fixed-caption" style="text-align: right;font-size: 24px;color: rgb(0,166,81);">العجول</caption>
                                    <thead >
                                        <tr>
                                            <th class="table-success text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;border-top-right-radius: 16px;">رقم<br>الأضحية</th>
                                            <th class="table-success text-center" style="font-weight: bold;max-width: 90px !important;min-width: 80px !important;">بانتظار<br>الذبح</th>
                                            <th class="table-success text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>الجزارة</th>
                                            <th class="table-success text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>التبريد</th>
                                            <th class="table-success text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>التعبئة</th>
                                            <th class="table-success text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;border-top-left-radius: 16px;">مرحلة<br>التسليم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $in_loop = ["بقرى","جمسى"];
                                        $day = "اليوم  الثالث";
                                        $get = DB::table('adahyt')->whereIN('adahy',$in_loop)->where('days',$day)->get();
                                      //  $get = DB::table('opt')->whereIN('adahy',$in_loop)->where('days',$day)->where('wb_entry_date','!=',0)->get();
                                        foreach($get as $gs){
                                          
                                             $g = DB::table('opt')->where('code',$gs->code)->first();
                                          
                                             //dd($g->wb_exit_date);
                                             
                                        ?>
                                        <?
                                        if($g == null){
                                        ?>
                                            <tr>
                                            <td class="text-center" style="font-size: 18px;">{{$gs->code}}</td>
                                            <td class="text-center">
                                          
                                                </td>
                                            <td class="text-center">
                                        
                                                </td>
                                          <td class="text-center">
                                        
                                                </td>
                                              <td class="text-center">
                                         
                                                </td>
                                             <td class="text-center">
                                            
                                                </td>
                                        </tr>
                                        
                                        <?}else{?>
                                        <tr>
                                            <td class="text-center" style="font-size: 18px;">{{$gs->code}}</td>
                                            <td class="text-center">
                                                <?
                                                if($g->wb_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                </td>
                                            <td class="text-center">
                                                <?
                                                if($g->b_entry_date != 0){
                                                    if($g->b_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                          <td class="text-center">
                                                <?
                                                if($g->fb_entry_date != 0){
                                                if($g->fb_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                              <td class="text-center">
                                                <?
                                                if($g->f_entry_date != 0){
                                                if($g->f_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                             <td class="text-center">
                                                <?
                                                if($g->r_entry_date != 0){
                                                if($g->r_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                        </tr>
                                             <?}?>
                                        <?}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-12 col-lg-6">
                            <div class="table-responsive fixed-header-table">
                                <table class="table table-bordered">
                                    <caption class="text-center caption-top fixed-caption" style="text-align: right;font-size: 24px;color: rgb(0,166,81);">الخراف والماعز</caption>
                                    <thead>
                                        <tr>
                                            <th class="table-warning text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;border-top-right-radius: 16px;">رقم<br>الأضحية</th>
                                            <th class="table-warning text-center" style="font-weight: bold;max-width: 90px !important;min-width: 80px !important;">بانتظار<br>الذبح</th>
                                            <th class="table-warning text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>الجزارة</th>
                                            <th class="table-warning text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>التبريد</th>
                                            <th class="table-warning text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;">مرحلة<br>التعبئة</th>
                                            <th class="table-warning text-center" style="min-width: 80px !important;max-width: 90px !important;font-weight: bold;border-top-left-radius: 16px;">مرحلة<br>التسليم</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                                     <?
                                        $in_loop = ["بقرى","جمسى"];
                                           $day = "اليوم  الثالث";
                                         $gets = DB::table('adahyt')->whereNOTIN('adahy',$in_loop)->where('days',$day)->get();
                                        //$gets = DB::table('opt')->whereNOTIN('adahy',$in_loop)->where('days',$day)->get();
                                        foreach($gets as $gs){
                                               $g = DB::table('opt')->where('code',$gs->code)->first();
                                        ?>
                                              <?
                                        if($g == null){
                                        ?>
                                            <tr>
                                            <td class="text-center" style="font-size: 18px;">{{$gs->code}}</td>
                                            <td class="text-center">
                                          
                                                </td>
                                            <td class="text-center">
                                        
                                                </td>
                                          <td class="text-center">
                                        
                                                </td>
                                              <td class="text-center">
                                         
                                                </td>
                                             <td class="text-center">
                                            
                                                </td>
                                        </tr>
                                        
                                        <?}else{?>
                                        <tr>
                                            <td class="text-center" style="font-size: 18px;">{{$gs->code}}</td>
                                            <td class="text-center">
                                                <?
                                                 if($g->b_entry_date != 0){
                                                if($g->wb_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                 <?}?>
                                                </td>
                                            <td class="text-center">
                                                <?
                                                if($g->b_entry_date != 0){
                                                    if($g->b_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                          <td class="text-center">
                                                <?
                                                if($g->fb_entry_date != 0){
                                                if($g->fb_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                              <td class="text-center">
                                                <?
                                                if($g->f_entry_date != 0){
                                                if($g->f_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                             <td class="text-center">
                                                <?
                                                if($g->r_entry_date != 0){
                                                if($g->r_exit_date == 0){
                                                ?>
                                                <button class="btn btn-warning rounded-circle p-3" type="button"></button>
                                                <?}else{?>
                                                <button class="btn btn-primary rounded-circle p-3" type="button"></button>
                                                <?}?>
                                                <?}?>
                                                </td>
                                        </tr>
                                           <?}?>
                                        <?}?>
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