@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary"></div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Arisan</h3>
    </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>ID </th>
                <th>Anggota</th>
                <th>Bendahara</th>
                <th>Tanggal</th>
                <th>Catatan</th>
                <th>Setoran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arisans as $arisan)
            <tr>
                <td>{{ $arisan->id_arisan }}</td>
                <td>{{ $arisan->anggota->nama_anggota }}</td>
                <td>{{ $arisan->bendahara->nama_bendahara_pkk }}</td>
                <td>{{ $arisan->tgl_arisan }}</td>
                <td>{{ $arisan->catatan_arisan }}</td>
                <td>{{ $arisan->setoran_arisan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
