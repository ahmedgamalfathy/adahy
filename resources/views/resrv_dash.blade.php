<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
      .li {
  	margin-bottom: 0px;
}
.ul {
  	margin: 0;
  	font-family: inherit;
  	font-size: inherit;
  	padding-left: 27px;
}
.div {
  	position: absolute;
  	top: 78px;
  	left: 25%;
  	line-height: 200%;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	width: 989px;
}
.div1 {
  	position: relative;
  	font-weight: 500;
}
.btn {
  	width: 132px;
  	border-radius: 20px;
  	background-color: #cecece;
  	border: 2px solid #b0b0b0;
  	box-sizing: border-box;
  	height: 46px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
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
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 2px 4px;
  	gap: 8px;
  	text-align: right;
  	color: #4c4c54;
}
.agree-box {
  	position: absolute;
  	top: 653px;
  	left: calc(50% - 280px);
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 120px;
  	text-align: center;
  	color: #b0b0b0;
}
.parent {
  	width: 100%;
  	position: relative;
  	border-radius: 12px;
  	background-color: #fff;
  	height: 761px;
  	overflow: hidden;
  	text-align: right;
  	font-size: 20px;
  	color: #4c4c54;
  	font-family: Cairo;
}


.div4 {
  	position: relative;
  	font-weight: 500;
}
.wrapper {
  	width: 286px;
  	border-radius: 30px 30px 0px 0px;
  	border-top: 3px solid #00a651;
  	box-sizing: border-box;
  	height: 38px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 6px 10px;
}
.frame-wrapper {
  	width: 358px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 0px 0px 0px 10px;
  	box-sizing: border-box;
}
.div6 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
}
.chevron-down-icon {
  	width: 16px;
  	position: relative;
  	height: 16px;
  	overflow: hidden;
  	flex-shrink: 0;
}
.div9 {
  	align-self: stretch;
  	flex: 1;
  	position: relative;
  	font-weight: 500;
  	display: flex;
  	align-items: center;
  	justify-content: center;
}
.place-holder {
  	flex: 1;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	padding: 10px 0px;
}
.div8 {
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
  	gap: 8px;
  	text-align: center;
  	font-size: 14px;
}
.div5 {
  	align-self: stretch;
  	flex: 1;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 4px;
}
.drop-list-tool {
  	align-self: stretch;
  	height: 70px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-end;
}
.drop-list-tool-parent {
  	width: 366px;
  	border-radius: 20px;
  	border-top: 4px solid #00a651;
  	border-right: 1px solid #00a651;
  	border-bottom: 1px solid #00a651;
  	border-left: 1px solid #00a651;
  	box-sizing: border-box;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	padding: 30px 30px 40px;
  	gap: 12px;
  	text-align: right;
  	font-size: 16px;
  	color: #4c4c54;
}
.second-button {
  	width: 120px;
  	border-radius: 12px;
  	border: 1px solid #00a651;
  	box-sizing: border-box;
  	height: 40px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 4px 8px;
}
.primary-button {
  	width: 120px;
  	border-radius: 12px;
  	background-color: #00a651;
  	height: 40px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 4px 8px;
  	box-sizing: border-box;
  	color: #fff;
}
.second-button-parent {
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 30px 0px 0px;
  	gap: 81px;
  	color: #00a651;
}
.frame-parent {
  	position: absolute;
  	top: calc(30% - 206px);
  	left: calc(50% - 183.5px);
  	width: 368px;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
}
.icon {
  	position: absolute;
  	top: 42px;
  	left: calc(50% - 158.5px);
  	width: 318px;
  	height: 72px;
  	object-fit: cover;
}
.div3 {
  	width: auto;
  
  	box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
  	border-radius: 60px;
  	background-color: #f8f8f8;
  	height: auto;
  	overflow-x: auto;
  	max-width: 90%;
  	max-height: 90%;
  	overflow: auto;
  	text-align: center;
  	font-size: 20px;
  	color: #d2575c;
  	font-family: Cairo;
}


  </style>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" />
  	
  	
  	
