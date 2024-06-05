@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('/dataAnggota/create') }}" class="btn btn-primary btn-sm">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if($anggota->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data Diri Anda belum di inputkan.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Jumlah Tanggungan</th>
                        <th>Status Kesehatan</th>
                        <th>Verifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anggota as $data)
                        <tr>
                            <td>{{ $data->nama_anggota }}</td>
                            <td>{{ $data->notelp_anggota }}</td>
                            <td>{{ $data->alamat_anggota }}</td>
                            <td>{{ $data->jumlah_tanggungan }}</td>
                            <td>{{ $data->status_kesehatan }}</td>
                            <td>{{ $data->verifikasi }}</td>
                            <td>
                                <a href="{{ url('/dataAnggota/' . $data->id_anggota) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ url('/dataAnggota/' . $data->id_anggota . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline-block" method="POST" action="{{ url('/dataAnggota/'.$data->id_anggota) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
