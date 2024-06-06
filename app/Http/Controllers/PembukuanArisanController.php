<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembukuanArisanModel;

class PembukuanArisanController extends Controller
{
    public function index()
    {
        $activeMenu = 'pembukuan';
        $pembukuans = PembukuanArisanModel::all();
        return view('PembukuanArisan.index', compact('pembukuans', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'pembukuan';
        return view('PembukuanArisan.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'id_arisan' => 'required|exists:m_arisan,id_arisan',
        'tanggal' => 'required|date',
        'pemasukan' => 'required|numeric',
        'pengeluaran' => 'required|numeric',
        'saldo' => 'required|numeric',
        'keterangan' => 'nullable|string|max:255',
    ]);

    try {
        PembukuanArisanModel::create($request->all());
        return redirect()->route('pembukuan.index')->with('success', 'Pembukuan Arisan berhasil ditambahkan.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menambahkan Pembukuan Arisan.']);
    }
    }

    public function show($id)
    {
        $activeMenu = 'pembukuan';
        $pembukuan = PembukuanArisanModel::findOrFail($id);
        return view('PembukuanArisan.show', compact('pembukuan', 'activeMenu'));
    }


    public function edit($id)
    {
        $activeMenu = 'pembukuan';
        $pembukuan = PembukuanArisanModel::findOrFail($id);
        return view('PembukuanArisan.edit', compact('pembukuan', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_arisan' => 'required|exists:m_arisan,id_arisan',
            'tanggal' => 'required|date',
            'pemasukan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'saldo' => 'required|numeric',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $pembukuan = PembukuanArisanModel::findOrFail($id);
        $pembukuan->update($request->all());

        return redirect()->route('pembukuan.index')->with('success', 'Pembukuan Arisan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembukuan = PembukuanArisanModel::findOrFail($id);
        $pembukuan->delete();

        return redirect()->route('pembukuan.index')->with('success', 'Pembukuan Arisan berhasil dihapus.');
    }
}