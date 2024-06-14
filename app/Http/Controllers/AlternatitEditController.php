<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatitEditController extends Controller
{
    // property penampung data alternatif yang dikirim dari route
	public $alternatif;

	// syarat rules untuk validasi input
	protected $rules = [
		'alternatif.kode'	=> 'required',
		'alternatif.name'	=> 'required',
	];

	// method mount dieksekusi sebelum method render
	public function mount($id)
	{
		$alternatif = Alternatif::find($id);
		return view('livewire.alternatif.edit',compact('alternatif'));
	}

	public function render()
	{
		return view('livewire.alternatif.edit');
	}

	public function update(Request $request, $id)
    {
        // Retrieve the kriteria instance by ID
        $alternatif = Alternatif::find($id);

        // Check if kriteria was found
        if ($alternatif) {
            // Update the kriteria instance with request data
            $alternatif->update($request->all());
        } else {
            // Handle the case where the kriteria was not found
            return redirect()->route('alternatif.index')->with('error', 'Data Anggota tidak ditemukan');
        }

        // Redirect to the index route with a success message
        return redirect()->route('alternatif.index')->with('success', 'Data Anggota berhasil di update');
    }
}
