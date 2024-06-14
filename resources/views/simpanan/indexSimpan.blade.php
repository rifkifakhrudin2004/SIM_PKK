@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            {{-- <a href="{{ url('/simpanan/create') }}" class="btn btn-primary btn-sm">Add Simpanan</a> --}}
        </div>
    </div>
    <div class="card-body">
        @if($simpanan->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Anda Tidak Memiliki Tabungan.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Tanggal Simpan</th>
                        <th>Jumlah Simpanan</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($simpanan as $data)
                        <tr>
                            <td>{{ $data->anggota->nama_anggota }}</td>
                            <td>{{ $data->tgl_simpan }}</td>
                            <td>{{ $data->jumlah_simpan }}</td>
                            {{-- <td>{{ $data->setorans->sum('jumlah_setoran') }}</td> <!-- Menampilkan total setoran --> --}}
                            {{-- <td> --}}
                                {{-- <a href="{{ url('/simpanan/' . $data->id_simpan . '/details') }}" class="btn btn-info btn-sm">Detail Angsuran</a> --}}
                                {{-- <a href="{{ url('/simpanan/' . $data->id_simpan . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form class="d-inline-block" method="POST" action="{{ url('/simpanan/' . $data->id_simpan) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data ini?');">Hapus</button> --}}
                                {{-- </form>
                            </td>  --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection