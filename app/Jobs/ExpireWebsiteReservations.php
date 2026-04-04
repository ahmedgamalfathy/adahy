<?php

namespace App\Jobs;

use App\Models\reservation;
use App\Models\adahyt;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ExpireWebsiteReservations implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        // حجوزات الموقع غير المدفوعة منذ أكثر من 24 ساعة
        $expired = reservation::where('agent', 'website')
            ->where('pay', 0)
            ->where('created_at', '<', Carbon::now()->subHours(24))
            ->get();

        foreach ($expired as $res) {
            DB::transaction(function () use ($res) {
                // إعادة المخزون
                $adahy = adahyt::find($res->ad_id);
                if ($adahy) {
                    $adahy->increment('free', $res->c_sak ?? 1);
                    $adahy->decrement('reservation', $res->c_sak ?? 1);
                    if ($adahy->free > 0) {
                        $adahy->update(['cases' => 1]);
                    }
                }

                // نقل للمحذوفات ثم حذف
                DB::table('reservation_del')->insert(array_merge(
                    $res->toArray(),
                    ['notes' => 'انتهت صلاحية الحجز تلقائياً']
                ));
                $res->delete();

                Log::info("Expired reservation deleted", ['rec' => $res->rec]);
            });
        }
    }
}
