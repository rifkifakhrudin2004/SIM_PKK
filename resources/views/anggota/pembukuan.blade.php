@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary"></div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pembukuan Arisan</h3>
    </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
        <thead>
            <tr>
                <th>ID Arisan</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Saldo</th>
                <th>Keterangan</th>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection