@extends('layoutsAnggota.template')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h3 class="card-title">Anggota Dashboard</h3>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <div class="icon-box">
                        <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" alt="User Avatar"
                            class="img-fluid rounded-circle" style="max-width: 100px;">
                    </div>
                </div>
                <div class="col-md-10">
                    <h4>NAMA: {{ Auth::user()->nama }}</h4>
                    <p>STATUS: {{ Auth::user()->status }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- KALENDER DAN DENAH -->
    <div class="row">
        <!-- Kalender -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kalender</h3>
                </div>
                <div class="card-body">
                    <div id='dashboard-calendar'></div>
                </div>
            </div>
        </div>

        <!-- Denah -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Denah Kelurahan Tlogomas</h3>
                </div>
                <div class="card-body text-center">
                    <!-- Gambar denah -->
                    <img src="{{ asset('adminlte/dist/img/denahkeltlogomas.jpg') }}" alt="Denah Kelurahan Tlogomas"
                        style="width: 100%; max-width: 800px;">
                </div>
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
            border-color: rgb(4, 0, 9) !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('dashboard-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'lihatKegiatan'
                },
                customButtons: {
                    lihatKegiatan: {
                        text: 'Lihat Kegiatan',
                        click: function() {
                            window.location.href = '/anggota/jadwal';
                        }
                    }
                },
                events: @json($jadwals), // Fetch events from the controller
                eventClick: function(info) {
                    // Handle event click
                    alert('Event: ' + info.event.title + '\n' +
                        'Start: ' + info.event.start.toLocaleString() + '\n' +
                        'End: ' + (info.event.end ? info.event.end.toLocaleString() : 'N/A') +
                        '\n' +
                        'Location: ' + info.event.extendedProps.location);
                }
            });
            calendar.render();
        });
    </script>
@endsection
