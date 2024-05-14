<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\KontenDataTable;
use App\Models\KontenModel;
use App\Models\UsersModel;
use Illuminate\Support\Facades\Storage;

class KontenController extends Controller
{
    public function index(KontenDataTable $dataTable)
    {
        return $dataTable->render('konten.index');
    }

    public function create()
    {
        $users = UsersModel::all();
        return view('konten.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|exists:users,id',
            'nama' => 'required',
            'tgl_konten' => 'required|date',
            'foto_konten' => 'required|image',
            'deskripsi_konten' => 'required|string|max:255',
        ]);

        $path = $request->file('foto_konten')->store('public/foto_konten');

        KontenModel::create([
            'id_admin' => $request->id_admin,
            'nama' => $request->nama,
            'tgl_konten' => $request->tgl_konten,
            'foto_konten' => $path,
            'deskripsi_konten' => $request->deskripsi_konten,
        ]);

        return redirect()->route('konten.index')->with('success', 'Konten created successfully.');
    }

    public function edit($id)
    {
        $konten = KontenModel::findOrFail($id);
        $users = UsersModel::all();
        return view('konten.edit', compact('konten', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_admin' => 'required|exists:users,id',
            'tgl_konten' => 'required|date',
            'foto_konten' => 'sometimes|image',
            'deskripsi_konten' => 'required|string|max:255',
        ]);

        $konten = KontenModel::findOrFail($id);

        if ($request->hasFile('foto_konten')) {
            // Delete the old photo
            Storage::delete($konten->foto_konten);

            // Store the new photo
            $path = $request->file('foto_konten')->store('public/foto_konten');
            $konten->foto_konten = $path;
        }

        $konten->update([
            'id_admin' => $request->id_admin,
            'tgl_konten' => $request->tgl_konten,
            'deskripsi_konten' => $request->deskripsi_konten,
        ]);

        return redirect()->route('konten.index')->with('success', 'Konten updated successfully.');
    }

    public function destroy($id)
    {
        $konten = KontenModel::findOrFail($id);

        // Delete the photo
        Storage::delete($konten->foto_konten);

        $konten->delete();

        return redirect()->route('konten.index')->with('success', 'Konten deleted successfully.');
    }
}