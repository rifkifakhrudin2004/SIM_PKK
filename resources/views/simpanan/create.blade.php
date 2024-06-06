@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('simpanan') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Anggota</label>
                <div class="col-10">
                    <select class="form-control" id="id_anggota" name="id_anggota">
                        <option value="">- Pilih Anggota -</option>
                        @foreach($anggota as $item)
                            <option value="{{ $item->id_anggota }}">{{ $item->nama_anggota }}</option>
                        @endforeach
                    </select>
                    @error('id_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Bendahara</label>
                <div class="col-10">
                    <select class="form-control" id="id_bendahara" name="id_bendahara">
                        <option value="">- Pilih Bendahara -</option>
                        @foreach($bendahara as $item)
                            <option value="{{ $item->id_bendahara }}">{{ $item->nama_bendahara_pkk }}</option>
                        @endforeach
                    </select>
                    @error('id_bendahara')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Simpan</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tgl_simpan" name="tgl_simpan" value="{{ old('tgl_simpan') }}">
                    @error('tgl_simpan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jumlah Simpanan</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="jumlah_simpan" name="jumlah_simpan" value="{{ old('jumlah_simpan') }}">
                    @error('jumlah_simpan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-10 offset-2">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('simpanan') }}">Kembali</a>
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
