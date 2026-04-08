@extends('layouts.financial')
@section('title', 'سحب من الخزنة الرئيسية')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
            <h5 class="card-title mb-0">سحب من الخزنة الرئيسية</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.withdraw.post') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label class="form-label">الخزنة الرئيسية <span class="text-danger">*</span></label>
                    <select name="from_safe_id" class="form-control" required>
                        <option value="">اختر الخزنة</option>
                        @foreach($mainSafes as $safe)
                            <option value="{{ $safe->id }}">
                                {{ $safe->name }} — الرصيد: {{ number_format($safe->balance, 2) }} جنيه
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">المبلغ <span class="text-danger">*</span></label>
                    <input type="number" name="amount" class="form-control" min="1" step="0.01" required placeholder="0.00">
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">الملاحظات <span id="notes-required" class="text-danger">*</span></label>
                    <input type="text" name="notes" id="notes" class="form-control" placeholder="سبب السحب">
                    <small class="text-muted" id="notes-hint">مطلوبة في حالة عدم اختيار فرع</small>
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">تحويل إلى فرع <span class="text-muted">(اختياري)</span></label>
                    <select name="to_safe_id" id="to_safe_id" class="form-control">
                        <option value="">بدون تحويل لفرع</option>
                        @foreach($branchSafes as $safe)
                            <option value="{{ $safe->id }}">{{ $safe->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">تأكيد السحب</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('to_safe_id').addEventListener('change', function() {
    const notesInput = document.getElementById('notes');
    const notesRequired = document.getElementById('notes-required');
    const notesHint = document.getElementById('notes-hint');

    if (this.value === '') {
        // مفيش فرع - الملاحظات إجبارية
        notesInput.required = true;
        notesRequired.style.display = 'inline';
        notesHint.textContent = 'مطلوبة في حالة عدم اختيار فرع';
    } else {
        // فيه فرع - الملاحظات اختيارية
        notesInput.required = false;
        notesRequired.style.display = 'none';
        notesHint.textContent = 'اختيارية';
    }
});
// تشغيل عند التحميل
document.getElementById('to_safe_id').dispatchEvent(new Event('change'));
</script>
@endpush

@endsection
