<?php

namespace App\Http\Controllers;

use App\Models\SetoranModel;
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

        // Assuming id_bendahara corresponds to the logged-in user
        $simpanans = SimpanModel::with(['anggota', 'bendahara','setorans'])->get();

        return view('simpanan.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'simpanan' => $simpanans,
            'activeMenu' => $activeMenu
        ]);
    }
    public function indexSimpan()
    {
        $breadcrumb = (object) [
            'title' => 'Data simpanan anggota PKK',
            'list' => ['Home', 'Simpanan Anggota PKK']
        ];

        $page = (object) [
            'title' => 'Tabungan Anda'
        ];

        $activeMenu = 'verifikasi_simpanan';
        $user = Auth::user();

        // Mengambil semua pinjaman dengan anggota dan subkriterias
        $simpanan = SimpanModel::whereHas('anggota', function ($query) use ($user) {
            $query->where('nama_anggota', $user->nama);
        })->with(['anggota', 'bendahara', 'setorans'])->get();
    

        return view('simpanan.indexSimpan', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            // 'pinjaman' => $pinjaman,
            'simpanan' => $simpanan,
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

        $anggota = DataAnggotaModel::all(); // Fetch all anggota
        $bendahara = BendaharaModel::all(); // Fetch all bendahara
        $simpan    = SimpanModel::all();
        $activeMenu = 'simpanan';

        return view('simpanan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'anggota' => $anggota,
            'bendahara' => $bendahara,
            'simpan' => $simpan,
            'activeMenu' => $activeMenu
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:m_anggota,id_anggota',
            'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
            'tgl_simpan' => 'required|date',
            'jumlah_setoran' => 'required|numeric|min:0',
        ]);
    
        // Find existing simpan record for the member or create a new one
        $simpan = SimpanModel::firstOrNew(
            ['id_anggota' => $request->id_anggota],
            [
                'id_bendahara' => $request->id_bendahara,
                'tgl_simpan' => $request->tgl_simpan,
                'jumlah_simpan' => 0, // Initial value
            ]
        );
    
        // Save the simpan record to get the id_simpan
        if (!$simpan->exists) {
            $simpan->save();
        }
    
        // Simpan setoran
        $setoran = new SetoranModel([
            'id_simpan' => $simpan->id_simpan, // Use the simpan id
            'tgl_setoran' => $request->tgl_simpan,
            'jumlah_setoran' => $request->jumlah_setoran,
        ]);
        $setoran->save();
    
        // Update jumlah_simpan after saving the setoran
        $simpan->jumlah_simpan = SetoranModel::where('id_simpan', $simpan->id_simpan)->sum('jumlah_setoran');
        $simpan->tgl_simpan = SetoranModel::where('id_simpan', $simpan->id_simpan)->max('tgl_setoran');
    $simpan->save();
    
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
        public function showDetails($id)
        {
        $simpan = SimpanModel::with('setorans')->findOrFail($id);

        return view('simpanan.details', compact('simpan'));
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

    $anggota = DataAnggotaModel::all(); // Fetch all anggota
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
        'id_anggota' => 'required|exists:m_anggota,id_anggota',
        'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
        'tgl_simpan' => 'required|date',
        'jumlah_simpan' => 'required|numeric|min:0',
    ]);

    $simpan = SimpanModel::findOrFail($id);
    $simpan->update([
        'id_anggota' => $request->id_anggota,
        'id_bendahara' => $request->id_bendahara,
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