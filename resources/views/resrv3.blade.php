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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>

    .child {
  	position: fixed;
  	top: 0px;

  	background-color: #fff;
  	width: 100%;
  	height: 64px;
}
.item {
  	position: absolute;
  	top: 64px;
  	left: 0px;
  	width: 1200px;
  	height: 2px;
}
.cross-icon {
  	width: 16px;
  	position: relative;
  	height: 16px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.close-btn {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	padding: 10px;
}
.close-btn-wrapper {
  	position: absolute;
  	top: 9px;
  	left: 8px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.parent {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 19px;
}
.frame-div {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 12px;
}
.frame-parent {
  	position: absolute;
  	top: 19px;
  	left: 25%;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 57px;
  	color: #000;
  	direction: rtl;
}
.b {
  	position: relative;
}
.wrapper {
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: center;
}
.frame {
  	width: 124px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 6px 0px 0px;
  	box-sizing: border-box;
  	color: #4c4c54;
}
.title {
  	align-self: stretch;
  	border-radius: 20px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 5px 10px;
  	gap: 5px;
  	font-size: 16px;
  	color: #00a651;
}
.wrapper1 {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.place-holder {
  	flex: 1;
  	position: relative;
  	font-weight: 500;
}
.text-box {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	text-align: right;
  	color: #888;
}
.text-box-with-caption {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
}
.text-box-with-caption-parent {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 5px;
	direction: rtl;
}
.text-box-with-caption2 {
  	align-self: stretch;
  	height: 65px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
}
.body {
  	position: absolute;
  	top: 8px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 238px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
  	gap: 20px;
}
.div15 {
  	position: relative;
  	line-height: 16px;
  	font-weight: 500;
}
.title1 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 41.12px);
  	background-color: #fff;
  	width: 83.1px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.other-information-frame {
  	align-self: stretch;
  	position: relative;
  	height: 172px;
}
.checkboxinactivedefaulton-child {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #fff;
  	border: 1px solid #c2c2c2;
  	box-sizing: border-box;
  	width: 16px;
  	height: 16px;
}
.checkbox1 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 16px;
  	height: 16px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.checkboxinactivedefaulton {
  	width: 16px;
  	position: relative;
  	height: 16px;
}
.checkbox {
  	width: 16px;
  	height: 16px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.select-item {
  	align-self: stretch;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item-wrapper {
  	position: absolute;
  	top: 9px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 238px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
}
.title2 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 33.25px);
  	background-color: #fff;
  	width: 67.4px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: center;
  	font-size: 12px;
}
.special-hits-frame {
  	align-self: stretch;
  	position: relative;
  	height: 73px;
  	text-align: right;
}
.place-holder3 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
}
.text-box3 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	text-align: right;
  	color: #888;
}
.body1 {
  	position: absolute;
  	top: 13.15px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 238px;
  	height: 212.8px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
}
.title3 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 31.5px);
  	background-color: #fff;
  	width: 63px;
  	height: 26px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	font-size: 12px;
}
.the-notes-frame {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
}
.other-information-frame-parent {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 10px;
}
.select-item1 {
  	position: absolute;
  	top: -4px;
  	left: 37.8px;
  	width: auto;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.text-box5 {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	color: #888;
}
.text-box-with-caption5 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 100%;
  	height: 65px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
  	text-align: center;
  	font-size: 14px;
}
.select-item-parent {
  	align-self: stretch;
  	position: relative;
  	height: 65px;
  	text-align: right;
  	font-size: 12px;
}
.body2 {
  	position: absolute;
  	top: 9px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
  	gap: 20px;
}
.title4 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 53.38px);
  	background-color: #fff;
  	width: 107.6px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.general-information-frame {
  	align-self: stretch;
  	position: relative;
  	height: 369px;
}
.circle-alert-wrapper {
  	height: 25px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 5px;
  	box-sizing: border-box;
}
.p {
  	margin: 0;
}
.p1 {
  	margin: 0;
  	white-space: pre-wrap;
}
.div29 {
  	position: relative;
  	letter-spacing: -0.02em;
  	font-weight: 500;
}
.div28 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
}
.div31 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.place-holder8 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px 0px;
}
.div30 {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	box-sizing: border-box;
  	height: 40px;
  	overflow: hidden;
  	flex-shrink: 0;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
  	text-align: center;
}
.div27 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 4px;
}
.body3 {
  	position: absolute;
  	top: 9.36px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	/* height: 128.6px; */
  	height: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
}
.title5 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 42px);
  	background-color: #fff;
  	width: 84px;
  	height: 18.7px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.al-sa2t-frame {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	text-align: right;
}
.general-information-frame-parent {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 10px;
}
.frame-container {
  	align-self: stretch;
  	height: 517px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 15px;
  	text-align: center;
}
.div33 {
  	align-self: stretch;
  	position: relative;
  	font-weight: 500;
}
.select-item4 {
  	width: 97.8px;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item3 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.div36 {
  	position: relative;
  	letter-spacing: -0.03em;
  	font-weight: 500;
}
.checkboxactivedefaulton-child {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #a2a2aa;
  	width: 16px;
  	height: 16px;
}
.phosphor-icons-check {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 16px;
  	height: 16px;
}
.checkbox10 {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.select-item7 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	font-size: 12px;
  	color: #a2a2aa;
}
.select-item-container {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 20px;
}
.select-item11 {
  	flex: 1;
  	height: 24px;
}
.div38 {
  	flex: 1;
  	position: relative;
  	letter-spacing: -0.03em;
  	font-weight: 500;
}
.select-item13 {
  	width: 115px;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item12 {
  	width: 115px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	font-size: 12.5px;
  	color: #a2a2aa;
}
.select-item14 {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.frame-parent1 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 10px;
}
.parent2 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
  	gap: 10px;
  	direction: ltr;
}
.container-buy-inner {
  	align-self: stretch;
  	position: relative;
  	height: 134px;
}
.container-buy {
  	width: 521px;
  	box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  	border-radius: 12px;
  	background-color: #fff;
  	min-height: auto; height: auto; overflow: visible;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 15px;
  	box-sizing: border-box;
  	gap: 10px;
}
.container-buy-parent {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 20px;
}
.btn {
  	width: 133px;
  	border-radius: 12px;
  	background-color: #faa755;
  	height: 44px;
  	  
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
}
.btn1 {
  	width: 133px;
  	border-radius: 12px;
  	background-color: #00a651;
  	height: 44px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
  	cursor: pointer;
}
h4 {
	font-size: medium;
}
.btn-parent {
  	height: 44px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	padding: 0px 0px 0px 20px;
  	box-sizing: border-box;
  	gap: 14px;
  	text-align: left;
  	font-size: 16px;
  	color: #fff;
  	  margin-right: 40%;
}
.frame-group {
  	position: absolute;
  	top: 158px;
  	/* right: 18%;
  	left: 10%; */
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 43px;
  	text-align: right;
  
}
.div74 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	overflow: hidden;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
}
.div73 {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
}
.drop-list-tool {
  	width: 103px;
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	text-align: center;
  	color: rgba(1, 11, 56, 0.4);
}
.checkboxactivedefaulton-child4 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #00a651;
  	width: 16px;
  	height: 16px;
}
.select-item36 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	gap: 8px;
}
.select-number {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 10px;
}
.div78 {
  	position: static;
  	font-size: 16px;
  	font-weight: 500;
  	overflow: visible;
}
.select-number-parent {
  	width: 100%;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 8px;
  	position: relative;
  	z-index: 1;
}
.place-holder19 {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.div80 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	overflow: hidden;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
}
.drop-list-tool1 {
  	width: 58px;
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.div82 {
  	position: relative;
  	font-weight: 500;
  	white-space: pre-wrap;
  	text-align: right;
}
.drop-list-tool-parent {
  	width: 265px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 8px;
  	text-align: center;
  	font-size: 16px;
}
.frame-parent4 {
  	width: 735px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 20px;
}
.inner {
  	position: absolute;
  	top: 96px;
  	left: 25%;
  	width: 991px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	text-align: right;
}
.for-preview {
  	position: relative;
  	font-weight: 500;
	font-size: 12px;
}
.form-control {
	font-size: 12px;
	border-color: #cecece;
}
.for-preview-parent {
  	position: absolute;
  	top: 979px;
  	left: 512px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 31px;
  	font-size: 16px;
  	color: #5d5d5d;
}
.div {
  	width: 100%;
  	position: relative;
  	box-shadow: 0px 4px 30px 10px rgba(0, 0, 0, 0.25);
  	border-radius: 12px;
  	background-color: #f6f6f6;
  	height: auto;
  
  	text-align: left;
  	font-size: 14px;
  	color: #4c4c54;
  	font-family: Cairo;
}


.icon {
  	width: 24px;
  	position: relative;
  	height: 24px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.b2 {
  	align-self: stretch;
  	position: relative;
  	line-height: 24px;
  	color: #121212;
}
.span1 {
  	letter-spacing: -0.03em;
}
.span {
  	line-height: 24px;
  	white-space: pre-wrap;
}
.p4 {
  	margin: 0;
}
.span3 {
  	line-height: 30px;
}
.span5 {
  	color: #11caef;
}
.span6 {
  	color: #4c4c54;
}
.div83 {
  	align-self: stretch;
  	position: relative;
  	font-weight: 600;
}
.div84 {
  	flex: 1;
  	position: relative;
  	letter-spacing: 0.02em;
  	line-height: 30px;
  	font-weight: 500;
}
.arrow-forward-icon {
  	width: 20px;
  	position: relative;
  	height: 20px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.arrow-forward-wrapper {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	padding: 5px 0px 0px;
}
.parent5 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 10px 0px 0px;
  	gap: 8px;
}
.parent4 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 8px;
}
.lets-iconsback {
  	width: 20px;
  	position: relative;
  	height: 20px;
  	overflow: hidden;
  	flex-shrink: 0;
  	object-fit: contain;
}
.div85 {
  	position: relative;
  	font-weight: 600;
}
.lets-iconsback-parent {
  	width: 215px;
  	border-radius: 20px;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 38px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	gap: 10px;
}
.search-parent {
  	width: 211px;
  	border-radius: 20px;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 38px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	gap: 10px;
}
.frame-parent6 {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 14px;
  	text-align: center;
  	color: #11caef;
}
.frame-parent5 {
  	width: 416px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 30px;
}
.error-page {
  	width: 528px;
  	position: relative;
  	border-radius: 8px;
  	background-color: #e5fbff;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 316px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 16px;
  	gap: 16px;
  	max-width: 90%;
  	max-height: 90%;
  	overflow: auto;
  	text-align: right;
  	font-size: 16px;
  	color: #4c4c54;
  	font-family: Cairo;
}




@media(max-width: 900px) {
     .child {
  	position: absolute;
  	top: 0px;

  	background-color: #fff;
  	width: 100%;
  	height: 64px;
}
.item {
  	position: absolute;
  	top: 64px;
  	left: 0px;
  	width: 1200px;
  	height: 2px;
}

.cross-icon {
  	width: 16px;
  	position: relative;
  	height: 16px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.close-btn {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	padding: 10px;
}
.close-btn-wrapper {
  	position: absolute;
  	top: 9px;
  	left: 8px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.parent {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 19px;
  	display: none;
}
.frame-div {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 12px;
}
.frame-parent {
  	position: static;
  	top: 19px;
  	left: 25%;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 57px;
  	color: #000;
  	direction: rtl;
  	        display: none;
        width: 100%;
}
.b {
  	position: relative;
}
.wrapper {
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: center;
}
.frame {
  	width: 124px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 6px 0px 0px;
  	box-sizing: border-box;
  	color: #4c4c54;
}
.title {
  	align-self: stretch;
  	border-radius: 20px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 5px 10px;
  	gap: 5px;
  	font-size: 16px;
  	color: #00a651;
}
.wrapper1 {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
}
.place-holder {
  	flex: 1;
  	position: relative;
  	font-weight: 500;
	font-size: 12px;
}
.text-box {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	text-align: right;
  	color: #888;
}
.text-box-with-caption {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
}
.text-box-with-caption-parent {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 5px;
}
.text-box-with-caption2 {
  	align-self: stretch;
  	height: 65px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
}
.body {
  	position: absolute;
  	top: 8px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 10px;
  	gap: 10px;
}
.div15 {
  	position: relative;
  	line-height: 16px;
  	font-weight: 500;
}
.title1 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 41.12px);
  	background-color: #fff;
  	width: 83.1px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.other-information-frame {
  	align-self: stretch;
  	position: relative;
  	height: 226px;
}
.checkboxinactivedefaulton-child {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #fff;
  	border: 1px solid #c2c2c2;
  	box-sizing: border-box;
  	width: 16px;
  	height: 16px;
}
.checkbox1 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 16px;
  	height: 16px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.checkboxinactivedefaulton {
  	width: 16px;
  	position: relative;
  	height: 16px;
}
.checkbox {
  	width: 16px;
  	height: 16px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.select-item {
  	align-self: stretch;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item-wrapper {
  	position: absolute;
  	top: 9px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px 10px;
}
.title2 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 33.25px);
  	background-color: #fff;
  	width: 67.4px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: center;
  	font-size: 12px;
}
.special-hits-frame {
  	align-self: stretch;
  	position: relative;
  	height: 73px;
  	text-align: right;
}
.place-holder3 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
}
.text-box3 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	text-align: right;
  	color: #888;
}
.body1 {
  	position: absolute;
  	top: 13.15px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	height: auto;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 10px;
}
.title3 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 31.5px);
  	background-color: #fff;
  	width: 63px;
  	height: 26px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	font-size: 12px;
}
.the-notes-frame {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
}
.other-information-frame-parent {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 10px;
}
.select-item1 {
  	position: absolute;
  	top: -4px;
  	left: 37.8px;
  	width: auto;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.text-box5 {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	height: 35px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	color: #888;
}
.text-box-with-caption5 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 100%;
  	height: 65px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-end;
  	gap: 4px;
  	text-align: center;
  	font-size: 14px;
}
.select-item-parent {
  	align-self: stretch;
  	position: relative;
  	height: 65px;
  	text-align: right;
  	font-size: 12px;
}
.body2 {
  	position: absolute;
  	top: 9px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 10px;
  	gap: 10px;
}
.title4 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 53.38px);
  	background-color: #fff;
  	width: 107.6px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.general-information-frame {
  	align-self: stretch;
  	position: relative;
  	height: 315px;
}
.circle-alert-wrapper {
  	height: 25px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 5px;
  	box-sizing: border-box;
}
.p {
  	margin: 0;
	font-size: 12px;
}
.p1 {
  	margin: 0;
  	white-space: pre-wrap;
	  font-size: 12px;
}
input {
	direction: rtl;
	text-align: center;
}
.div29 {
  	position: relative;
  	letter-spacing: -0.02em;
  	font-weight: 500;
}
.div28 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
}
.div31 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.place-holder8 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px 0px;
}
.div30 {
  	align-self: stretch;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	box-sizing: border-box;
  	height: 40px;
  	overflow: hidden;
  	flex-shrink: 0;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
  	text-align: center;
}
.div27 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 4px;
}
.body3 {
  	position: absolute;
  	top: 9.36px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	height: 128.6px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
}
.title5 {
  	position: absolute;
  	top: 0px;
  	left: calc(50% - 42px);
  	background-color: #fff;
  	width: 84px;
  	height: 18.7px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 10px;
  	box-sizing: border-box;
  	text-align: left;
  	font-size: 12px;
}
.al-sa2t-frame {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	text-align: right;
}
.general-information-frame-parent {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 10px;
}
.frame-container {
  	align-self: stretch;
  	height: 517px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 15px;
  	text-align: center;
}
.div33 {
  	align-self: stretch;
  	position: relative;
  	font-weight: 500;
}
.select-item4 {
  	width: 97.8px;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item3 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.div36 {
  	position: relative;
  	letter-spacing: -0.03em;
  	font-weight: 500;
}
.checkboxactivedefaulton-child {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #a2a2aa;
  	width: 16px;
  	height: 16px;
}
.phosphor-icons-check {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	width: 16px;
  	height: 16px;
}
.checkbox10 {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.select-item7 {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	font-size: 12px;
  	color: #a2a2aa;
}
.select-item-container {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 20px;
}
.select-item11 {
  	flex: 1;
  	height: 24px;
}
.div38 {
  	flex: 1;
  	position: relative;
  	letter-spacing: -0.03em;
  	font-weight: 500;
}
.select-item13 {
  	width: 115px;
  	height: 24px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	box-sizing: border-box;
  	gap: 8px;
}
.select-item12 {
  	width: 115px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	font-size: 12.5px;
  	color: #a2a2aa;
}
.select-item14 {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.frame-parent1 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 10px;
}
.parent2 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 12px;
  	border: 1px solid #e9e9e9;
  	box-sizing: border-box;
  	width: 100%;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 20px;
  	gap: 10px;
  	direction: ltr;
	font-size: 12px;
}
b {
	font-size: 12px;
}
h5 {
	font-size: 12px;
}
.container-buy-inner {
  	align-self: stretch;
  	position: relative;
  	height: 134px;
	text-align: center;
}
.container-buy {
	max-width: 521px !important;
	width: 100%;
  	box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  	border-radius: 12px;
  	background-color: #fff;
  	min-height: auto; height: auto; overflow: visible;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 15px;
  	box-sizing: border-box;
  	gap: 10px;
}
.container-buy-parent {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 20px;
}
.btn {
  	width: 133px;
  	border-radius: 12px;
  	background-color: #faa755;
  	height: 44px;
  	  
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
}
.btn1 {
  	width: 133px;
  	border-radius: 12px;
  	background-color: #00a651;
  	height: 44px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	box-sizing: border-box;
  	cursor: pointer;
}
.btn-parent {
  	height: 44px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	padding: 0px 0px 0px 20px;
  	box-sizing: border-box;
  	gap: 14px;
  	text-align: center;
  	font-size: 16px;
  	color: #fff;
  	margin-right: 0;
	width: 100%;
}
.frame-group {
  	position: absolute;
  	top: 158px;
  	right: 18%;
  	left: 0px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 43px;
  	text-align: right;
  	overflow-x: scroll;
}
.div74 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 12px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	overflow: hidden;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
  	gap: 8px;
}
.div73 {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
}
.drop-list-tool {
  	width: 103px;
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
  	text-align: center;
  	color: rgba(1, 11, 56, 0.4);
}
.checkboxactivedefaulton-child4 {
  	position: absolute;
  	top: 0px;
  	left: 0px;
  	border-radius: 4px;
  	background-color: #00a651;
  	width: 16px;
  	height: 16px;
}
.select-item36 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	gap: 8px;
}
.select-number {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 10px;
}
.div78 {
  	position: static;
  	font-size: 16px;
  	font-weight: 500;
  	overflow: visible;
}
.select-number-parent {
  	width: 100%;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 8px;
  	position: relative;
  	z-index: 1;
}
.place-holder19 {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.div80 {
  	align-self: stretch;
  	flex: 1;
  	border-radius: 8px;
  	background-color: #fff;
  	border: 1px solid #c8c9cc;
  	overflow: hidden;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px;
}
.drop-list-tool1 {
  	width: 58px;
  	height: 30px;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-start;
  	justify-content: flex-start;
}
.div82 {
  	position: relative;
  	font-weight: 500;
  	white-space: pre-wrap;
  	text-align: right;
}
.drop-list-tool-parent {
  	width: 265px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 8px;
  	text-align: center;
  	font-size: 16px;
}
.frame-parent4 {
  	width: 735px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 20px;
}
.inner {
  	position: absolute;
  	top: 96px;
  	left: 25%;
  	width: 991px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	text-align: right;
  	display: none;
}
.for-preview {
  	position: relative;
  	font-weight: 500;
}
.for-preview-parent {
  	position: absolute;
  	top: 979px;
  	left: 512px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-start;
  	gap: 31px;
  	font-size: 16px;
  	color: #5d5d5d;
}
.div {
  	width: 100%;
  	position: relative;
  	box-shadow: 0px 4px 30px 10px rgba(0, 0, 0, 0.25);
  	border-radius: 12px;
  	background-color: #f6f6f6;
  	height: auto;
  
  	text-align: left;
  	font-size: 14px;
  	color: #4c4c54;
  	font-family: Cairo;
}


.icon {
  	width: 24px;
  	position: relative;
  	height: 24px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.b2 {
  	align-self: stretch;
  	position: relative;
  	line-height: 24px;
  	color: #121212;
}
.span1 {
  	letter-spacing: -0.03em;
}
.span {
  	line-height: 24px;
  	white-space: pre-wrap;
}
.p4 {
  	margin: 0;
}
.span3 {
  	line-height: 30px;
}
.span5 {
  	color: #11caef;
}
.span6 {
  	color: #4c4c54;
}
.div83 {
  	align-self: stretch;
  	position: relative;
  	font-weight: 600;
}
.div84 {
  	flex: 1;
  	position: relative;
  	letter-spacing: 0.02em;
  	line-height: 30px;
  	font-weight: 500;
}
.arrow-forward-icon {
  	width: 20px;
  	position: relative;
  	height: 20px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.arrow-forward-wrapper {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	padding: 5px 0px 0px;
}
.parent5 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 10px 0px 0px;
  	gap: 8px;
}
.parent4 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: center;
  	gap: 8px;
}
.lets-iconsback {
  	width: 20px;
  	position: relative;
  	height: 20px;
  	overflow: hidden;
  	flex-shrink: 0;
  	object-fit: contain;
}
.div85 {
  	position: relative;
  	font-weight: 600;
}
.lets-iconsback-parent {
  	width: 215px;
  	border-radius: 20px;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 38px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	gap: 10px;
}
.search-parent {
  	width: 211px;
  	border-radius: 20px;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 38px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
  	gap: 10px;
}
.frame-parent6 {
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: center;
  	gap: 14px;
  	text-align: center;
  	color: #11caef;
}
.frame-parent5 {
  	width: 416px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 30px;
}
.error-page {
  	width: 528px;
  	position: relative;
  	border-radius: 8px;
  	background-color: #e5fbff;
  	border: 1px solid #11caef;
  	box-sizing: border-box;
  	height: 316px;
  	display: flex;
  	flex-direction: row;
  	align-items: flex-start;
  	justify-content: flex-end;
  	padding: 16px;
  	gap: 16px;
  	max-width: 90%;
  	max-height: 90%;
  	overflow: auto;
  	text-align: right;
  	font-size: 16px;
  	color: #4c4c54;
  	font-family: Cairo;
}

 
    
}
.popup-overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .popup {
      background: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      max-width: 400px;
      width: 90%;
    }
    .popup .btn-container button {
	  border: none;
	  padding: 10px 20px;
	  border-radius: 8px;
	  font-weight: bold;
	  min-width: 120px;
    }
	.popup .btn-container {
    display: flex;
    justify-content: center;
    gap: 15px;
	flex-wrap: wrap;
  }
