<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadKetuaController extends Controller
{
    public function index()
    {
        return view('ketuaPKK.index', ['activeMenu' => 'konten']);
    }

    public function upload(Request $request)
    {
        $request->validate([
            // //upload file
            // 'file' => 'required|max:10240',
            // 'file.*' => 'mimes:pdf,docx,doc,txt'
            
            //upload file gambar
            'file' => 'required|image|max:10240',
            'description' => 'required|string',
        ]);



         // Proses penyimpanan file dan deskripsi
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        // 

        return redirect()->back()->with('success', 'File berhasil diunggah.');
    }
}