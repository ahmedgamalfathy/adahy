@extends('layouts.financial')
@section('title', 'خزائن المناديب')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 style="font-weight:bold; margin:0">خزائن المناديب</h4>
        <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
    </div>

    @if($safes->count())
    <div class="row">
        @foreach($safes as $safe)
        @php $stat = $stats[$safe->id] ?? null; @endphp
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card" style="cursor:pointer;" onclick="window.location='{{ route('financial.safes.transactions') }}?safe_id={{ $safe->id }}'">
                <div class="card-header border-0 pb-0">
                    <h5 class="card-title mb-0">{{ $safe->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-4">
                            <div style="background:#fff8f0; border-radius:8px; padding:12px;">
                                <small class="text-muted d-block mb-1">الرصيد الحالي</small>
                                <strong style="color:#ffb800; font-size:15px;">{{ number_format($safe->balance, 2) }}</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="background:#f0fff4; border-radius:8px; padding:12px;">
                                <small class="text-muted d-block mb-1">↑ إجمالي الوارد</small>
                                <strong style="color:#2bc155; font-size:15px;">{{ number_format($stat->total_in ?? 0, 2) }}</strong>
                            </div>
                        </div>
                        <div class="col-4">
                            <div style="background:#fff5f5; border-radius:8px; padding:12px;">
                                <small class="text-muted d-block mb-1">↓ إجمالي الصادر</small>
                                <strong style="color:#f72b50; font-size:15px;">{{ number_format($stat->total_out ?? 0, 2) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="card"><div class="card-body text-center text-muted">لا توجد خزائن مناديب</div></div>
    @endif
</div>
@endsection
