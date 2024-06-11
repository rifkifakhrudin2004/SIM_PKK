@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('dataBendahara') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Bendahara</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="nama_bendahara_pkk" name="nama_bendahara_pkk" value="{{ Auth::user()->nama }}" readonly>
                    @error('nama_bendahara_pkk')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Alamat</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="alamat_bendahara_pkk" name="alamat_bendahara_pkk" value="{{ old('alamat_bendahara_pkk') }}">
                    @error('alamat_bendahara_pkk')
                        <small class="form-text text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nomor Telepon</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="notelp_bendahara_pkk" name="notelp_bendahara_pkk" value="{{ old('notelp_bendahara_pkk') }}">
                    @error('notelp_bendahara_pkk')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('dataBendahara') }}">Kembali</a>
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
