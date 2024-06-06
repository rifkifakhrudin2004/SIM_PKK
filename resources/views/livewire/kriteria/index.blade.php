

@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Kriteria</h3>
    </div>
    <div class="mt-6 mx-6">
		{{-- tabel data kriteria --}}
		<div class="container mx-auto px-4 sm:px-8">
			<div class="py-8">
				<div class="d-flex justify-content-between align-items-center mb-4">
					<h2 class="h2 font-weight-semibold">Data Kriteria</h2>
					<a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
				</div>
				@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if(session('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif
            <script>
                // Function to remove notification after a few seconds
                setTimeout(function(){
                    document.querySelectorAll('.alert').forEach(function(alert) {
                        alert.remove();
                    });
                }, 2500); // Adjust the time (in milliseconds) as needed
            </script>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead class="custom-thead">
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Kode Kriteria</th>
								<th class="text-center">Nama Kriteria</th>
								<th class="text-center">Jenis Kriteria</th>
								<th class="text-center">Sub Kriteria</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($kriterias as $index => $krit)
								<tr>
									<td class="text-center">{{ $index + 1 }}</td>
									<td class="text-center">{{ $krit->kode }}</td>
									<td class="text-center">{{ $krit->name }}</td>
									<td class="text-center">{{ $krit->type ? 'Benefit' : 'Cost' }}</td>
									<td class="text-center">
										<a href="{{ route('subkriteria.create', $krit->id) }}" class="btn btn-sm btn-secondary">Tambah</a>
									</td>
									<td class="text-center">
										<div class="d-flex justify-content-center align-items-center gap-2">
											<a href="{{ route('kriteria.edit', $krit->id) }}" class="btn btn-sm btn-warning">Ubah</a>
											<form action="{{ route('kriteria.destroy', $krit->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?');">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
											</form>
										</div>
									</td>
								</tr>
							@empty
								<tr>
									<td class="text-center" colspan="6">Data kriteria masih kosong.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
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