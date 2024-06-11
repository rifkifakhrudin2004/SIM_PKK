<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpanModel;
use App\Models\DataAnggotaModel;
use App\Models\BendaharaModel;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;

class SimpanController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Simpanan',
            'list' => ['Home', 'Simpanan']
        ];

        $page = (object) [
            'title' => 'Daftar Simpanan'
        ];

        $activeMenu = 'simpanan';
        $user = Auth::user();

        // Assuming `id_bendahara` corresponds to the logged-in user
        $simpanans = SimpanModel::with(['anggota', 'bendahara'])->get();

        return view('simpanan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'simpanan' => $simpanans,
            'activeMenu' => $activeMenu
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Simpanan',
            'list' => ['Home', 'Simpanan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Simpanan'
        ];

        $anggota = Alternatif::all(); // Fetch all anggota
        $bendahara = BendaharaModel::all(); // Fetch all bendahara
        $activeMenu = 'simpanan';

        return view('simpanan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'anggota' => $anggota,
            'bendahara' => $bendahara,
            'activeMenu' => $activeMenu
        ]);
    }

    // Store a newly created resource in storage.
    // Store a newly created resource in storage.
// Store a newly created resource in storage.
public function store(Request $request)
{
    $request->validate([
        'id_anggota' => 'required|exists:m_anggota,id_anggota',
        'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
        'tgl_simpan' => 'required|date',
        'jumlah_simpan' => 'required|numeric|min:0',
    ]);

    $simpananAnggota = SimpanModel::where('id_anggota', $request->id_anggota)->first();
    if ($simpananAnggota) {
        $simpananAnggota->jumlah_simpan += $request->jumlah_simpan;
        $simpananAnggota->save();
    } else {
        // Jika parameter auto_fill terdapat dalam URL, isian anggota dan bendahara akan diisi berdasarkan data terakhir
        if ($request->query('auto_fill')) {
            // Ambil data anggota dan bendahara terakhir
            $anggotaTerakhir = Alternatif::latest()->first();
            $bendaharaTerakhir = BendaharaModel::latest()->first();

            // Validasi jika anggota terakhir dan bendahara terakhir ditemukan
            if ($anggotaTerakhir && $bendaharaTerakhir) {
                $request->merge([
                    'id_anggota' => $anggotaTerakhir->id_anggota,
                    'id_bendahara' => $bendaharaTerakhir->id_bendahara,
                ]);
            }
        }

        // Tambahkan data simpanan baru
        $simpan = new SimpanModel([
            'id_anggota' => $request->id_anggota,
            'id_bendahara' => $request->id_bendahara,
            'tgl_simpan' => $request->tgl_simpan,
            'jumlah_simpan' => $request->jumlah_simpan,
        ]);
        $simpan->save();
    }

    return redirect('/simpanan')->with('success', 'Simpanan berhasil ditambahkan');
}



    // Display the specified resource.
    public function show($id)
    {
        $simpan = SimpanModel::with(['anggota', 'bendahara'])->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Simpanan',
            'list' => ['Home', 'Simpanan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Simpanan'
        ];

        $activeMenu = 'simpanan';

        return view('simpanan.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'simpan' => $simpan,
            'activeMenu' => $activeMenu
        ]);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $simpan = SimpanModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Simpanan',
            'list' => ['Home', 'Simpanan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Simpanan'
        ];

        $anggota = Alternatif::all(); // Fetch all anggota
        $bendahara = BendaharaModel::all(); // Fetch all bendahara
        $activeMenu = 'simpanan';

        return view('simpanan.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'simpan' => $simpan,
            'anggota' => $anggota,
            'bendahara' => $bendahara,
            'activeMenu' => $activeMenu
        ]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:data_anggota,id_anggota',
            'tgl_simpan' => 'required|date',
            'jumlah_simpan' => 'required|numeric|min:0',
        ]);

        SimpanModel::find($id)->update([
            'id_anggota' => $request->id_anggota,
            'tgl_simpan' => $request->tgl_simpan,
            'jumlah_simpan' => $request->jumlah_simpan,
        ]);

        return redirect('/simpanan')->with('success', 'Simpanan berhasil diperbarui');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $check = SimpanModel::find($id);

        if (!$check) {
            return redirect('/simpanan')->with('error', 'Data simpanan tidak ditemukan');
        }

        try {
            SimpanModel::destroy($id);

            return redirect('/simpanan')->with('success', 'Data simpanan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/simpanan')->with('error', 'Data simpanan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini: ' . $e->getMessage());
        }
    }
}
