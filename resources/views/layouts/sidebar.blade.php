 <div class="dlabnav">
            <div class="dlabnav-scroll">
                     <script type="text/javascript">
        function updateAction2(event) {
            event.preventDefault(); // Prevent the default form submission
            
            var search_code = document.getElementById("search_code2").value;
            var formAction = "/ad_info/" + encodeURIComponent(search_code);
            
            // Redirect to the dynamically constructed URL
            window.location.href = formAction;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("dynamicForm2");
            form.addEventListener("submit", updateAction2);
        });
    </script>
                
				<ul class="metismenu" id="menu">
				    
				    		<li class="nav-item dropdown notification_dropdown">
                              	       <form id="dynamicForm2" method="GET">
								<div class="input-group search-area">
									<input type="text" class="form-control" id="search_code2" placeholder="Search here..." >
									<span class="input-group-text"><button type="submit"  onclick="updateAction2(event)"><i class="flaticon-381-search-2" onclick="updateAction2(event)"></i></span></span>
								</div>
								</form>
						
							</li>
					<li class="dropdown header-profile">
						<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
							<img src="/{{$theme1}}/images/profile/account.png" width="20" alt=""/>
							<div class="header-info ms-3">
							    @auth
								<span class="font-w600 ">Hi,<b>{{Auth::user()->name}}</b></span>
								<small class="text-end font-w400">{{Auth::user()->email}}</small>
								@endauth
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-end">
							<a href="./app-profile.html" class="dropdown-item ai-icon">
								<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
								<span class="ms-2">Profile </span>
							</a>
							<a href="./email-inbox.html" class="dropdown-item ai-icon">
								<svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
								<span class="ms-2">Inbox </span>
							</a>
							<a href="/logout_" class="dropdown-item ai-icon">
								<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
								<span class="ms-2">Logout </span>
							</a>
						</div>
					</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">التقارير</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="home"> التقرير العام دقهلية</a></li>
						
						</ul>
                        <ul aria-expanded="false">
							<li><a href="widget_mani"> التقرير العام المنيا</a></li>
						
						</ul>
                        <ul aria-expanded="false">
							<li><a href="widget_cairo"> التقرير العام القاهرة</a></li>
						
						</ul>
                      <ul aria-expanded="false">
							<li><a href="widget_matri"> التقرير العام المطرية</a></li>
						</ul>
                        <ul aria-expanded="false">
							<li><a href="repo-supplier-opt"> تقارير الموردين تشفية وتصفية</a></li>
						</ul>
                    </li>
                           @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->whereIN('page',['adahy','sak','days','adahyt'])->count();
                    @endphp
                    @if($check_list > 0)
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">الأضاحى</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="/adahy">نوع الأضحية</a></li>
							<li><a href="/sak">نوع الصك</a></li>
                      <li><a href="/days">أيام الذبح</a></li>
                       <li><a href="/times">فترات الذبح</a></li>
                      <li><a href="/adahyt">الأضاحى</a></li>
                      @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','card_adahy')->count() > 0)
                        <li><a href="/card_adahy">كارت اضحية المنصورة</a></li>
                      @endif    
                        {{-- card_adahy_cairo is commented out
                        <li><a href="/card_adahy_cairo">كارت اضحية القاهرة</a></li>
                         --}}
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','card_adahy_mani')->count() > 0)
                        <li><a href="/card_adahy_mani">كارت اضحية المنيا</a></li>
                        @endif

                        </ul>
                    </li>
                    @endif
                    @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','adahyt_r')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">حجز / بيع</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/resrv_dash">حجز أضحية</a></li>
                      <li><a href="/adahy_dash">بيع أضحية</a></li>
                      <li><a href="/adahyt_r2">حجز ويب سيت الدقهلية </a></li>
                      <li><a href="/adahyt_r2_cairo">حجز ويب سيت القاهرة</a></li>
                      <li><a href="/adahyt_r2_mani">حجز ويب سيت منيا</a></li>
                      <li><a href="/adahyt_r2_matri">حجز ويب سيت المطرية</a></li>
                            
                        </ul>
                    </li>
                    @endif
                       @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','sak_all_gov')->count();
                    @endphp
                    @if($check_list > 0)
                    
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-050-info"></i>
                            <span class="nav-text"> الصكوك </span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/sak_all"> الدقهلية </a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="/sak_all_cairo"> القاهرة </a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="/sak_all_mani"> المنيا </a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="/sak_all_matri"> المطرية </a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="/sak_parts"> الاجزاء </a></li>
                        </ul>
                    </li>
                    
                    @endif
                        @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','treasures')->count();
                    @endphp
                    @if($check_list > 0)
                    
                                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">الخزائن</span>
						</a>
                        <ul aria-expanded="false">
                        @php
                        if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','treasury_all')->count() > 0)
                        {
                        $get_tresury = DB::table('treasures')->get();
                        }else{
                         $get_tresury = DB::table('treasures')->where('id',Auth::user()->t_id)->get();   
                        }
                        @endphp
                        @foreach($get_tresury as $treasury)
                            <li><a href="/treasures/{{ $treasury->id }}">
                                {{ $treasury->name }}
                            </a></li>
                        @endforeach
                        </ul>
                    </li>
                    
                    @endif
                    
                            @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','expense')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    مصروفات
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/expense">
                          مصروفات
                           </a></li>
                      
                            
                        </ul>
                    </li>
                    @endif
                    
                    
                                      @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','income')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    إيرادات
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/income">
                          إيرادات
                           </a></li>
                      
                            
                        </ul>
                    </li>
                    @endif
                    
                    
                                                          @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','butcher')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    الجزاريين
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/butcher">
                          الجزاريين
                           </a></li>
                    @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','butcher-repo')->count() >0)
                        <li><a href="/butcher-repo">
                          بيان خاص بالجزارين
                           </a></li>
                    @endif                            
                        </ul>
                    </li>
                    @endif
                    
                    
                                                               @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','follower')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    المشرفيين
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/follower">
                          المشرفيين
                           </a></li>
                      
                            
                        </ul>
                    </li>
                    @endif
                    
                    
                                                                          @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','butcher2')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    معلم التنظيف
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/butcher2">
                          معلم التنظيف
                           </a></li>
                      
                            
                        </ul>
                    </li>
                    @endif
                    
                    
                         @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','vendor')->count();
                    @endphp
                    @if($check_list > 0)
                    
                         <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">
							    المورديين
							</span>
						</a>
                        <ul aria-expanded="false">
                            
                      <li><a href="/vendor">
                          المورديين
                           </a></li>
                           @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','suppliers')->count() >0)
                                                <li><a href="/suppliers">
                          بيان حركة الموردين
                           </a></li>
                           @endif

                            
                        </ul>
                    </li>
                    @endif
                              @php
        $check_list = DB::table('per')->where('u_id',Auth::user()->id)->whereIN('page',['weight','butcher_s','accessories','cleanup','pkg','rec','rec_all','freez','ship','rec_end'])->count();
                    @endphp
                    @if($check_list > 0)
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">التشغيل</span>
						</a>
                        <ul aria-expanded="false">
                              <li><a href="/exc_p">تقرير الجزاريين</a></li>
                             <li><a href="/weight_edit">تعديل الاوزان</a></li>
                            <li><a href="/weight">مرحلة الوزن-الدقهلية </a></li>
                            @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','weight-cairo')->count() > 0)
                            <li><a href="/weight-cairo">مرحلة الوزن -القاهرة </a></li> 
                            @endif

                            @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','weight-mani')->count() > 0)
                            <li><a href="/weight-mani">مرحلة الوزن-المنيا </a></li>
                            @endif
                            <li class="d-none"><a href="/w_b">مرحلة انتظار الذبح </a></li>                        
                            <li><a href="/butcher_s">مرحلة الجزارة </a></li>
                             <li><a href="/f_b">مرحلة التبريد </a></li>
                            <!--<li><a href="/accessories">مرحلة الملحقات </a></li>-->
                            {{-- <li><a href="/cleanup">مرحلة تنظيف السقط</a></li> --}}
                            <li><a href="/pkg">مرحلة التعبئة </a></li>
                               <li><a href="/rec">جاهز للتسليم </a></li>
                        <li><a href="/rec_all">
                            تسليم الصكوك
                        </a></li>
                        
                                <li><a href="/freez">
                            الثلاجة 
                        </a></li>
                        
                        
                        <li><a href="/ship">
                            التوصيل 
                        </a></li>
                        
                        
                             <li><a href="/rec_end">
                            تم التسليم 
                        </a></li>
                        
                               <li><a href="/rec_end_2">
                          التبرع
                        </a></li>
					
                     
                      
                            
                        </ul>
                    </li>
                    @endif
                    
                 
                 
                                    @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','callcenter')->count();
                    @endphp
                    @if($check_list > 0)
                    
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">كول سنتر</span>
						</a>
                        <ul aria-expanded="false">
                     
                            <li><a href="/callcenter_mans">
                              كول سنتر الدقهلية
                            </a></li>
						     <li><a href="/callcenter_cairo">
                              كول سنتر القاهرة 
                            </a></li>
                             <li><a href="/callcenter_mani">
                              كول سنتر المنيا
                            </a></li>
                           
                        </ul>
                    </li>
              @endif
              
                      @if (DB::table('per')->where('u_id',Auth::user()->id)->whereIN('page',['checks','safe'])->count() > 0)
                <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                         <i class="flaticon-050-info"></i>
							<span class="nav-text">حركة الحسابات </span>
						</a>
                        <ul aria-expanded="false">
                          @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','checks')->count() > 0)
                            <li><a href="/checks">
                              حركة الحسابات اليومية
                            </a></li>
                          @endif
                            @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','safe')->count() > 0)
                                <li><a href="/safe">
                                الخزنة الرئيسية
                                </a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                {{-- إدارة الخزائن الجديد --}}
                @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes')->count() > 0)
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-050-info"></i>
                        <span class="nav-text">إدارة الخزائن</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('financial.safes.dashboard') }}">لوحة الخزائن</a></li>
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/transactions')->count() > 0)
                        <li><a href="{{ route('financial.safes.transactions') }}">سجل الحركات</a></li>
                        @endif
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/handover')->count() > 0)
                        <li><a href="{{ route('financial.safes.handover') }}">تسليم فرع → مندوب</a></li>
                        @endif
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/deposit')->count() > 0)
                        <li><a href="{{ route('financial.safes.deposit') }}">إيداع مندوب → رئيسية</a></li>
                        @endif
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/withdraw')->count() > 0)
                        <li><a href="{{ route('financial.safes.withdraw') }}">سحب رئيسية → فرع</a></li>
                        @endif
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/add-to-main')->count() > 0)
                        <li><a href="{{ route('financial.safes.add_to_main') }}">إضافة للخزنة الرئيسية</a></li>
                        @endif
                        @if(DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/create')->count() > 0)
                        <li><a href="{{ route('financial.safes.create') }}">إنشاء خزنة جديدة</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- الفروع --}}
                @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/branches')->count() > 0)
                @php
                    $sidebarBranches = \App\Models\Safe::where('type','branch')->get();
                    $sidebarBranchIds = $sidebarBranches->pluck('id')->toArray();
                    $sbIn = \App\Models\SafeMovement::selectRaw("destination_safe_id as sid, SUM(amount) as total_in")
                        ->whereIn('destination_safe_id', $sidebarBranchIds)->groupBy('destination_safe_id')->get()->keyBy('sid');
                    $sbOut = \App\Models\SafeMovement::selectRaw("source_safe_id as sid, SUM(amount) as total_out")
                        ->whereIn('source_safe_id', $sidebarBranchIds)->groupBy('source_safe_id')->get()->keyBy('sid');
                @endphp
                @if($sidebarBranches->count())
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-050-info"></i>
                        <span class="nav-text">الفروع</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('financial.safes.branches') }}">كل الفروع</a></li>
                        @foreach($sidebarBranches as $branch)
                        <li>
                            <a href="{{ route('financial.safes.transactions') }}?safe_id={{ $branch->id }}">
                                {{ $branch->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endif

                {{-- المناديب --}}
                @if (DB::table('per')->where('u_id',Auth::user()->id)->where('page','financial/safes/representatives')->count() > 0)
                @php
                    $sidebarReps = \App\Models\Safe::where('type','representative')->get();
                    $sidebarRepIds = $sidebarReps->pluck('id')->toArray();
                    $srIn = \App\Models\SafeMovement::selectRaw("destination_safe_id as sid, SUM(amount) as total_in")
                        ->whereIn('destination_safe_id', $sidebarRepIds)->groupBy('destination_safe_id')->get()->keyBy('sid');
                    $srOut = \App\Models\SafeMovement::selectRaw("source_safe_id as sid, SUM(amount) as total_out")
                        ->whereIn('source_safe_id', $sidebarRepIds)->groupBy('source_safe_id')->get()->keyBy('sid');
                @endphp
                @if($sidebarReps->count())
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-050-info"></i>
                        <span class="nav-text">المناديب</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('financial.safes.representatives') }}">كل المناديب</a></li>
                        @foreach($sidebarReps as $rep)
                        <li>
                            <a href="{{ route('financial.safes.transactions') }}?safe_id={{ $rep->id }}">
                                {{ $rep->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endif
                                      @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','reception')->count();
                    @endphp
                    @if($check_list > 0)
                    
                                      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text"> 
							الأستقبال
							</span>
						</a>
                        <ul aria-expanded="false">
                     
                            <li><a href="/reception">
                              الأستقبال 
                            </a></li>
						
                      
                           
                        </ul>
                    </li>
              @endif
                 
                    
                          @php
                    $check_list = DB::table('per')->where('u_id',Auth::user()->id)->where('page','per')->count();
                    @endphp
                    @if($check_list > 0)
                    
                                      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">صلاحيات</span>
						</a>
                        <ul aria-expanded="false">
                     
                            <li><a href="/per">
                              صلاحيات
                            </a></li>
						
                      
                           
                        </ul>
                    </li>
              @endif
                </ul>
				<div class="copyright">
					<p><strong>Islah</strong> © 2023 All Rights Reserved</p>
					
				</div>
			</div>
        </div>