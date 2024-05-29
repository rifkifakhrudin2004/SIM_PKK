@extends('layoutsAnggota.template')

@section('content')
<div class="container">
    <h1>Pembukuan Arisan</h1>
    <a href="{{ route('pembukuan_arisan.create') }}" class="btn btn-primary">Add New</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Arisan</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo</th>
                <th>Keterangan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembukuans as $pembukuan)
            <tr>
                <td>{{ $pembukuan->id }}</td>
                <td>{{ $pembukuan->id_arisan }}</td>
                <td>{{ $pembukuan->tanggal }}</td>
                <td>{{ $pembukuan->pemasukan }}</td>
                <td>{{ $pembukuan->pengeluaran }}</td>
                <td>{{ $pembukuan->saldo }}</td>
                <td>{{ $pembukuan->keterangan }}</td>
                <td>
                    <a href="{{ route('pembukuan_arisan.edit', $pembukuan->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('pembukuan_arisan.destroy', $pembukuan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection