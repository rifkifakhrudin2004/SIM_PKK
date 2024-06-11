@extends('layoutsAnggota.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('pinjaman') }}" class="btn btn-default btn-sm">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 20%;">ID pinjam</th>
                <td>{{ $pinjam->id_pinjam }}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Nama Anggota</th>
                <td>{{ $pinjam->anggota2->nama_anggota }}</td>
            </tr>
            <tr>
                <th>Nama Bendahara</th>
                <td>{{ $pinjam->bendahara2->nama_bendahara_pkk }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengajuan</th>
                <td>{{ $pinjam->tgl_pengajuan }}</td>
            </tr>
            <tr>
                <th>Jumlah Pinjaman</th>
                <td>{{ $pinjam->jumlah_pinjaman }}</td>
            </tr>
            <tr>
                <th>status Pinjaman</th>
                <td>{{ $pinjam->status_pinjaman }}</td>
            </tr>
            <tr>
                <th>Status Kesehatan</th>
                <td>{{ $pinjam->status_kesehatan }}</td>
            </tr>
            <tr>
                <th>Cicilan</th>
                <td>{{ $pinjam->cicilan }}</td>
            </tr>
            <tr>
                <th>Status Persetujuan</th>
                <td>{{ $pinjam->status_persetujuan }}</td>
            </tr>
            <tr>
                <th>Lama Angsuran |bulan|</th>
                <td>{{ $pinjam->lama }}</td>
            </tr>
            <tr>
                <th>Bunga |persen|</th>
                <td>{{ $pinjam->bunga }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection
