@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Kriteria/SubKriteria</h3>
    </div>
    <div>
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

        <div class="mt-6 mx-6">
            <form action="{{ route('subkriteria.store') }}" method="POST">
                @csrf
                <input type="hidden" name="kriteria_id" value="{{ $kriteria->id }}">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambahkan SubKriteria untuk Kriteria {{ $kriteria->name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama SubKriteria:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot SubKriteria:</label>
                            <input type="number" class="form-control" id="bobot" name="bobot" required>
                            @error('bobot') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-6 mx-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Sub Kriteria</h3>
                </div>
                <div class="card-body">
                    @if (!$kriteria->subkriteria->count())
                        Belum ada data sub kriteria.
                    @else
                        <table class="table table-bordered">
                            <thead class="custom-thead">
                                <tr>
                                    <th class="text-center">Nama Subkriteria</th>
                                    <th class="text-center">Bobot</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriteria->subkriteria as $sub)
                                    <tr>
                                        <td class="text-center">{{ $sub->name }}</td>
                                        <td class="text-center">{{ $sub->bobot }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('subkriteria.edit', $sub->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('subkriteria.delete', $sub->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
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
