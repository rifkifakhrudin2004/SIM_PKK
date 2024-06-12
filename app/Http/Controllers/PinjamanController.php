<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PinjamanModel;
use App\Models\DataAnggotaModel;
use App\Models\BendaharaModel;
use App\Models\angsuranModel; // Tambahkan ini
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

        $pinjaman = PinjamanModel::all();

        return view('pinjaman.indexAnggota',compact('breadcrumb', 'page', 'activeMenu', 'pinjaman'));
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

        return redirect('/bendaharaPKK/index')->with('success', 'Status verifikasi berhasil diperbarui');
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
        $pinjaman = PinjamanModel::with(['anggota2', 'bendahara2', 'angsuran'])->get();
    
        // Fetch pinjaman specific to the authenticated user
        $pinjamanTampil = PinjamanModel::whereHas('anggota2', function ($query) use ($user) {
            $query->where('nama_anggota', $user->nama);
        })->with(['anggota2', 'bendahara2', 'angsuran'])->get();
    
        return view('pinjaman.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'pinjaman' => $pinjaman,
            'pinjamanTampil' => $pinjamanTampil,
            'activeMenu' => $activeMenu
        ]);
    }
    
    // Show the form for creating a new resource.
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Pinjaman',
            'list' => ['Home', 'Pinjaman', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Pinjaman'
        ];

        $user = Auth::user();
        $id_anggota = $user->id_anggota;
        // dd($user->id_anggota);

        $anggota = DataAnggotaModel::all(); // Fetch all anggota
        $bendahara = BendaharaModel::all(); // Fetch all bendahara
        
        $activeMenu = 'pinjaman';

        return view('pinjaman.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'anggota' => $anggota,
            'bendahara' => $bendahara,
            'activeMenu' => $activeMenu,
            'id_anggota' => $id_anggota
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'id_anggota' => 'required|exists:m_anggota,id_anggota',
        'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
        'tgl_pengajuan' => 'required|date',
        'jumlah_pinjaman' => 'required|numeric|min:0',
        'status_pinjaman' => 'required|string|max:255',
        'status_kesehatan' => 'required|string|max:255',
        'cicilan' => 'required|string|max:255',
        'lama' => 'required|numeric|min:0',
        'bunga' => 'required|numeric|min:0',
    ]);

    // Ambil data anggota
    $anggota = DataAnggotaModel::find($request->id_anggota);

    // Periksa status verifikasi anggota
    if ($anggota->verifikasi != 'diterima') {
        return redirect()->back()->with('error', 'Maaf, Anda tidak dapat membuat pinjaman karena verifikasi anggota belum diterima.');
    }

    // Hitung jumlah angsuran
    $jumlah_pinjaman = $request->jumlah_pinjaman;
    $bunga = $request->bunga;
    $lama = $request->lama;

    $jumlah_angsuran = round(($jumlah_pinjaman + ($jumlah_pinjaman * $bunga / 100)) / $lama);
    

    // Buat data pinjaman
    $pinjaman = new PinjamanModel([
        'id_anggota' => $request->id_anggota,
        'id_bendahara' => $request->id_bendahara,
        'tgl_pengajuan' => $request->tgl_pengajuan,
        'jumlah_pinjaman' => $jumlah_pinjaman,
        'status_pinjaman' => $request->status_pinjaman,
        'status_kesehatan' => $request->status_kesehatan,
        'cicilan' => $request->cicilan,
        'lama' => $lama,
        'bunga' => $bunga,
    ]);

    // Simpan data pinjaman
    $pinjaman->save();

    // Simpan data angsuran
    $angsuran = new AngsuranModel([
        'id_pinjam' => $pinjaman->id_pinjam,
        'jumlah_angsuran' => $jumlah_angsuran,
        'total_bayar' => '0',
        'tanggal' => now()->addMonths($lama),
    ]);
    $angsuran->save();

    return redirect('/pinjaman')->with('success', 'Pinjaman berhasil ditambahkan');
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

        $anggota = DataAnggotaModel::all(); // Fetch all anggota
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

        $pinjaman = PinjamanModel::find($id);
        if (!$pinjaman) {
            return redirect('/pinjaman')->with('error', 'Data pinjaman tidak ditemukan');
        }

        // Hitung jumlah angsuran
        $jumlah_pinjaman = $request->jumlah_pinjaman;
        $bunga = $request->bunga;
        $lama = $request->lama;

        $jumlah_angsuran = ($jumlah_pinjaman + ($jumlah_pinjaman * $bunga / 100)) / $lama;

        $pinjaman->update([
            'id_anggota' => $request->id_anggota,
            'id_bendahara' => $request->id_bendahara,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'jumlah_pinjaman' => $jumlah_pinjaman,
            'status_pinjaman' => $request->status_pinjaman,
            'status_kesehatan' => $request->status_kesehatan,
            'cicilan' => $request->cicilan,
            'lama' => $lama,
            'bunga' => $bunga,
            // 'status_persetujuan' => $request->status_persetujuan,
        ]);

        // Update atau tambahkan data angsuran
        $angsuran = angsuranModel::where('id_pinjam', $id)->first();
        if ($angsuran) {
            $angsuran->update([
                'jumlah_angsuran' => $jumlah_angsuran,
                'tanggal' => now()->addMonths($lama), // Sesuaikan tanggal angsuran
            ]);
        } else {
            $angsuran = new angsuranModel([
                'id_pinjam' => $pinjaman->id_pinjam,
                'jumlah_angsuran' => $jumlah_angsuran,
                'tanggal' => now()->addMonths($lama), // Sesuaikan tanggal angsuran
            ]);
            $angsuran->save();
        }

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
    public function indexAngsuran()
    {
        $breadcrumb = (object) [
            'title' => 'Verifikasi Pembayaran Peminjaman',
            'list' => ['Home', 'Pembayaran Peminjaman']
        ];

        $page = (object) [
            'title' => 'Pembayaran Angsuran'
        ];

        $activeMenu = 'verifikasi_pembayaran';

        $pinjaman = PinjamanModel::all();

        return view('pinjaman.angsuran',compact('breadcrumb', 'page', 'activeMenu', 'pinjaman'));
    }

    public function bayarAngsuran(Request $request, $id)
{
    $pinjaman = PinjamanModel::with(['anggota2', 'bendahara2', 'angsuran'])->find($id);

    if (!$pinjaman) {
        return redirect('/pinjaman')->with('error', 'Data pinjaman tidak ditemukan');
    }

    // Check if the loan approval status is pending
    if ($pinjaman->status_persetujuan === 'pending') {
        return redirect('/bendaharaPKK/index3')->with('error', 'Pembayaran angsuran tidak dapat dilakukan karena status persetujuan masih pending');
    }

    $request->validate([
        'jumlah_setoran' => 'required|numeric|min:0',
    ]);

    // Calculate total amount to be paid
    $totalPinjaman = $pinjaman->jumlah_pinjaman + ($pinjaman->jumlah_pinjaman * $pinjaman->bunga / 100);

    // Calculate monthly installment amount
    $jumlahAngsuranPerBulan = $totalPinjaman / $pinjaman->lama;

    // Calculate total setoran
    $totalSetoranSebelumnya = AngsuranModel::where('id_pinjam', $pinjaman->id_pinjam)->sum('total_bayar');
    
    // Ensure that the payment being made matches the monthly installment
    if ($request->jumlah_setoran != $jumlahAngsuranPerBulan) {
        return redirect('/bendaharaPKK/index3')->with('error', 'Jumlah setoran harus sesuai dengan angsuran per bulan.');
    }
    // Calculate remaining loan amount
    $sisaPinjaman = $totalPinjaman - $totalSetoranSebelumnya - $request->jumlah_setoran;

    $pinjaman->angsuran->sisa_pinjaman = $sisaPinjaman;
    $pinjaman->save();
    // Create new setoran
    $setoran = new AngsuranModel([
        'id_pinjam' => $pinjaman->id_pinjam,
        'tanggal' => now(),
        'jumlah_angsuran' => $request->jumlah_setoran,
        'total_bayar' => $request->jumlah_setoran,
        'sisa_pinjaman' => $sisaPinjaman,
    ]);
    
    $setoran->save();

    // Calculate total setoran after the new setoran
    $totalSetoran = $totalSetoranSebelumnya + $request->jumlah_setoran;

    // Check if the loan is paid off
    if ($totalSetoran >= $totalPinjaman) {
        $pinjaman->status = 'Lunas';
    } else {
        $pinjaman->status = 'Belum Lunas'; // Optional: Add a status for unpaid loans
    }

    $pinjaman->save();

    return redirect('/bendaharaPKK/index3')->with('success', 'Pembayaran angsuran berhasil dilakukan');
}



}
