<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaCreateController extends Controller
{
    public $kode;
	public $nama;
	// public $bobot;
	public $type = '1';

	public function render()
	{
		return view('livewire.kriteria.create');
	}

	public function store(Request $request)
	{
		Kriteria::create([
			'kode'	=> $request->kode,
			'name'	=> $request->nama,
			// 'bobot'	=> $this->bobot,
			'type'	=> $request->type == '1' ? true : false,
		]);

		return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }
}

