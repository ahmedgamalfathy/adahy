<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	
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
  	width: 100px;
  	border-radius: 20px;
  	background-color: #cecece;
  	border: 2px solid #b0b0b0;
  	box-sizing: border-box;
  	height: 36px;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 4px;
	font-size: 18px;
	font-weight: bold;
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
    /* top: 653px; */
    /* left: calc(50% - 280px); */
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    /* gap: 120px; */
    text-align: center;
    color: #b0b0b0;
    margin-top: 20px;
	width: 100%;
}
.parent {
	width: auto;
    position: relative;
    border-radius: 12px;
    background-color: #fff;
    height: 100%;
    overflow: hidden;
    text-align: right;
    font-size: 12px;
    color: #4c4c54;
    font-family: Cairo;
    padding: 30px 10%;
	font-weight: bold;
}

@media (max-width: 576px) {
    .parent{
		font-size: 12px;
		padding: 5px;
		font-weight: normal;
		font-weight: bold;
		overflow: visible;
	}

.ul {
	padding-right: 10px;
	padding-left: 10px;
}

.agree-box{
	/* left: calc(50% - 280px); */
	width: 100%;
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;
    /* gap: 120px; */
}

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
  	top: calc(50% - 206px);
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
  	width: 595px;
  	position: relative;
  	box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.25);
  	border-radius: 60px;
  	background-color: #f8f8f8;
  	height: 724px;
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
<body style="height:100vh">
  	
  	<div class="parent"> 	  
    		<div class="row" style="direction: rtl;">
				<h2 style="text-align:center;margin-top:4px;margin-bottom:4px;">ملاحظات هامة يرجى قراءتها بعناية</h2>
      			<ul class="ul col-12">
        				<li class="li">تم تحديد سعر الصك بناء على أسعار الذبائح يوم 1ذو القعدة 1446هـ  
							 وأي زيادة تطرأ على السعر سيتم إبلاغ المُضْحّي بها.</li>
        				<li class="li"> وقت الذبح خلال اليوم المحدد تقديري وليس إلزاميًا. فقد يتغير هذا الوقت لأسباب وعوامل كثيرة خارج إرادة المؤسسة.</li>
        				<li class="li"> تم تحديد سعر الصك بناء على: متوسط وزن 500 كيلو للبقري والجاموس و متوسط وزن 60 كيلو للخراف, ويتغير الحساب النهائي بتغير الوزن.</li>
        				<li class="li">لا يتم تأكيد الحجز إلا بعد دفع المبلغ كاملًا.</li>
        				<li class="li">يتم تصفية الحساب  (تحت العجز والزيادة) عند التسليم.</li>
        				<li class="li">يتم تسليم الصك للمُضْحّي لحماً مُشَفَى (يشمل نصيبه من الكبدة والقلب والكلاوي).</li>
        				<li class="li">لا توجد طلبات خاصة بقطعية اللحم, مثل: ( الفلتو, التربيانكو؛ الموزة ... ). ولا بطريقة التعبئة.</li>
        				<li class="li">في حالة تأخْر المُضْحَّي عن موعد التسليم: فإننا غير مسئولين عن جودة أو فساد الأحشاء ثم اللحم.</li>
        				<li class="li">العجل يُقسَم بالكامل على 7 سبعة صكوك, ما عدا 7 سبعة أشياء: ( 4كوارع, والعكوة، والمخ, والطحال) إذ يتم الاختيار بينهم بأسبقية الحجز.</li>
        				<li class="li">سعر الصك يشمل 750 ج للبقري والجمسي و600 ج للخراف والماعز مقابل مصروفات: ( الفحص الفني والبيطري أثناء الشراء-النقل- الذبح - التعبئة - تنظيف السقط  ).</li>
						<li class="li" style="color: rgb(0 150 136);"><b>لن تتمكن المؤسسة من تسليم (الممبار + الكرشة) خلال أيام العيد، على أن يكون تسليمها لمن يرغب بعد أيام العيد في التاريخ الذي سيتم تحديده من قبل المؤسسة.</b></li>
        				<li>لا يوجد توصيل للمنازل.</li>
      			</ul>
    		</div>
    <form action="resrv1" method="get">
    		<div class="agree-box">
    	<input type="submit" class="btn" id="btnContainer" style="background: #009688;
    color: #fff;
    cursor: pointer;"
    	value="المتابعة">
    		    
      		
      			<div class="select-item">
        				<div class="div1">أوافق على الشروط وأريد المتابعة</div>
        				<div class="checkbox">
          					<div class="checkboxinactivedefaulton">
            						<input type="checkbox" required="required"  class="checkboxinactivedefaulton-child">
            						</div>
          					</div>
        				</div>
      			</div>
      			</form>
    		</div>
  	</div>
  	
  	<!--<div id="container" class="popup-overlay" style="display:none">-->
    		
   <!-- 		<div class="div3">-->
   <!--   			<div class="frame-parent">-->
   <!--     				<div class="frame-wrapper">-->
   <!--       					<div class="wrapper">-->
   <!--         						<div class="div4">اختر أضحيتك</div>-->
   <!--       					</div>-->
   <!--     				</div>-->
   <!--     				<div class="drop-list-tool-parent">-->
   <!--       					<div class="drop-list-tool">-->
   <!--         						<div class="div5">-->
   <!--           							<div class="div6">-->
   <!--             								<div class="div4">نوع الأضحية</div>-->
   <!--           							</div>-->
   <!--           							<div class="div8">-->
   <!--             								<img class="chevron-down-icon" alt="" src="chevron-down.svg">-->
                								
   <!--             								<div class="place-holder">-->
   <!--               									<div class="div9"> </div>-->
   <!--             								</div>-->
   <!--           							</div>-->
   <!--         						</div>-->
   <!--       					</div>-->
   <!--       					<div class="drop-list-tool">-->
   <!--         						<div class="div5">-->
   <!--           							<div class="div6">-->
   <!--             								<div class="div4">مقدار الصك</div>-->
   <!--           							</div>-->
   <!--           							<div class="div8">-->
   <!--             								<img class="chevron-down-icon" alt="" src="chevron-down.svg">-->
                								
   <!--             								<div class="place-holder">-->
   <!--               									<div class="div9"> </div>-->
   <!--             								</div>-->
   <!--           							</div>-->
   <!--         						</div>-->
   <!--       					</div>-->
   <!--       					<div class="drop-list-tool">-->
   <!--         						<div class="div5">-->
   <!--           							<div class="div6">-->
   <!--             								<div class="div4">عدد الصكوك</div>-->
   <!--           							</div>-->
   <!--           							<div class="div8">-->
   <!--             								<img class="chevron-down-icon" alt="" src="chevron-down.svg">-->
                								
   <!--             								<div class="place-holder">-->
   <!--               									<div class="div9"> </div>-->
   <!--             								</div>-->
   <!--           							</div>-->
   <!--         						</div>-->
   <!--       					</div>-->
   <!--       					<div class="drop-list-tool">-->
   <!--         						<div class="div5">-->
   <!--           							<div class="div6">-->
   <!--             								<div class="div4">يوم الذبح</div>-->
   <!--           							</div>-->
   <!--           							<div class="div8">-->
   <!--             								<img class="chevron-down-icon" alt="" src="chevron-down.svg">-->
                								
   <!--             								<div class="place-holder">-->
   <!--               									<div class="div9">-->
   <!--               									</div>-->
   <!--             								</div>-->
   <!--           							</div>-->
   <!--         						</div>-->
   <!--       					</div>-->
   <!--     				</div>-->
   <!--     				<div class="second-button-parent">-->
   <!--       					<div class="second-button">-->
   <!--         						<div class="div4">رجوع</div>-->
   <!--       					</div>-->
   <!--       					<div class="primary-button">-->
   <!--         						<div class="div4">عرض</div>-->
   <!--       					</div>-->
   <!--     				</div>-->
   <!--   			</div>-->
   <!--   			<img class="icon" alt="" src="شعار المؤسسة بشفافية 1.png">-->
      			
   <!-- 		</div>-->
    		
    		
  	<!--</div>-->
  	
  	
  	
  
    		
    		</body>
</html>