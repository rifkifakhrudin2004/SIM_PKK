<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataAnggotaModel;
use App\Models\BendaharaModel;
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

        $anggota = DataAnggotaModel::all();

        return view('bendaharaPKK.indexBendahara',compact('breadcrumb', 'page', 'activeMenu', 'anggota'));
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

        return redirect('/bendaharaPKK/index2')->with('success', 'Status verifikasi berhasil diperbarui');
    }

    // CRUD for BendaharaModel

    // Display a listing of the resource.
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Bendahara PKK',
            'list' => ['Home', 'Bendahara PKK']
        ];

        $page = (object) [
            'title' => 'Daftar Bendahara PKK'
        ];

        $activeMenu ='bendahara';
        $user = Auth::user();
        $bendaharas = BendaharaModel::where('nama_bendahara_pkk', $user->nama)->get();
        return view('bendaharaPKK.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bendaharas' => $bendaharas, 'activeMenu' => $activeMenu]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Bendahara PKK',
            'list' => ['Home', 'Bendahara PKK', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Bendahara PKK'
        ];
        $bendaharas = UserModel::where('level_id',2)->get();
        $activeMenu ='bendahara';

        return view('bendaharaPKK.create', ['breadcrumb' => $breadcrumb, 'page' => $page,'bendahara' => $bendaharas,'activeMenu' => $activeMenu]);
    }
    public function list(Request $request)
    {
        $user = Auth::user();

        $bendaharas = BendaharaModel::select('id_bendahara', 'nama_bendahara_pkk', 'alamat_bendahara_pkk', 'notelp_bendahara_pkk')
                                    ->where('nama_bendahara_pkk',$user->nama);

        return DataTables::of($bendaharas)
            ->addIndexColumn()
            ->addColumn('aksi', function ($bendaharas) {
                $btn = '<a href="'.url('/dataBendahara/' . $bendaharas->id_bendahara).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/dataBendahara/' . $bendaharas->id_bendahara . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/databendahara/'.$bendaharas->id_bendahara).'">'.
                            csrf_field() . method_field('DELETE') .
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'nama_bendahara_pkk' => 'required|string|max:255',
            'alamat_bendahara_pkk' => 'required|string|max:255',
            'notelp_bendahara_pkk' => 'required|string|max:15',
        ]);
        $bendahara  = new BendaharaModel([
            'nama_bendahara_pkk'=> Auth::user()->nama,
            'notelp_bendahara_pkk' => $request->notelp_bendahara_pkk,
            'alamat_bendahara_pkk' => $request->alamat_bendahara_pkk,
        ]);
        $bendahara->save();
        return redirect('/dataBendahara')->with('success', 'Bendahara PKK berhasil ditambahkan');
    }

    // Display the specified resource.
    public function show($id)
    {   
        $bendahara = BendaharaModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Bendahara PKK',
            'list' => ['Home', 'Bendahara PKK', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Bendahara PKK'
        ];
        $activeMenu = 'bendahara';

        return view('bendaharaPKK.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bendahara' => $bendahara, 'activeMenu' => $activeMenu]);
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {   
        $bendahara = BendaharaModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Edit Bendahara PKK',
            'list' => ['Home', 'Bendahara PKK', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Bendahara PKK'
        ];
        $activeMenu ='bendahara';
        return view('bendaharaPKK.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'bendahara' => $bendahara, 'activeMenu' => $activeMenu]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat_bendahara_pkk' => 'required|string|max:255',
            'notelp_bendahara_pkk' => 'required|string|max:15',
        ]);

        BendaharaModel::find($id)->update([
            'alamat_bendahara_pkk' => $request->alamat_bendahara_pkk,
            'notelp_bendahara_pkk' => $request->notelp_bendahara_pkk,
        ]);

        return redirect('/dataBendahara')->with('success', 'Bendahara PKK berhasil diperbarui');
    }

    // Remove the specified resource from storage.
    public function destroy($id) 
    {
        $check = BendaharaModel::find($id);
        
        if (!$check) {
            return redirect('/dataBendahara')->with('error', 'Data anggota tidak ditemukan');
        }

        try {
            BendaharaModel::destroy($id);

            return redirect('/dataBendahara')->with('success', 'Data anggota berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dataBendahara')->with('error', 'Data anggota gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini' . $e->getMessage());
        }
    }
}
