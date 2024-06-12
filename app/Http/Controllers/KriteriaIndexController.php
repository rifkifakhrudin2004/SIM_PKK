<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaIndexController extends Controller
{
    public function render()
	{
		$kriterias = Kriteria::orderBy('id')->get();
		return view('livewire.kriteria.index', compact('kriterias'));
	}

	public function delete($id)
    {
        // Find and delete the specified Kriteria
        Kriteria::findOrFail($id)->delete();

        // Retrieve the updated list of Kriterias
        $kriterias = Kriteria::all();

        // Return the view with the updated list
        return view('livewire.kriteria.index', compact('kriterias'));
    }
}
