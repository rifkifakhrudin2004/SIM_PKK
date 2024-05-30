<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembukuanArisanModel;

class PembukuanArisanController extends Controller
{
    public function pembukuan()
    {
        $activeMenu = 'arisan';
        $pembukuans = PembukuanArisanModel::all();
        return view('PembukuanArisan.pembukuan', compact('pembukuans', 'activeMenu'));
    }

    public function index()
    {
        $activeMenu = 'arisan';
        $pembukuans = PembukuanArisanModel::all();
        return view('PembukuanArisan.index', compact('pembukuans', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'arisan';
        return view('PembukuanArisan.create', compact('activeMenu'));
    }

    public function store(Request $request)
    {
        $activeMenu = 'arisan';
        $request->validate([
            'id_arisan' => 'required|exists:m_arisan,id_arisan',
            'tanggal' => 'required|date',
            'pemasukan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'saldo' => 'required|numeric',
            'keterangan' => 'nullable|string|max:255',
        ]);

        PembukuanArisanModel::create($request->all());

        return redirect()->route('pembukuan_arisan.store')->with('success', 'Pembukuan Arisan created successfully.');
    }

    public function edit($id)
    {
        $activeMenu = 'arisan';
        $pembukuan = PembukuanArisanModel::findOrFail($id);
        return view('PembukuanArisan.edit', compact('pembukuan', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $activeMenu = 'arisan';
        $request->validate([
            'id_arisan' => 'required|exists:arisan_models,id',
            'tanggal' => 'required|date',
            'pemasukan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'saldo' => 'required|numeric',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $pembukuan = PembukuanArisanModel::findOrFail($id);
        $pembukuan->update($request->all());

        return redirect()->route('PembukuanArisan.index')->with('success', 'Pembukuan Arisan updated successfully.');
    }

    public function destroy($id)
    {
        $activeMenu = 'arisan';
        $pembukuan = PembukuanArisanModel::findOrFail($id);
        $pembukuan->delete();

        return redirect()->route('PembukuanArisan.index')->with('success', 'Pembukuan Arisan deleted successfully.');
    }
}