@extends('layouts.app')

@section('title', 'الخزنة الرئيسية')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">
                    <i class="fas fa-money-bill"></i>
                    الخزنة الرئيسية
                </h4>
            </div>
            
            <div class="card-body">
                <!-- الرصيد -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card bg-success text-white">
                            <div class="card-body text-center">
                                <h5>الإيرادات</h5>
                                <h3>{{ number_format($totalIncome, 2) }} جنيه</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger text-white">
                            <div class="card-body text-center">
                                <h5>المصروفات</h5>
                                <h3>{{ number_format($totalExpense, 2) }} جنيه</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-info text-white">
                            <div class="card-body text-center">
                                <h5>الرصيد</h5>
                                <h3>{{ number_format($balance, 2) }} جنيه</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- أزرار الإجراءات -->
                <div class="mb-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="fas fa-plus"></i>
                        إضافة دفعة
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                        <i class="fas fa-minus"></i>
                        صرف
                    </button>
                </div>
                
                <!-- جدول المعاملات -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>النوع</th>
                                <th>المبلغ</th>
                                <th>المصدر</th>
                                <th>الموظف</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($safes as $safe)
                                <tr>
                                    <td>{{ $safe->id }}</td>
                                    <td>
                                        @if($safe->type == 'استلام نقدية')
                                            <span class="badge bg-success">{{ $safe->type }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $safe->type }}</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($safe->amount, 2) }} جنيه</td>
                                    <td>{{ $safe->source }}</td>
                                    <td>{{ $safe->agent }}</td>
                                    <td>{{ $safe->created_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">لا توجد معاملات</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="mt-3">
                    {{ $safes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal إضافة دفعة -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('financial.safe.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">إضافة دفعة جديدة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <x-forms.input 
                        name="source" 
                        label="المصدر" 
                        :required="true" 
                        placeholder="اسم الموظف أو المصدر"
                    />
                    
                    <x-forms.input 
                        name="amount" 
                        label="المبلغ" 
                        type="number" 
                        :required="true" 
                        placeholder="0.00"
                        step="0.01"
                    />
                    
                    <x-forms.input 
                        name="total" 
                        label="الإجمالي" 
                        type="number" 
                        :required="true" 
                        placeholder="0.00"
                        step="0.01"
                    />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal صرف -->
<div class="modal fade" id="withdrawModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('financial.safe.withdraw') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">صرف من الخزنة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <x-forms.input 
                        name="agent_name" 
                        label="اسم الموظف" 
                        :required="true" 
                        placeholder="اسم الموظف"
                    />
                    
                    <x-forms.input 
                        name="amount" 
                        label="المبلغ" 
                        type="number" 
                        :required="true" 
                        placeholder="0.00"
                        step="0.01"
                    />
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle"></i>
                        الرصيد المتاح: <strong>{{ number_format($balance, 2) }} جنيه</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">صرف</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
