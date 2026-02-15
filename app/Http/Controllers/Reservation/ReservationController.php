<?php

namespace App\Http\Controllers\Reservation;

use App\Http\Controllers\Controller;
use App\Services\Reservation\ReservationService;
use App\Models\reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->middleware('auth');
        $this->middleware('per1');
        $this->reservationService = $reservationService;
    }

    /**
     * عرض قائمة الحجوزات
     */
    public function index(Request $request)
    {
        $filters = [
            'rec' => $request->get('rec'),
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'gov_type' => $request->get('gov_type', 12),
        ];

        $reservations = $this->reservationService->getFilteredReservations($filters);

        return view('reservation.index', compact('reservations', 'filters'));
    }

    /**
     * عرض تفاصيل حجز معين
     */
    public function show($id)
    {
        $reservation = $this->reservationService->getReservationDetails($id);
        
        if (!$reservation) {
            return redirect()->back()->with('fail', 'الحجز غير موجود');
        }

        return view('reservation.show', compact('reservation'));
    }

    /**
     * إنشاء حجز جديد
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'id' => 'required|exists:adahyt,id',
            'times' => 'required',
            'c_sak' => 'required|integer|min:1',
            'c_persons' => 'required|integer|min:1',
            'day' => 'required',
            'city' => 'required|array',
            'name' => 'required|array',
            'mobile' => 'required|array',
        ]);

        try {
            $result = $this->reservationService->createReservation($request->all());
            
            return redirect()
                ->route('reservationweb', $result['resnum'])
                ->with('success', 'تم الحجز بنجاح');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('fail', $e->getMessage());
        }
    }

    /**
     * تحديث حجز
     */
    public function update(Request $request, $id)
    {
        try {
            $this->reservationService->updateReservation($id, $request->all());
            
            return redirect()
                ->route('reservation.show', $id)
                ->with('success', 'تم التحديث بنجاح');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('fail', $e->getMessage());
        }
    }

    /**
     * حذف حجز
     */
    public function destroy($id)
    {
        try {
            $this->reservationService->deleteReservation($id);
            
            return redirect()
                ->route('reservation.index')
                ->with('success', 'تم الحذف بنجاح');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('fail', $e->getMessage());
        }
    }
}
