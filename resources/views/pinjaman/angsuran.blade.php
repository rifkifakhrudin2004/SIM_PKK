@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                {{ session('success') }}
            </div>
        @endif

        @if($pinjaman->isEmpty())
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data Pinjaman belum diinputkan.
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Jumlah Pinjaman</th>
                        <th>Jumlah Angsuran</th>
                        <th>Sisa Pinjaman</th>
                        <th>Status Pinjaman</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pinjaman as $data)
                        <tr>
                            <td>{{ $data->anggota2->nama_anggota }}</td>
                            <td>{{ $data->jumlah_pinjaman }}</td>
                            <td>
                                @if($data->angsuran)
                                    {{ $data->angsuran->jumlah_angsuran }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($data->angsuran)
                                    {{ $data->angsuran->sisa_pinjaman }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                {{ $data->status }}

                                @if($data->status_persetujuan === 'pending')
                                    <br><span class="badge badge-warning">Menunggu Persetujuan</span>
                                @endif
                            </td>
                            <td>
                                @if($data->status !== 'Lunas')
                                    <form action="{{ url('/bendaharaPKK/b/' . $data->id_pinjam) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Apakah Anda yakin ingin membayar angsuran?')">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="jumlah_setoran">Jumlah Setoran:</label>
                                            <input type="number" class="form-control" name="jumlah_setoran" id="jumlah_setoran" placeholder="Masukkan Jumlah Setoran" value="{{ $data->angsuran ? $data->angsuran->jumlah_angsuran : '1' }}">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm" {{ $data->status_persetujuan === 'pending' ? 'disabled' : '' }}>Bayar</button>
                                    </form>
                                @else
                                    <button class="btn btn-success btn-sm" disabled>Lunas</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection