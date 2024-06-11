@extends('layoutsBendaharaPKK.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($bendahara)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
            <a href="{{ url('dataBendahara') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('/dataBendahara/'.$bendahara->id_bendahara) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}
                <div class="form-group row">
                    <label class="col-2 col-form-label">Nama Bendahara</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama_bendahara_pkk" name="nama_bendahara_pkk" value="{{ old('nama_bendahara_pkk', $bendahara->nama_bendahara_pkk) }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Nomor Telepon</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="notelp_bendahara_pkk" name="notelp_bendahara_pkk" value="{{ old('notelp_bendahara_pkk', $bendahara->notelp_bendahara_pkk) }}" required>
                        @error('notelp_bendahara_pkk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Alamat</label>
                    <div class="col-10">
                        <textarea class="form-control" id="alamat_bendahara_pkk" name="alamat_bendahara_pkk" rows="3" required>{{ old('alamat_bendahara_pkk', $bendahara->alamat_bendahara_pkk) }}</textarea>
                        @error('alamat_bendahara_pkk')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('/dataBendahara') }}">Kembali</a>
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
