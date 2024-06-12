@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ url('pinjaman') }}" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Anggota</label>
                <div class="col-10">
                    <select class="form-control" id="id_anggota" name="id_anggota" disabled>
                        <option value="">- Pilih Nama Anggota -</option>
                        @foreach($anggota as $item)

                            <option value="{{ $item->id_anggota }}" {{ old('id_anggota') == $item->id_anggota ? 'selected' : '' }}>{{ $item->nama_anggota }}</option>
                            <option value="{{ $item->id_anggota }}" {{ $item->id_anggota == $id_anggota ? 'selected' : '' }}>
                                {{ $item->nama_anggota }}
                            </option>

                        @endforeach
                    </select>
                    <input type="hidden" name="id_anggota" value="{{ $id_anggota }}">
                    @error('id_anggota')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>            
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Bendahara</label>
                <div class="col-10">
                    <select class="form-control" id="id_bendahara" name="id_bendahara">
                        <option value="">- Pilih Nama Bendahara -</option>
                        @foreach($bendahara as $item)
                            <option value="{{ $item->id_bendahara }}" {{ old('id_bendahara') == $item->id_bendahara ? 'selected' : '' }}>{{ $item->nama_bendahara_pkk }}</option>
                        @endforeach
                    </select>
                    @error('id_bendahara')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Pengajuan</label>
                <div class="col-10">
                    <input type="date" class="form-control" id="tgl_pengajuan" name="tgl_pengajuan" value="{{ old('tgl_pengajuan') }}">
                    @error('tgl_pengajuan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jumlah Pinjaman</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman') }}">
                    @error('jumlah_pinjaman')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Status Pinjaman</label>
                <div class="col-10">
                    <select class="form-control" id="status_pinjaman" name="status_pinjaman">
                        <option value="">- Pilih Status Pinjaman -</option>
                    </select>
                    @error('status_pinjaman')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Status Kesehatan</label>
                <div class="col-10">
                    <select class="form-control" id="status_kesehatan" name="status_kesehatan">
                        <option value="">- Pilih Status Kesehatan -</option>
                    </select>
                    @error('status_kesehatan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Cicilan</label>
                <div class="col-10">
                    <select class="form-control" id="cicilan" name="cicilan">
                        <option value="">- Pilih Cicilan -</option>
                    </select>
                    @error('cicilan')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Lama (bulan)</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="lama" name="lama" value="{{ old('lama') }}">
                    @error('lama')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Bunga(%)</label>
                <div class="col-10">
                    <input type="number" class="form-control" id="bunga" name="bunga" value="10" readonly>
                    @error('bunga')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('pinjaman') }}">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
