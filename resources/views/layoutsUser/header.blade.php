<?php
// Set zona waktu menjadi Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

if (!function_exists('hari_ini')) {
    // Mendapatkan nama hari dalam bahasa Indonesia
    function hari_ini() {
        $hari = date('D');
        switch ($hari) {
            case 'Sun':
                return 'Minggu';
            case 'Mon':
                return 'Senin';
            case 'Tue':
                return 'Selasa';
            case 'Wed':
                return 'Rabu';
            case 'Thu':
                return 'Kamis';
            case 'Fri':
                return 'Jumat';
            case 'Sat':
                return 'Sabtu';
            default:
                return '';
        }
    }
}

// Mendapatkan tanggal dalam format dd-mm-yyyy
$tanggal = date('d');
$bulan = date('F');
$tahun = date('Y');

// Menerjemahkan nama bulan ke dalam bahasa Indonesia
switch ($bulan) {
    case 'January':
        $bulan = 'Januari';
        break;
    case 'February':
        $bulan = 'Februari';
        break;
    case 'March':
        $bulan = 'Maret';
        break;
    case 'April':
        $bulan = 'April';
        break;
    case 'May':
        $bulan = 'Mei';
        break;
    case 'June':
        $bulan = 'Juni';
        break;
    case 'July':
        $bulan = 'Juli';
        break;
    case 'August':
        $bulan = 'Agustus';
        break;
    case 'September':
        $bulan = 'September';
        break;
    case 'October':
        $bulan = 'Oktober';
        break;
    case 'November':
        $bulan = 'November';
        break;
    case 'December':
        $bulan = 'Desember';
        break;
}

// Membentuk string tanggal lengkap
$tanggal_lengkap = hari_ini() . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;

// Mendapatkan jam dalam format HH:MM:SS
$jam_dan_detik = date('H:i:s');
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../user/dashboard" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <!-- Mengubah link "Contact" untuk membuka WhatsApp -->
            <a href="https://wa.me/+6282245676900?text=Hallo saya mengunjungi website anda!" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li id="tanggal-jam-detik" class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><?= $tanggal_lengkap; ?> | <span id="jam-detik"><?= $jam_dan_detik; ?></span></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Script untuk membuat detik berjalan -->
<script>
    setInterval(updateDetik, 1000);

    function updateDetik() {
        var detikElement = document.getElementById('jam-detik');
        var waktu = new Date();
        var jam = waktu.getHours().toString().padStart(2, '0');
        var menit = waktu.getMinutes().toString().padStart(2, '0');
        var detik = waktu.getSeconds().toString().padStart(2, '0');
        detikElement.textContent = jam + ':' + menit + ':' + detik;
    }

    // Inisialisasi waktu saat pertama kali halaman dimuat
    updateDetik();
</script>
