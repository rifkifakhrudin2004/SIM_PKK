@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="container">
    <h2>Data Arisan</h2>
    <a href="{{ route('arisan.create') }}" class="btn btn-primary">Tambah Baru</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Bendahara</th>
                <th>Tanggal</th>
                <th>Catatan</th>
                <th>Setoran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arisans as $arisan)
            <tr>
                <td>{{ $arisan->id }}</td>
                <td>{{ $arisan->anggota->name }}</td>
                <td>{{ $arisan->bendahara->name }}</td>
                <td>{{ $arisan->tgl_arisan }}</td>
                <td>{{ $arisan->catatan_arisan }}</td>
                <td>{{ $arisan->setoran_arisan }}</td>
                <td>
                    <a href="{{ route('arisan.edit', $arisan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('arisan.destroy', $arisan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
