@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Data Arisan</h3>
        <div class="card-tools">
            <a href="{{ route('arisan.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
        @endif
        <table class="table table-bordered table-striped table-hover table-sm" id="table_arisan">
        <thead>
            <tr>
                <th>ID</th>
                <th>Anggota</th>
                <th>Bendahara</th>
                <th>Tanggal Arisan</th>
                <th>Setoran Arisan</th>
                <th>Catatan Arisan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arisans as $arisan)
                <tr>
                    <td>{{ $arisan->id_arisan }}</td>
                    <td>{{ $arisan->anggota->nama_anggota }}</td>
                    <td>{{ $arisan->bendahara->nama_bendahara_pkk }}</td>
                    <td>{{ $arisan->tgl_arisan }}</td>
                    <td>{{ $arisan->setoran_arisan }}</td>
                    <td>{{ $arisan->catatan_arisan }}</td>
                    <td>
                        <a href="{{ route('arisan.show', $arisan->id_arisan) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('arisan.edit', $arisan->id_arisan) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('arisan.destroy', $arisan->id_arisan) }}" method="POST" style="display:inline-block;">
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
