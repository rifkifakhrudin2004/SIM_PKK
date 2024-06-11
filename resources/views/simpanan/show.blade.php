@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('simpanan') }}" class="btn btn-default btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%;">Nama Anggota</th>
                <td>{{ $simpan->anggota->nama_anggota }}</td>
            </tr>
            <tr>
                <th>Nama Bendahara</th>
                <td>{{ $simpan->bendahara->nama_bendahara_pkk }}</td>
            </tr>
            <tr>
                <th>Tanggal Simpan</th>
                <td>{{ $simpan->tgl_simpan }}</td>
            </tr>
            <tr>
                <th>Jumlah Simpanan</th>
                <td>{{ $simpan->jumlah_simpan }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
