<?php

namespace App\Http\Controllers;

use App\Models\KontenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UploadKetuaController extends Controller
{
    public function index()
    {
        return view('ketuaPKK.index', ['activeMenu' => 'konten']);
    }

    public function upload(Request $request)
{
    $request->validate([
        // upload file foto_konten
        'foto_konten' => 'required|image|max:10240',
        'description' => 'required|string',
    ]);

    // Proses penyimpanan file dan deskripsi
    $file = $request->file('foto_konten');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('storage/uploads'), $fileName);
    $filePath = 'storage/uploads/' . $fileName;

    KontenModel::create([
        'foto_konten' => $filePath,
        'deskripsi_konten' => $request->description,
    ]);

    // Simpan pesan sukses ke dalam session
    session()->flash('success', 'File berhasil diunggah.');

    return redirect()->back();
}
    }
