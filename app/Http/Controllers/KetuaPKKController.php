<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class KetuaPKKController extends Controller
{
    public function dashboard()
    {
        return view('ketuaPKK.dashboard', ['activeMenu' => 'dashboard']);
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

        return view('ketuaPKK.history', compact('histories', 'activeMenu'));
    }

}