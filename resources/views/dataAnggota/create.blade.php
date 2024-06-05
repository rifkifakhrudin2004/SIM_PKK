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
                <label class="col-2 control-label col-form-label">Status Kesehatan</label>
                <div class="col-10">
                    <select class="form-control" id="status_kesehatan" name="status_kesehatan">
                        <option value="">- Pilih Status Kesehatan -</option>
                        <option value="Sangat sehat, tidak ada biaya kesehatan.">Sangat sehat, tidak ada biaya kesehatan.</option>
                        <option value="Sehat, biaya kesehatan sangat rendah.">Sehat, biaya kesehatan sangat rendah.</option>
                        <option value="Sering berobat dengan biaya sedang">Sering berobat dengan biaya sedang.</option>
                        <option value="Sering berobat dengan biaya tinggi">Sering berobat dengan biaya tinggi.</option>
                        <option value="Sakit parah atau kronis, biaya kesehatan sangat tinggi">Sakit parah atau kronis, biaya kesehatan sangat tinggi.</option>
                    </select>
                    @error('status_kesehatan')
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
