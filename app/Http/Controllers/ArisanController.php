<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ArisanDataTable;
use App\Models\ArisanModel;
use App\Models\AnggotaModel;
use App\Models\PembukuanArisanModel;

class ArisanController extends Controller
{
    public function index(ArisanDataTable $dataTable)
    {
        $activeMenu = 'arisan';
        return $dataTable->render('arisan.index', compact('activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'arisan';
        $anggota = AnggotaModel::all();
        return view('arisan.create', compact('anggota', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_bendahara' => 'required|exists:anggota,id',
            'tgl_arisan' => 'required|date',
            'catatan_arisan' => 'nullable|string|max:255',
            'setoran_arisan' => 'required|numeric',
        ]);

        ArisanModel::create([
            'id_anggota' => $request->id_anggota,
            'id_bendahara' => $request->id_bendahara,
            'tgl_arisan' => $request->tgl_arisan,
            'catatan_arisan' => $request->catatan_arisan,
            'setoran_arisan' => $request->setoran_arisan,
        ]);

        return redirect()->route('arisan.index')->with('success', 'Arisan created successfully.');
    }

    public function edit($id)
    {
        $activeMenu = 'arisan';
        $arisan = ArisanModel::findOrFail($id);
        $anggota = AnggotaModel::all();
        return view('arisan.edit', compact('arisan', 'anggota', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_bendahara' => 'required|exists:anggota,id',
            'tgl_arisan' => 'required|date',
            'catatan_arisan' => 'nullable|string|max:255',
            'setoran_arisan' => 'required|numeric',
        ]);

        $arisan = ArisanModel::findOrFail($id);

        $arisan->update([
            'id_anggota' => $request->id_anggota,
            'id_bendahara' => $request->id_bendahara,
            'tgl_arisan' => $request->tgl_arisan,
            'catatan_arisan' => $request->catatan_arisan,
            'setoran_arisan' => $request->setoran_arisan,
        ]);

        return redirect()->route('arisan.index')->with('success', 'Arisan updated successfully.');
    }

    public function destroy($id)
    {
        $arisan = ArisanModel::findOrFail($id);
        $arisan->delete();
        return redirect()->route('arisan.index')->with('success', 'Arisan deleted successfully.');
    }

    // New methods for the sidebar menu items
    public function dataArisan()
    {
        $activeMenu = 'arisan';
        $arisans = ArisanModel::all();
        return view('arisan.data', compact('arisans', 'activeMenu'));
    }

    public function pembukuan()
    {
        $activeMenu = 'arisan';
        $pembukuans = PembukuanArisanModel::all();
        return view('PembukuanArisan.pembukuan', compact('pembukuans', 'activeMenu'));
    }

    public function jadwal()
    {
        $activeMenu = 'arisan';
        // Logic to fetch and display schedule data
        $jadwals = []; // Replace with actual data fetching logic
        return view('arisan.jadwal', compact('jadwals', 'activeMenu'));
    }
}