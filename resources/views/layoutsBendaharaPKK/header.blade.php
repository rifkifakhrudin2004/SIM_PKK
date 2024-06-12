<?php
// Set zona waktu menjadi Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

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
$jam = date('H:i:s');

// Tambahkan detik
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
            <a href="../bendaharaPKK/dashboard" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <!-- Mengubah link "Contact" untuk membuka WhatsApp -->
            <a href="https://wa.me/+6282245676900?text=Hallo saya mengunjungi website anda!" class="nav-link">Contact</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li id="tanggal-jam-detik" class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link"><?= $tanggal_lengkap; ?> | <span id="jam-detik"><?= $jam_dan_detik; ?></span></a>
        </li>
        <li class="nav-link">|</li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Anda login sebagai {{ Auth::user()->nama }}</a>
        </li>
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a> --}}
          {{-- <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li> --}}
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Script untuk membuat detik berjalan -->
<script>
    setInterval(updateDetik, 1000);

    function updateDetik() {
        var detikElement = document.getElementById('jam-detik');
        var waktu = new Date();
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();
        var detik = waktu.getSeconds();
        // Tambahkan angka 0 di depan jika kurang dari 10
        detik = (detik < 10 ? '0' : '') + detik;
        detikElement.textContent = jam + ':' + menit + ':' + detik;
    }
</script>