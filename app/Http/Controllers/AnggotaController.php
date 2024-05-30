<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function dashboard()
    {
        return view('anggota.dashboard', ['activeMenu' => 'dashboard']);
    }
    public function jadwal()
    {
        $activeMenu = 'jadwal';
        $jadwals = Jadwal::all();
        return view('anggota.jadwal', compact('jadwals', 'activeMenu'));
    }
}
