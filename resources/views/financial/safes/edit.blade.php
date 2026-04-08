@extends('layouts.financial')
@section('title', 'تعديل خزنة')

@section('content')
<div class="d-flex justify-content-center" style="direction:rtl">
    <div class="col-xl-6 col-lg-8">
        <div class="card">
            <div class="card-header border-0 pb-0">
            <h5 class="card-title">تعديل: {{ $safe->name }}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('financial.safes.update', $safe->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label class="form-label">اسم الخزنة</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $safe->name) }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">النوع</label>
                    <select name="type" class="form-control" required>
                        <option value="main"           {{ $safe->type=='main'?'selected':'' }}>رئيسية</option>
                        <option value="branch"         {{ $safe->type=='branch'?'selected':'' }}>فرع</option>
                        <option value="representative" {{ $safe->type=='representative'?'selected':'' }}>مندوب</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">الرصيد الحالي</label>
                    <input type="text" class="form-control" value="{{ number_format($safe->balance, 2) }} جنيه" readonly disabled>
                    <small class="text-muted">لا يمكن تعديل الرصيد مباشرة</small>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-warning">تحديث</button>
                    <a href="{{ route('financial.safes.dashboard') }}" class="btn btn-light">إلغاء</a>
                </div>
            </form>

            <hr>

            {{-- حذف --}}
            <form action="{{ route('financial.safes.destroy', $safe->id) }}" method="POST"
                  onsubmit="return confirm('هل أنت متأكد من حذف هذه الخزنة؟')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">حذف الخزنة</button>
                @if($safe->balance > 0)
                    <small class="text-danger me-2">⚠ لا يمكن الحذف - يوجد رصيد {{ number_format($safe->balance,2) }} جنيه</small>
                @endif
            </form>
        </div>
    </div>
</div>
</div>
@endsection