</head>
<body>
  <?
  use Jenssegers\Agent\Agent;
  use Illuminate\Http\Request;
  
    $agent = new Agent();
    $request = Request();
  ?>
  	
  	<div id="container" class="popup-overlay" >
    		<center>
    		<div class="div3" style="">
    		    <form method="get" action="adahyt_r">
      			<div class="frame-parent">
        				<div class="frame-wrapper">
          					<div class="wrapper">
            						<div class="div4">اختر المحافظة</div>
          					</div>
        				</div>
        				<div class="drop-list-tool-parent">
          					<div class="drop-list-tool">
            						<div class="div5">
              							{{-- <div class="div6">
                								<div class="div4">نوع الأضحية</div>
              							</div> --}}
										<select name="gov" id="type_" class="form-control text-center " 
										style="
										width: 100%;
										height: 40px;
										border-radius: 5px;
										border-color: #d3cec7;
										direction: rtl;
										font-size: 25px;
										color: #525252;
										">
											<option value="" >اختر </option>
											@if ( Auth::user()->gov ==01)
											<option value="01">القاهرة</option>
											@elseif ( Auth::user()->gov ==12)
											<option value="12">الدقهلية</option>
											@elseif ( Auth::user()->gov ==24)
											<option value="24">المنيا</option>
											@elseif ( Auth::user()->gov ==05)
											<option value="01">القاهرة</option>
											<option value="12">الدقهلية</option>
											<option value="24">المنيا</option>
											@endif											    

										</select>
										
            						</div>
									<div>تأكد من اختيار المحافظة </div>
          					</div>
          					{{-- <div class="drop-list-tool">
            						<div class="div5">
              							<div class="div6">
                								<div class="div4">مقدار الصك</div>
              							</div>
              							
              							<div id="type_show" style="    width: 100%;">
              											<select name="sak"  class="form-control" 
              							style="
      width: 100%;
    height: 40px;
    border-radius: 5px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 25px;
    color: #525252;
    padding: 2%;">
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
            						<div class="div5">
              							<div class="div6">
                								<div class="div4">عدد الصكوك</div>
              							</div>
              							
              							  <select name="c_sak"  class="form-control" 
              							style="
      width: 100%;
    height: 40px;
    border-radius: 5px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 25px;
    color: #525252;
    padding: 2%;">
              							      
              	<option value="0">الكل</option>	
              	<option value="1">1</option>
              	<option value="2">2</option>
              	<option value="3">3</option>
              	<option value="4">4</option>
              	<option value="5">5</option>
              	<option value="6">6</option>
              	<option value="7">7</option>
              							      
            </select>
            						</div>
          					</div>
          					<div class="drop-list-tool">
            						<div class="div5">
              							<div class="div6">
                								<div class="div4">يوم الذبح</div>
              							</div>
              											<select name="day"  class="form-control" 
              							style="
      width: 100%;
    height: 40px;
    border-radius: 5px;
    border-color: #d3cec7;
    direction: rtl;
    font-size: 25px;
    color: #525252;
    padding: 2%;">
              											       <option value="">
            													        الكل
            													    </option>
              											    
              							    <?
              							    $get_type = DB::table('days')->get();
              							    foreach($get_type as $g){
              							    ?>
                  									<option value="{{$g->id}}">
                  									    {{$g->name}}
                  									</option>
                  									<?}?>
                  									</select>
            						</div>
          					</div> --}}
        				</div>
        				<div class="second-button-parent" style="    direction: rtl;">
          					<div class="second-button">
          					    <a href="resrv_dash" style="text-decoration:none;">
            						<div class="div4">رجوع</div>
            						</a>
          					</div>
          					<div class="primary-button">
                            <input type="submit" style="background: transparent;
                            border: 0px;
                            color: #fff;
                            font-size: 25px;    cursor: pointer;" class="div4" value="عرض">
            						
          					</div>
        				</div>
      			</div>
      			
      			</form>
      			<!--<img class="icon" alt="" src="شعار المؤسسة بشفافية 1.png
      			{{$agent->browser()}} - {{$agent->platform()}} - {{$agent->device()}} - {{ $request->ip()}}
      			">-->
    		</div>
    		
    		</center>
    		
    		
  	<!--</div>-->
  	
  	
  	<script>
  	    $(document).ready(function() {
    $("#type_").on('change',function(){
      
      var gov =  $("#type_").val(); 
   $('#type_show').html('<div class="spinner-border text-success align-self-center "></div>');
   $.get("get_sak_data",{gov:gov},function(date1){
    $('#type_show').html(date1);
    });

    }); 
});
  	    
  	</script>
  
    		
    		</body>
</html>