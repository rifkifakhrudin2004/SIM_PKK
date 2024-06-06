@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Pembukuan Arisan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $pembukuan->id }}</td>
                </tr>
                <tr>
                    <th>ID Arisan</th>
                    <td>{{ $pembukuan->id_arisan }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $pembukuan->tanggal }}</td>
                </tr>
                <tr>
                    <th>Pemasukan</th>
                    <td>{{ $pembukuan->pemasukan }}</td>
                </tr>
                <tr>
                    <th>Pengeluaran</th>
                    <td>{{ $pembukuan->pengeluaran }}</td>
                </tr>
                <tr>
                    <th>Saldo</th>
                    <td>{{ $pembukuan->saldo }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{ $pembukuan->keterangan }}</td>
                </tr>
            </table>
            <a href="{{ route('pembukuan.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection