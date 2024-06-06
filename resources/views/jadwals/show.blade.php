@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Jadwal Kegiatan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $jadwal->id }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $jadwal->title }}</td>
                </tr>
                <tr>
                    <th>Start</th>
                    <td>{{ $jadwal->start }}</td>
                </tr>
                <tr>
                    <th>End</th>
                    <td>{{ $jadwal->end }}</td>
                </tr>
            </table>
            <a href="{{ route('jadwals.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection