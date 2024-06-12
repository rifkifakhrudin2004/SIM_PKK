<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatitCreateController extends Controller
{
    // variabel penampung data dari input
	public $kode;
	public $nama;

	public function render()
	{
		return view('livewire.alternatif.create');
	}

	// method untuk simpan data alternatif
	public function store(Request $request)
	{
		Alternatif::create([
			'kode'	=> $request->kode,
			'name'	=> $request->nama
		]);
		return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambahkan');
	}
}
