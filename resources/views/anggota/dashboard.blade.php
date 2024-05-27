@extends('layoutsAnggota.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Anggota Dashboard</h3>
    </div>
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
                <div class="icon-box">
                    <i class="fas fa-user fa-5x"></i>
                </div>
            </div>
            <div class="col-md-9">
                <h4>NAMA : Agung Rizky</h4>
                <p>ALAMAT : JL.Venus </p>
            </div>
        </div>
    </div>

    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <!-- FullCalendar JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>

    <style>
        .fc-prev-button, .fc-next-button, .fc-button-primary {
            background-color: rebeccapurple !important; /* Warna aqua untuk tombol kiri, kanan, dan 'Lihat Kegiatan' */
            border-color: rebeccapurple !important;
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
                            window.location.href = '/jadwal';
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
