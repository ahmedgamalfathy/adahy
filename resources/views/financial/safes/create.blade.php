@extends('layouts.financial')
@section('title', 'إنشاء خزنة جديدة')

@section('content')
<div class="col-12" style="direction:rtl">
    <div class="card">
        <div class="card-header border-0 pb-0" style="display:flex; justify-content:space-between; align-items:center">
            <h5 class="card-title mb-0">إنشاء خزنة جديدة</h5>
            <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light btn-sm">العودة</a>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">اسم الخزنة <span class="text-danger">*</span></label>
                            <input type="text" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required
                                   placeholder="مثال: خزنة فرع المنصورة">
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">النوع <span class="text-danger">*</span></label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror" required>
                                <option value="">اختر النوع</option>
                                <option value="main"           {{ old('type')=='main'?'selected':'' }}>رئيسية</option>
                                <option value="branch"         {{ old('type')=='branch'?'selected':'' }}>فرع</option>
                                <option value="representative" {{ old('type')=='representative'?'selected':'' }}>مندوب</option>
                            </select>
                            @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label">الرصيد الابتدائي</label>
                            <input type="number" name="balance" class="form-control"
                                   value="{{ old('balance', 0) }}" min="0" step="0.01">
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2 mt-2">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
