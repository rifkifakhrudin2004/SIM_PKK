@extends('layoutsAnggota.template')

@section('content')
<div class="card card-outline card-primary"></div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Jadwal Kegiatan</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead>
                    <tr>
                        <th>Judul Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Jam Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $jadwal->title }}</td>
                            <td>{{ $jadwal->start }}</td>
                            <td>{{ $jadwal->end }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-body">
            <div class="card-header">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

    <style>
        .fc-prev-button,
        .fc-next-button,
        .fc-button-primary {
            background-color: rgb(0, 0, 0) !important;
            border-color: rgb(0, 0, 0) !important;
        }

        /* Menambahkan garis tepi pada kalender */
        #calendar {
            border: 0.5px solid #cdcccc; /* Warna dan ketebalan garis tepi */
            padding: 10px; /* Padding agar konten tidak menempel pada garis tepi */
            border-radius: 3px; /* Membuat sudut garis tepi sedikit melengkung */
        }
    </style>

    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');

            var jadwals = @json($jadwals); // Mengambil data jadwal dari PHP

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title'
                },
                events: jadwals.map(jadwal => ({
                    title: jadwal.title,
                    start: jadwal.start,
                    end: jadwal.end,
                    backgroundColor: '#008000',
                    textColor: '#FFFFFF',
                    borderColor: '#008000',
                    extendedProps: {
                        location: jadwal.location // Tambahkan properti lokasi
                    }
                })),
                eventClick: function(info) {
                    // Menampilkan detail kegiatan saat event diklik
                    $('#event-title').text(info.event.title);
                    $('#event-dates').text(
                        info.event.start.toLocaleDateString() + ' - ' +
                        (info.event.end ? info.event.end.toLocaleTimeString() : '')
                    );
                    $('#event-location').text(info.event.extendedProps.location);
                    $('#event-details').show();
                }
            });

            calendar.render();
        });
    </script>
@endsection
