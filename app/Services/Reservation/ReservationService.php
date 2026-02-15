<?php

namespace App\Services\Reservation;

use App\Models\reservation;
use App\Models\adahyt;
use App\Models\sak;
use App\Models\clients;
use App\Services\Financial\TreasuryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ReservationService
{
    protected $treasuryService;

    public function __construct(TreasuryService $treasuryService)
    {
        $this->treasuryService = $treasuryService;
    }
    /**
     * الحصول على الحجوزات مع الفلاتر
     */
    public function getFilteredReservations(array $filters)
    {
        $query = reservation::query()->where('emp', 'website');

        if (!empty($filters['rec'])) {
            $query->where('rec', $filters['rec']);
        }

        if (!empty($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['mobile'])) {
            $query->where('mobile', $filters['mobile']);
        }

        if (!empty($filters['gov_type'])) {
            $query->where('gov_type', $filters['gov_type']);
        }

        return $query->latest()->paginate(20);
    }

    /**
     * الحصول على تفاصيل حجز
     */
    public function getReservationDetails($id)
    {
        return reservation::find($id);
    }

    /**
     * إنشاء حجز جديد
     */
    public function createReservation(array $data)
    {
        DB::beginTransaction();
        
        try {
            // التحقق من توفر الأضحية
            $adahy = adahyt::findOrFail($data['id']);
            
            if ($adahy->free < $data['c_sak']) {
                throw new \Exception('لقد سبقك أحد في حجز الصك');
            }

            // توليد رقم الحجز
            $resnum = time() . rand(100, 999);
            
            // حساب السعر
            $sakPrice = sak::where('name', $adahy->sak)->first()->price;
            $loan = $sakPrice - ($data['pay'] ?? 0);
            
            $reservations = [];
            $totalReservations = 0;

            // معالجة كل شخص في الحجز
            foreach ($data['city'] as $key => $city) {
                $personData = $this->preparePersonData($data, $key, $adahy, $resnum);
                
                // إدارة بيانات العميل
                $this->createOrUpdateClient($personData);

                // إنشاء الحجوزات حسب العدد
                for ($i = 0; $i < $personData['number']; $i++) {
                    $reservation = $this->createSingleReservation(
                        $personData,
                        $adahy,
                        $sakPrice,
                        $loan,
                        $data
                    );
                    
                    $reservations[] = $reservation;
                    $totalReservations++;
                }

                // حفظ أجزاء الأضحية
                if (!empty($data['parts'][$key])) {
                    $this->saveAdahyParts(
                        $personData['rec'],
                        $data['parts'][$key],
                        $adahy->id
                    );
                }
            }

            // تحديث المخزون
            $this->updateAdahyInventory($adahy, $totalReservations);

            // تسجيل المعاملات المالية
            $lastReservation = end($reservations);
            $this->treasuryService->recordReservationPayment(
                $lastReservation,
                $sakPrice,
                $data['pay'] ?? 0
            );

            DB::commit();
            
            Log::info('Reservation created successfully', [
                'resnum' => $resnum,
                'total' => $totalReservations
            ]);

            return [
                'resnum' => $resnum,
                'reservations' => $reservations,
                'total' => $totalReservations
            ];

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Reservation creation failed', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            throw $e;
        }
    }

    /**
     * تحضير بيانات الشخص
     */
    protected function preparePersonData(array $data, int $key, $adahy, $resnum)
    {
        $cc = rand(100, 999);
        $resnum2 = (int)(time() / $cc) . rand(10, 99);

        return [
            'resnum' => $resnum,
            'rec' => $resnum2,
            'def' => $resnum2,
            'city' => $data['city'][$key] ?? '',
            'zone' => $data['gov'][$key] ?? '',
            'address' => $data['address'][$key] ?? '',
            'name' => $data['name'][$key] ?? '',
            'mobile' => $data['mobile'][$key] ?? '',
            'mobile2' => $data['mobile2'][$key] ?? '',
            'mobile3' => $data['mobile3'][$key] ?? '',
            'whats' => $data['whats'][$key] ?? 0,
            'whats2' => $data['whatsd'][$key] ?? 0,
            'note' => $data['notes'][$key] ?? '',
            'view' => $data['view'][$key] ?? 0,
            'number' => $data['number'][$key] ?? 1,
            'description' => $data['description'][$key] ?? null,
            'gov_type' => $adahy->gov,
        ];
    }

    /**
     * إنشاء أو تحديث بيانات العميل
     */
    protected function createOrUpdateClient(array $personData)
    {
        $client = clients::where('mob', $personData['mobile'])->first();
        
        if ($client) {
            // تحديث بيانات العميل
            $client->update([
                'name' => $personData['name'],
                'mob2' => $personData['mobile2'],
                'mob3' => $personData['mobile3'],
                'zone' => $personData['zone'],
                'address' => $personData['address'],
                'agent' => 'website'
            ]);
        } else {
            // إنشاء عميل جديد
            clients::create([
                'mob' => $personData['mobile'],
                'name' => $personData['name'],
                'mob2' => $personData['mobile2'],
                'mob3' => $personData['mobile3'],
                'zone' => $personData['zone'],
                'address' => $personData['address'],
                'type' => 1,
                'agent' => 'website'
            ]);
        }
    }

    /**
     * إنشاء حجز واحد
     */
    protected function createSingleReservation(array $personData, $adahy, $sakPrice, $loan, $originalData)
    {
        return reservation::create([
            'ad_id' => $adahy->id,
            'resnum' => $personData['resnum'],
            'c_persons' => 1,
            'times' => $originalData['times'] ?? '',
            'whats' => $personData['whats'],
            'whats2' => $personData['whats2'],
            'city' => $personData['city'],
            'code' => $adahy->code,
            'adahy' => $adahy->adahy,
            'saks' => $adahy->sak,
            'days' => $adahy->days,
            'name' => $personData['name'],
            'mobile' => $personData['mobile'],
            'mobile2' => $personData['mobile2'],
            'mobile3' => $personData['mobile3'],
            'description' => $personData['description'],
            'gov_type' => $personData['gov_type'],
            'view' => $personData['view'],
            'c_sak' => $personData['number'],
            'number' => $personData['number'],
            'zone' => $personData['zone'],
            'address' => $personData['address'],
            'sak' => 1,
            'pay' => $originalData['pay'] ?? 0,
            'price' => 0,
            'loan' => $loan,
            'note' => $personData['note'],
            'rec' => $personData['rec'],
            'def' => $personData['def'],
            'emp' => 'website',
            'co_z' => 0,
            'history' => 0,
            'type' => ($originalData['types'] ?? 1) == 200 ? 200 : 1,
            'retype' => 0,
            'calltype' => 0,
            'resptype' => 0,
            'rectype' => 0,
            'treasury_id' => 1,
            'agent' => 'website'
        ]);
    }

    /**
     * حفظ أجزاء الأضحية
     */
    protected function saveAdahyParts($recId, array $parts, $adahyId)
    {
        foreach ($parts as $part) {
            DB::table('adahy_acc')->insert([
                'r_id' => $recId,
                'name' => htmlspecialchars($part),
                'code_adahy' => $adahyId,
            ]);
        }
    }

    /**
     * تحديث مخزون الأضحية
     */
    protected function updateAdahyInventory($adahy, $totalReservations)
    {
        $newFree = $adahy->free - $totalReservations;
        $newReservation = $adahy->reservation + $totalReservations;
        $cases = $newFree < 1 ? 2 : 1;

        $adahy->update([
            'free' => $newFree,
            'reservation' => $newReservation,
            'cases' => $cases
        ]);
    }

    /**
     * تحديث حجز
     */
    public function updateReservation($id, array $data)
    {
        $reservation = reservation::findOrFail($id);
        
        DB::beginTransaction();
        
        try {
            $reservation->update($data);
            
            DB::commit();
            
            return $reservation;
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * حذف حجز
     */
    public function deleteReservation($id)
    {
        $reservation = reservation::findOrFail($id);
        
        DB::beginTransaction();
        
        try {
            // نقل إلى جدول المحذوفات
            DB::table('reservation_del')->insert($reservation->toArray());
            
            // حذف الحجز
            $reservation->delete();
            
            // تحديث المخزون
            $adahy = adahyt::find($reservation->ad_id);
            if ($adahy) {
                $adahy->increment('free');
                $adahy->decrement('reservation');
            }
            
            DB::commit();
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
