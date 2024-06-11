@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('dataAnggota') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" value="{{ Auth::user()->nama }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nomor Telepon</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="notelp_anggota" name="notelp_anggota" value="{{ old('notelp_anggota') }}">
                    @error('notelp_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Alamat</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="alamat_anggota" name="alamat_anggota" value="{{ old('alamat_anggota') }}">
                    @error('alamat_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jumlah Tanggungan</label>
                <div class="col-10">
                    <select class="form-control" id="jumlah_tanggungan" name="jumlah_tanggungan">
                        <option value="">- Pilih Jumlah Tanggungan -</option>
                        <option value="Tidak memiliki tanggungan">Tidak memiliki tanggungan</option>
                        <option value="Memiliki 1 tanggungan">Memiliki 1 tanggungan</option>
                        <option value="Memiliki 2 tanggungan">Memiliki 2 tanggungan</option>
                        <option value="Memiliki 3 tanggungan">Memiliki 3 tanggungan</option>
                        <option value="Memiliki lebih dari 3 tanggungan">Memiliki lebih dari 3 tanggungan</option>
                    </select>
                    @error('jumlah_tanggungan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Status Tempat Tinggal</label>
                <div class="col-10">
                    <select class="form-control" id="status_rumah" name="status_rumah">
                        <option value="">- Pilih Status Tempat Tinggal -</option>
                        <option value="Memiliki rumah sendiri tanpa cicilan.">Memiliki rumah sendiri tanpa cicilan.</option>
                        <option value="Memiliki rumah sendiri dengan cicilan kecil.">Memiliki rumah sendiri dengan cicilan kecil.</option>
                        <option value="Menyewa rumah dengan biaya sewa yang terjangkau.">Menyewa rumah dengan biaya sewa yang terjangkau.</option>
                        <option value="Menyewa rumah dengan biaya sewa yang tinggi.">Menyewa rumah dengan biaya sewa yang tinggi.</option>
                        <option value="Menyewa rumah dengan biaya sewa yang sangat tinggi atau tinggal dengan kondisi tempat tinggal yang tidak stabil.">Menyewa rumah dengan biaya sewa yang sangat tinggi atau tinggal dengan kondisi tempat tinggal yang tidak stabil.</option>
                    </select>
                    @error('status_rumah')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('dataAnggota') }}">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
<!-- Additional CSS -->
@endpush

@push('js')
<!-- Additional JS -->
@endpush
