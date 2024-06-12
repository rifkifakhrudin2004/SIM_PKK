<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifIndexController extends Controller
{
    public function render()
	{
		$alternatifs = Alternatif::orderBy('id')->get();

		return view('livewire.alternatif.index', compact('alternatifs'));
		// jangan lupa ketik "npm run build" di Windows PowerShell
	}

	public function delete($id)
    {
        // Find and delete the specified Kriteria
        Alternatif::findOrFail($id)->delete();

        // Retrieve the updated list of Kriterias
        $alternatifs = Alternatif::all();

        // Return the view with the updated list
        return view('livewire.alternatif.index', compact('alternatifs'));
    }
}
