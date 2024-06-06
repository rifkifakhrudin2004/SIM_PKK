@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($bendahara)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
            Data bendahara yang Anda cari tidak ditemukan.
        </div>
        @else
        <table class="table table-bordered table-striped table-hover table-sm">
            <tr>
                <th>ID</th>
                <td>{{ $bendahara->id_bendahara }}</td>
            </tr>
            <tr>
                <th>Nama Bendahara</th>
                <td>{{ $bendahara->nama_bendahara_pkk }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $bendahara->alamat_bendahara_pkk }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>{{ $bendahara->notelp_bendahara_pkk }}</td>
            </tr>
        </table>
        @endempty
        <a href="{{ url('dataBendahara') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
<!-- Additional CSS -->
@endpush

@push('js')
<!-- Additional JS -->
@endpush
