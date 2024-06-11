@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Simpanan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('/simpanan/'.$simpan->id_simpan) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="id_anggota" class="col-md-4 col-form-label text-md-right">ID Anggota</label>

                            <div class="col-md-6">
                                <select id="id_anggota" class="form-control @error('id_anggota') is-invalid @enderror" name="id_anggota" required autofocus>
                                    @foreach($anggota as $item)
                                        <option value="{{ $item->id_anggota }}" {{ $item->id_anggota == $simpan->id_anggota ? 'selected' : '' }}>{{ $item->id_anggota }}</option>
                                    @endforeach
                                </select>

                                @error('id_anggota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_simpan" class="col-md-4 col-form-label text-md-right">Tanggal Simpan</label>

                            <div class="col-md-6">
                                <input id="tgl_simpan" type="date" class="form-control @error('tgl_simpan') is-invalid @enderror" name="tgl_simpan" value="{{ $simpan->tgl_simpan }}" required>

                                @error('tgl_simpan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah_simpan" class="col-md-4 col-form-label text-md-right">Jumlah Simpan</label>

                            <div class="col-md-6">
                                <input id="jumlah_simpan" type="number" class="form-control @error('jumlah_simpan') is-invalid @enderror" name="jumlah_simpan" value="{{ $simpan->jumlah_simpan }}" required>

                                @error('jumlah_simpan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Simpanan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
