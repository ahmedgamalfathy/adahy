@extends('layouts.financial')
@section('title', 'إضافة للخزنة الرئيسية')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
            <h5 class="card-title mb-0">إضافة مبلغ للخزنة الرئيسية</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.add_to_main.post') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">الخزنة الرئيسية <span class="text-danger">*</span></label>
                            <select name="safe_id" class="form-control" required>
                                <option value="">اختر الخزنة</option>
                                @foreach($mainSafes as $safe)
                                    <option value="{{ $safe->id }}">
                                        {{ $safe->name }} — الرصيد: {{ number_format($safe->balance, 2) }} جنيه
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">المبلغ <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control" min="1" step="0.01" required placeholder="0.00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">الملاحظات <span class="text-danger">*</span></label>
                            <input type="text" name="notes" class="form-control" required placeholder="مصدر المبلغ">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">تأكيد الإضافة</button>
            </form>
        </div>
    </div>
</div>
@endsection
