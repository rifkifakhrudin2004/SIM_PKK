@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Simpanan</h3>
    </div>
    <div class="card-body">
        <p>Nama Anggota: {{ $simpan->anggota->nama_anggota }}</p>
        <p>Nama Bendahara: {{ $simpan->bendahara->nama_bendahara_pkk }}</p>
        <p>Tanggal Simpan: {{ $simpan->tgl_simpan }}</p>
        <p>Jumlah Simpan: {{ $simpan->jumlah_simpan }}</p>

        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal Setoran</th>
                    <th>Jumlah Setoran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($simpan->setorans as $setoran)
                    <tr>
                        <td>{{ $setoran->tgl_setoran }}</td>
                        <td>{{ $setoran->jumlah_setoran }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-sm btn-default mt-3" href="{{ url('simpanan') }}">Kembali</a>
    </div>
</div>
@endsection