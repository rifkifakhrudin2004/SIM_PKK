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
                    <th>Nama Anggota</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Jumlah Pinjaman</th>

                    <th>Status Pinjaman</th>
                    <th>Status Kesehatan</th>
                    <th>Cicilan</th>
                    <th>Sub Kriteria</th>
                    <th>Bunga Pinjaman</th>
                    <th>Lama Pinjaman</th>
                    <th>Angsuran</th>
                    {{-- <th>Cicilan</th> --}}
                    {{-- <th>Verifikasi</th> --}}
                    <th>Aksi</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($pinjaman as $data)
                    <tr>
                        <td>{{ $data->anggota2->nama_anggota }}</td>
                        <td>{{ $data->tgl_pengajuan }}</td>
                        <td>{{ $data->jumlah_pinjaman }}</td>

                        <td>{{ $data->status_pinjaman }}</td>
                        <td>{{ $data->status_kesehatan }}</td>
                        <td>{{ $data->cicilan }}</td>
                        <td>
                            @foreach($data->anggota2->subKriterias as $subKriteria)
                                {{ $subKriteria->nama_sub_kriteria }}: {{ $subKriteria->nilai }}<br>
                            @endforeach
                        </td>
                        <td>
                            @if($data->status_persetujuan == 'pending')
                                <form method="POST" action="{{ url('/anggota/index/' . $data->id_pinjam) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status_persetujuan" value="diterima" class="btn btn-success btn-sm">Diterima</button>
                                    <button type="submit" name="status_persetujuan" value="ditolak" class="btn btn-danger btn-sm">Ditolak</button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>{{ ucfirst($data->status_persetujuan) }}</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

                        <td>{{ $data->bunga }}</td>
                        <td>{{ $data->lama }}</td>
                        <td>{{ $data->angsuran->jumlah_angsuran}}</td>
                        {{-- <td>{{ $data->cicilan }}</td> --}}
                        {{-- <td>{{ ucfirst($data->verifikasi) }}</td> <!-- Tampilkan status verifikasi --> --}}
                        <td>
                            @if($data->status_persetujuan == 'pending')
                            <form method="POST" action="{{ url('/bendaharaPKK/index/' . $data->id_pinjam) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" name="status_persetujuan" value="diterima" class="btn btn-success btn-sm">Diterima</button>
                                <button type="submit" name="status_persetujuan" value="ditolak" class="btn btn-danger btn-sm">Ditolak</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>{{ ucfirst($data->status_persetujuan) }}</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
