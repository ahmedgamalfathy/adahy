@extends('layouts.financial')
@section('title', 'سجل الحركات المالية')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
            <h5 class="card-title mb-0">سجل الحركات المالية</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">

            {{-- فلتر --}}
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-3">
                    <select name="safe_id" class="form-control form-control-sm">
                        <option value="">كل الخزائن</option>
                        @foreach($safes as $safe)
                            <option value="{{ $safe->id }}" {{ request('safe_id')==$safe->id?'selected':'' }}>{{ $safe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="type" class="form-control form-control-sm">
                        <option value="">كل الأنواع</option>
                        <option value="payment"    {{ request('type')=='payment'?'selected':'' }}>دفع</option>
                        <option value="transfer"   {{ request('type')=='transfer'?'selected':'' }}>تحويل</option>
                        <option value="deposit"    {{ request('type')=='deposit'?'selected':'' }}>إيداع</option>
                        <option value="withdrawal" {{ request('type')=='withdrawal'?'selected':'' }}>سحب</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="date" name="from_date" class="form-control form-control-sm" value="{{ request('from_date') }}">
                </div>
                <div class="col-md-2">
                    <input type="date" name="to_date" class="form-control form-control-sm" value="{{ request('to_date') }}">
                </div>
                <div class="col-md-2 d-flex gap-1">
                    <button type="submit" class="btn btn-primary btn-sm">بحث</button>
                    <a href="{{ route('financial.safes.transactions') }}" class="btn btn-light btn-sm">مسح</a>
                </div>
            </form>

            {{-- الجدول --}}
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th>#</th><th>النوع</th><th>المبلغ</th><th>من</th><th>إلى</th>
                            <th>الحجز</th><th>بواسطة</th><th>ملاحظات</th><th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movements as $m)
                        <tr>
                            <td>{{ $m->id }}</td>
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
                            <td>{{ $m->reservation->rec ?? '-' }}</td>
                            <td>{{ $m->creator->name ?? '-' }}</td>
                            <td><small>{{ $m->notes }}</small></td>
                            <td><small>{{ $m->created_at->format('d/m/Y H:i') }}</small></td>
                        </tr>
                        @empty
                        <tr><td colspan="9" class="text-center">لا توجد حركات</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $movements->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
