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
	
	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- Style css -->
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
		<style>
  	    .div {
  	position: absolute;
  	top: 4px;
  	left: 907px;
  	font-weight: 500;
}
.advanced-search-child {
  	position: absolute;
  	top: 45px;
  	left: 0px;
  	width: 100%;
  	height: 2px;
}
.b {
  	position: relative;
}
.btn {
  	width: 90px;
  	border-radius: 12px;
  	background-color: #faa755;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
}
.btn1 {
  	width: 90px;
  	border-radius: 12px;
  	background-color: #00a651;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
}
.btns-frame {
  	height: 74px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 14px;
  	text-align: left;
  	color: #fff;
}
.div3 {
  	flex: 1;
  	position: relative;
  	font-weight: 600;
}
.div2 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.chevron-down-icon {
  	width: 16px;
  	position: relative;
  	height: 16px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.div5 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
}
.place-holder {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px 0px;
}
.div4 {
  	align-self: stretch;
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	box-sizing: border-box;
  	height: 35px;
  	overflow: hidden;
  	flex-shrink: 0;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
  	color: rgba(1, 11, 56, 0.4);
}
.div1 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 4px;
}
.drop-list-tool {
  	width: 142px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.div15 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.place-holder2 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px 0px;
}
.div14 {
  	align-self: stretch;
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	box-sizing: border-box;
  	height: 35px;
  	overflow: hidden;
  	flex-shrink: 0;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
  	text-align: center;
  	color: rgba(1, 11, 56, 0.4);
}
.drop-list-tool2 {
  	width: 117px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.master-frame {
  	position: absolute;
  	top: 58px;
  	left: calc(50% - 474.5px);
  	display: flex;
  	flex-direction: row;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 14px;
  	font-size: 14px;
  	color: #4c4c54;
}
.advanced-search {
 
  	position: static;
  	box-shadow: 0px 4px 30px -10px rgba(0, 0, 0, 0.3);
  	border-radius: 15px;
  	background-color: #fff;
  	height: 148px;
  	overflow: auto;
  	flex-shrink: 0;
}
.checkboxinactivedefaulton-child {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #fff;
  	border: 1px solid #c2c2c2;
  	box-sizing: border-box;
  	width: 24px;
  	height: 24px;
}
.checkboxinactivedefaulton {
  	width: 24px;
  	position: relative;
  	height: 24px;
}
.checkbox {
  	width: 24px;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.select-item {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	gap: 8px;
}
.div26 {
  	position: relative;
  	font-weight: 500;
}
.tab-header {
  	
  	height: 50px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
}
.tab-header2 {
  	width: 92px;
  	border-bottom: 2px solid #5bcfc5;
  	box-sizing: border-box;
  	height: 51px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	color: #aaadcb;
}
.days-tab {
  	width: 361px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-end;
  	gap: 22px;
  	text-align: left;
  	font-size: 16px;
  	color: #000;
}
.select-item-parent {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 10px;
}
.shifts {
  	flex: 1;
  	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  	border-radius: 15px;
  	background-color: #fff;
  	height: 36px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
}
.base {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
  	border-radius: 50%;
  	border: 20px solid #faa755;
  	box-sizing: border-box;
  	opacity: 0.5;
}
.ellipse {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
  	border-radius: 50%;
  	border: 16px solid rgba(227, 161, 96, 0.5);
  	box-sizing: border-box;
}
.b4 {
  	position: relative;
  	line-height: 22px;
}
.wrapper {
  	position: absolute;
  	height: calc(100% - 49px);
  	width: calc(100% - 22px);
  	top: 25px;
  	right: 11px;
  	bottom: 24px;
  	left: 11px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.circle {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
}
.circle-one {
  	position: absolute;
  	top: 14px;
  	left: 14px;
  	width: 112px;
  	height: 112px;
  	font-size: 20px;
}
.span {
  	color: #4b4b4b;
}
.span1 {
  	color: #5d5c93;
}
.div29 {
  	position: relative;
  	line-height: 26px;
  	font-weight: 500;
}
.span2 {
  	color: #6f6f6f;
}
.b6 {
  	position: relative;
  	font-size: 16px;
  	text-align: right;
  	color: #4b4b4b;
}
.parent {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	gap: 5px;
  	text-align: center;
  	font-size: 24px;
  	color: #00a651;

    direction: rtl;

}
.title-number {
  	position: absolute;
  	top: 5px;
  	left: calc(50% + 4px);
  	width: 99px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: center;
  	text-align: right;
  	color: #6f6f6f;
}
.animal-img-icon {
  	position: absolute;
  	top: 82px;
  	right: 21px;
  	width: 50px;
  	height: 37.4px;
  	object-fit: cover;
}
.div30 {
  	position: absolute;
  	height: 100%;
  	width: 12.5%;
  	top: 0%;
  	left: 44.31%;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.days {
  	position: absolute;
  	height: 13.99%;
  	width: 2.77%;
  	top: 2.1%;
  	right: 92.9%;
  	bottom: 83.92%;
  	left: 4.33%;
  	color: rgba(75, 75, 75, 0.1);
}
.cards {
  	width: 233px;
  	position: relative;
  	box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.1);
  	border-radius: 12px;
  	background-color: #d5d9d7;
  	border: 1px solid #eee;
  	box-sizing: border-box;
  	height: 145px;
  	overflow: hidden;
  	flex-shrink: 0;
  	color: #5bcfc5;
}
.base1 {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
  	border-radius: 50%;
  	border: 20px solid #8dda4f;
  	box-sizing: border-box;
  	opacity: 0.2;
}
.b7 {
  	position: absolute;
  	height: calc(100% - 96px);
  	top: 29px;
  	left: calc(50% - 26px);
  	line-height: 14px;
  	display: flex;
  	align-items: center;
  	justify-content: center;
  	width: 51px;
}
.b8 {
  	position: relative;
  	line-height: 20px;
}
.container {
  	position: absolute;
  	height: calc(100% - 95px);
  	top: 54px;
  	bottom: 41px;
  	left: calc(50% - 34px);
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-start;
  	font-size: 20px;
  	color: #faa755;
}
.span4 {
  	color: #faa755;
}
.group {
  	height: 30px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 5px;
  	text-align: center;
  	font-size: 24px;
  	color: #00a651;
}
.animal-img-icon1 {
  	position: absolute;
  	top: 80px;
  	left: 143px;
  	width: 67px;
  	height: 50px;
  	object-fit: cover;
}
.cards1 {
  	width: 233px;
  	position: relative;
  	box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.1);
  	border-radius: 12px;
  	background-color: #d5d9d7;
  	border: 1px solid #eee;
  	box-sizing: border-box;
  	height: 145px;
  	overflow: hidden;
  	flex-shrink: 0;
  	direction: ltr;
}
.ellipse2 {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
  	border-radius: 50%;
  	border: 16px solid #beed99;
  	box-sizing: border-box;
}
.b11 {
  	position: absolute;
  	height: calc(100% - 96px);
  	width: calc(100% - 71px);
  	top: 29px;
  	left: 36px;
  	line-height: 14px;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.frame {
  	position: absolute;
  	height: calc(100% - 95px);
  	width: calc(100% - 57px);
  	top: 54px;
  	right: 29px;
  	bottom: 41px;
  	left: 28px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	font-size: 24px;
  	color: #faa755;
}
.circle-half {
  	position: absolute;
  	top: 14px;
  	left: 14px;
  	width: 112px;
  	height: 112px;
  	font-size: 14px;
}
.span7 {
  	color: #5bcfc5;
}
.b14 {
  	position: relative;
  	font-size: 16px;
  	text-align: right;
  	color: #6f6f6f;
}
.cards2 {
  	width: 233px;
  	position: relative;
  	box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.1);
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #eee;
  	box-sizing: border-box;
  	height: 145px;
  	overflow: hidden;
  	flex-shrink: 0;
  	direction: ltr;
}
.circle-sob31 {
  	position: absolute;
  	top: 19px;
  	left: 15px;
  	width: 112px;
  	height: 112px;
  	font-size: 14px;
}
.title-number3 {
  	position: absolute;
  	top: 10px;
  	left: calc(50% + 5px);
  	width: 99px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: center;
  	text-align: right;
  	color: #6f6f6f;
}
.animal-img-icon3 {
  	position: absolute;
  	top: 85px;
  	left: 144px;
  	width: 67px;
  	height: 50px;
  	object-fit: cover;
}
.days3 {
  	position: absolute;
  	height: 13.99%;
  	width: 2.77%;
  	top: 1.4%;
  	right: 92.47%;
  	bottom: 84.62%;
  	left: 4.76%;
  	color: rgba(75, 75, 75, 0.1);
}
.cards3 {
  	width: 233px;
  	position: relative;
  	box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.08);
  	border-radius: 12px;
  	background-color: #d5d9d7;
  	border: 1px solid #eee;
  	box-sizing: border-box;
  	height: 145px;
  	overflow: hidden;
  	flex-shrink: 0;
  	direction: ltr;
}
.div37 {
  	position: relative;
  	line-height: 20px;
  	font-weight: 500;
}
.b20 {
  	width: 17px;
  	position: relative;
  	font-size: 12px;
  	line-height: 14px;
  	display: flex;
  	color: #8bc348;
  	align-items: center;
  	justify-content: center;
  	height: 12px;
  	flex-shrink: 0;
}
.parent2 {
  	position: absolute;
  	height: calc(100% - 95px);
  	width: calc(100% - 57px);
  	top: 54px;
  	right: 29px;
  	bottom: 41px;
  	left: 28px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 5px;
  	font-size: 24px;
  	color: #faa755;
  	
}
.cards4 {
  	width: 233px;
  	position: relative;
  	box-shadow: 0px 2px 4px 1px rgba(0, 0, 0, 0.08);
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #eee;
  	box-sizing: border-box;
  	height: 145px;
  	overflow: hidden;
  	flex-shrink: 0;
  	direction: ltr;
}
.div44 {
  	position: absolute;
  	height: 16.57%;
  	width: 2.77%;
  	top: 0%;
  	left: 4.33%;
  	font-weight: 500;
  	color: rgba(75, 75, 75, 0.1);
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.ellipse6 {
  	position: absolute;
  	height: 100%;
  	width: 100%;
  	top: 0%;
  	right: 0%;
  	bottom: 0%;
  	left: 0%;
  	border-radius: 50%;
}
.span28 {
  	color: #42908a;
}
.cards-parent {
  	width: 1056px;
  	display: flex;
  	flex-direction: row;
  	flex-wrap: wrap;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 20px 0px 30px;
  	box-sizing: border-box;
  	gap: 33px 40px;
  	color: #8bc348;
  	direction: rtl;
}
.cards-group {
  	width: 1056px;
  	display: flex;
  	flex-direction: row;
  	flex-wrap: wrap;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 20px 0px 30px;
  	box-sizing: border-box;
  	gap: 16px 44px;
  	color: #8bc348;
}
.shifts-parent {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	flex-wrap: wrap;
  	align-items: flex-start;
  	justify-content: space-between;
  	text-align: center;
  	font-size: 16px;
  	color: #00a651;
}
.frame-parent {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 30px;
}
.cards-frame {
  	width: 1116px;
  	box-shadow: 0px 4px 30px -10px rgba(0, 0, 0, 0.3);
  	border-radius: 12px;
  	background-color: #dbdfdd;
  
  	overflow: hidden;
  	flex-shrink: 0;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 0px 30px 10px;
  	box-sizing: border-box;
  	font-size: 14px;
  	color: #4c4c54;
}
.page-box {
  	position: relative;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 30px;
  	text-align: right;
  	font-size: 20px;
  	color: #000;
  	font-family: Cairo;
}

    .row {
    --bs-gutter-x: 0px;
    width: unset;
    max-width: unset;
}
#main-wrapper{

        width: 100%;
    overflow-x: scroll;
    overflow-y: scroll;
}
/* Media query for mobile devices */
@media(max-width: 900px){
      	    .div {
  	position: absolute;
  	top: 4px;
  	left: 0px;
  	font-weight: 500;
}
#main-wrapper{

        width: 100%;
    overflow-x: scroll;
    overflow-y: scroll;
}
    .row {
    --bs-gutter-x: 0px;
       width: unset !important;
    max-width: unset !important;
}

  .page-box {
    width: 100%; /* Set full width on mobile devices */
    overflow-x: auto; /* Enable horizontal scrolling */
    -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS devices */
  display: block;
      
  }

.advanced-search {
  width: fit-content;  
}
 .master-frame {
   left: calc(-40% - 474.5px);  
 }
}
  	    
  	</style>
