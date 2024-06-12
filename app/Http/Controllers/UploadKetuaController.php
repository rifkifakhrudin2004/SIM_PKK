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
            'foto_konten' => 'required|image|max:10240',
            'description' => 'required|string',
        ]);

        $file = $request->file('foto_konten');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('storage/uploads'), $fileName);
        $filePath = 'storage/uploads/' . $fileName;

        KontenModel::create([
            'foto_konten' => $filePath,
            'deskripsi_konten' => $request->description,
        ]);

        // Set the success message in the session
        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }
}
