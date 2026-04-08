<?php

namespace App\Services\Financial;

use App\Models\Safe;
use App\Models\SafeMovement;
use App\Models\reservation;
use App\Models\sak;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SafeService
{
    /**
     * تأكيد دفع حجز وإضافة المبلغ للخزنة
     */
    public function confirmPayment(int $reservationId, float $amount, int $safeId): SafeMovement
    {
        return DB::transaction(function () use ($reservationId, $amount, $safeId) {
            $reservation = reservation::findOrFail($reservationId);
            $safe = Safe::lockForUpdate()->findOrFail($safeId);

            // التحقق من منطق الدفع حسب نوع الحجز
            $this->validatePaymentByAgent($reservation, $amount);

            // تحديث الحجز
            $reservation->pay += $amount;
            $reservation->loan = max(0, $reservation->loan - $amount);
            $reservation->save();

            // تحديث رصيد الخزنة
            $safe->balance += $amount;
            $safe->save();

            // تسجيل الحركة
            return SafeMovement::create([
                'amount'             => $amount,
                'type'               => 'payment',
                'destination_safe_id'=> $safeId,
                'reservation_id'     => $reservationId,
                'created_by'         => Auth::id(),
                'notes'              => "دفعة حجز رقم {$reservation->rec}",
            ]);
        });
    }

    /**
     * تحويل من خزنة فرع إلى مندوب
     */
    public function transferBranchToRep(int $fromSafeId, int $toSafeId, float $amount, string $notes = ''): SafeMovement
    {
        return DB::transaction(function () use ($fromSafeId, $toSafeId, $amount, $notes) {
            $from = Safe::lockForUpdate()->findOrFail($fromSafeId);
            $to   = Safe::lockForUpdate()->findOrFail($toSafeId);

            if ($from->type !== 'branch') {
                throw new \Exception('المصدر يجب أن يكون خزنة فرع');
            }
            if ($to->type !== 'representative') {
                throw new \Exception('الوجهة يجب أن تكون خزنة مندوب');
            }
            if ($from->balance < $amount) {
                throw new \Exception('رصيد الخزنة غير كافٍ');
            }

            $from->balance -= $amount;
            $to->balance   += $amount;
            $from->save();
            $to->save();

            return SafeMovement::create([
                'amount'              => $amount,
                'type'                => 'transfer',
                'source_safe_id'      => $fromSafeId,
                'destination_safe_id' => $toSafeId,
                'created_by'          => Auth::id(),
                'notes'               => $notes ?: "تحويل من فرع إلى مندوب",
            ]);
        });
    }

    /**
     * تحويل من مندوب إلى الخزنة الرئيسية
     */
    public function transferRepToMain(int $fromSafeId, int $toSafeId, float $amount, string $notes = ''): SafeMovement
    {
        return DB::transaction(function () use ($fromSafeId, $toSafeId, $amount, $notes) {
            $from = Safe::lockForUpdate()->findOrFail($fromSafeId);
            $to   = Safe::lockForUpdate()->findOrFail($toSafeId);

            if ($from->type !== 'representative') {
                throw new \Exception('المصدر يجب أن يكون خزنة مندوب');
            }
            if ($to->type !== 'main') {
                throw new \Exception('الوجهة يجب أن تكون الخزنة الرئيسية');
            }
            if ($from->balance < $amount) {
                throw new \Exception('رصيد المندوب غير كافٍ');
            }

            $from->balance -= $amount;
            $to->balance   += $amount;
            $from->save();
            $to->save();

            return SafeMovement::create([
                'amount'              => $amount,
                'type'                => 'transfer',
                'source_safe_id'      => $fromSafeId,
                'destination_safe_id' => $toSafeId,
                'created_by'          => Auth::id(),
                'notes'               => $notes ?: "إيداع من مندوب للخزنة الرئيسية",
            ]);
        });
    }

    /**
     * إضافة مبلغ للخزنة الرئيسية (إيداع خارجي)
     */
    public function depositToMain(int $safeId, float $amount, string $notes): SafeMovement
    {
        return DB::transaction(function () use ($safeId, $amount, $notes) {
            $safe = Safe::lockForUpdate()->findOrFail($safeId);

            if ($safe->type !== 'main') {
                throw new \Exception('يجب اختيار خزنة رئيسية');
            }

            $safe->balance += $amount;
            $safe->save();

            return SafeMovement::create([
                'amount'              => $amount,
                'type'                => 'deposit',
                'destination_safe_id' => $safeId,
                'created_by'          => Auth::id(),
                'notes'               => $notes,
            ]);
        });
    }

    public function transferMainToBranch(int $fromSafeId, float $amount, ?string $notes, ?int $toSafeId = null): SafeMovement
    {
        return DB::transaction(function () use ($fromSafeId, $toSafeId, $amount, $notes) {
            $from = Safe::lockForUpdate()->findOrFail($fromSafeId);

            if ($from->type !== 'main') {
                throw new \Exception('المصدر يجب أن يكون الخزنة الرئيسية');
            }
            if ($from->balance < $amount) {
                throw new \Exception('رصيد الخزنة الرئيسية غير كافٍ');
            }

            $from->balance -= $amount;
            $from->save();

            // لو فيه فرع محدد - حوّل له
            if ($toSafeId) {
                $to = Safe::lockForUpdate()->findOrFail($toSafeId);
                if ($to->type !== 'branch') {
                    throw new \Exception('الوجهة يجب أن تكون خزنة فرع');
                }
                $to->balance += $amount;
                $to->save();

                SafeMovement::create([
                    'amount'              => $amount,
                    'type'                => 'transfer',
                    'destination_safe_id' => $toSafeId,
                    'created_by'          => Auth::id(),
                    'notes'               => $notes,
                ]);
            }

            // حركة السحب من الرئيسية دايماً
            return SafeMovement::create([
                'amount'         => $amount,
                'type'           => 'withdrawal',
                'source_safe_id' => $fromSafeId,
                'created_by'     => Auth::id(),
                'notes'          => $notes,
            ]);
        });
    }

    private function validatePaymentByAgent(reservation $reservation, float $amount): void
    {
        $sakPrice = sak::where('name', $reservation->saks)->value('price') ?? 0;
        $totalRequired = $sakPrice * ($reservation->c_sak ?? 1);

        if ($reservation->agent === 'website' || $reservation->agent === 'branch') {
            // يجب الدفع الكامل
            if ($amount < $totalRequired - $reservation->pay) {
                throw new \Exception('حجوزات الموقع والفرع تتطلب الدفع الكامل');
            }
        }
        // VIP يمكنه الدفع الجزئي - لا قيود إضافية
    }
}
