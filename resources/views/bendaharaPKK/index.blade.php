@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a href="{{ url('/dataBendahara/create') }}" class="btn btn-primary btn-sm">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if($bendaharas->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data bendahara PKK belum diinputkan.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bendaharas as $bendahara)
                        <tr>
                            <td>{{ $bendahara->nama_bendahara_pkk }}</td>
                            <td>{{ $bendahara->alamat_bendahara_pkk }}</td>
                            <td>{{ $bendahara->notelp_bendahara_pkk }}</td>
                            <td>
                                <a href="{{ url('/dataBendahara/' . $bendahara->id_bendahara) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ url('/dataBendahara/' . $bendahara->id_bendahara . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline-block" method="POST" action="{{ url('/dataBendahara/' . $bendahara->id_bendahara) }}">
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
