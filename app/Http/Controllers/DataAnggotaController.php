<?php

namespace App\Http\Controllers;

use App\Models\DataAnggotaModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


class DataAnggotaController extends Controller
{
    public function index() 
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Data Anggota',
            'list' => ['Home', 'Data Anggota']
        ];

        $page = (object) [
            'title' => 'Validasikan Data Diri Anda'
        ];

        $activeMenu = 'anggota';

        $user = Auth::user();

        $anggota = DataAnggotaModel::where('nama_anggota', $user->nama)->get();

        return view('dataAnggota.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'anggota' => $anggota]);
    }

    public function list(Request $request)
    {
        $user = Auth::user();

        $anggota = DataAnggotaModel::select('id_anggota', 'nama_anggota', 'notelp_anggota', 'alamat_anggota','jumlah_tanggungan','status_rumah','verifikasi')
                                    ->where('nama_anggota',$user->nama);

        return DataTables::of($anggota)
            ->addIndexColumn()
            ->addColumn('aksi', function ($anggota) {
                $btn = '<a href="'.url('/dataAnggota/' . $anggota->id_anggota).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/dataAnggota/' . $anggota->id_anggota . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/dataAnggota/'.$anggota->id_anggota).'">'.
                            csrf_field() . method_field('DELETE') .
                            '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create() 
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Anggota',
            'list' => ['Home', 'Data Anggota', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Anggota Baru'
        ];
        $page = (object) [
            'title' => 'Tambah Anggota Baru'
        ];

        $users = UserModel::where('level_id', 1)->get();  // Mengambil data users dengan level_id 1
        $activeMenu = 'anggota';

        return view('dataAnggota.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'users' => $users, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
{
    $request->validate([
        'notelp_anggota' => 'required|string|min:12',
        'alamat_anggota' => 'nullable|string',
        'jumlah_tanggungan' => 'nullable|string',
        'status_rumah' => 'nullable|string',
    ]);

    // Membuat data anggota baru dengan nama pengguna yang sedang login
    $anggota = new DataAnggotaModel([
        'nama_anggota' => Auth::user()->nama, // Mengambil nama pengguna yang sedang login
        'notelp_anggota' => $request->notelp_anggota,
        'alamat_anggota' => $request->alamat_anggota,
        'jumlah_tanggungan' => $request->jumlah_tanggungan,
        'status_rumah' => $request->status_rumah,
    ]);

    $anggota->save();

    return redirect('/dataAnggota')->with('success', 'Anggota berhasil ditambahkan');
}

    public function show($id)
    {
        $anggota = DataAnggotaModel::find($id);
        $breadcrumb = (object) [
            'title' => 'Detail Anggota',
            'list' => ['Home', 'Data Anggota', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Anggota'
        ];

        $activeMenu = 'anggota';

        return view('dataAnggota.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'anggota' => $anggota, 'activeMenu' => $activeMenu]);
    }

    public function edit($id)
    {
        $anggota = DataAnggotaModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Anggota',
            'list' => ['Home', 'Data Anggota', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Anggota'
        ];

        $activeMenu = 'anggota';

        return view('dataAnggota.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'anggota' => $anggota, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'notelp_anggota' => 'required|string|min:12',
            'alamat_anggota' => 'required|string',
            'jumlah_tanggungan' => 'nullable|string',
            'status_rumah' => 'nullable|string',
        ]);

        DataAnggotaModel::find($id)->update([
            'notelp_anggota'    => $request->notelp_anggota,
            'alamat_anggota'    => $request->alamat_anggota,
            'jumlah_tanggungan' => $request->jumlah_tanggungan,
            'status_rumah' => $request->status_rumah,
        ]);
        
        return redirect('/dataAnggota')->with('success', 'Data anggota berhasil diubah');
    }

    public function destroy($id)
    {
        $check = DataAnggotaModel::find($id);
        
        if (!$check) {
            return redirect('/dataAnggota')->with('error', 'Data anggota tidak ditemukan');
        }

        try {
            DataAnggotaModel::destroy($id);

            return redirect('/dataAnggota')->with('success', 'Data anggota berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dataAnggota')->with('error', 'Data anggota gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini' . $e->getMessage());
        }
    }
}
