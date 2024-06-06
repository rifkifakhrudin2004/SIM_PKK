@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Arisan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $arisan->id_arisan }}</td>
                </tr>
                <tr>
                    <th>Anggota</th>
                    <td>{{ $arisan->anggota->nama_anggota }}</td>
                </tr>
                <tr>
                    <th>Bendahara</th>
                    <td>{{ $arisan->bendahara->nama_bendahara_pkk }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $arisan->tgl_arisan }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $arisan->catatan_arisan }}</td>
                </tr>
                <tr>
                    <th>Setoran</th>
                    <td>{{ $arisan->setoran_arisan }}</td>
                </tr>
            </table>
            <a href="{{ route('arisan.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection