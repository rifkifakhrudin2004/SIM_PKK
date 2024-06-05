<div id="Penilaian Alternatif">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			<div class="flex items-center justify-between">
				<h2 class="text-2xl font-semibold leading-tight">Perhitungan Metode PSI </h2>
				{{-- <x-jet-button class="button" wire:click="print">Cetak</x-jet-button> --}}
			</div>
			<h3 class="text-1,5xl font-semibold leading-tight">1. Penilaian Alternatif </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Alternatif
								</th>

								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Nama
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
								
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->kode }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->name }}
								</td>
								@php
								$nilai = [];
								foreach ($kriterias as $k) {
									$ks = $alt->kriteria->find($k->id);
									$nilai[] = $ks ? $ks->pivot->nilai : 0;
								}
								@endphp

								@foreach ($nilai as $n)
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $n }}
								</td>
								@endforeach
								
			
							</tr>

							@empty

							{{-- <tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif untuk dinilai.</td>
							</tr> --}}
							
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Matriks Keputusan">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		
			<h3 class="text-1xl font-semibold leading-tight">2. Matriks Keputusan </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Alternatif
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
								
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->kode }}
								</td>
								@php
								$nilai = [];
								foreach ($kriterias as $k) {
									$ks = $alt->kriteria->find($k->id);
									$nilai[] = $ks ? $ks->pivot->nilai : 0;
								}
								@endphp

								@foreach ($nilai as $n)
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $n }}
								</td>
								@endforeach
							</tr>

							@empty

							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif.</td>
							</tr>
							
							@endforelse
							<tfoot>
								<tr>
									<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
										Jenis Kriteria
									</th>
									@foreach ($kriterias as $krit)
									<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
										<?php
										if ($krit->type == 1) {
											echo "benefit";
										} elseif ($krit->type == 0) {
											echo "cost";
										}
										?>
									</th>
									@endforeach
								</tr>
							</tfoot>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Normalisasi Matriks">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">3. Normalisasi Matriks </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Keterangan
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="px-5 py-5 border-b border-gray-200 bg-white text-left text-sm">MAX</th>
								@foreach ($kriterias as $kriteria)
									@php
										$nilai = [];
										foreach ($alternatifs as $alternatif) {
											$ks = $alternatif->kriteria->find($kriteria->id);
											$nilai[] = $ks ? $ks->pivot->nilai : 0;
										}
										$max = max($nilai);
									@endphp
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">{{ $max }}</td>
								@endforeach
							</tr>
							<tr>
								<th class="px-5 py-5 border-b border-gray-200 bg-white text-left text-sm">MIN</th>
								@foreach ($kriterias as $kriteria)
									@php
										$nilai = [];
										foreach ($alternatifs as $alternatif) {
											$ks = $alternatif->kriteria->find($kriteria->id);
											$nilai[] = $ks ? $ks->pivot->nilai : 0;
										}
										$min = min($nilai);
									@endphp
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">{{ $min }}</td>
								@endforeach
							</tr>
							@forelse ($alternatifs as $index => $alt)
							@empty

							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif.</td>
							</tr>
							
							@endforelse
						</tbody>
					</table>
				</div>
			</div>

			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Alternatif
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->kode }}
								</td>
								@foreach ($alt->Nij as $normal)
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $normal }}
								</td>
								@endforeach
							</tr>
							@empty

							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif.</td>
							</tr>
							
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Total
								</td>
								@foreach ($alternatifs as $alternatif)
									@if (!empty($alternatif->ttl))
										<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
											{{ $alternatif->ttl }}
										</td>
									@endif
								@endforeach
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Nilai Rata-Rata Kinerja">
	
	@if (isset($alternatifs) && count($alternatifs) > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">4. Nilai Rata-Rata Kinerja </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Keterangan
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									Rata-Rata
								</td>
								@foreach ($alternatifs as $alternatif)
									@if (!empty($alternatif->ave))
										<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
											{{ $alternatif->ave }}
										</td>
									@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Nilai Variasi Preferensi">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">5. Nilai Variasi Preferensi </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Alternatif
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
								
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->kode }}
								</td>
								@foreach ($alt->Tj as $re)
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $re }}
								</td>
								@endforeach
							</tr>
							@empty
							
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Total
								</td>
								@foreach ($alternatifs as $alternatif)
									@if (!empty($alternatif->TTj))
										<td class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
											{{ $alternatif->TTj }}
										</td>
									@endif
								@endforeach
								
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Deviasi Nilai Preferensi">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">6. Deviasi Nilai Preferensi </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Keterangan
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									Deviasi
								</td>
								@foreach ($alternatifs as $alternatif)
									@if (!empty($alternatif->ome))
										<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
											{{ $alternatif->ome }}
										</td>
									@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Bobot Kriteria">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">7. Bobot Kriteria </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Keterangan
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									Bobot
								</td>
								@foreach ($alternatifs as $alternatif)
									@if (!empty($alternatif->bob))
										<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
											{{ $alternatif->bob }}
										</td>
									@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="Perhitungan">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">8. Hitung Nilai PSI </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Alternatif
								</th>
								@foreach ($kriterias as $krit)
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									{{ $krit->kode }}
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $alt->kode }}
								</td>
								@foreach ($alt->psi as $psi)
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
									{{ $psi }}
								</td>
								@endforeach
								@empty

							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif.</td>
							</tr>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

<div id="perankingan">
	
	@if ($alternatifs->count() > 0)
		
	{{-- tabel data alternatif --}}
	<div class="container mx-auto px-4 sm:px-8">
		<div class="py-8">
			
			<h3 class="text-1xl font-semibold leading-tight">9. Ranking </h3>
			{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									No
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Kode
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Nama
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Nilai
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-900 text-white text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Ranking
								</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1 @endphp
							@forelse ($alternatifs->sortByDesc('nilai') as $index => $alt)
							
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-left text-sm">
									{{-- {{ $no++ }} --}}
									{{ $no }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-center text-sm">
									{{ $alt->kode }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-center text-sm">
									{{ $alt->name }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-center text-sm">
									{{ $alt->nilai }}
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-center text-sm">
									{{ $no++ }}
								</td>
							</tr>
							

							@empty

							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm" colspan="{{ $kriterias->count() + 4 }}">Belum ada data alternatif.</td>
							</tr>
							
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	@endif
</div>

