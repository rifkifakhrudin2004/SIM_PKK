<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAnggotaModel;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class BendaharaPKKController extends Controller
{
    public function dashboard()
    {
        return view('bendaharaPKK.dashboard', ['activeMenu' => 'dashboard']);
    }
    public function indexBendahara()
    {
        $breadcrumb = (object) [
            'title' => 'Verifikasi Data Anggota',
            'list' => ['Home', 'Verifikasi Data Anggota']
        ];

        $page = (object) [
            'title' => 'Verifikasi Data Anggota'
        ];

        $activeMenu = 'verifikasi_anggota';

        $anggota = DataAnggotaModel::where('verifikasi', 'pending')->get();

        return view('bendaharaPKK.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'anggota' => $anggota]);
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'verifikasi' => 'required|in:diterima,ditolak',
        ]);

        $anggota = DataAnggotaModel::find($id);
        if ($anggota) {
            $anggota->verifikasi = $request->verifikasi;
            $anggota->save();
        }

        return redirect('/bendaharaPKK/index')->with('success', 'Status verifikasi berhasil diperbarui');
    }
}