<?php

namespace App\Services\Financial;

use App\Models\treasury_sak;
use App\Models\treasury;
use App\Models\treasures;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TreasuryService
{
    /**
     * تسجيل دفعة في خزينة الصكوك
     */
    public function recordReservationPayment($reservation, $sakPrice, $paidAmount)
    {
        try {
            $treasuryName = treasures::where('id', 1)->first()->name ?? 'الخزينة الرئيسية';
            
            // تسجيل قيمة الصك (مدين)
            if ($sakPrice > 0) {
                $this->createTreasurySakTransaction([
                    'treasury_id' => $reservation->id,
                    'type_from' => 2, // من الحجز
                    'type' => 1, // مدين
                    'amount' => $sakPrice,
                    'reason_t' => "قيمة الصك - {$reservation->name} - {$reservation->mobile}",
                    'nots' => 'ثمن الصك',
                    'trans_bill' => 1,
                ]);
            }
            
            // تسجيل المبلغ المدفوع (دائن)
            if ($paidAmount > 0) {
                $this->createTreasurySakTransaction([
                    'treasury_id' => $reservation->id,
                    'type_from' => 2,
                    'type' => 2, // دائن
                    'amount' => $paidAmount,
                    'reason_t' => "استلام نقدية - {$treasuryName}",
                    'nots' => 'دفعة',
                    'trans_bill' => 1,
                ]);
            }
            
            // تسجيل في الحساب العام
            $this->createTreasuryAccountTransaction([
                'treasury_id' => $reservation->id,
                'type_from' => 2,
                'type' => 1,
                'amount' => $sakPrice,
                'reason_t' => "حجز الصك - {$reservation->name}",
                'nots' => 'حجز الصك',
                'trans_bill' => 0,
            ]);
            
            return true;
            
        } catch (\Exception $e) {
            Log::error('Treasury payment recording failed', [
                'error' => $e->getMessage(),
                'reservation_id' => $reservation->id
            ]);
            throw $e;
        }
    }

    /**
     * إنشاء معاملة في خزينة الصكوك
     */
    protected function createTreasurySakTransaction(array $data)
    {
        $total = $this->calculateTreasurySakTotal($data['treasury_id'], $data['amount'], $data['type']);
        
        return treasury_sak::create([
            'treasury_id' => $data['treasury_id'],
            'type_from' => $data['type_from'],
            'type' => $data['type'],
            'amount' => $data['amount'],
            'total' => $total,
            'reason' => $data['type'],
            'reason_t' => $data['reason_t'],
            'nots' => $data['nots'],
            'trans_bill' => $data['trans_bill'],
            'agent' => Auth::check() ? Auth::user()->email : 'website'
        ]);
    }

    /**
     * إنشاء معاملة في الحساب العام
     */
    protected function createTreasuryAccountTransaction(array $data)
    {
        $total = $this->calculateTreasuryTotal($data['treasury_id'], $data['amount'], $data['type']);
        
        return treasury::create([
            'treasury_id' => $data['treasury_id'],
            'type_from' => $data['type_from'],
            'type' => $data['type'],
            'amount' => $data['amount'],
            'total' => $total,
            'reason' => $data['type'],
            'reason_t' => $data['reason_t'],
            'nots' => $data['nots'],
            'trans_bill' => $data['trans_bill'],
            'agent' => Auth::check() ? Auth::user()->email : 'website'
        ]);
    }

    /**
     * حساب الإجمالي لخزينة الصكوك
     */
    protected function calculateTreasurySakTotal($treasuryId, $amount, $type)
    {
        $lastTransaction = treasury_sak::where('treasury_id', $treasuryId)
            ->orderBy('id', 'desc')
            ->first();
        
        if (!$lastTransaction) {
            return $type == 1 ? $amount : -$amount;
        }
        
        return $type == 1 
            ? $lastTransaction->total + $amount 
            : $lastTransaction->total - $amount;
    }

    /**
     * حساب الإجمالي للحساب العام
     */
    protected function calculateTreasuryTotal($treasuryId, $amount, $type)
    {
        $lastTransaction = treasury::where('treasury_id', $treasuryId)
            ->orderBy('id', 'desc')
            ->first();
        
        if (!$lastTransaction) {
            return $type == 1 ? $amount : -$amount;
        }
        
        return $type == 1 
            ? $lastTransaction->total + $amount 
            : $lastTransaction->total - $amount;
    }

    /**
     * الحصول على رصيد الخزينة
     */
    public function getTreasuryBalance($treasuryId)
    {
        $lastTransaction = treasury_sak::where('treasury_id', $treasuryId)
            ->orderBy('id', 'desc')
            ->first();
        
        return $lastTransaction ? $lastTransaction->total : 0;
    }

    /**
     * الحصول على معاملات الخزينة
     */
    public function getTreasuryTransactions($treasuryId)
    {
        return treasury_sak::where('treasury_id', $treasuryId)
            ->orderBy('id', 'desc')
            ->get();
    }
}
