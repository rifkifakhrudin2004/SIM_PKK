@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($anggota)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="{{ url('dataAnggota') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('/dataAnggota/'.$anggota->id_anggota) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $anggota->nama_anggota) }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Nomor Telepon</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="notelp_anggota" name="notelp_anggota" value="{{ old('notelp_anggota', $anggota->notelp_anggota) }}" required>
                        @error('notelp_anggota')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Alamat</label>
                    <div class="col-10">
                        <textarea class="form-control" id="alamat_anggota" name="alamat_anggota" rows="3" required>{{ old('alamat_anggota', $anggota->alamat_anggota) }}</textarea>
                        @error('alamat_anggota')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Jumlah Tanggungan</label>
                    <div class="col-10">
                        <select class="form-control" id="jumlah_tanggungan" name="jumlah_tanggungan" required>
                            <option value="">- Pilih Jumlah Tanggungan -</option>
                            <option value="Tidak memiliki tanggungan" {{ old('jumlah_tanggungan', $anggota->jumlah_tanggungan) == 'Tidak memiliki tanggungan' ? 'selected' : '' }}>Tidak memiliki tanggungan</option>
                            <option value="Memiliki 1 tanggungan" {{ old('jumlah_tanggungan', $anggota->jumlah_tanggungan) == 'Memiliki 1 tanggungan' ? 'selected' : '' }}>Memiliki 1 tanggungan</option>
                            <option value="Memiliki 2 tanggungan" {{ old('jumlah_tanggungan', $anggota->jumlah_tanggungan) == 'Memiliki 2 tanggungan' ? 'selected' : '' }}>Memiliki 2 tanggungan</option>
                            <option value="Memiliki 3 tanggungan" {{ old('jumlah_tanggungan', $anggota->jumlah_tanggungan) == 'Memiliki 3 tanggungan' ? 'selected' : '' }}>Memiliki 3 tanggungan</option>
                            <option value="Memiliki lebih dari 3 tanggungan" {{ old('jumlah_tanggungan', $anggota->jumlah_tanggungan) == 'Memiliki lebih dari 3 tanggungan' ? 'selected' : '' }}>Memiliki lebih dari 3 tanggungan</option>
                        </select>
                        @error('jumlah_tanggungan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Status Kesehatan</label>
                    <div class="col-10">
                        <select class="form-control" id="status_kesehatan" name="status_kesehatan" required>
                            <option value="">- Pilih Status Kesehatan -</option>
                            <option value="Sangat sehat, tidak ada biaya kesehatan" {{ old('status_kesehatan', $anggota->status_kesehatan) == 'Sangat sehat, tidak ada biaya kesehatan' ? 'selected' : '' }}>Sangat sehat, tidak ada biaya kesehatan</option>
                            <option value="Sehat, biaya kesehatan sangat rendah" {{ old('status_kesehatan', $anggota->status_kesehatan) == 'Sehat, biaya kesehatan sangat rendah' ? 'selected' : '' }}>Sehat, biaya kesehatan sangat rendah</option>
                            <option value="Sering berobat dengan biaya sedang" {{ old('status_kesehatan', $anggota->status_kesehatan) == 'Sering berobat dengan biaya sedang' ? 'selected' : '' }}>Sering berobat dengan biaya sedang</option>
                            <option value="Sering berobat dengan biaya tinggi" {{ old('status_kesehatan', $anggota->status_kesehatan) == 'Sering berobat dengan biaya tinggi' ? 'selected' : '' }}>Sering berobat dengan biaya tinggi</option>
                            <option value="Sakit parah atau kronis, biaya kesehatan sangat tinggi" {{ old('status_kesehatan', $anggota->status_kesehatan) == 'Sakit parah atau kronis, biaya kesehatan sangat tinggi' ? 'selected' : '' }}>Sakit parah atau kronis, biaya kesehatan sangat tinggi</option>
                        </select>
                        @error('status_kesehatan')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('dataAnggota') }}">Kembali</a>
                    </div>
                </div>
            </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
<!-- Additional CSS -->
@endpush

@push('js')
<!-- Additional JS -->
@endpush
