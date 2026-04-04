@extends('layouts.financial')
@section('title', 'إيداع مندوب إلى الخزنة الرئيسية')

@section('content')
<div class="col-xl-6 col-lg-8 mx-auto" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0">
            <h5 class="card-title">إيداع من المندوب إلى الخزنة الرئيسية</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.deposit.post') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-label">خزنة المندوب (المصدر)</label>
                    <select name="from_safe_id" class="form-control" required>
                        <option value="">اختر المندوب</option>
                        @foreach($repSafes as $safe)
                            <option value="{{ $safe->id }}">
                                {{ $safe->name }} — الرصيد: {{ number_format($safe->balance,2) }} جنيه
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">الخزنة الرئيسية (الوجهة)</label>
                    <select name="to_safe_id" class="form-control" required>
                        <option value="">اختر الخزنة</option>
                        @foreach($mainSafes as $safe)
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
                <button type="submit" class="btn btn-success">تأكيد الإيداع</button>
            </form>
        </div>
    </div>
</div>
@endsection
