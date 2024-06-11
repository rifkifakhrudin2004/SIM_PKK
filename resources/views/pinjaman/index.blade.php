@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('/pinjaman/create') }}" class="btn btn-primary btn-sm">Tambah Pinjaman</a>
        </div>
    </div>
    <div class="card-body">
        @if($pinjamanTampil->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data Pinjaman belum diinputkan.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Nama Bendahara</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Jumlah Angsuran</th>
                        <th>Status Persetujuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pinjamanTampil as $data)
                        <tr>
                            <td>{{ $data->anggota2->nama_anggota }}</td>
                            <td>{{ $data->bendahara2->nama_bendahara_pkk }}</td>
                            <td>{{ $data->jumlah_pinjaman }}</td>
                            <td>
                                @if($data->angsuran)
                                    {{ $data->angsuran->jumlah_angsuran }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $data->status_persetujuan }}</td>
                            <td>
                                <a href="{{ url('/pinjaman/' . $data->id_pinjam) }}" class="btn btn-info btn-sm">Detail</a>
                                <form class="d-inline-block" method="POST" action="{{ url('/pinjaman/' . $data->id_pinjam) }}">
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
