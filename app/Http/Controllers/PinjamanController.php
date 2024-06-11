<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePinjamanRequest;
use App\Models\PinjamanModel;
use App\Models\DataAnggotaModel;
use App\Models\BendaharaModel;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;

class PinjamanController extends Controller
{
    // Display a listing of the resource.
    public function indexAnggota()
    {
        $breadcrumb = (object) [
            'title' => 'Verifikasi Pengajuan Peminjaman',
            'list' => ['Home', 'Verifikasi Peminjaman']
        ];

        $page = (object) [
            'title' => 'Verifikasi Pengajuan Peminjaman'
        ];

        $activeMenu = 'verifikasi_pengajuan';

        // Mengambil semua pinjaman dengan anggota dan subkriterias
        $pinjaman = PinjamanModel::with(['anggota2.subKriterias', 'bendahara2'])->get();

        return view('pinjaman.indexAnggota', compact('breadcrumb', 'page', 'activeMenu', 'pinjaman'));
    }

    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'status_persetujuan' => 'required|in:diterima,ditolak',
        ]);

        $pinjaman = PinjamanModel::find($id);
        if ($pinjaman) {
            $pinjaman->status_persetujuan = $request->status_persetujuan;
            $pinjaman->save();
        }

        return redirect('/anggota/index')->with('success', 'Status verifikasi berhasil diperbarui');
    }

    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Pinjaman',
            'list' => ['Home', 'Pinjaman']
        ];

        $page = (object) [
            'title' => 'Daftar Pinjaman'
        ];

        $activeMenu = 'pinjaman';
        $user = Auth::user();

        // Fetch all pinjaman with associated anggota and bendahara
        $pinjaman = PinjamanModel::with(['anggota2', 'bendahara2'])->get();

        return view('pinjaman.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'pinjaman' => $pinjaman,
            'activeMenu' => $activeMenu
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Ajukan Pinjaman',
            'list' => ['Home', 'Pinjaman', 'Ajukan']
        ];

        $page = (object) [
            'title' => 'Ajukan Pinjaman'
        ];

        $activeMenu = 'pinjaman';

        $anggota = Alternatif::all();
        $bendahara = BendaharaModel::all();

        return view('pinjaman.create', compact('breadcrumb', 'page', 'activeMenu', 'anggota', 'bendahara'));
    }

    // Store a newly created resource in storage.
    public function store(StorePinjamanRequest $request)
    {
        $data = $request->validated();
        PinjamanModel::create($data);

        return redirect()->route('pinjaman.index')->with('success', 'Pengajuan pinjaman berhasil disimpan.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $pinjam = PinjamanModel::with(['anggota2', 'bendahara2'])->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Pinjaman',
            'list' => ['Home', 'Pinjaman', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Pinjaman'
        ];

        $activeMenu = 'pinjaman';

        return view('pinjaman.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'pinjam' => $pinjam,
            'activeMenu' => $activeMenu,

        ]);
    }
    // Show the form for editing the specified resource.
public function edit($id)
{
    $pinjaman = PinjamanModel::find($id);

    $breadcrumb = (object) [
        'title' => 'Edit Pinjaman',
        'list' => ['Home', 'Pinjaman', 'Edit']
    ];

    $page = (object) [
        'title' => 'Edit Pinjaman'
    ];

    $anggota = Alternatif::all(); // Fetch all anggota
    $bendahara = BendaharaModel::all(); // Fetch all bendahara
    $activeMenu = 'pinjaman';

    return view('pinjaman.edit', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'pinjaman' => $pinjaman,
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
        'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
        'tgl_pengajuan' => 'required|date',
        'jumlah_pinjaman' => 'required|numeric|min:0',
        'status_pinjaman' => 'required|string|max:50',
        'status_kesehatan' => 'required|string|max:255',
        'cicilan' => 'required|numeric|min:0',
        'lama' => 'required|numeric|min:0',
        'bunga' => 'required|numeric|min:0',
        // 'status_persetujuan' => 'required|string|max:50',
    ]);

    PinjamanModel::find($id)->update([
        'id_anggota' => $request->id_anggota,
        'id_bendahara' => $request->id_bendahara,
        'tgl_pengajuan' => $request->tgl_pengajuan,
        'jumlah_pinjaman' => $request->jumlah_pinjaman,
        'status_pinjaman' => $request->status_pinjaman,
        'status_kesehatan' => $request->status_kesehatan,
        'cicilan' => $request->cicilan,
        'lama' => $request->lama,
        'bunga' => $request->bunga,
        // 'status_persetujuan' => $request->status_persetujuan,
    ]);

    return redirect('/pinjaman')->with('success', 'Pinjaman berhasil diperbarui');
}

// Remove the specified resource from storage.
public function destroy($id)
{
    $check = PinjamanModel::find($id);

    if (!$check) {
        return redirect('/pinjaman')->with('error', 'Data pinjaman tidak ditemukan');
    }

    try {
        PinjamanModel::destroy($id);

        return redirect('/pinjaman')->with('success', 'Data pinjaman berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect('/pinjaman')->with('error', 'Data pinjaman gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini: ' . $e->getMessage());
    }
}

}
        