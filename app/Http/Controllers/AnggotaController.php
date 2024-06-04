<?php

namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\ArisanModel;
use App\Models\PembukuanArisanModel;
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
    public function dataArisan()
    {
        $activeMenu = 'data-arisan';
        $arisans = ArisanModel::all();
        return view('anggota.data-arisan', compact('arisans', 'activeMenu'));
    }
    public function pembukuan()
    {
        $activeMenu = 'pembukuan';
        $pembukuans = PembukuanArisanModel::all();
        return view('anggota.pembukuan', compact('pembukuans', 'activeMenu'));
    }
}
