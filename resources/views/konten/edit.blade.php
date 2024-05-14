@extends('layouts.app')

@section('subtitle', 'Edit Konten')
@section('content_header_title', 'Edit Konten')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit Konten
        </div>
        <div class="card-body">
            <form action="{{ route('konten.update', $konten->id_konten) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_admin">Admin</label>
                    <select name="id_admin" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $konten->id_admin ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_konten">Tanggal Konten</label>
                    <input type="date" name="tgl_konten" class="form-control" value="{{ $konten->tgl_konten }}" required>
                </div>
                <div class="form-group">
                    <label for="foto_konten">Foto Konten</label>
                    <input type="file" name="foto_konten" class="form-control">
                    <img src="{{ Storage::url($konten->foto_konten) }}" alt="foto_konten" width="100">
                </div>
                <div class="form-group">
                    <label for="deskripsi_konten">Deskripsi Konten</label>
                    <textarea name="deskripsi_konten" class="form-control" required>{{ $konten->deskripsi_konten }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
