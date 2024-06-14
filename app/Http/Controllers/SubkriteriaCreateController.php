<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class SubkriteriaCreateController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'name' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);

        // Find the Kriteria
        $kriteria = Kriteria::find($request->kriteria_id);

        if ($kriteria) {
            // Create new SubKriteria
            $subkriteria = $kriteria->subkriteria()->create([
                'name' => $request->name,
                'bobot' => $request->bobot,
            ]);

            // Debugging
            // dd($subkriteria);

            // Redirect with success message
            return redirect()->route('subkriteria.create', $kriteria->id)->with('success', 'SubKriteria berhasil dibuat');
        }

        // Redirect back with error if Kriteria not found
        return back()->withErrors(['kriteria_id' => 'Kriteria tidak ditemukan']);
    }
    public function edit($id)
    {
        $subkriteria = SubKriteria::find($id);
        if (!$subkriteria) {
            return redirect()->route('kriteria.index')->withErrors(['subkriteria' => 'SubKriteria tidak ditemukan']);
        }
        return view('livewire.subkriteria.edit', compact('subkriteria'));
    }
    public function update(Request $request, $id)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'bobot' => 'required|numeric',
        ]);

        // Find the SubKriteria
        $subkriteria = SubKriteria::find($id);
        if ($subkriteria) {
            // Update SubKriteria
            $subkriteria->update([
                'name' => $request->name,
                'bobot' => $request->bobot,
            ]);

            // Redirect with success message
            return redirect()->route('subkriteria.create', $subkriteria->kriteria_id)->with('success', 'SubKriteria berhasil ditambahkan');
        }

        // Redirect back with error if SubKriteria not found
        return back()->withErrors(['subkriteria' => 'SubKriteria tidak ditemukan']);
    }

    public function showCreateForm($kriteria)
    {
        // Find the Kriteria
        $kriteria = Kriteria::find($kriteria);

        if ($kriteria) {
            return view('livewire.subkriteria.create', compact('kriteria'));
        }

        return redirect()->route('kriteria.index')->withErrors(['kriteria' => 'Kriteria tidak ditemukan']);
    }

    public function delete($id)
    {
        $subKriteria = SubKriteria::find($id);
        
        if ($subKriteria) {
            $kriteriaId = $subKriteria->kriteria_id;
            $subKriteria->delete();
            return redirect()->route('subkriteria.create', $kriteriaId)->with('success', 'SubKriteria berhasil dihapus');
        }

        return redirect()->back()->withErrors(['id' => 'SubKriteria tidak ditemukan']);
    }
}
