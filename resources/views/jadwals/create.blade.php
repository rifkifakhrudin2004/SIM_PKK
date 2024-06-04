@extends('layoutsBendaharaPKK.template')

@section('subtitle', 'Tambah Jadwal Kegiatan Arisan')
@section('content_header_title', 'Tambah Jadwal')
@section('content_header_subtitle', 'Kegiatan Arisan')

@section('content')
<div class="card card-outline card-primary"></div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambah Jadwal Kegiatan Arisan
            </div>
            <div class="card-body">
                <form action="{{ route('jadwals.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Kegiatan</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="start">Tanggal Kegiatan</label>
                        <input type="date" name="start" class="form-control" id="start" required>
                    </div>
                    <div class="form-group">
                        <label for="end">Jam Kegiatan</label>
                        <input type="time" name="end" class="form-control" id="end" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
