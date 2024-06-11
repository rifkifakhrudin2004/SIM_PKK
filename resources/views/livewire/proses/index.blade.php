@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">SPK/Ranking</h3>
    </div>
    <div class="card card-outline card-primary">
		<div id="perankingan">
			@if ($alternatifs->count() > 0)
			{{-- tabel data alternatif --}}
			<div class="card-body">
				<h3 class="text-1,5xl font-semibold leading-tight">Ranking</h3>
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
    .custom-thead {
        background-color: #010050; /* Ubah kode warna sesuai kebutuhan */
        color: white;
		border-radius: 10px; /* Sesuaikan angka radius dengan keinginan Anda */
    	overflow: hidden; /* Ubah warna teks jika diperlukan */
    }
	.table {
    border-radius: 10px; /* Sesuaikan angka radius dengan keinginan Anda */
    overflow: hidden;
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}
</style>
