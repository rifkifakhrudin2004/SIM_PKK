<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class PenilaianIndexController extends Controller
{
    public function render()
    {
        // Ambil semua alternatif
        $alternatifs = Alternatif::orderBy('id')->get();
        
        // Ambil semua kriteria
        $kriterias = Kriteria::orderBy('id')->get();
        
        // Kembalikan view dengan data alternatif dan kriteria
        return view('livewire.penilaian.index', compact('alternatifs', 'kriterias'));
    }
}
