<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="مؤسسة الاصلاح" />
	<meta property="og:title" content="مؤسسة الاصلاح" />
	<meta property="og:description" content="مؤسسة الاصلاح" />
	
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="refresh" content="300">
    @php $theme1 = "theme1";
  date_default_timezone_set("Africa/Kampala"); 
    use App\Models\treasury_sak;
    use App\Models\adahyt;
    use App\Models\sak;
     use App\Models\opt;
     use App\Models\reservation;
     use App\Models\adahy_type;
  
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->

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

         
      
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
	
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
      
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
  
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="min-height: 100%;
    width: 100%;
    padding-top: 0px;
    margin-left: 0px;">
            <!-- row -->

		
                <!-- row -->
             
           
		 
		 
		 
		 
		 
		 
		    <div class="row" >
                    <div class="col-xl-4 col-sm-6" style="direction: rtl;text-align: center;">
                        <div class="card">
                            <div class="card-header">
                                <a href="javascript:void(0);" style="    font-size: 40px !important;
    width: 70%;" class="btn btn-success  d-block btn-lg text-uppercase"> الاستلام</a>
                          <img src="/css/icon.png" style="width: 80px;">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm" style="width: 100%;    width: 100%;
    color: #000;
    font-size: 30px;
    font-weight: bold;">
                                        <thead>
                                            <tr>
                                    
                                                <th>الأضحية</th>
                                                <th>وقت الدخول</th>
                                                 <th>الوقت المستغرق</th>
                                                
                                                
                                            
                                            </tr>
                                        </thead>
                                         <tbody>
                          @php
                          $getopt3 = reservation::whereIN('retype',[1])->take('20')->select('code')->distinct()->get();
                          foreach($getopt3 as $get3){
                              $r_entry_date = DB::table('opt')->where('code',$get3->code)->first()->r_entry_date;
                          @endphp
                          <tr>
                          <td>{{$get3->code}}</td>
                          <td>{{date("h:i a", strtotime($r_entry_date))}}</td>
                          <td style="color: red;" id="waitsss@php echo $get3->code; @endphp"></td>
                          </tr>
                           @php
                           
                           $date3=date('Y-m-d');
                           $date4=date('Y-m-d H:i:s');
                           @endphp
                               <script>

     function msToTime(duration) {
       var milliseconds = parseInt((duration % 1000) / 100),
         seconds = Math.floor((duration / 1000) % 60),
         minutes = Math.floor((duration / (1000 * 60)) % 60),
         hours = Math.floor((duration / (1000 * 60 * 60)) % 24) ;

       hours = (hours < 10) ? "0" + hours : hours;
       minutes = (minutes < 10) ? "0" + minutes : minutes;
       seconds = (seconds < 10) ? "0" + seconds : seconds;

       return hours + ":" + minutes + ":" + seconds;
     }

     setInterval(function () {
         var  date1 = new Date('@php echo $date3.' '.$r_entry_date; @endphp');
                                                                     var date2 = new Date('@php echo $date4 ; @endphp');
                                                                   
                                                                     var diffTime = Math.abs(date2 - date1);

                                                                    document.getElementById('waitsss@php echo $get3->code; @endphp').innerHTML =msToTime(diffTime);


     }, 10);




                                                                     </script>
                          }
                                 
                         
                                        </tbody>
                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   <div class="col-xl-4 col-sm-6 " style="direction: rtl;text-align: center;">
                        <div class="card">
                            <div class="card-header">
                                <a href="javascript:void(0);" style="    font-size: 40px !important;
    width: 70%;" class="btn btn-primary d-block btn-lg text-uppercase"> التعبئة</a>
                              <img src="/css/icon.png" style="width: 80px;">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm" style="width: 100%;    width: 100%;
    color: #000;
    font-size: 30px;
    font-weight: bold;">
                                        <thead>
                                            <tr>
                                    
                                                <th>الأضحية</th>
                                                <th>وقت الدخول</th>
                                                <th>الوقت المستغرق</th>
                                                
                                                
                                            
                                            </tr>
                                        </thead>
                                      <tbody>
                          @php
                          $getopt2 = opt::whereIN('type',[5,6])->where('f_entry_date','!=',0)->where('f_exit_date',0)->orderBy('code','DESC')->get();
                          foreach($getopt2 as $get2){
                          @endphp
                          <tr>
                          <td>{{$get2->code}}</td>
                          <td>{{date("h:i a", strtotime($get2->f_entry_date))}}</td>
                          <td style="color: red;" id="waitss@php echo $get2->id; @endphp"></td>
                          </tr>
                           @php
                           
                           $date3=date('Y-m-d');
                            $date4=date('Y-m-d H:i:s');
                           @endphp
                               <script>

     function msToTime(duration) {
       var milliseconds = parseInt((duration % 1000) / 100),
         seconds = Math.floor((duration / 1000) % 60),
         minutes = Math.floor((duration / (1000 * 60)) % 60),
         hours = Math.floor((duration / (1000 * 60 * 60)) % 24) ;

       hours = (hours < 10) ? "0" + hours : hours;
       minutes = (minutes < 10) ? "0" + minutes : minutes;
       seconds = (seconds < 10) ? "0" + seconds : seconds;

       return hours + ":" + minutes + ":" + seconds;
     }

     setInterval(function () {
         var  date1 = new Date('@php echo $date3.' '.$get2->f_entry_date; @endphp');
                                                                   var date2 = new Date('@php echo $date4 ; @endphp');
                                                                     var diffTime = Math.abs(date2 - date1);

                                                                    document.getElementById('waitss@php echo $get2->id; @endphp').innerHTML =msToTime(diffTime);


     }, 10);




                                                                     </script>
                          }
                                 
                         
                                        </tbody>
                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                <div class="col-xl-4 col-sm-6" style="direction: rtl;    text-align: center;">
                        <div class="card">
                            <div class="card-header">
                               <a href="javascript:void(0);" style="    font-size: 40px !important;
    width: 70%;" class="btn btn-warning d-block btn-lg text-uppercase"> الجزارة</a>
                              <img src="/css/icon.png" style="width: 80px;">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm" style="width: 100%;    width: 100%;
    color: #000;
    font-size: 30px;
    font-weight: bold;">
                                        <thead>
                                        <tr>
                                    
                                                <th>الأضحية</th>
                                                <th>وقت الدخول</th>
                                                <th>الوقت المستغرق</th>
                                                
                                                
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                          @php
                          $getopt = opt::whereIN('type',[1,2,3,4])->where('b_entry_date','!=',0)->where('b_exit_date',0)->orderBy('code','DESC')->get();
                          foreach($getopt as $get1){
                          @endphp
                          <tr>
                          <td>{{$get1->code}}</td>
                          <td>{{date("h:i a", strtotime($get1->b_entry_date))}} </td>
                          <td style="color: red;" id="waits@php echo $get1->id; @endphp"></td>
                          </tr>
                           @php
                           
                           $date3=date('Y-m-d');
                            $date4=date('Y-m-d H:i:s');
                           @endphp
                               <script>
                               
    function convertTZ(date, tzString) {
    return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
}

     function msToTime(duration) {
       var milliseconds = parseInt((duration % 1000) / 100),
         seconds = Math.floor((duration / 1000) % 60),
         minutes = Math.floor((duration / (1000 * 60)) % 60),
         hours = Math.floor((duration / (1000 * 60 * 60)) % 24) ;

       hours = (hours < 10) ? "0" + hours : hours;
       minutes = (minutes < 10) ? "0" + minutes : minutes;
       seconds = (seconds < 10) ? "0" + seconds : seconds;

       return hours + ":" + minutes + ":" + seconds;
     }
var date20 = new Date('@php echo $date4 ; @endphp');
     setInterval(function () {
         var  date1 = new Date('@php echo $date3.' '.$get1->b_entry_date; @endphp');
                                                                    
                                                                // date20.setSeconds(date20.getSeconds() + 1);
                                                                    const date0 = new Date()
                                                                      var date2 =  convertTZ(date0, "Africa/Kampala") // current date-time in jakarta.
                                                                     var diffTime = Math.abs(date20 - date1);

                                                                    document.getElementById('waits@php echo $get1->id; @endphp').innerHTML =msToTime(diffTime);
                                                                  


     }, 1000);




                                                                     </script>
                          }
                                 
                         
                                        </tbody>
                                   
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



