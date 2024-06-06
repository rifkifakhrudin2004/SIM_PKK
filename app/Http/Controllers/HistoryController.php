<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $activeMenu = 'history';
        $year = $request->get('year');
        $month = $request->get('month');

        $histories = History::with('bendahara');

        $histories = History::query();

        if ($year) {
            $histories->whereYear('tanggal', $year);
        }

        if ($month) {
            $histories->whereMonth('tanggal', $month);
        }

        $histories = $histories->get();

        return view('history.index', compact('histories', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'history';
        return view('history.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pembukuan' => 'required|integer',
            'nama_pemenang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'nominal' => 'required|numeric',
            'nama_bendahara' => 'nullable|string|max:255',
            'total_uang' => 'required|numeric',
        ]);

        History::create($request->all());

        return redirect()->route('history.index')->with('success', 'History record successfully added.');
    }

    public function history(Request $request)

    {    
        $activeMenu = 'history';
        $year = $request->get('year');
        $month = $request->get('month');

        $histories = History::query();

        if ($year) {
            $histories->whereYear('tanggal', $year);
        }

        if ($month) {
            $histories->whereMonth('tanggal', $month);
        }

        $histories = $histories->get();

        return view('anggota.history', compact('histories','activeMenu'));
    }
}
