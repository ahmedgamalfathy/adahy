<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SafeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('per1');
    }

    /**
     * عرض الخزنة الرئيسية
     */
    public function index()
    {
        $safes = DB::table('safe_transactions')
            ->orderBy('id', 'desc')
            ->paginate(15);
        
        $totalIncome = DB::table('safe_transactions')
            ->where('type', 'استلام نقدية')
            ->sum('amount');
        
        $totalExpense = DB::table('safe_transactions')
            ->where('type', 'صرف نقدية')
            ->sum('amount');
        
        $balance = $totalIncome - $totalExpense;
        
        return view('financial.safe.index', compact('safes', 'balance', 'totalIncome', 'totalExpense'));
    }

    /**
     * إضافة دفعة جديدة للخزنة
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validate([
                'source' => 'required|string|max:255',
                'amount' => 'required|numeric|min:1',
                'total' => 'required|numeric|min:1|gte:amount',
            ]);
            
            // إضافة المعاملة للخزنة الرئيسية
            DB::table('safe_transactions')->insert([
                'agent' => Auth::user()->email,
                'amount' => $validated['amount'],
                'type' => "استلام نقدية",
                'source' => $validated['source'],
                'created_at' => Carbon::now(),
            ]);
            
            // تحديث المعاملات المالية
            $checkMount = $validated['total'] - $validated['amount'];
            $checkZero = $checkMount < 0 ? 0 : $checkMount;
            
            if ($checkZero > 0) {
                DB::table('financial_transactions')
                    ->where('agent_name', $validated['source'])
                    ->where('returned_to_main_safe', 0)
                    ->update(['returned_to_main_safe' => 1]);
                
                DB::table('financial_transactions')->insert([
                    'agent_name' => $validated['source'],
                    'amount' => $checkZero,
                    'type' => "استلام نقدية",
                    'created_at' => Carbon::now(),
                    'returned_to_main_safe' => 0,
                ]);
            } else {
                DB::table('financial_transactions')
                    ->where('agent_name', $validated['source'])
                    ->where('returned_to_main_safe', 0)
                    ->update(['returned_to_main_safe' => 1]);
            }
            
            DB::commit();
            
            return redirect()
                ->route('safe.index')
                ->with('success', 'تم إضافة الدفعة بنجاح');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('fail', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * صرف من الخزنة
     */
    public function withdraw(Request $request)
    {
        DB::beginTransaction();
        
        try {
            $validated = $request->validate([
                'agent_name' => 'required|string|max:255',
                'amount' => 'required|numeric|min:1',
            ]);
            
            // التحقق من الرصيد
            $totalSafe = DB::table('safe_transactions')
                ->where('type', 'استلام نقدية')
                ->sum('amount') - DB::table('safe_transactions')
                ->where('type', 'صرف نقدية')
                ->sum('amount');
            
            if ($totalSafe < $validated['amount']) {
                return redirect()
                    ->back()
                    ->with('fail', 'لا يوجد رصيد كافٍ في الخزنة الرئيسية');
            }
            
            // صرف من الخزنة
            DB::table('safe_transactions')->insert([
                'agent' => "الخزنة الرئيسية",
                'amount' => $validated['amount'],
                'type' => "صرف نقدية",
                'source' => $validated['agent_name'],
                'created_at' => Carbon::now(),
            ]);
            
            // إضافة للمعاملات المالية
            DB::table('financial_transactions')->insert([
                'agent_name' => $validated['agent_name'],
                'amount' => $validated['amount'],
                'type' => "استلام نقدية",
                'created_at' => Carbon::now(),
            ]);
            
            DB::commit();
            
            return redirect()
                ->route('safe.index')
                ->with('success', 'تم صرف المبلغ بنجاح');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->back()
                ->with('fail', 'حدث خطأ: ' . $e->getMessage());
        }
    }
}
