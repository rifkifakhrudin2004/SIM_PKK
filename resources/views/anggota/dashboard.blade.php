@extends('layoutsAnggota.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Anggota Dashboard</h3>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-2 text-center">
                    <div class="icon-box">
                        <i class="fas fa-user-circle fa-5x text-primary"></i> <!-- Mengubah icon login -->
                    </div>
                </div>
                <div class="col-md-9">
                    <h4>NAMA : {{ Auth::user()->nama }}</h4>
<<<<<<< HEAD
                    <p>STATUS : {{ Auth::user()->status }}</p>
=======
                    <p>STATUS : {{ Auth::user()->status }}</p> <!-- Mengubah tata letak teks -->
>>>>>>> 5c50a77a368939c56a905b8adc7dd50367bf4c0a
                </div>
            </div>
        </div>
    </div>

    <!-- Kalender dan Denah -->
    <div class="row">
        <div class="col-md-6">
            <!-- Kalender -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kalender</h3>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Denah -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Denah Kelurahan Tlogomas</h3>
                </div>
                <div class="card-body">
                    <!-- Gambar denah -->
                    <img src="{{ asset('adminlte/dist/img/denahkeltlogomas.jpg') }}" alt="Denah Kelurahan Tlogomas"
                        style="width: 100%">
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
            /* Warna aqua untuk tombol kiri, kanan, dan 'Lihat Kegiatan' */
            border-color: rgb(4, 0, 9) !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next', // Hanya menampilkan tombol prev dan next
                    center: 'title',
                    right: 'lihatKegiatan' // Menambahkan custom button 'lihatKegiatan'
                },
                customButtons: {
                    lihatKegiatan: {
                        text: 'Lihat Kegiatan',
                        click: function() {
                            // Redirect ke halaman jadwal
                            window.location.href = '/anggota/jadwal';
                        }
                    }
                },
                events: [{
                        title: 'Kegiatan PKK',
                        start: '2024-05-01',
                        backgroundColor: '#008000', // Warna latar belakang event
                        textColor: '#FFFFFF', // Warna teks event
                        borderColor: '#008000' // Warna border event
                    },
                    // Add more events here if needed
                ]
            });

            calendar.render();
        });
    </script>
@endsection