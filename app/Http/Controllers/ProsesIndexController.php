<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class ProsesIndexController extends Controller
{
    public function render()
	{
		$alternatifs = $this->proses();
		return view('livewire.proses.index', compact('alternatifs'));
	}

	// proses metode PSI
	public function proses()
{
    $alternatifs = Alternatif::orderBy('id')->get();
    $kriterias = Kriteria::orderBy('id')->get('type')->toArray();

    // Penentuan matriks keputusan
    $Xij = [];
    foreach ($alternatifs as $ka => $alt) {
        foreach ($alt->kriteria as $kk => $krit) {
            $Xij[$ka][$kk] = $krit->pivot->nilai;
        }
    }

    // Normalisasi matriks keputusan
    $rows = count($Xij);
    $cols = $rows > 0 ? count($Xij[0]) : 0;
    $Nij = [];
    if ($cols > 0) {
        for ($j = 0; $j < $cols; $j++) {
            $xj = [];
            for ($i = 0; $i < $rows; $i++) {
                $xj[] = $Xij[$i][$j];
            }

            $divisor = max($xj);
            $cost = false;
            if ($kriterias[$j]['type'] == false) {
                $cost = true;
                $divisor = min($xj);
            }

            foreach ($xj as $kj => $x) {
                $Nij[$kj][$j] = $cost ? ($divisor / $x) : ($x / $divisor);
            }
        }
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->Nij = $Nij[$key] ?? [];
    }

    // Menjumlahkan elemen tiap kolom matriks
    $EN = array_fill(0, $cols, 0);
    for ($i = 0; $i < $cols; $i++) {
        $jumlah = 0;
        for ($j = 0; $j < $rows; $j++) {
            $jumlah += $Nij[$j][$i] ?? 0;
        }
        $EN[$i] = $jumlah;
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->ttl = $EN[$key] ?? 0;
    }

    // Hitung nilai mean
    $N = [];
    foreach ($EN as $e) {
        $N[] = $e / ($rows > 0 ? $rows : 1);
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->ave = round($N[$key] ?? 0, 4);
    }

    // Hitung variasi preferensi
    $Tj = array_fill(0, $rows, array_fill(0, $cols, 0));
    for ($i = 0; $i < $cols; $i++) {
        for ($j = 0; $j < $rows; $j++) {
            $Tj[$j][$i] = pow(($Nij[$j][$i] ?? 0) - ($N[$i] ?? 0), 2);
        }
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->Tj = $Tj[$key] ?? [];
    }

    // Hitung total tiap kriteria
    $TTj = array_fill(0, $cols, 0);
    for ($i = 0; $i < $cols; $i++) {
        $jumlah = 0;
        for ($j = 0; $j < $rows; $j++) {
            $jumlah += $Tj[$j][$i] ?? 0;
        }
        $TTj[$i] = $jumlah;
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->TTj = round($TTj[$key] ?? 0, 4);
    }

    // Menentukan penyimpangan nilai preferensi
    $Omega = [];
    foreach ($TTj as $ttj) {
        $Omega[] = 1 - $ttj;
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->ome = round($Omega[$key] ?? 0, 4);
    }

    // Total penyimpangan nilai preferensi
    $EOmega = array_sum($Omega);

    // Menghitung kriteria bobot
    $Wj = [];
    if ($EOmega != 0) {
        foreach ($Omega as $o) {
            $Wj[] = $o / $EOmega;
        }
    } else {
        $Wj = array_fill(0, $cols, 0);
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->bob = round($Wj[$key] ?? 0, 4);
    }

    // Menghitung PSI
    $PSI = array_fill(0, $rows, array_fill(0, $cols, 0));
    for ($i = 0; $i < $cols; $i++) {
        for ($j = 0; $j < $rows; $j++) {
            $PSI[$j][$i] = ($Nij[$j][$i] ?? 0) * ($Wj[$i] ?? 0);
        }
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->psi = $PSI[$key] ?? [];
    }

    // Penjumlahan tiap baris proses sebelumnya
    $TThetaI = [];
    foreach ($PSI as $theta) {
        $TThetaI[] = array_sum($theta);
    }

    foreach ($alternatifs as $key => $alternatif) {
        $alternatif->nilai = round($TThetaI[$key] ?? 0, 4);
    }

    return $alternatifs;
}


}
