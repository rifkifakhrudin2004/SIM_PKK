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
        @if(Auth::user()->id_anggota)
            <form method="POST" action="{{ url('pinjaman') }}" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Anggota</label>
                    <div class="col-10">
                        <input type="text" class="form-control" value="{{ Auth::user()->nama }}" readonly>
                    </div>
                </div>
                <input type="hidden" name="id_anggota" value="{{ Auth::user()->id_anggota }}">
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Nama Bendahara</label>
                    <div class="col-10">
                        <select class="form-control" id="id_bendahara" name="id_bendahara">
                            <option value="">- Pilih Nama Bendahara -</option>
                            @foreach($bendahara as $item)
                                <option value="{{ $item->id_bendahara }}" {{ old('id_bendahara') == $item->id_bendahara ? 'selected' : '' }}>
                                    {{ $item->nama_bendahara_pkk }}
                                </option>
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
                            <option value="Tidak memiliki pinjaman" {{ old('status_pinjaman') == 'Tidak memiliki pinjaman' ? 'selected' : '' }}>Tidak memiliki pinjaman</option>
                            <option value="Memiliki pinjaman dengan jumlah kecil dan pembayaran lancar" {{ old('status_pinjaman') == 'Memiliki pinjaman dengan jumlah kecil dan pembayaran lancar' ? 'selected' : '' }}>Memiliki pinjaman dengan jumlah kecil dan pembayaran lancar</option>
                            <option value="Memiliki pinjaman dengan jumlah sedang dan pembayaran lancar" {{ old('status_pinjaman') == 'Memiliki pinjaman dengan jumlah sedang dan pembayaran lancar' ? 'selected' : '' }}>Memiliki pinjaman dengan jumlah sedang dan pembayaran lancar</option>
                            <option value="Memiliki pinjaman dengan jumlah besar dan pembayaran lancar" {{ old('status_pinjaman') == 'Memiliki pinjaman dengan jumlah besar dan pembayaran lancar' ? 'selected' : '' }}>Memiliki pinjaman dengan jumlah besar dan pembayaran lancar</option>
                            <option value="Memiliki pinjaman dengan jumlah besar dan pembayaran bermasalah" {{ old('status_pinjaman') == 'Memiliki pinjaman dengan jumlah besar dan pembayaran bermasalah' ? 'selected' : '' }}>Memiliki pinjaman dengan jumlah besar dan pembayaran bermasalah</option>
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
                            <option value="Sangat sehat, tidak ada biaya kesehatan rutin" {{ old('status_kesehatan') == 'Sangat sehat, tidak ada biaya kesehatan rutin' ? 'selected' : '' }}>Sangat sehat, tidak ada biaya kesehatan rutin</option>
                            <option value="Sehat, dengan biaya kesehatan rutin yang sangat rendah" {{ old('status_kesehatan') == 'Sehat, dengan biaya kesehatan rutin yang sangat rendah' ? 'selected' : '' }}>Sehat, dengan biaya kesehatan rutin yang sangat rendah</option>
                            <option value="Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya sedang" {{ old('status_kesehatan') == 'Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya sedang' ? 'selected' : '' }}>Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya sedang</option>
                            <option value="Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya tinggi" {{ old('status_kesehatan') == 'Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya tinggi' ? 'selected' : '' }}>Memiliki kondisi kesehatan yang memerlukan pengobatan rutin dengan biaya tinggi</option>
                            <option value="Memiliki kondisi kesehatan yang serius atau kronis dengan biaya kesehatan yang sangat tinggi" {{ old('status_kesehatan') == 'Memiliki kondisi kesehatan yang serius atau kronis dengan biaya kesehatan yang sangat tinggi' ? 'selected' : '' }}>Memiliki kondisi kesehatan yang serius atau kronis dengan biaya kesehatan yang sangat tinggi</option>
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
                            <option value="Tidak memiliki cicilan" {{ old('cicilan') == 'Tidak memiliki cicilan' ? 'selected' : '' }}>Tidak memiliki cicilan</option>
                            <option value="Memiliki cicilan dengan jumlah kecil dan proporsi terhadap pendapatan rendah" {{ old('cicilan') == 'Memiliki cicilan dengan jumlah kecil dan proporsi terhadap pendapatan rendah' ? 'selected' : '' }}>Memiliki cicilan dengan jumlah kecil dan proporsi terhadap pendapatan rendah</option>
                            <option value="Memiliki cicilan dengan jumlah sedang dan proporsi terhadap pendapatan sedang" {{ old('cicilan') == 'Memiliki cicilan dengan jumlah sedang dan proporsi terhadap pendapatan sedang' ? 'selected' : '' }}>Memiliki cicilan dengan jumlah sedang dan proporsi terhadap pendapatan sedang</option>
                            <option value="Memiliki cicilan dengan jumlah besar dan proporsi terhadap pendapatan tinggi" {{ old('cicilan') == 'Memiliki cicilan dengan jumlah besar dan proporsi terhadap pendapatan tinggi' ? 'selected' : '' }}>Memiliki cicilan dengan jumlah besar dan proporsi terhadap pendapatan tinggi</option>
                            <option value="Memiliki cicilan yang sangat besar dan proporsi terhadap pendapatan sangat tinggi" {{ old('cicilan') == 'Memiliki cicilan yang sangat besar dan proporsi terhadap pendapatan sangat tinggi' ? 'selected' : '' }}>Memiliki cicilan yang sangat besar dan proporsi terhadap pendapatan sangat tinggi</option>
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
        @else
            <div class="alert alert-warning">
                Maaf, Anda tidak dapat mengajukan pinjaman karena belum terdaftar sebagai anggota.
            </div>
        @endif
    </div>
</div>
@endsection