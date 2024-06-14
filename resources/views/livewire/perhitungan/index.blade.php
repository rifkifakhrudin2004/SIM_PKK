@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Perhitungan</h3>
    </div>
    <div id="Penilaian Alternatif">
	
		@if ($alternatifs->count() > 0)
			
		 
		<div class="container mx-auto px-4 sm:px-8">
			<div class="py-8">
				<div class="flex items-center justify-between">
					<h2 class="text-2xl font-semibold leading-tight">Perhitungan Metode PSI </h2>
					
				</div>
				<h3 class="text-1,5xl font-semibold leading-tight">1. Penilaian Alternatif </h3>
				<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
					<div class="card">
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead class="custom-thead">
									<tr>
										<th class="text-center">Alternatif</th>
										<th class="text-center">Nama</th>
										@foreach ($kriterias as $krit)
										<th class="text-center">{{ $krit->kode }}</th>
										@endforeach
									</tr>
								</thead>
								<tbody>
									@forelse ($alternatifs as $index => $alt)
									
									<tr>
										<td class="text-center">{{ $alt->kode }}</td>
										<td class="text-center">{{ $alt->name }}</td>
										@php
										$nilai = [];
										foreach ($kriterias as $k) {
											$ks = $alt->kriteria->find($k->id);
											$nilai[] = $ks ? $ks->pivot->nilai : 0;
										}
										@endphp
		
										@foreach ($nilai as $n)
										<td class="text-center">{{ $n }}</td>
										@endforeach
										
					
									</tr>
		
									@empty
									
									@endforelse
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		@endif
	</div>
	
	<div id="Matriks Keputusan">
		
		@if ($alternatifs->count() > 0)

		<div class="container mx-auto px-4 sm:px-8">
			
				<h3 class="text-1xl font-semibold leading-tight">2. Matriks Keputusan </h3>
				{{-- <p>Data berikut diurutkan berdasarkan nilai tertinggi.</p> --}}
				<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
					<div class="card">
						<div class="card-body p-0">
							<table class="table table-striped">
								<thead class="custom-thead">
									<tr>
										<th class="text-center">Alternatif</th>
										@foreach ($kriterias as $krit)
										<th class="text-center">{{ $krit->kode }}</th>
										@endforeach
										
									</tr>
								</thead>
								<tbody>
									@forelse ($alternatifs as $index => $alt)
									
									<tr>
										<td class="text-center">{{ $alt->kode }}</td>
										@php
										$nilai = [];
										foreach ($kriterias as $k) {
											$ks = $alt->kriteria->find($k->id);
											$nilai[] = $ks ? $ks->pivot->nilai : 0;
										}
										@endphp
		
										@foreach ($nilai as $n)
										<td class="text-center">{{ $n }}</td>
										@endforeach
									</tr>
		
									@empty
		
									<tr>
										<td class="text-center" colspan="{{ $kriterias->count() + 1 }}">Belum ada data alternatif.</td>
									</tr>
									
									@endforelse
									<tfoot class="custom-tfoot">
										<tr>
											<th class="text-center">Jenis Kriteria</th>
											@foreach ($kriterias as $krit)
											<th class="text-center">
												<?php
												if ($krit->type == 1) {
													echo "Benefit";
												} elseif ($krit->type == 0) {
													echo "Cost";
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
		</div>
	
		@endif
	</div>
	
	<div class="card card-outline card-primary">
		<div id="Normalisasi Matriks">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">3. Normalisasi Matriks</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Keterangan</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<th class="text-center">MAX</th>
								@foreach ($kriterias as $kriteria)
								@php
								$nilai = [];
								foreach ($alternatifs as $alternatif) {
								$ks = $alternatif->kriteria->find($kriteria->id);
								$nilai[] = $ks ? $ks->pivot->nilai : 0;
								}
								$max = max($nilai);
								@endphp
								<td class="text-center">{{ $max }}</td>
								@endforeach
							</tr>
							<tr>
								<th class="text-center">MIN</th>
								@foreach ($kriterias as $kriteria)
								@php
								$nilai = [];
								foreach ($alternatifs as $alternatif) {
								$ks = $alternatif->kriteria->find($kriteria->id);
								$nilai[] = $ks ? $ks->pivot->nilai : 0;
								}
								$min = min($nilai);
								@endphp
								<td class="text-center">{{ $min }}</td>
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Alternatif</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							<tr>
								<td class="text-center">{{ $alt->kode }}</td>
								@foreach ($alt->Nij as $normal)
								<td class="text-center">{{ $normal }}</td>
								@endforeach
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="{{ $kriterias->count() + 1 }}">Belum ada data alternatif.</td>
							</tr>
							@endforelse
						</tbody>
						<tfoot class="custom-tfoot">
							<tr>
								<th class="text-center">Total</th>
								@foreach ($alternatifs as $alternatif)
								@if (!empty($alternatif->ttl))
								<td class="text-center">{{ $alternatif->ttl }}</td>
								@endif
								@endforeach
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			@endif
		</div>
		
		<div id="Nilai Rata-Rata Kinerja">
			@if (isset($alternatifs) && count($alternatifs) > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">4. Nilai Rata-Rata Kinerja</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Keterangan</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">Rata-Rata</td>
								@foreach ($alternatifs as $alternatif)
								@if (!empty($alternatif->ave))
								<td class="text-center">{{ $alternatif->ave }}</td>
								@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	</div>

	<div class="card card-outline card-primary">
		<div id="Nilai Variasi Preferensi">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">5. Nilai Variasi Preferensi</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Alternatif</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							<tr>
								<td class="text-center">{{ $alt->kode }}</td>
								@foreach ($alt->Tj as $re)
								<td class="text-center">{{ $re }}</td>
								@endforeach
							</tr>
							@empty
							@endforelse
						</tbody>
						<tfoot class="custom-tfoot">
							<tr>
								<th class="text-center">Total</th>
								@foreach ($alternatifs as $alternatif)
								@if (!empty($alternatif->TTj))
								<td class="text-center">{{ $alternatif->TTj }}</td>
								@endif
								@endforeach
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			@endif
		</div>
		
		<div id="Deviasi Nilai Preferensi">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">6. Deviasi Nilai Preferensi</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Keterangan</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">Deviasi</td>
								@foreach ($alternatifs as $alternatif)
								@if (!empty($alternatif->ome))
								<td class="text-center">{{ $alternatif->ome }}</td>
								@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	</div>
	
	<div class="card card-outline card-primary">
		<div id="Bobot Kriteria">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">7. Bobot Kriteria</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Keterangan</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center">Bobot</td>
								@foreach ($alternatifs as $alternatif)
								@if (!empty($alternatif->bob))
								<td class="text-center">{{ $alternatif->bob }}</td>
								@endif
								@endforeach
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	
		<div id="Perhitungan">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">8. Hitung Nilai PSI</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">Alternatif</th>
								@foreach ($kriterias as $krit)
								<th class="text-center">{{ $krit->kode }}</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@forelse ($alternatifs as $index => $alt)
							<tr>
								<td class="text-center">{{ $alt->kode }}</td>
								@foreach ($alt->psi as $psi)
								<td class="text-center">{{ $psi }}</td>
								@endforeach
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="{{ $kriterias->count() + 1 }}">Belum ada data alternatif.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	</div>
	
	<div class="card card-outline card-primary">
		<div id="perankingan">
			@if ($alternatifs->count() > 0)
			 
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">9. Ranking</h3>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Kode</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Nilai</th>
								<th class="text-center">Ranking</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1 @endphp
							@forelse ($alternatifs->sortByDesc('nilai') as $index => $alt)
							<tr>
								<td class="text-center">{{ $no }}</td>
								<td class="text-center">{{ $alt->kode }}</td>
								<td class="text-center">{{ $alt->name }}</td>
								<td class="text-center">{{ $alt->nilai }}</td>
								<td class="text-center">{{ $no++ }}</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="5">Belum ada data alternatif.</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			@endif
		</div>
	</div>
	

</div>
@endsection


<style>
    .custom-thead,.custom-tfoot {
        background-color: #010050; 
        color: white;
		border-radius: 10px; 
    	overflow: hidden; 
    }
	.table {
    border-radius: 10px; 
    overflow: hidden;
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}
</style>