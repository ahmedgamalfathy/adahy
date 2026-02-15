 <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                @php
 use Illuminate\Http;                         
$arr = explode("/", Request::path(), 2);
$first = $arr[0];
echo @DB::table('pages')->where('name',$first)->first()->name_ar;
                                
                                @endphp 
                            </div>
                        </div>
                        
     <script type="text/javascript">
        function updateAction(event) {
            event.preventDefault(); // Prevent the default form submission
            
            var search_code = document.getElementById("search_code").value;
            var formAction = "/ad_info/" + encodeURIComponent(search_code);
            
            // Redirect to the dynamically constructed URL
            window.location.href = formAction;
        }

        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("dynamicForm");
            form.addEventListener("submit", updateAction);
        });
    </script>
                      
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
						
							</li>
							<li class="nav-item dropdown notification_dropdown">
                              	       <form id="dynamicForm" method="GET">
								<div class="input-group search-area">
									<input type="text" class="form-control" id="search_code" placeholder="Search here..." >
									<span class="input-group-text"><a href="" onclick="updateAction(event)"><i class="flaticon-381-search-2" onclick="updateAction(event)"></i></a></span>
								</div>
								</form>
						
							</li>
      
							<li class="nav-item dropdown ">
                                <a class="nav-link  " href="/dark">
                     <img src="/{{$theme1}}/images/profile/256.png" style="width: 46px;" />
									
                                </a>
							</li>
                            <li class="nav-item">
								<a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block d-none">Generate Report<i class="las la-signal ms-3 scale5"></i></a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>