</head>
<body>
    
   
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
    <div id="main-wrapper" style="overflow-x: scroll;">
        
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
        
         <div class="content-body" style="width:100% ;    overflow-x: scroll;">
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
		       
		<center>
             
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12" style="direction: rtl;">
                          <?
  use Jenssegers\Agent\Agent;
  use Illuminate\Http\Request;
  
    $agent = new Agent();
    $request = Request();
    
    $type = $request->type;
    $sak = $request->sak;
    $day = $request->day;
    $c_sak = $request->c_sak;
    $times = $request->times;
    $filter= $request->filter;
	$gov =$request->gov;
	$is_available = $request->is_available;
  
    // if($c_sak > 0){}else{$c_sak = 1;}
    // if($day > 0){}else{$day = 1;}
  ?>	
  	<div class="page-box">
  	    
    		<div class="advanced-search col-xl-12 col-lg-12 col-md-12 col-sm-12" style="direction: ltr;   overflow-x: auto; 
  white-space: nowrap;">
      			<div class="div">ابحث عن ما تريد من هنا</div>
      		
      		<form method="get" action="adahyt_r" id="resrv2">
      		    
      			<div class="master-frame" >
        				<div class="btns-frame">
        				       <a href="adahyt_r?&gov={{ $gov }}" style="text-decoration:none;">
          					<div class="btn">
            						<b class="b" style="color:#fff">مسح</b>
          					</div>
          					</a>
          				
            									<input class="btn1" type="submit" style="    background: #00a651;
    border: 0px;
    color: #fff;
    font-size: 21px;
    cursor: pointer;
    height: 35px;
    padding: 2px;"  value="بحث">
          				
        				</div>
        				<div class="drop-list-tool">
          					<div class="div1">
          					    <input type="hidden" name="filter" id="filter" value="0">
								  <input type="hidden" name="is_available" id="filterAivilable" value="0">
								  <input type="hidden" name="gov" id="gov" value="{{ $gov }}">
            						<div class="div2">
              							<div class="div3">توقيت الذبح</div>
            						</div>
            										<select name="times"  class="form-control" 
              							style="
  width: 100%;
    
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">
            										     <option value="">الكل</option>
              							    <?
              							    $get_type = DB::table('times')->get();
              							    foreach($get_type as $g){
              							    ?>
                  									<option value="{{$g->id}}" <? if($times == $g->id){echo "selected";}?>>
                  									    {{$g->name}}
                  									</option>
                  									<?}?>
                  									</select>
          					</div>
        				</div>
        				<div class="drop-list-tool">
          					<div class="div1">
            						<div class="div2">
              							<div class="div3">يوم الذبح</div>
            						</div>
            											<select name="day"  class="form-control" 
              							style="
  width: 100%;
   
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">
            											    <option value="">الكل</option>
              							    <?
              							    $get_type = DB::table('days')->get();
              							    foreach($get_type as $g){
              							    ?>
                  									<option value="{{$g->id}}" <? if($day == $g->id){echo "selected";}?>>
                  									    {{$g->name}}
                  									</option>
                  									<?}?>
                  									</select>
          					</div>
        				</div>
        				<div class="drop-list-tool2">
          					<div class="div1">
            						<div class="div2">
              							<div class="div3">عدد الصكوك</div>
            						</div>
            						
            	<select name="c_sak"  class="form-control" 
              							style="
     width: 100%;
    
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">							      
              	<option value="0">الكل</option>	
              	<option value="1" <?if($c_sak == 1){echo "selected";}?>>1</option>
              	<option value="2" <?if($c_sak == 2){echo "selected";}?>>2</option>
              	<option value="3" <?if($c_sak == 3){echo "selected";}?>>3</option>
              	<option value="4" <?if($c_sak == 4){echo "selected";}?>>4</option>
              	<option value="5" <?if($c_sak == 5){echo "selected";}?>>5</option>
              	<option value="6" <?if($c_sak == 6){echo "selected";}?>>6</option>
              	<option value="7" <?if($c_sak == 7){echo "selected";}?>>7</option>
              	
            			</select>			
   
          					</div>
        				</div>
        				<div class="drop-list-tool">
          					<div class="div1">
            						<div class="div2">
              							<div class="div3">مقدار الصك</div>
            						</div>
            						<div id="type_show" style="    width: 100%;">
            													<select name="sak"  class="form-control" 
              							style="
     width: 100%;
    
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">
            													    <option value="">
            													        الكل
            													    </option>
              							    <?
              							    $get_type = DB::table('sak')->get();
              							    foreach($get_type as $g){
              							    ?>
                  									<option value="{{$g->id}}">
                  									    {{$g->name}}
                  									</option>
                  									<?}?>
                  									</select>
                  										</div>
          					</div>
        				</div>
        				<div class="drop-list-tool">
          					<div class="div1">
            						<div class="div2">
              							<div class="div3">نوع الأضحية</div>
            						</div>
            		<select name="type" id="type_" class="form-control" 
              							style="
    width: 100%;
    
    border-radius: 10px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 18px;
    color: #525252;
    padding: 4%;">
            								     <option value="">
            													        الكل
            													    </option>
              							    <?
              							    $get_type = DB::table('adahy_type')->get();
              							    foreach($get_type as $g){
              							    ?>
                  									<option value="{{$g->id}}" <? if($type == $g->id){echo "selected";}?>>
                  									    {{$g->name}}
                  									</option>
                  									<?}?>
                  									</select>
          					</div>
        				</div>
      			</div>
      			</form>
    		</div>
    		<div class="cards-frame" style="direction: ltr;    margin-right: 15%">
      			<div class="frame-parent">
        				<div class="select-item-parent">
          					<div class="select-item">
								<b class="b">عرض المتاح للحجز فقط</b>
            						<div class="checkbox">
              							<div class="checkboxinactivedefaulton">
                								<input type="checkbox" id="myCheckbox" <?if($filter == 1){echo "checked";}?> class="checkboxinactivedefaulton-child">
                							
              							</div>
            						</div>
          					</div>
							  <div class="select-item">
								<b class="b"> صكوك متاحه <b style="color: red">للتبرع</b> بالكامل</b>
								<div class="checkbox">
									  <div class="checkboxinactivedefaulton">
											<input type="checkbox" id="myCheckboxAivilable"{{ $is_available ==1 ?  "checked":""}} class="checkboxinactivedefaulton-child">
										</div>
									</div>
									
								</div>
          					<div class="days-tab">
            						<div style="{{ $day == 3 ?" background-color: white":null}}" 
									<?if($day == 3){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>>
              							<a href="adahyt_r?filter={{$filter}}&gov={{$gov}}&times={{$times}}&day=3&c_sak={{$c_sak}}&sak={{$sak}}&type={{$type}}"><div class="div26">اليوم الثالث</div>
              						</a>
            						</div>
            							<div style="{{ $day == 2 ?" background-color: white":null}}"
										<?if($day == 2){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>>
              							<a href="adahyt_r?filter={{$filter}}&gov={{$gov}}&times={{$times}}&day=2&c_sak={{$c_sak}}&sak={{$sak}}&type={{$type}}">	<div class="div26">اليوم الثاني</div>
            						</a>
            						</div>
            						<div style="{{ $day == 1 ?" background-color: white":null}}"
									<?if($day == 1 || $day == 0){?> class="tab-header2" <?}else{?>class="tab-header"<?}?>>
              							<a href="adahyt_r?filter={{$filter}}&gov={{$gov}}&times={{$times}}&day=1&c_sak={{$c_sak}}&sak={{$sak}}&type={{$type}}">	<div class="div26">اليوم الأول</div>
            						</a>
            						</div>
          					</div>
        				</div>
        				<div class="shifts-parent">
        				    
        				    <?
        				    $get_data = DB::table('times')->where(function($query) use ($times) {
        				        if($times)
        				        $query->where('id', '=',$times);
        				        })->get();
        				    foreach($get_data as $get){
        				    ?>
          					<div class="shifts">
            						<b class="b" style="direction: rtl;">{{$get->name}} </b>
          					</div>
          					<div class="cards-parent">
          					    
          					    <?
 
          					       $get_adahy = DB::table('adahyt')->where(function($query) use ($type,$sak,$day,$c_sak,$filter,$gov,$is_available) {
									if($gov)
										$query->where('gov', '=',$gov);
										if($is_available == 1)
										$query->where('is_available',1);
                                        if($type)
                                          $query->where('adahy', '=', DB::table('adahy_type')->where('id',$type)->first()->name);
                                        if($sak)
                                          $query->where('sak', '=', DB::table('sak')->where('id',$sak)->first()->name);
                                        if($day)
                                          $query->where('days', '=', DB::table('days')->where('id',$day)->first()->name);
                                        if($c_sak)
                                          $query->where('free', '>=', $c_sak);
                                          if($filter)
                                           $query->where('free', '>=', $filter)->where('is_available',0);
                                      })->where('times', '=', $get->id)->orderBy('id','ASC')->get();
                                      foreach ($get_adahy as $gs){
          					    ?>
          					    
          					                						<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal{{$gs->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="get" action="adahyt_r3">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
           -  حجز الاضحية
        {{$gs->adahy}}
        -
        رقم 
        {{$gs->code}}
        </h5>
        
      </div>
      <div class="modal-body">
          <input type="hidden" name="id" value="{{$gs->id}}" >
          <input type="hidden" name="times" value="{{$get->id}}" >
           <input type="hidden" name="day" value="{{$day}}" >
          <label>
              عدد الصكوك
          </label>
        <select name="c_sak" class="form-control">
            <?
            for ($x = 1; $x <= $gs->free; $x++) {
            ?>
            <option value="{{$x}}">{{$x}}</option>
            <?}?>
           
        </select>
        
             <label>
              عدد الأشخاص
          </label>
        <select name="c_persons" class="form-control">
                 <?
            for ($x = 1; $x <= $gs->free; $x++) {
            ?>
            <option value="{{$x}}">{{$x}}</option>
            <?}?>
         
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
        <button type="submit" class="btn btn-primary" style="background-color: #009688;">التالى</button>
      </div>
      </form>
    </div>
  </div>
</div> --}}
  <!-- Modal: الخطوة 1 -->
  <div class="modal fade" id="selectSakModal{{$gs->id}}" tabindex="-1" role="dialog" aria-labelledby="selectSakLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content p-3">
		<h5 class="modal-title mb-3">الخطوة الأولى: <b>اختر عدد الصكوك</b></h5>
		<div class="form-group">
		  <label>
			<b style="color: #000">عدد الصكوك</b>
		  </label>
		  <select id="sakCount{{$gs->id}}" class="form-control text-center" style="color: #000">
			@for($x = 1; $x <= $gs->free; $x++)
			  <option style="color: #000" value="{{ $x }}">{{ $x }}</option>
			@endfor
		  </select>
		</div>
		<button class="btn btn-success btn-block mt-3" onclick="handleSakChoice({{ $gs->id }})">التالي</button>
	  </div>
	</div>
  </div>
<!-- Modal: الخطوة 2 -->
<div class="modal fade" id="stepTwoModal{{$gs->id}}" tabindex="-1" role="dialog" aria-labelledby="stepTwoLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content p-3">
		<form method="get" action="adahyt_r3" id="reservationForm{{$gs->id}}">
		  <input type="hidden" name="id" value="{{ $gs->id }}">
		  <input type="hidden" name="times" value="{{ $get->id }}">
		  <input type="hidden" name="day" value="{{ $day }}">
		  <input type="hidden" name="c_sak" id="hiddenSak{{$gs->id}}">
		  <input type="hidden" name="c_persons" id="hiddenPersons{{$gs->id}}">
		  <h5 class="modal-title mb-3">الخطوة الثانية: <b style="color: #000">عدد الاشخاص</b>  </h5>
		  <!-- NEW: عرض عدد الصكوك المختارة -->
			<div class="alert alert-info text-right">
				<strong>عدد الصكوك المختار:</strong><b style="color: black"><span id="displaySakCount{{$gs->id}}"></b></span>
			</div>
		  <div class="form-group">
			<label><b style="color: #000">	عدد الأشخاص</b></label>
			<select class="form-control" id="personCount{{$gs->id}}">
			  @for($x = 1; $x <= $gs->free; $x++)
				<option value="{{ $x }}">{{ $x }}</option>
			  @endfor
			</select>
		  </div>
  
		  <div class="modal-footer p-0 pt-3">
			<button type="button" class="btn btn-secondary" onclick="goBackToSak({{ $gs->id }})">رجوع</button>
			<button type="submit" class="btn btn-primary" style="background-color: #009688;" onclick="return validateAndSubmit({{ $gs->id }})">التالي</button>
		  </div>
		</form>
	  </div>
	</div>
  </div>
    	<!-- Modal -->  
          					    
            						<div <?if($gs->free == 0 || $is_available != $gs->is_available ){?>class="cards"<?}else{?>class="cards2"<?}?>>
              							<div <?if($gs->free == 0){?>class="circle-one"<?}else{?>class="circle-half"<?}?>>
              							    <?if($gs->free == 0 ||   $is_available != $gs->is_available ){?>
              							    <div class="circle">
              							    <?}else{?>
                								<div class="circle" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#selectSakModal{{$gs->id}}">
                								    <?}?>
                  									<div  <?if($gs->free == 0){?>class="base"<?}else{?>class="base1"<?}?>>
                  									</div>
                  									<div  <?if($gs->free == 0){?>class="ellipse"<?}else{?>class="ellipse2"<?}?>>
                  									</div>
                  									<b class="b11">
                  									    <?if($gs->free == 0){?>
                  									    محجوز
                  									    <?}else{?>
                  									    متاح
                  									    <?}?>
                  									    </b>
                  								<div class="parent2">
                    										<div class="div37">{{$gs->sak_c}}</div>
                    										<b class="b20">من</b>
                    										<div class="div37">{{$gs->sak_c - $gs->reservation}}</div>
                  									</div>
                								</div>
              							</div>
              							<div class="title-number">
                								<b class="b" <?if($gs->free == 0){?>style="padding-left: 8%;"<?}?>>
                  								
                  									<span> </span>
                  										<span class="span1">{{$gs->adahy}} </span><br>
                  									<span >{{$gs->sak}}</span>
                  									
                  								
                								</b>
                								<div class="parent" <?if($gs->free == 0){?>style="padding-left: 37%;direction: ltr;"<?}else{?>style="direction: ltr;"<?}?>>
                  									<div class="div29">{{$gs->code}}</div>
                  									<b class="b6">
                    										<span>رقم</span>
                    										<span class="span2"> </span>
                  									</b>
                								</div>
              							</div>
              							<img class="animal-img-icon" alt="" 
              							<? if($gs->adahy == "بقرى")
                                        {?>src="/img/1.png"<?}?>
              								<? if($gs->adahy == "جمسى")
                                        {?>src="/img/2.png"<?}?>
                                        	<? if($gs->adahy == "خراف")
                                        {?>src="/img/3.png"<?}?>
                                   	<? if($gs->adahy == "ماعز")
                                        {?>src="/img/4.png"<?}?>
              							>
              							
              							
              							
              							<div class="days">
                								<div class="div30">1</div>
              							</div>
            						</div>
            						
            						<?}?>
            				
            						
            						
            						
      						
            				
            			
            			
            				
            			
            					
            					
            			
            					
            						
          					</div>
          				<?}?>
        				</div>
      			</div>
    		</div>
  	</div>
  	
        </div>
        
        </div>
        </div>
        </center>
        
        </div>
         </div>
          </div>
           </div>
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
     
       	<script>
  	    $(document).ready(function() {
    $("#type_").on('change',function(){
      
      var gov =  $("#type_").val(); 
   $('#type_show').html('<div class="spinner-border text-success align-self-center "></div>');
   $.get("get_sak_data2",{gov:gov},function(date1){
    $('#type_show').html(date1);
    });

    }); 
});
  	    
  	</script>
  	
  	
  	<script>
$(document).ready(function() {
    $('#myCheckbox').change(function() {
        if ($(this).is(':checked')) {
            $('#filter').val(1);
            $('#resrv2').submit();
        }else{
          $('#filter').val(0);
           $('#resrv2').submit();
        }
    });
});

$(document).ready(function() {
    $('#myCheckboxAivilable').change(function() {
        if ($(this).is(':checked')) {
            $('#filterAivilable').val(1); // Set value to 1 when checked
        } else {
            $('#filterAivilable').val(0); // Set value to 0 when unchecked
        }
        $('#resrv2').submit(); // Submit the form
    });
});
</script>
<script>
	function handleSakChoice(gsid) {
	  let sakCount = parseInt(document.getElementById('sakCount' + gsid).value);
	
	  if (sakCount === 1) {
		// تعبئة القيم المخفية وإرسال الفورم فورًا
		document.getElementById('hiddenSak' + gsid).value = 1;
		document.getElementById('hiddenPersons' + gsid).value = 1;
		document.getElementById('reservationForm' + gsid).submit();
	  } else {
		// تخزين عدد الصكوك في hidden input
		document.getElementById('hiddenSak' + gsid).value = sakCount;
		document.getElementById('displaySakCount' + gsid).innerText = sakCount;
		$('#selectSakModal' + gsid).modal('hide');
		$('#stepTwoModal' + gsid).modal('show');
	  }
	}
	
	function validateAndSubmit(gsid) {
	  let sak = parseInt(document.getElementById('hiddenSak' + gsid).value);
	  let persons = parseInt(document.getElementById('personCount' + gsid).value);
	
	  if (persons > sak) {
		alert("❌ عدد الأشخاص لا يمكن أن يكون أكبر من عدد الصكوك");
		return false;
	  }
	
	  document.getElementById('hiddenPersons' + gsid).value = persons;
	  return true;
	}
	function goBackToSak(gsid) {
  $('#stepTwoModal' + gsid).modal('hide');
  $('#selectSakModal' + gsid).modal('show');
}

	</script>
	  
	
</body>
</html>
                    