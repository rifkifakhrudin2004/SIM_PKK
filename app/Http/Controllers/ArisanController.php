<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ArisanModel;
use App\Models\AnggotaModel;
use App\Models\PembukuanArisanModel;
use App\Models\BendaharaModel;
use Illuminate\Support\Facades\Auth;

class ArisanController extends Controller
{
    public function index(Request $request)
    {
        $activeMenu = 'arisan';
        $year = $request->input('year');
        $month = $request->input('month');

        $query = ArisanModel::query();

        if ($year) {
            $query->whereYear('tgl_arisan', $year);
        }

        if ($month) {
            $query->whereMonth('tgl_arisan', $month);
        }

        $arisans = $query->get();

        return view('arisan.index', compact('arisans', 'activeMenu'));
    }

    public function create()
    {
        $activeMenu = 'arisan';
        $anggota = AnggotaModel::all();
        $bendahara = BendaharaModel::all();
        return view('arisan.create', compact('anggota', 'bendahara', 'activeMenu'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required|exists:m_anggota,id_anggota',
            'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
            'tgl_arisan' => 'required|date',
            'catatan_arisan' => 'nullable|string|max:255',
            'setoran_arisan' => 'required|numeric',
        ]);
        ArisanModel::create($request->all());
        return redirect()->route('arisan.index')->with('success', 'Arisan berhasil ditambahkan.');
    }
    public function show($id)
    {
        $activeMenu = 'arisan';
        $arisan = ArisanModel::findOrFail($id);
        return view('arisan.show', compact('arisan', 'activeMenu'));
    }
    public function edit($id)
    {
        $activeMenu = 'arisan';
        $arisan = ArisanModel::findOrFail($id);
        $anggota = AnggotaModel::all();
        $bendahara = BendaharaModel::all();
        return view('arisan.edit', compact('arisan', 'anggota', 'bendahara', 'activeMenu'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_anggota' => 'required|exists:m_anggota,id_anggota',
            'id_bendahara' => 'required|exists:m_bendahara_pkk,id_bendahara',
            'tgl_arisan' => 'required|date',
            'catatan_arisan' => 'nullable|string|max:255',
            'setoran_arisan' => 'required|numeric',
        ]);
        $arisan = ArisanModel::findOrFail($id);
        $arisan->update($request->all());
        return redirect()->route('arisan.index')->with('success', 'Arisan berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $arisan = ArisanModel::findOrFail($id);
        $arisan->delete();
        return redirect()->route('arisan.index')->with('success', 'Arisan berhasil dihapus.');
    }

    public function updateStatus(Request $request, $id)
{
    $arisan = ArisanModel::find($id);
    $arisan->status = $request->input('status');
    $arisan->save();

    return redirect()->route('arisan.index')->with('success', 'Status updated successfully.');
}

}