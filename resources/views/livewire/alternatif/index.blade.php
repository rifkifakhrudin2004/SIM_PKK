@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Alternatif</h3>
    </div>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h2 font-weight-semibold">Data Alternatif</h2>
                <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Alternatif</a>
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
                setTimeout(function(){
                    document.querySelectorAll('.alert').forEach(function(alert) {
                        alert.remove();
                    });
                }, 2500); 
            </script>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="custom-thead">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Alternatif</th>
                            <th class="text-center">Nama Alternatif</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($alternatifs as $index => $alt)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $alt->kode }}</td>
                                <td class="text-center">{{ $alt->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">Data alternatif masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .custom-thead {
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