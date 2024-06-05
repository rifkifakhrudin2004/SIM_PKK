@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Pembukuan Arisan</h3>
        <div class="card-tools">
            <a href="{{ route('pembukuan.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_pembukuan">
        <thead>
            <tr>
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
                    <td>{{ $pembukuan->id_arisan }}</td>
                    <td>{{ $pembukuan->tanggal }}</td>
                    <td>{{ $pembukuan->pemasukan }}</td>
                    <td>{{ $pembukuan->pengeluaran }}</td>
                    <td>{{ $pembukuan->saldo }}</td>
                    <td>{{ $pembukuan->keterangan }}</td>
                    <td>
                        <a href="{{ route('pembukuan.edit', $pembukuan->id_pembukuan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pembukuan.destroy', $pembukuan->id_pembukuan) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection