{{--
    Payment Modal Component
    Usage: @include('financial.safes.payment_modal', ['reservation' => $reservation, 'safes' => $safes])
--}}
<div class="modal fade" id="paymentModal{{ $reservation->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('financial.safes.payment') }}" method="POST">
                @csrf
                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-money-bill me-2"></i>تأكيد الدفع - {{ $reservation->rec }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    {{-- معلومات الحجز --}}
                    <div class="alert alert-light border mb-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <small class="text-muted d-block">نوع الحجز</small>
                                @php
                                    $agentLabels = ['website'=>'موقع','branch'=>'فرع','vip'=>'VIP'];
                                    $agentColors = ['website'=>'primary','branch'=>'warning','vip'=>'danger'];
                                @endphp
                                <span class="badge bg-{{ $agentColors[$reservation->agent] ?? 'secondary' }}">
                                    {{ $agentLabels[$reservation->agent] ?? $reservation->agent }}
                                </span>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">المدفوع</small>
                                <strong class="text-success">{{ number_format($reservation->pay, 2) }} جنيه</strong>
                            </div>
                            <div class="col-4">
                                <small class="text-muted d-block">المتبقي</small>
                                <strong class="text-danger">{{ number_format($reservation->loan, 2) }} جنيه</strong>
                            </div>
                        </div>
                    </div>

                    {{-- تنبيه VIP --}}
                    @if($reservation->agent === 'vip')
                        <div class="alert alert-info py-2 small">
                            <i class="fas fa-info-circle me-1"></i>
                            حجز VIP - يمكن الدفع الجزئي
                        </div>
                    @else
                        <div class="alert alert-warning py-2 small">
                            <i class="fas fa-exclamation-triangle me-1"></i>
                            يجب دفع المبلغ كاملاً ({{ number_format($reservation->loan, 2) }} جنيه)
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">المبلغ المدفوع</label>
                        <div class="input-group">
                            <input type="number"
                                   name="amount"
                                   class="form-control"
                                   min="1"
                                   max="{{ $reservation->loan }}"
                                   step="0.01"
                                   value="{{ $reservation->agent !== 'vip' ? $reservation->loan : '' }}"
                                   {{ $reservation->agent !== 'vip' ? 'readonly' : '' }}
                                   required>
                            <span class="input-group-text">جنيه</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">الخزنة المستلِمة</label>
                        <select name="safe_id" class="form-select" required>
                            <option value="">اختر الخزنة</option>
                            @foreach($safes as $safe)
                                <option value="{{ $safe->id }}">
                                    {{ $safe->name }} ({{ ['branch'=>'فرع','representative'=>'مندوب','main'=>'رئيسية'][$safe->type] ?? '' }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check me-1"></i>تأكيد الدفع
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
