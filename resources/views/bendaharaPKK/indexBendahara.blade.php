@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Jumlah Tanggungan</th>
                    <th>Status Rumah</th>
                    {{-- <th>Verifikasi</th> --}}
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
                        <td>{{ $data->status_rumah }}</td>
                        {{-- <td>{{ ucfirst($data->verifikasi) }}</td> <!-- Tampilkan status verifikasi --> --}}
                        <td>
                            @if($data->verifikasi == 'pending')
                                <form method="POST" action="{{ url('/bendaharaPKK/index2/' . $data->id_anggota) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="verifikasi" value="diterima" class="btn btn-success btn-sm">Diterima</button>
                                    <button type="submit" name="verifikasi" value="ditolak" class="btn btn-danger btn-sm">Ditolak</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>{{ ucfirst($data->verifikasi) }}</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
