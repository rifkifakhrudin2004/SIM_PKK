<?php

namespace App\Http\Livewire\Perhitungan;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Index extends Component
{
	public function render()
	{
		$alternatifs = $this->proses();
		// $alternatifs = Alternatif::orderBy('kode')->get();
		$kriterias = Kriteria::orderBy('kode')->get();
		return view('livewire.perhitungan.index', compact('alternatifs', 'kriterias'));
	}

	// proses metode PSI
	public function proses()
	{
		$alternatifs = Alternatif::orderBy('kode')->get();
		$kriterias = Kriteria::orderBy('kode')->get('type')->toArray();
		// dd($kriterias);

		// penentuan matriks keputusan
		$Xij = [];
		foreach ($alternatifs as $ka => $alt) {
			foreach ($alt->kriteria as $kk => $krit) {
				$Xij[$ka][$kk] = $krit->pivot->nilai;
			}
		}

		// normalisasi matriks keputusan
		$rows = count($Xij);
		$cols = count($Xij[0]);
		$Nij = [];
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
		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->Nij = $Nij[$key];
		}
		
		

		// menjumlahkan elemen tiap kolom matriks
		$EN = [];
		for ($i = 0; $i < $cols; $i++) {
			$jumlah = 0;
			for ($j = 0; $j < $rows; $j++) {
				$jumlah += $Nij[$j][$i];
			}
			$EN[$i] = $jumlah;
		}
		if (!is_null($alternatifs) && !is_null($EN)) {
			// Lakukan iterasi foreach
			foreach ($alternatifs as $key => $alternatif) {
				// Periksa apakah indeks $key ada dalam array $TTj sebelum mengaksesnya
				if (array_key_exists($key, $EN)) {
					$alternatif->ttl = $EN[$key];
				}
			}
		} 
		
		
		
		// hitung nilai mean
		$N = [];
		foreach ($EN as $e) {
			$N[] = $e / $rows;
		}
		if (!is_null($alternatifs) && !is_null($N)) {
			// Lakukan iterasi foreach
			foreach ($alternatifs as $key => $alternatif) {
				// Periksa apakah indeks $key ada dalam array $TTj sebelum mengaksesnya
				if (array_key_exists($key, $N)) {
					$alternatif->ave = round($N[$key],4);
				} 
			}
		} 
		

		// hitung variasi preferensi
		$Tj = [];
		for ($i = 0; $i < $cols; $i++) {
			for ($j = 0; $j < $rows; $j++) {
				$Tj[$j][$i] = pow($Nij[$j][$i] - $N[$i], 2);
			}
		}
		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->Tj = $Tj[$key];
		}

		// hitung total tiap kriteria
		$TTj = [];
		for ($i = 0; $i < $cols; $i++) {
			$jumlah = 0;
			for ($j = 0; $j < $rows; $j++) {
				$jumlah += $Tj[$j][$i];
			}
			$TTj[] = $jumlah;
		}
		if (!is_null($alternatifs) && !is_null($TTj)) {
			// Lakukan iterasi foreach
			foreach ($alternatifs as $key => $alternatif) {
				// Periksa apakah indeks $key ada dalam array $TTj sebelum mengaksesnya
				if (array_key_exists($key, $TTj)) {
					$alternatif->TTj = round($TTj[$key],4);
				}
			}
		} 

		// menentukan penyimpangan nilai preferensi
		$Omega = [];
		foreach ($TTj as  $ttj) {
			$Omega[] = 1 - $ttj;
		}
		if (!is_null($alternatifs) && !empty($Omega)) {
			// Lakukan iterasi foreach sejajar dengan array $alternatifs
			foreach ($alternatifs as $key => $alternatif) {
				// Periksa apakah indeks $key ada dalam array $Omega sebelum mengaksesnya
				if (array_key_exists($key, $Omega)) {
					$alternatif->ome = round($Omega[$key],4);
				}
			}
		}
		

		// total penyimpangan nilai preferensi
		$EOmega = array_sum($Omega);

		// menghitung kriteria bobot
		$Wj = [];
		foreach ($Omega as $o) {
			$Wj[] = $o / $EOmega;
		}
		if (!is_null($alternatifs) && !is_null($Wj)) {
			// Lakukan iterasi foreach
			foreach ($alternatifs as $key => $alternatif) {
				// Periksa apakah indeks $key ada dalam array $TTj sebelum mengaksesnya
				if (array_key_exists($key, $Wj)) {
					$alternatif->bob = round($Wj[$key],4);
				}
			}
		} 

		// menghitung PSI
		$PSI = [];
		for ($i = 0; $i < $cols; $i++) {
			for ($j = 0; $j < $rows; $j++) {
				$PSI[$j][$i] = $Nij[$j][$i] * $Wj[$i];
			}
		}
		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->psi = $PSI[$key];
		}


		// penjumlahan tiap baris proses sebelumnya
		$TThetaI = [];
		foreach ($PSI as $theta) {
			$TThetaI[] = array_sum($theta);
		}

		foreach ($alternatifs as $key => $alternatif) {
			$alternatif->nilai = round($TThetaI[$key], 4);
		}

		return $alternatifs;
		
	}
	
}