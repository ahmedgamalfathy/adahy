<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    @php $theme1 = "theme1"; @endphp
    <title>Islah : حركات الخزنة</title>
    <link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
    <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
</head>
<body>
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">L</span><span style="--i:2">o</span><span style="--i:3">a</span>
            <span style="--i:4">d</span><span style="--i:5">i</span><span style="--i:6">n</span>
            <span style="--i:7">g</span><span style="--i:8">.</span><span style="--i:9">.</span><span style="--i:10">.</span>
        </div>
    </div>

    <div id="main-wrapper">
        @include('layouts.nav_header')
        @include('layouts.chatbox')
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="content-body">
            <div class="container-fluid">
                <div class="row layout-top-spacing" id="cancel-row">

                    @if(session()->has('sucess'))
                    <div class="alert alert-success" style="font-size:20px;font-weight:bold;">
                        <p style="color:#000">{{ session('sucess') }}</p>
                    </div>
                    @endif
                    @if(session()->has('fail'))
                    <div class="alert alert-danger" style="font-size:20px;font-weight:bold;">
                        <p>{{ session('fail') }}</p>
                    </div>
                    @endif

                    <div class="row page-titles" style="direction:rtl;">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">الأضاحى</a></li>
                            / <li class="breadcrumb-item"><a href="javascript:void(0)">حجز صك</a></li>
                            / <li class="breadcrumb-item"><a href="javascript:void(0)">{{$get_info->name}}</a></li>
                            <a href="/print/{{$id}}" style="color:#fff;" class="btn btn-primary d-sm-inline-block">طباعة التقرير</a>
                        </ol>
                    </div>

                    {{-- كروت المعلومات --}}
                    <div class="col-sm-4" style="direction:rtl;text-align:center;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mt-2">الوزن الفعلى</h4>
                                <div class="d-flex align-items-center mt-3 mb-2" style="direction:rtl;text-align:center;">
                                    <h2 class="fs-38 mb-0 me-3" style="margin-right:35% !important;">
                                        {{(float)$get_info2->kilo_s}} كيلو
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="direction:rtl;text-align:center;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mt-2">سعر الكيلو</h4>
                                <div class="d-flex align-items-center mt-3 mb-2" style="direction:rtl;text-align:center;">
                                    <h2 class="fs-38 mb-0 me-3" style="margin-right:35% !important;">
                                        {{$adahy_type_info->price}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4" style="direction:rtl;text-align:center;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mt-2">سعر الصك</h4>
                                <div class="d-flex align-items-center mt-3 mb-2" style="direction:rtl;text-align:center;">
                                    <h2 class="fs-38 mb-0 me-3" style="margin-right:35% !important;">
                                        {{(float)$sak_info->price}}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- كشف الحساب --}}
                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="card overflow-hidden">
                            <div class="social-graph-wrapper widget-twitter">
                                <span class="s-icon">
                                    كشف حساب الصك - {{$sak_info->name}} - {{$get_info->name}}
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-3 border-end">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        @php
                                            $finalValue = (float)$get_info2->kilo_s * $adahy_type_info->price + (float)$sak_info->price2 - $total_paid;
                                            if (abs($finalValue) < 1) { $finalValue = 0; }
                                        @endphp
                                        <h4 class="m-1"><span class="counter">{{ $finalValue }}</span></h4>
                                        <p class="m-0">الحساب النهائى</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">{{ $total_paid }}</span></h4>
                                        <p class="m-0">مدفوعات العميل</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">{{(float)$sak_info->price2}}</span></h4>
                                        <p class="m-0">مصروفات الذبح</p>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                        <h4 class="m-1"><span class="counter">{{(float)$get_info2->kilo_s * $adahy_type_info->price}}</span></h4>
                                        <p class="m-0">حساب الذبيحة</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- أزرار الأكشن --}}
                    @php
                        $c1 = DB::table('per')->where('page','treasury_sak_p1')->where('u_id',Auth::user()->id)->count();
                        $c2 = DB::table('per')->where('page','treasury_sak_p2')->where('u_id',Auth::user()->id)->count();
                    @endphp

                    <div class="col-xl-6 col-xxl-6 col-sm-6">
                        <div class="widget-stat card">
                            <div class="card-body p-4">
                                <div class="media ai-icon">
                                    <span class="me-3 bgl-success text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="1" x2="12" y2="23"></line>
                                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                        </svg>
                                    </span>
                                    <div class="media-body">
                                        <h4 class="mb-0">
                                            @if($c2 > 0)
                                            <a href="javascript:void(0);" class="btn btn-primary d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modalReceive">
                                                إستلام نقدية <i class="las la-signal ms-3 scale5"></i>
                                            </a>
                                            @endif
                                            @if($c1 > 0)
                                            <a href="javascript:void(0);" class="btn btn-danger d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modalPay">
                                                صرف نقدية <i class="las la-signal ms-3 scale5"></i>
                                            </a>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- جدول الحركات --}}
                    <div class="col-12" style="direction:rtl;">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">بيانات الجدول</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive-md" id="example">
                                        <thead>
                                            <tr>
                                                <th>كود*</th>
                                                <th>اليوم</th>
                                                <th>التاريخ</th>
                                                <th>نوع الحركة</th>
                                                <th>الحركة</th>
                                                <th>مدين</th>
                                                <th>دائن</th>
                                                <th>الرصيد</th>
                                                <th>التفاصيل</th>
                                                <th>الموظف</th>
                                                <th>حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($get as $sm)
                                            <tr>
                                                <td>{{ $sm->id }}</td>
                                                <td>{{ $sm->created_at->format('l') }}</td>
                                                <td>{{ $sm->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>
                                                    @php
                                                    $types  = ['payment'=>'دائن','transfer'=>'تحويل','deposit'=>'إيداع','withdrawal'=>'مدين'];
                                                    $colors = ['payment'=>'success','transfer'=>'info','deposit'=>'primary','withdrawal'=>'danger'];
                                                    @endphp
                                                    <span class="badge badge-{{ $colors[$sm->type]??'secondary' }} light">
                                                        {{ $types[$sm->type]??$sm->type }}
                                                    </span>
                                                </td>
                                                <td>{{ $sm->notes }}</td>
                                                <td>{{ $sm->type == 'withdrawal' ? number_format($sm->amount,2) : 0 }}</td>
                                                <td>{{ $sm->type == 'payment' ? number_format($sm->amount,2) : 0 }}</td>
                                                <td>{{ number_format($sm->amount,2) }}</td>
                                                <td>{{ $sm->notes }}</td>
                                                <td>{{ $sm->creator->name ?? '-' }}</td>
                                                <td>
                                                    <form method="POST" action="/safe_movement_delete"
                                                          onsubmit="return confirm('هل أنت متأكد من حذف هذه الحركة؟')">
                                                        @csrf
                                                        <input type="hidden" name="movement_id" value="{{ $sm->id }}">
                                                        <button type="submit" class="btn btn-danger btn-xs">حذف</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr><td colspan="11" class="text-center">لا توجد حركات</td></tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>كود</th><th>اليوم</th><th>التاريخ</th><th>نوع الحركة</th>
                                                <th>الحركة</th><th>مدين</th><th>دائن</th><th>الرصيد</th>
                                                <th>التفاصيل</th><th>الموظف</th><th>حذف</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal إستلام نقدية --}}
    <div class="modal fade" id="modalReceive">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="/safe_movement_receive">
                    @csrf
                    <input type="hidden" name="reservation_id" value="{{$get_info->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title">إستلام نقدية</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" style="direction:rtl;font-size:18px;padding:25px;font-weight:bold;">
                        <div class="mb-3">
                            <label class="form-label">المبلغ*</label>
                            <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="amount" placeholder="المبلغ" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التفاصيل</label>
                            <input type="text" class="form-control" name="notes" placeholder="التفاصيل">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">أغلاق</button>
                        <button type="submit" class="btn btn-primary">إضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal صرف نقدية --}}
    <div class="modal fade" id="modalPay">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="/safe_movement_pay">
                    @csrf
                    <input type="hidden" name="reservation_id" value="{{$get_info->id}}">
                    <div class="modal-header">
                        <h5 class="modal-title">صرف نقدية</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body" style="direction:rtl;font-size:18px;padding:25px;font-weight:bold;">
                        <div class="mb-3">
                            <label class="form-label">المبلغ*</label>
                            <input type="text" onkeypress="return event.charCode >= 46 && event.charCode <= 58" class="form-control" name="amount" placeholder="المبلغ" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">التفاصيل</label>
                            <input type="text" class="form-control" name="notes" placeholder="التفاصيل">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">أغلاق</button>
                        <button type="submit" class="btn btn-danger">صرف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="/{{$theme1}}/vendor/global/global.min.js"></script>
    <script src="/{{$theme1}}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/{{$theme1}}/js/plugins-init/datatables.init.js"></script>
    <script src="/{{$theme1}}/js/custom.min.js"></script>
    <script src="/{{$theme1}}/js/dlabnav-init.js"></script>
</body>
</html>
