@extends('layoutsBendaharaPKK.template')

@section('subtitle', 'Edit Jadwal Kegiatan Arisan')
@section('content_header_title', 'Edit Jadwal')
@section('content_header_subtitle', 'Kegiatan Arisan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Edit Jadwal Kegiatan Arisan
            </div>
            <div class="card-body">
                <form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Judul Kegiatan</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $jadwal->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="start">Tanggal Kegiatan</label>
                        <input type="date" name="start" class="form-control" id="start" value="{{ $jadwal->start }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end">Jam Kegiatan</label>
                        <input type="time" name="end" class="form-control" id="end" value="{{ $jadwal->end }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
