@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">SPK/Penilaian</h3>
    </div>
    <div class="card-header">
        <h2 class="h2 font-weight-semibold">Data Penilaian</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="custom-thead">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Nama</th>
                        @foreach ($kriterias as $krit)
                            <th class="text-center">{{ $krit->kode }}</th>
                        @endforeach
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alternatifs as $index => $alt)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $alt->kode }}</td>
                            <td class="text-center">{{ $alt->name }}</td>
                            @php
                                $nilai = [];
                                foreach ($kriterias as $k) {
                                    $ks = $alt->kriteria->find($k->id);
                                    $nilai[] = $ks ? $ks->pivot->nilai : 0;
                                }
                            @endphp
                            @foreach ($nilai as $n)
                                <td class="text-center">{{ $n }}</td>
                            @endforeach
                            <td class="text-center">
                                <a href="{{ route('penilaian.edit', $alt->id) }}" class="btn btn-primary">Input</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $kriterias->count() + 4 }}" class="text-center">Belum ada data alternatif untuk dinilai.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<style>
    .custom-thead {
        background-color: #010050; /* Ubah kode warna sesuai kebutuhan */
        color: white;
		border-radius: 10px; /* Sesuaikan angka radius dengan keinginan Anda */
    	overflow: hidden; /* Ubah warna teks jika diperlukan */
    }
	.table {
    border-radius: 10px; /* Sesuaikan angka radius dengan keinginan Anda */
    overflow: hidden;
	box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
	}
</style>
