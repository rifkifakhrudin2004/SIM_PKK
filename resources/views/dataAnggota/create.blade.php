@extends('layoutsBendaharaPKK.template')

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
                <label class="col-1 control-label col-form-label">Nama Anggota</label>
                <div class="col-11">
                    <select class="form-control" id="nama_anggota" name="nama_anggota" required>
                        <option value="">- Pilih Nama -</option>
                        @foreach($users as $user)
                            <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                        @endforeach
                    </select>
                    @error('nama_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Nomor Telepon</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="notelp_anggota" name="notelp_anggota" value="{{ old('notelp_anggota') }}">
                    @error('notelp_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Alamat</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="alamat_anggota" name="alamat_anggota" value="{{ old('alamat_anggota') }}">
                    @error('alamat_anggota')
                        <small class="form-text text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('anggota') }}">Kembali</a>
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