</style>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@500;600;700&display=swap" />
  	
    @php
  use Jenssegers\Agent\Agent;
  use Illuminate\Http\Request;
  
    $agent = new Agent();
    $request = Request();
    
    $id = (int)htmlspecialchars($request->id);
   $times = (int)htmlspecialchars($request->times);
    $c_sak = (int)htmlspecialchars($request->c_sak);
    $c_persons = (int)htmlspecialchars($request->c_persons);
    $day = (int)htmlspecialchars($request->day);
    if($day > 0){}else{$day = 1;}
   $day_name = DB::table('days')->where('id',$day)->first()->name;
   $info = DB::table('adahyt')->where('id',$id)->first();
    $times_name = DB::table('times')->where('id',$times)->first()->name;
    if($c_sak > $info->free){$c_sak = $info->free;}
  $sak_price = DB::table('sak')->where('name',$info->sak)->first()->price;
  $selectedParts = DB::table('adahy_acc')
    ->where('code_adahy', $id)
    ->pluck('name')
    ->toArray();
    if($c_persons > $c_sak){$c_persons = $c_sak;}
    
    $selcted = 1;
    if($info->sak_c == 1){$selcted = 7;}
    if($info->sak_c == 2){$selcted = 3;}
    if($info->sak_c == 3){$selcted = 3;}
    if($info->sak_c == 4){$selcted = 2;}
    if($info->sak_c == 7){$selcted = 1;}
  @endphp 	
  	
  	
  	<script>
  	        
			  function checksak() {
    let sum = 0;
    var c = "{{ $c_sak }}"; // تأكد أنها PHP صحيحة

    $('.num').each(function () {
        let value = parseFloat($(this).val());
        if (!isNaN(value)) {
            sum += value;
        }
    });

    if (sum > c || sum < c) {
        alert("يجب توزيع الصكوك بطريقة صحيحة");
        document.getElementById("sub").disabled = true;
        document.getElementById("sub").value = "خطأ في الصكوك";
        return false;
    } else {
        document.getElementById("sub").disabled = false;
        document.getElementById("sub").value = "الخطوة التالية";
        return true;
    }
}
  	</script>
