<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $activeMenu = 'jadwal';
        $jadwals = Jadwal::all();
        return view('jadwals.index', compact('jadwals', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'jadwal';
        return view('jadwals.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date_format:H:i',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwals.index')->with('success', 'Jadwal kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $activeMenu = 'jadwal';
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwals.edit', compact('jadwal', 'activeMenu'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'start' => 'required|date',
        'end' => 'required|date_format:H:i',
    ]);

    $jadwal = Jadwal::findOrFail($id);
    $jadwal->update($request->all());

    return redirect()->route('jadwals.index')->with('success', 'Jadwal kegiatan berhasil diperbarui.');
}


    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwals.index')->with('success', 'Jadwal kegiatan berhasil dihapus.');
    }
}
