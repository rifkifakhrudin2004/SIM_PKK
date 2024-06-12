<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaEditController extends Controller
{
    public $kriteria;

	protected $rules = [
		'kriteria.kode'	=> 'required',
		'kriteria.name'	=> 'required',

		'kriteria.type'	=> 'nullable',
	];

	public function mount($id)
	{
		$kriteria = Kriteria::find($id);
		return view('livewire.kriteria.edit',compact('kriteria'));
	}


	public function update(Request $request, $id)
    {
        // Retrieve the kriteria instance by ID
        $kriteria = Kriteria::find($id);

        // Check if kriteria was found
        if ($kriteria) {
            // Update the kriteria instance with request data
            $kriteria->update($request->all());
        } else {
            // Handle the case where the kriteria was not found
            return redirect()->route('kriteria.index')->with('error', 'Kriteria tidak ditemukan');
        }

        // Redirect to the index route with a success message
        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil di update');
    }

}
