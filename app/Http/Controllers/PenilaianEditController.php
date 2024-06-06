<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PenilaianEditController extends Controller
{
    public function mount(Request $request, $altId)
    {
        $alternatif = Alternatif::find($altId);
        $kriterias = Kriteria::orderBy('kode')->get();
        $nilai = [];

        foreach ($kriterias as $key => $value) {
            $nilai[$value->id] = 0;
        }

        foreach ($alternatif->kriteria as $krit) {
            $nilai[$krit->id] = $krit->pivot->nilai ?? 0;
        }

        return view('livewire.penilaian.edit', compact('alternatif', 'kriterias', 'nilai'));
    }

    public function update(Request $request, $altId)
{
    // Validate request data
    $request->validate([
        'nilai.*' => 'required',
    ]);

    // Find the Alternatif
    $alternatif = Alternatif::find($altId);

    // Update the nilai kriteria
    $penilaian = [];
    foreach ($request->nilai as $key => $value) {
        $penilaian[$key] = ['nilai' => $value];
    }
    $alternatif->kriteria()->sync($penilaian);

    // Redirect back to the appropriate page with success message
    return redirect()->route('penilaian.index')->with('success', 'Data penilaian berhasil diperbarui.');
}


}
