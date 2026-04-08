@extends('layouts.financial')
@section('title', 'تسليم فرع إلى مندوب')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h5 class="card-title">تسليم من الفرع إلى المندوب</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.handover.post') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">خزنة الفرع (المصدر)</label>
                    <select name="from_safe_id" class="form-control" required>
                        <option value="">اختر الفرع</option>
                        @foreach($branchSafes as $safe)
                            <option value="{{ $safe->id }}">
                                {{ $safe->name }} — الرصيد: {{ number_format($safe->balance,2) }} جنيه
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">خزنة المندوب (الوجهة)</label>
                    <select name="to_safe_id" class="form-control" required>
                        <option value="">اختر المندوب</option>
                        @foreach($repSafes as $safe)
                            <option value="{{ $safe->id }}">{{ $safe->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">المبلغ</label>
                    <input type="number" name="amount" class="form-control" min="1" step="0.01" required placeholder="0.00">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">ملاحظات</label>
                    <input type="text" name="notes" class="form-control" placeholder="اختياري">
                </div>
                <button type="submit" class="btn btn-warning">تأكيد التسليم</button>
            </form>
        </div>
    </div>
</div>
@endsection
