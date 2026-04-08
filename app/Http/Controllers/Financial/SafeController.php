<?php

namespace App\Http\Controllers\Financial;

use App\Http\Controllers\Controller;
use App\Models\Safe;
use App\Models\SafeMovement;
use App\Models\reservation;
use App\Services\Financial\SafeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SafeController extends Controller
{
    public function __construct(protected SafeService $safeService)
    {
        $this->middleware('auth');
        // $this->middleware('per1');
    }

    /** لوحة الخزائن */
public function dashboard()
{
    $safes = Safe::orderByRaw("FIELD(type,'main','branch','representative')")->get();

    // إحصائيات كل خزنة كمصدر
    $statsAsSource = SafeMovement::selectRaw("
        source_safe_id as safe_id,
        SUM(CASE WHEN type='deposit'    THEN amount ELSE 0 END) as total_deposit,
        SUM(CASE WHEN type='withdrawal' THEN amount ELSE 0 END) as total_withdrawal,
        SUM(CASE WHEN type='transfer'   THEN amount ELSE 0 END) as total_transfer_out
    ")
    ->whereNotNull('source_safe_id')
    ->groupBy('source_safe_id')
    ->get()
    ->keyBy('safe_id');

    // إحصائيات كل خزنة كوجهة
    $statsAsDestination = SafeMovement::selectRaw("
        destination_safe_id as safe_id,
        SUM(CASE WHEN type='transfer' THEN amount ELSE 0 END) as total_transfer_in,
        SUM(CASE WHEN type='payment'  THEN amount ELSE 0 END) as total_payment
    ")
    ->whereNotNull('destination_safe_id')
    ->groupBy('destination_safe_id')
    ->get()
    ->keyBy('safe_id');

    // دمج الإحصائيات لكل خزنة
    $stats = $safes->mapWithKeys(function ($safe) use ($statsAsSource, $statsAsDestination) {
        $src  = $statsAsSource[$safe->id]  ?? null;
        $dest = $statsAsDestination[$safe->id] ?? null;

        return [$safe->id => (object)[
            'total_deposit'      => $src->total_deposit      ?? 0,
            'total_withdrawal'   => $src->total_withdrawal   ?? 0,
            'total_transfer_out' => $src->total_transfer_out ?? 0,
            'total_transfer_in'  => $dest->total_transfer_in ?? 0,
            'total_payment'      => $dest->total_payment     ?? 0,
        ]];
    });

    $recentMovements = SafeMovement::with(['sourceSafe', 'destinationSafe', 'creator'])
        ->latest()
        ->limit(10)
        ->get();

    return view('financial.safes.dashboard', compact('safes', 'stats', 'recentMovements'));
}

    /** إنشاء خزنة جديدة - عرض الفورم */
    public function create()
    {
        return view('financial.safes.create');
    }

    /** حفظ خزنة جديدة */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'type'    => 'required|in:branch,representative,main',
            'balance' => 'nullable|numeric|min:0',
        ]);

        Safe::create([
            'name'    => $request->name,
            'type'    => $request->type,
            'balance' => $request->balance ?? 0,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('financial.safes.dashboard')->with('success', 'تم إنشاء الخزنة بنجاح');
    }

    /** تعديل خزنة - عرض الفورم */
    public function edit($id)
    {
        $safe = Safe::findOrFail($id);
        return view('financial.safes.edit', compact('safe'));
    }

    /** تحديث خزنة */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:branch,representative,main',
        ]);

        Safe::findOrFail($id)->update($request->only('name', 'type'));

        return redirect()->route('financial.safes.dashboard')->with('success', 'تم التحديث بنجاح');
    }

    /** حذف خزنة */
    public function destroy($id)
    {
        $safe = Safe::findOrFail($id);

        if ($safe->balance > 0) {
            return redirect()->back()->with('fail', 'لا يمكن حذف خزنة بها رصيد');
        }

        $safe->delete();
        return redirect()->route('financial.safes.dashboard')->with('success', 'تم الحذف بنجاح');
    }

    /** سجل الحركات مع فلتر */
    public function transactions(Request $request)
    {
        $query = SafeMovement::with(['sourceSafe', 'destinationSafe', 'creator', 'reservation']);

        if ($request->safe_id) {
            $query->where('source_safe_id', $request->safe_id)
                  ->orWhere('destination_safe_id', $request->safe_id);
        }
        if ($request->type) {
            $query->where('type', $request->type);
        }
        if ($request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $movements = $query->latest()->paginate(20)->withQueryString();
        $safes = Safe::all();

        return view('financial.safes.transactions', compact('movements', 'safes'));
    }

    /** تأكيد دفع حجز */
    public function confirmPayment(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservation,id',
            'amount'         => 'required|numeric|min:1',
            'safe_id'        => 'required|exists:safes,id',
        ]);

        try {
            $this->safeService->confirmPayment(
                $request->reservation_id,
                $request->amount,
                $request->safe_id
            );

            return redirect()->back()->with('success', 'تم تأكيد الدفع بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    /** صفحة إضافة للخزنة الرئيسية */
    public function addToMainPage()
    {
        $mainSafes = Safe::where('type', 'main')->get();
        return view('financial.safes.add_to_main', compact('mainSafes'));
    }

    /** تنفيذ الإضافة للخزنة الرئيسية */
    public function addToMain(Request $request)
    {
        $request->validate([
            'safe_id' => 'required|exists:safes,id',
            'amount'  => 'required|numeric|min:1',
            'notes'   => 'required|string|max:255',
        ]);

        try {
            $this->safeService->depositToMain(
                $request->safe_id,
                $request->amount,
                $request->notes
            );
            return redirect()->back()->with('success', 'تم الإضافة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    /** صفحة سحب من الرئيسية للفرع */
    public function withdrawPage()
    {
        $mainSafes   = Safe::where('type', 'main')->get();
        $branchSafes = Safe::where('type', 'branch')->get();
        return view('financial.safes.withdraw', compact('mainSafes', 'branchSafes'));
    }

    /** تنفيذ السحب */
    public function withdraw(Request $request)
    {
        $request->validate([
            'from_safe_id' => 'required|exists:safes,id',
            'to_safe_id'   => 'nullable|exists:safes,id',
            'amount'       => 'required|numeric|min:1',
            'notes'        => $request->to_safe_id ? 'nullable|string|max:255' : 'required|string|max:255',
        ]);

        try {
            $this->safeService->transferMainToBranch(
                $request->from_safe_id,
                $request->amount,
                $request->notes,
                $request->to_safe_id ?: null
            );
            return redirect()->back()->with('success', 'تم السحب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    /** صفحة تسليم الفرع للمندوب */
    public function handoverPage()
    {
        $branchSafes = Safe::where('type', 'branch')->get();
        $repSafes    = Safe::where('type', 'representative')->get();

        return view('financial.safes.handover', compact('branchSafes', 'repSafes'));
    }

    /** تنفيذ تسليم الفرع للمندوب */
    public function handover(Request $request)
    {
        $request->validate([
            'from_safe_id' => 'required|exists:safes,id',
            'to_safe_id'   => 'required|exists:safes,id',
            'amount'       => 'required|numeric|min:1',
            'notes'        => 'nullable|string|max:255',
        ]);

        try {
            $this->safeService->transferBranchToRep(
                $request->from_safe_id,
                $request->to_safe_id,
                $request->amount,
                $request->notes ?? ''
            );

            return redirect()->back()->with('success', 'تم التسليم بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    /** صفحة إيداع المندوب للخزنة الرئيسية */
    public function depositPage()
    {
        $repSafes  = Safe::where('type', 'representative')->get();
        $mainSafes = Safe::where('type', 'main')->get();

        return view('financial.safes.deposit', compact('repSafes', 'mainSafes'));
    }

    /** تنفيذ إيداع المندوب */
    public function deposit(Request $request)
    {
        $request->validate([
            'from_safe_id' => 'required|exists:safes,id',
            'to_safe_id'   => 'required|exists:safes,id',
            'amount'       => 'required|numeric|min:1',
            'notes'        => 'nullable|string|max:255',
        ]);

        try {
            $this->safeService->transferRepToMain(
                $request->from_safe_id,
                $request->to_safe_id,
                $request->amount,
                $request->notes ?? ''
            );

            return redirect()->back()->with('success', 'تم الإيداع بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }
}