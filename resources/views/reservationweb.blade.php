<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="initial-scale=1, width=device-width">
  	
  	<style>
  	    @media print {
  	        .no-print { display: none !important; }
  	        body { margin: 0; }
  	    }
  	    .p {
  	margin: 0;
  	font-size: 24px;
  	color: #a81818;
}
.p1 {
  	margin: 0;
}
.readMore {
	text-decoration: none !important;
}
.div1 {
	position: relative;
	font-weight: 600;
	text-decoration: none !important;
}
.wrapper {
  	align-self: stretch;
  	border-radius: 30px;
  	border: 1px solid #a19f9f;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 20px 40px;
}
.b {
  	position: relative;
}
.container {
  	width: 621px;
  	border-radius: 30px;
  	border: 1px solid #00a651;
  	box-sizing: border-box;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 20px 10px;
  	font-size: 25px;
}
.frame {
  	flex: 1;
  	border-radius: 35px;
  	border: 1px solid #faa755;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px;
}
.frame-div {
  	flex: 1;
  	border-radius: 35px;
  	border: 1px solid #5bcfc5;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 10px 15px;
}
.frame-container {
  	align-self: stretch;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: flex-end;
  	gap: 10px;
}
.frame-group {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 10px;
  	font-size: 25px;
}
.wrapper3 {
  	align-self: stretch;
  	border-radius: 30px;
  	border: 1px solid #7cba2c;
  	display: flex;
  	flex-direction: row;
  	align-items: center;
  	justify-content: center;
  	padding: 20px 40px;
	text-decoration: none !important;
}
.div8 {
  	position: relative;
  	font-weight: 600;
  	white-space: pre-wrap;
}
.frame-parent2 {
  	align-self: stretch;
  	display: flex;
  	flex-direction: column;
  	align-items: flex-end;
  	justify-content: flex-start;
  	gap: 10px;
  	font-size: 18px;
}
.frame-parent {
  	position: relative;
  	top: 0;
  	left: 0;
  	width: 100%;
  	max-width: 500px;
  	margin: 0 auto;
  	display: flex;
  	flex-direction: column;
  	align-items: center;
  	justify-content: flex-start;
  	gap: 29px;
  	padding: 20px;
  	box-sizing: border-box;
}
.div {
  	width: 100%;
  	position: relative;
  	border-radius: 12px;
  	background-color: #fff;
  	min-height: 100vh;
  	height: auto;
  	overflow: visible;
  	text-align: center;
  	font-size: 20px;
  	color: #4c4c54;
  	font-family: Cairo;
}
@media(max-width: 900px){
 .frame-parent {
  	max-width: 100%;
  	padding: 15px;
 }
}

  	</style>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@600;700&display=swap" />
  	
     @php
  use Jenssegers\Agent\Agent;
  use Illuminate\Http\Request;
  
    $agent = new Agent();
    $request = Request();
    
    $id = (int)htmlspecialchars($request->id);
//   $times = (int)htmlspecialchars($request->times);
//     $c_sak = (int)htmlspecialchars($request->c_sak);
//     $c_persons = (int)htmlspecialchars($request->c_persons);
//     $day = (int)htmlspecialchars($request->day);
//   $day_name = DB::table('days')->where('id',$day)->first()->name;
//   $info = DB::table('adahyt')->where('id',$id)->first();
//     $times_name = DB::table('times')->where('id',$times)->first()->name;
//     if($c_sak > $info->free){$c_sak = $info->free;}
  
//     if($c_persons > $c_sak){$c_persons = $c_sak;}
  @endphp 	
</head>
<body>
  <center id="pdf-content">
  	<div class="div">
    		<div class="frame-parent">
      			<div class="wrapper">
        				<div class="div1">
          					<p class="p">احتفظ برقم الحجز</p>
          					<p class="p1">الحجز مُعلّق لمدة 24 ساعة لحين تأكيد حجزكم بزيارة أقرب فرع</p>
          					<p class="p1">من فروع المؤسسة لديكم برقم الحجز، وسداد كامل المبلغ.</p>
        				</div>
      			</div>
      			<div class="container" style="width:100%; box-sizing:border-box;">
        				<b class="b">ورقم الحجز الخاص بك هو 
        			
        				</b>
      			</div>
      				<div class="frame-group">
      			@php $get = DB::table('reservation')->where('resnum',$id)->get(); @endphp
      			@foreach($get as $g)
      		
        				<div class="frame-container">
          					<div class="frame" style="direction: rtl;">
            						<div class="div1">{{$g->rec}} 
            						
            						</div>
          					</div>
          					<div class="frame-div">
            						<div class="div1">{{$g->name}}</div>
          					</div>
        				</div>
        			
        				
      			@endforeach
      			</div>
      			<div class="wrapper3">
        				<div class="div1">
          					<p class="p1">منتظرين تشريفك لنا في أقرب فرع إليك</p>
          					<p class="p1">وتقبل اللهُ مِنّا ومنكم</p>
        				</div>
      			</div>
      			<div class="frame-parent2">
        				<div class="frame-container">
          					<div class="frame">
          					    	<a href="https://islaheg.com/branches" class="readMore">
            						<div class="div1">اضغط هنا </div>
            						</a>
          					</div>
          					<div class="frame-div">
            						<div class="div8">للتعرف على أماكن فروعنا   &gt;&gt;&gt;</div>
          					</div>
        				</div>
        				{{-- <div class="frame-container">
          					<div class="frame">
          					    	<a href="../reservationsystem/{{$id}}" class="readMore">
            						<div class="div1">اضغط هنا </div>
            							</a>
          					</div>
          					<div class="frame-div ">
            				
            				<div class="div8">لعـرض كافـة بيانات حجزك   &gt;&gt;&gt;</div>
            			
          					</div>
        				</div> --}}
						<div style="display:flex; gap:10px; width:100%;">
							<a href="/resrv" class="backTOHomePage wrapper3" style="background-color:#54c04d; color:white; flex:1; text-align:center;">
								الرجوع للصفحة الرئيسية
							</a>
							<button id="downloadPdf" class="wrapper3 no-print" style="background-color:#009688; color:white; border:none; cursor:pointer; flex:1; font-family:inherit; font-size:inherit;">
								⬇️ تحميل PDF
							</button>
						</div>
      			</div>
    		</div>
    	
  	</div>
  	
  </center>	
  	

  @if(session('sucess'))
  <script>
	  window.location.replace("/reservationweb/{{ $id }}"); // صفحة أخرى
  </script>
  @endif
  {{-- @if(session('sucess'))
  <script>
    setTimeout(function () {
      window.location.replace("/reservationweb/{{ $id }}"); // إعادة التوجيه بعد التأخير
    }, 5000); // 5000 ميللي ثانية = 5 ثوانٍ
  </script>
@endif --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
document.getElementById('downloadPdf').addEventListener('click', function() {
    var btn = this;
    btn.disabled = true;
    btn.textContent = 'جاري التحميل...';

    var element = document.getElementById('pdf-content');
    var opt = {
        margin:       10,
        filename:     'reservation-{{ $id ?? "receipt" }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2, useCORS: true, direction: 'rtl' },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
    };

    html2pdf().set(opt).from(element).save().then(function() {
        btn.disabled = false;
        btn.textContent = '⬇️ تحميل PDF';
    });
});
</script>
</body>
</html>

