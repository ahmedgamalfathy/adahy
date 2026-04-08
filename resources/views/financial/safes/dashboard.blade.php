@extends('layouts.financial')
@section('title', 'إدارة الخزائن')

@section('content')
<div class="col-12" style="direction:rtl">

    {{-- Header --}}
    <div class="row mb-3">
        <div class="col-12">
            <div class="card" style="padding:15px 20px">
                <div style="display:flex; justify-content:space-between; align-items:center">
                    <h4 style="font-weight:bold; margin:0">إدارة الخزائن</h4>
                    <div>
                        <a href="{{ route('financial.safes.transactions') }}" class="btn btn-primary btn-sm">سجل الحركات</a>
                        <a href="{{ route('financial.safes.add_to_main') }}" class="btn btn-success btn-sm">+ إضافة للرئيسية</a>
                        <a href="{{ route('financial.safes.withdraw') }}" class="btn btn-danger btn-sm">سحب رئيسية → فرع</a>
                        <a href="{{ route('financial.safes.handover') }}" class="btn btn-warning btn-sm">تسليم فرع ← مندوب</a>
                        <a href="{{ route('financial.safes.deposit') }}" class="btn btn-success btn-sm">إيداع مندوب ← رئيسية</a>
                        <a href="{{ route('financial.safes.create') }}" class="btn btn-dark btn-sm">+ خزنة جديدة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- الخزنة الرئيسية --}}
    @php $mainSafes = $safes->where('type','main'); @endphp
    @if($mainSafes->count())
    <h6 class="text-muted mb-2">الخزنة الرئيسية</h6>
    <div class="row mb-4">
        @foreach($mainSafes as $safe)
        @php $stat = $stats[$safe->id] ?? null; @endphp
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
                    <h5 class="card-title mb-0">{{ $safe->name }}</h5>
                    <a href="{{ route('financial.safes.edit', $safe->id) }}" class="btn btn-warning btn-xs">تعديل</a>
                </div>
                <div class="card-body pt-2">
                    <div style="text-align:center; margin-bottom:12px">
                        <h3 style="color:#5bcfc5; margin:0">{{ number_format($safe->balance, 2) }} جنيه</h3>
                        <small class="text-muted">الرصيد الحالي</small>
                    </div>
                    <div style="border-top:1px solid #eee; padding-top:10px">
                        <div class="row text-center">
                            <!-- <div class="col-6 mb-2">
                                <small class="text-muted d-block">إجمالي الإيداع</small>
                                <strong style="color:#2bc155">{{ number_format($stat->total_deposit ?? 0, 2) }}</strong>
                            </div> -->
                            <div class="col-6 mb-2">
                                <small class="text-muted d-block">إجمالي السحب</small>
                                <strong style="color:#f72b50">{{ number_format($stat->total_withdrawal ?? 0, 2) }}</strong>
                            </div>
                            <!-- <div class="col-6">
                                <small class="text-muted d-block">إجمالي الدفع</small>
                                <strong style="color:#3695eb">{{ number_format($stat->total_payment ?? 0, 2) }}</strong>
                            </div> -->
                            <!-- <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل صادر</small>
                                <small style="color:#ffb800; font-weight:bold">{{ number_format($stat->total_transfer_out ?? 0, 2) }}</small>
                            </div> -->
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل وارد</small>
                                <small style="color:#5bcfc5; font-weight:bold">{{ number_format($stat->total_transfer_in ?? 0, 2) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- خزائن الفروع --}}
    @php $branchSafes = $safes->where('type','branch'); @endphp
    @if($branchSafes->count())
    <h6 class="text-muted mb-2">خزائن الفروع</h6>
    <div class="row mb-4">
        @foreach($branchSafes as $safe)
        @php $stat = $stats[$safe->id] ?? null; @endphp
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
                    <h6 class="card-title mb-0">{{ $safe->name }}</h6>
                    <a href="{{ route('financial.safes.edit', $safe->id) }}" class="btn btn-warning btn-xs">تعديل</a>
                </div>
                <div class="card-body pt-2">
                    <div style="text-align:center; margin-bottom:10px">
                        <h4 style="color:#2bc155; margin:0">{{ number_format($safe->balance, 2) }} جنيه</h4>
                        <small class="text-muted">فرع</small>
                    </div>
                    <div style="border-top:1px solid #eee; padding-top:8px">
                        <div class="row text-center">
                            <!-- <div class="col-6 mb-1">
                                <small class="text-muted d-block" style="font-size:11px">الإيداع</small>
                                <small style="color:#2bc155; font-weight:bold">{{ number_format($stat->total_deposit ?? 0, 2) }}</small>
                            </div> -->
                            <!-- <div class="col-6 mb-1">
                                <small class="text-muted d-block" style="font-size:11px">السحب</small>
                                <small style="color:#f72b50; font-weight:bold">{{ number_format($stat->total_withdrawal ?? 0, 2) }}</small>
                            </div> -->
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">الدفع</small>
                                <small style="color:#3695eb; font-weight:bold">{{ number_format($stat->total_payment ?? 0, 2) }}</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل صادر</small>
                                <small style="color:#ffb800; font-weight:bold">{{ number_format($stat->total_transfer_out ?? 0, 2) }}</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل وارد</small>
                                <small style="color:#5bcfc5; font-weight:bold">{{ number_format($stat->total_transfer_in ?? 0, 2) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- خزائن المندوبين --}}
    @php $repSafes = $safes->where('type','representative'); @endphp
    @if($repSafes->count())
    <h6 class="text-muted mb-2">خزائن المندوبين</h6>
    <div class="row mb-4">
        @foreach($repSafes as $safe)
        @php $stat = $stats[$safe->id] ?? null; @endphp
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
                    <h6 class="card-title mb-0">{{ $safe->name }}</h6>
                    <a href="{{ route('financial.safes.edit', $safe->id) }}" class="btn btn-warning btn-xs">تعديل</a>
                </div>
                <div class="card-body pt-2">
                    <div style="text-align:center; margin-bottom:10px">
                        <h4 style="color:#3695eb; margin:0">{{ number_format($safe->balance, 2) }} جنيه</h4>
                        <small class="text-muted">مندوب</small>
                    </div>
                    <div style="border-top:1px solid #eee; padding-top:8px">
                        <div class="row text-center">
                            <!-- <div class="col-6 mb-1">
                                <small class="text-muted d-block" style="font-size:11px">الإيداع</small>
                                <small style="color:#2bc155; font-weight:bold">{{ number_format($stat->total_deposit ?? 0, 2) }}</small>
                            </div> -->
                            <!-- <div class="col-6 mb-1">
                                <small class="text-muted d-block" style="font-size:11px">السحب</small>
                                <small style="color:#f72b50; font-weight:bold">{{ number_format($stat->total_withdrawal ?? 0, 2) }}</small>
                            </div> -->
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">الدفع</small>
                                <small style="color:#3695eb; font-weight:bold">{{ number_format($stat->total_payment ?? 0, 2) }}</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل صادر</small>
                                <small style="color:#ffb800; font-weight:bold">{{ number_format($stat->total_transfer_out ?? 0, 2) }}</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block" style="font-size:11px">تحويل وارد</small>
                                <small style="color:#5bcfc5; font-weight:bold">{{ number_format($stat->total_transfer_in ?? 0, 2) }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- آخر الحركات --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <h5 class="card-title">آخر الحركات</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th>النوع</th><th>المبلغ</th><th>من</th><th>إلى</th><th>بواسطة</th><th>التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentMovements as $m)
                                <tr>
                                    <td>
                                        @php
                                        $types  = ['payment'=>'دفع','transfer'=>'تحويل','deposit'=>'إيداع','withdrawal'=>'سحب'];
                                        $colors = ['payment'=>'success','transfer'=>'info','deposit'=>'primary','withdrawal'=>'danger'];
                                        @endphp
                                        <span class="badge badge-{{ $colors[$m->type]??'secondary' }} light">
                                            {{ $types[$m->type]??$m->type }}
                                        </span>
                                    </td>
                                    <td><strong>{{ number_format($m->amount,2) }} جنيه</strong></td>
                                    <td>{{ $m->sourceSafe->name ?? '-' }}</td>
                                    <td>{{ $m->destinationSafe->name ?? '-' }}</td>
                                    <td>{{ $m->creator->name ?? '-' }}</td>
                                    <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="6" class="text-center">لا توجد حركات</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
