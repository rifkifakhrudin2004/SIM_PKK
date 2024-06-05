@extends('layoutsBendaharaPKK.template')

@section('subtitle', 'Jadwal Kegiatan Arisan')
@section('content_header_title', 'Jadwal')
@section('content_header_subtitle', 'Kegiatan Arisan')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Jadwal Kegiatan Arisan
                <a href="{{ route('jadwals.create') }}" class="btn btn-primary float-right">Tambah Kegiatan</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Jam Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                            <tr>
                                <td>{{ $jadwal->title }}</td>
                                <td>{{ $jadwal->start }}</td>
                                <td>{{ $jadwal->end }}</td>
                                <td>
                                    <a href="{{ route('jadwals.edit', $jadwal->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('jadwals.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var jadwals = @json($jadwals);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: jadwals.map(jadwal => ({
                    title: jadwal.title,
                    start: jadwal.start,
                    end: jadwal.end
                }))
            });

            calendar.render();
        });
    </script>
@endpush