</head>
<body>
  	
  	<div class="div">
    		<div class="child">
    		</div>
    	
    		
    	
    		<div class="frame-parent">
      			<div class="parent">
      			    <div class="for-preview">توقيت الذبح </div>
        				<div class="for-preview">
        				    {{$times_name}}
        				     </div>
        				
      			</div>
      			<div class="parent">
      			    <div class="for-preview">مقدار الذبح </div>
        				<div class="for-preview">{{$info->sak}}</div>
        				
      			</div>
      			<div class="parent">
      			    	<div class="for-preview">يوم الذبح </div>
        				<div class="for-preview">{{$day_name}} </div>
        			
      			</div>
      			<div class="frame-div">
      			    <div class="for-preview">رقم الأضحية </div>
        				<div class="for-preview">{{$info->code}}</div>
        				
      			</div>
      			<div class="frame-div">
      			    	<div class="for-preview">نوع الأضحية </div>
        				<div class="for-preview">{{$info->adahy}}</div>
        			
      			</div>
				  <div class="frame-div">
					<div class="for-preview">المحافظة</div>
						@switch($info->gov)
								@case(1)
								<div class="for-preview"><b>القاهرة</b></div>
								@break
								@case(12)
								<div class="for-preview"><b>الدقهلية</b></div>
								@break
								@case(24)
								<div class="for-preview"><b>المنيا</b></div>
								@break		   
						@endswitch
			     </div>
    		</div>
			@php
			if ($c_persons == 0) {
			session()->flash("fail", "لقد سبقك احد فى حجز الصك");
			header('Location: ' . url("resrv2?gov={$info->gov}")); // غيّر الرابط لمسار الصفحة المناسبة
			exit;
            }
			$total_parts = 7; // عدد الأجزاء
			$persons = $c_persons;
			$person_parts = floor($c_sak / $c_persons); // المتوسط
			$extra = $c_sak % $c_persons; // عدد الأشخاص اللي هيزيدوا واحد جزء
			@endphp

    		<form action="res_post" method="post" id="reservationForm">
    		        @csrf
    		        
    		        <input type="hidden" name="id" value="{{$info->id}}" required="required">
    		        <input type="hidden" name="times" value="{{$times}}" required="required">
    		        <input type="hidden" name="c_sak" value="{{$c_sak}}" required="required">
    		        <input type="hidden" name="c_persons" value="{{$c_persons}}" required="required">
    		        <input type="hidden" name="day" value="{{$day}}" required="required">
    		<div class="frame-group col-12" style="    direction: rtl;">
    		    
    		    
      			<div class="container-buy-parent row m-0 w-100" >
        		@for($x = 1; $x <= $c_persons; $x++)
				@php
				 if ($info->sak_c == 4) {
                        if ($c_sak == 1 ) {
                            $this_person_parts = 2;
                        } elseif ($c_sak == 2 && $c_persons == 2) {
                            $this_person_parts = 2;
                        } elseif ($c_sak == 2 && $c_persons == 1) {
                            $this_person_parts = 4;
                        } elseif ($c_sak == 3 && $c_persons == 3) {
                            $this_person_parts = 2;
						} elseif ($c_sak == 3 && $c_persons == 2) {
                            $this_person_parts =3;
						} elseif ($c_sak == 3 && $c_persons == 1) {
                            $this_person_parts =6;
						} elseif ($c_sak == 4 && $c_persons == 4) {
                            $this_person_parts =2;
						} elseif ($c_sak == 4 && $c_persons == 3) {
                            $this_person_parts =3;
						} elseif ($c_sak == 4 && $c_persons == 2) {
                            $this_person_parts =4;
						} elseif ($c_sak == 4 && $c_persons == 1) {
                            $this_person_parts =7;
						}
				}elseif($info->sak_c == 1){
					$this_person_parts = 7;
				}else{
				$this_person_parts = $person_parts + ($x <= $extra ? 1 : 0);
			    }
					
				@endphp
				<input type="hidden" class="max-parts" data-person="{{ $x }}" value="{{ $this_person_parts }}">
        				
				<div class="container-buy col-6" style="    direction: ltr;">
							<h4 style="color: #ee2367">⏳ برجاء إدخال البيانات بشكل صحيح مع مراعاة الوقت</h4>
          					<div class="title">
            						<div class="wrapper">
              							<b class="b" id="n_{{$x}}"></b>
            						</div>
            						<div class="frame">
              							<div class="for-preview">بيانات الفرد  
										</div>
            						</div>
          					</div>
          					<div class="frame-container">
            						<div class="other-information-frame-parent">
              							<div class="other-information-frame">
											<div class="body">
												<div class="text-box-with-caption-parent">
													<div class="text-box-with-caption" style="direction: ltr;">
														<div class="wrapper1">
																<div class="for-preview">المحافظة</div>
														</div>
														<select name="gov[]" class="form-control text-center" style="height: 40px;" required>
															<option value="{{ $info->gov == 1 ?'cairo' :($info->gov == 12 ? 'dakahlia' : ($info->gov == 24 ? 'minya' : 'المحافظة'))}}">
															@switch($info->gov)
															@case(1)
															<div class="for-preview"><b>القاهرة</b></div>
															@break
															@case(12)
															<div class="for-preview"><b>الدقهلية</b></div>
															@break
															@case(24)
															<div class="for-preview"><b>المنيا</b></div>
															@break		   
															@endswitch
															</option>
																{{-- <option value="cairo">القاهرة</option>
																<option value="giza">الجيزة</option>
																<option value="alexandria">الإسكندرية</option>
																<option value="aswan">أسوان</option>
																<option value="asyut">أسيوط</option>
																<option value="beheira">البحيرة</option>
																<option value="beni-suef">بني سويف</option>
																<option value="dakahlia">الدقهلية</option>
																<option value="damietta">دمياط</option>
																<option value="faiyum">الفيوم</option>
																<option value="gharbia">الغربية</option>
																<option value="helwan">حلوان</option>
																<option value="ismailia">الإسماعيلية</option>
																<option value="kafr-elsheikh">كفر الشيخ</option>
																<option value="luxor">الأقصر</option>
																<option value="matruh">مطروح</option>
																<option value="minya">المنيا</option>
																<option value="monufia">المنوفية</option>
																<option value="new-valley">الوادي الجديد</option>
																<option value="north-sinai">شمال سيناء</option>
																<option value="port-said">بورسعيد</option>
																<option value="qalyubia">القليوبية</option>
																<option value="qena">قنا</option>
																<option value="red-sea">البحر الأحمر</option>
																<option value="sharqia">الشرقية</option>
																<option value="sohag">سوهاج</option>
																<option value="south-sinai">جنوب سيناء</option>
																<option value="suez">السويس</option> --}}
														</select>                 												
													</div>
													<div class="text-box-with-caption" style="direction: ltr;">
														<div class="wrapper1">
															<div class="for-preview">المدينة</div>
														</div>
														<input name="city[]" style="    height: 40px;" class="form-control" id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')">
													</div>
													
												</div>
												<div class="text-box-with-caption2">
														<div class="wrapper1">
															<div class="for-preview">العنوان التفصيلي </div>
														</div>
													<input name="address[]" class="form-control"id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')">
												</div>

											</div>
											<div class="title1">
												<div class="div15">معلومات </div>
											</div>
              							</div>
              							<div class="special-hits-frame">
											<div class="select-item-wrapper">
												<div class="select-item">
														<div class="place-holder">تريد مشاهدة الذبح</div>
														<div class="checkbox">
															<div class="checkboxinactivedefaulton">
																<input type="checkbox" name="view[]" id="view{{$x}}" value="yes" class="form-check-input" >
																<label for="view{{$x}}"> </label>
															</div>
														</div>
												</div>
											</div>
											<div class="title2">
												<div class="div15">طلبات أخرى</div>
											</div>
              							</div>
              							<div class="the-notes-frame">
                							  <div class="body1">
											<div class="text-box-with-caption2">
												<div class="wrapper1">
													<div class="for-preview">الملاحظات  </div>
												</div>
												<input name="description[]" id="description{{$x}}" class="form-control" placeholder="ملاحظات إضافية" >
											<!-- id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')" placeholder="ملاحظات إضافية" -->
	
											</div>
                  									<div class="text-box-with-caption">
                    										<div class="wrapper1">
                      											<div class="for-preview">   
                      											السعر المراد تحصيله
                      											</div>
                    										</div>
                    									<input name="notes[]" id="notes{{$x}}" value="{{$sak_price}}" class="form-control" style="    text-align: center;" required="required">
                  									</div>
                								</div>
                								<div class="title3">
                  									<div class="div15">السعر</div>
                								</div>
              							</div>
            						</div>
            						<div class="general-information-frame-parent">
              							<div class="general-information-frame">
                							<div class="body2">
												<div class="text-box-with-caption2">
														<div class="wrapper1">
															<div class="for-preview">الاسم</div>
														</div>
														<input name="name[]" id="name{{$x}}" class="form-control" id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')">
												</div>
                  								<div class="select-item-parent">
                    								<div class="select-item1">                     											                      											
                      									<div class="form-check custom-checkbox mb-3 checkbox-info">						
															<label class="form-check-label" for="whats{{$x}}">
																له واتساب
															</label>
												          <input type="checkbox" class="form-check-input" name="whats"  id="whats{{$x}}" >
										                </div>
                    								</div>
                    								<div class="text-box-with-caption5">
														<div class="wrapper1">
																<div class="for-preview">المحمول 1</div>
														</div>
														<input name="mobile[]" id="mobile{{$x}}" maxlength="11" min="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')">
													</div>
                  								</div>
                  								<div class="select-item-parent">
                    								<div class="select-item1">
                      									<div class="form-check custom-checkbox mb-3 checkbox-info">						
															<label class="form-check-label" for="whatsd{{$x}}">
																له واتساب
															</label>
										                    <input type="checkbox" class="form-check-input" name="whatsd"  id="whatsd{{$x}}" >
										                </div>
                    								</div>
													<div class="text-box-with-caption5">
														<div class="wrapper1">
																<div class="for-preview">المحمول 2</div>
														</div>
														<input name="mobile2[]" id="mobile2{{$x}}"  maxlength="11" min="11" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control" id="myField" required oninvalid="this.setCustomValidity('يرجى ملء هذا الحقل.')" oninput="this.setCustomValidity('')" >
													</div>
                  								</div>
												<div class="text-box-with-caption2">
													<div class="wrapper1">
														<div class="for-preview">رقم أرضي</div>
													</div>
													<input name="mobile3[]" id="mobile3{{$x}}" maxlength="10" min="7" onkeypress="return event.charCode >= 48 && event.charCode <= 57"   class="form-control" >
												</div>
                							</div>
											<div class="title4">
												<div class="div15">المعلومات الأساسية</div>
											</div>
              							</div>
										<div class="al-sa2t-frame">
												<div class="body3">
													<div class="div27">
															<div class="div28">
																<div class="circle-alert-wrapper"></div>
																	<div class="div29">
																			<p class="p">عدد الصكوك المطلوب حجزها </p> 
																			<p class="p1" id="ns_{{$x}}"></p>
																	</div>
															</div>
																@php
																	$cp = ($c_persons - 1);
																	$cps = ($c_sak - $c_persons) + 1;
																@endphp
                                                            
																@if($c_sak == $c_persons)
																<select name="number[]" id="number{{$x}}" class="num" onchange="checksak()" style="
																		width: 30%;
																		height: 30px;
																		margin-right: 65%;
																		margin-top: 0%;
																		border-radius: 7px;
																		border-color: #ced4d9;" >
																		<option value="1">1</option>
																</select>
															@else
																<select name="number[]" id="number{{$x}}" class="num" onchange="checksak()" style=" 
																width: 30%;
																height: 30px;
																margin-right: 65%;
																margin-top: 0%;
																border-radius: 7px;
																border-color: #ced4d9;" >
																@for($y = 1; $y <= $cps; $y++)
																	<option value="{{$y}}">{{$y}}</option>
																@endfor
																</select>
															@endif
													</div>
												</div>
												<div class="title5">
													<div class="div15">عدد الصكوك</div>
												</div>
										</div><!-- .al-sa2t-frame -->
            						</div><!-- .general-information-frame-parent -->
          					</div>
          			<div class="container-buy-inner {{ $info->adahy == "خراف" || $info->adahy == "ماعز"||  $info->adahy == "من الخارج" ? 'd-none' : '' }}" style="clear:both; margin-top:10px;">
		  				<div class="div78"> 
		  					<div class="select-number-parent">
		  						<!-- <div class="place-holder19">
		  							<div class="div80">
		  								<div class="drop-list-tool1">
		  									<div class="div82">عدد الأجزاء</div>
		  								</div>
		  							</div>
		  						</div> -->
		  						<div class="drop-list-tool-parent">
		  							<div class="frame-parent4">
		  								<div class="select-item-container">
		  									<div class="select-item11"></div>
		  									<div class="select-item4"></div>
		  								</div>
		  							</div>
		  						</div>
		  					</div>
		  				</div><!-- .select-number-parent -->
						@if ($info->sak_c == 4 && $c_persons ==4)
						<b style="color:rgb(137, 135, 33)">يرجى اختيار كارع واحد فقط مع جزء من الاجزاء الاخرى 💡</b>
						@elseif ($info->sak_c == 4 && $c_persons ==3)
						<b style="color:rgb(137, 135, 33)">يرجى اختيار كارع واحد فقط مع جزء من الاجزاء الاخرى 💡</b>
						@elseif ($info->sak_c == 4 && $c_persons ==2)
						<b style="color:rgb(137, 135, 33)">يرجى اختيار كراعين  فقط مع جزئين من الاجزاء الاخرى 💡</b>
						@endif
						<div class="parent2">
							{{-- <div class="div33">اختر عدد ( {{$selcted}} ) من الأجزاء الآتيه :</div> --}}
							<div class="div33">	<h5>الشخص رقم {{ $x }} (اختر {{ $this_person_parts }} أجزاء)</h5></div>
							@php
							// كل أسماء الأجزاء اللي ممكن تتحدد (حسب ترتيبك)
							$parts = ['كارع1', 'كارع2', 'كارع3', 'كارع4', 'العكوة', 'الطحال', 'المخ'];
						@endphp
						
						<div class="frame-parent1"style="display: flex; flex-wrap: wrap; gap: 20px;">
							<div class="select-item-container">
								<div class="select-item3">
									<div class="select-item4">
										@foreach($parts as $index => $part)
											@php
												$isDisabled = in_array($part, $selectedParts) ? 'disabled' : '';
											@endphp
						
											<div style="display: flex; flex-direction: column; align-items: center; width: 100px; opacity: {{ $isDisabled ? '0.5' : '1' }};">

												<input 
													type="checkbox" 
													id="part{{ $index }}_{{ $x }}" 
													{{-- name="parts[]"  --}}
													name ="parts[{{ $x }}][]"
													class="form-check-input part-checkbox person-{{ $x }}" 
													value="{{ $part }}" 
													{{ $isDisabled }}
												   
													>
												<label class="form-check-label" for="part{{ $index }}_{{ $x }}">
													{{ $part }}
												</label>
											</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						
							{{-- <div class="frame-parent1">
									<div class="select-item-container">
										<div class="select-item3">
											<div class="select-item4">						    
												<div class="form-check custom-checkbox mb-3 checkbox-info">
													<label class="form-check-label" for="kar{{$x}}">
														كارع1 
													</label>
														<input type="checkbox" name="kar[]"  class="form-check-input part-checkbox person-{{$x}}" value="كارع1">		
												</div>
												<div class="form-check custom-checkbox mb-3 checkbox-info">
													<label class="form-check-label" for="kar{{$x}}">
														كارع2 
													</label>
													<input type="checkbox" name="kars[]"  class="form-check-input part-checkbox person-{{$x}}" value="كارع2">
												</div>
												<div class="form-check custom-checkbox mb-3 checkbox-info">
													<label class="form-check-label" for="kar{{$x}}">
														كارع3 
													</label>
												<input type="checkbox" name="karss[]"  class="form-check-input part-checkbox person-{{$x}}" value="كارع3">
												</div>
												<div class="form-check custom-checkbox mb-3 checkbox-info">
												<label class="form-check-label" for="kar{{$x}}">
												كارع4 
												</label>
												<input type="checkbox" name="karsss[]"  class="form-check-input part-checkbox person-{{$x}}" value="كارع4">
												</div>
											</div>
										</div>
									</div>
									<div class="select-item-container">
									<div class="select-item11"></div>
										<div class="select-item4">
											<div class="form-check custom-checkbox mb-3 checkbox-info">
												<label class="form-check-label" for="kar{{$x}}">
												العكوة 
												</label>
												<input type="checkbox" name="ka[]" class="form-check-input part-checkbox person-{{$x}}" value="العكوة">
											</div>
										</div>
										<div class="select-item14">
											<div class="select-item4">
												<div class="form-check custom-checkbox mb-3 checkbox-info">
													<label class="form-check-label" for="kar{{$x}}">
														الطحال 
													</label>
													<input type="checkbox" name="kah[]" class="form-check-input part-checkbox person-{{$x}}" value="الطحال">
												</div>
											</div>
										</div>
										<div class="select-item14">
											<div class="select-item4">
												<div class="form-check custom-checkbox mb-3 checkbox-info">
													<label class="form-check-label" for="kar{{$x}} ">
													المخ 
													</label>
													<input type="checkbox" name="kam[]" class="form-check-input part-checkbox person-{{$x}}" value="المخ">
												</div>
											</div>
										</div>
									</div>
							</div> --}}
					    </div>
			        </div>
		        </div>
        				
        				
        				
        				
        				     <script>
$(document).ready(function() {
    $('#name{{$x}}').on('input', function() {
        var inputValue = $(this).val();
        $('#n_{{$x}}').text(inputValue);
        $('#ns_{{$x}}').text(inputValue);
    });
});
</script>


       				     <script>
$(document).ready(function() {
    $('#number{{$x}}').on('change', function() {
        var inputValue = $(this).val();
        var p = "@php echo $sak_price ; @endphp";
        $('#notes{{$x}}').val(inputValue * p);
    
    });
});
</script>


<script>
$(document).ready(function() {
    $('.kar{{$x}}').on('change', function() {
       var n = $('#number{{$x}}').val();
        var s = "{{$selcted}}";
        var ss = (s * n);
        var checkedBoxes = $('.kar{{$x}}:checked').length;
        if (checkedBoxes > ss) {
            $(this).prop('checked', false);
            $('#message').text('You can select up to 3 options only.');
        } else {
            $('#message').text('');
        }
    });
});
</script>
        					
        				@endfor
      		</div>
      			<div class="btn-parent" style="margin-top:-1%;    margin-bottom: 3%;">
      			    	    <a href="resrv2" style="color:#fff;">
        				<div class="btn">
        			
          					<div class="for-preview" style="color:#fff;">تراجع</div>
          				
        				</div>
        					</a>
        				<input type="button" id="showConfirm"  style="color: #fff;width: 50%;
    border-color: #0ebf15;" class="btn1"  value="الخطوة التالية" >
        				
      			</div>
    		</div>
    		</form>
			<div class="popup-overlay" id="popupOverlay">
				<div class="popup">
				  <b >هل أنت متأكد من صحة البيانات المدخلة؟</b>
				  
				  <div class="btn-container pt-3">
				  <input  type="button" onclick="submitForm()"  id="sub" class="btn btn-success btn1" value="تأكيد الحجز">
				  <button onclick="closePopup()" class="btn btn-success">تراجع</button>
				</div>
				</div>
			  </div>
    		<div class="inner">
      			<div class="frame-parent4">
        				<div class="select-number-parent">
          					<div class="select-number">
          					    
          					 
            					
            						<div class="select-item36">
            						    <div class="div31">{{$c_persons}}</div>
              							<div class="for-preview">عدد الاشخاص</div>
              							<div class="checkbox10">
                								<div class="checkboxinactivedefaulton">
                								    
                  															   
          					    
          					    <div @if($c_persons > 1) class="checkboxactivedefaulton-child4" @else class="checkboxinactivedefaulton-child" @endif>
                  									</div>
                  			
                  									<img class="phosphor-icons-check" alt="" src="Phosphor Icons / Check.svg">
                  							
                  									
                								</div>
              							</div>
            						</div>
            						
            						
            						<div class="select-item36">
              							<div class="for-preview">شخص واحد</div>
              							<div class="checkbox">
                								<div class="checkboxinactivedefaulton">
                  									<div class="checkbox1">
                    										<div class="checkboxinactivedefaulton">
                      										<div @if($c_persons == 1) class="checkboxactivedefaulton-child4" @else class="checkboxinactivedefaulton-child" @endif>
                      											</div>
                    										</div>
                  									</div>
                								</div>
              							</div>
            						</div>
            						
          					</div>
          					<div class="div78">الحجز مخصص لـ </div>
        				</div>
        				<div class="drop-list-tool-parent">
          					<div class="drop-list-tool1">
            						
                								<div class="place-holder19" style="    color: #009688;">
                  								{{$c_sak}}											
                								</div>
              						
          					</div>
          					<div class="div82">عدد الصكوك المختارة </div>
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
function validateForm() {  
    const field = document.getElementById("myField").value;  
    if (field === "") {  
        alert("يرجى ملء هذا الحقل.");  
        return false;  
    }  
    return true;  
}  
</script>     
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const personLimits = {};
		const selectedParts = {}; // لتخزين الأجزاء المختارة من كل شخص
	
		// حفظ عدد الأجزاء المسموحة لكل شخص
		document.querySelectorAll('.max-parts').forEach(input => {
			const person = input.dataset.person;
			personLimits[person] = parseInt(input.value);
			selectedParts[person] = [];
		});
	
		// راقب كل checkbox
		document.querySelectorAll('.part-checkbox').forEach(checkbox => {
			checkbox.addEventListener('change', function () {
				const classes = this.classList;
				const personClass = [...classes].find(cls => cls.startsWith('person-'));
				const person = personClass.split('-')[1];
				const maxParts = personLimits[person];
				const checkedParts = document.querySelectorAll('.' + personClass + ':checked');
				const value = this.value;
	
				// لو عدد المختارات تجاوز الحد
				if (checkedParts.length > maxParts) {
					this.checked = false;
					alert('مسموح لك باختيار ' + maxParts + ' أجزاء فقط لهذا الشخص');
					return;
				}
	
				// لو تم اختيار الجزء من قبل شخص آخر
				if (this.checked) {
					const alreadyChosen = Object.keys(selectedParts).some(p => {
						return p !== person && selectedParts[p].includes(value);
					});
	
					if (alreadyChosen) {
						this.checked = false;
						alert('هذا الجزء تم اختياره بالفعل من شخص آخر');
						return;
					}
	
					selectedParts[person].push(value);
				} else {
					// إلغاء الاختيار
					const index = selectedParts[person].indexOf(value);
					if (index > -1) {
						selectedParts[person].splice(index, 1);
					}
				}
			});
		});
	});
	</script>
<script>
	window.onload = function () {
	  const popup = document.getElementById('popupOverlay');
	  const showBtn = document.getElementById('showConfirm');
	  const form = document.getElementById('reservationForm');
  
	  showBtn.onclick = function () {
  if (form.checkValidity()) {
    if (checksak() !== false) {
      popup.style.display = 'flex';
    }
  } else {
    form.reportValidity();
  }
};

  
	  window.closePopup = function () {
		popup.style.display = 'none';
	  };
  
	  window.submitForm = function () {
		form.submit(); // إرسال النموذج بعد التأكيد
		popup.style.display = 'none';
		form.reset();
	  };
	};
  </script>
	  



	  
	
</body>
</html>
                    





