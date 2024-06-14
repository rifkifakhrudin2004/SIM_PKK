@php
    $activeMenu = ''; // Define $activeMenu variable with a default value
@endphp

<div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/bendaharaPKK/dashboard') }}"
                    class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-header">Data Pengguna</li>
            

            <li class="nav-item">
                <a href="{{ url('/dataBendahara') }}" class="nav-link {{ $activeMenu == 'konten' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-edit"></i>
                    <p>Input Data Diri</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/bendaharaPKK/index2') }}"
                    class="nav-link {{ $activeMenu == 'konten' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data Anggota</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/BendaharaPKK') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-piggy-bank"></i>
                    <p>Arisan <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
                </a>
                <!-- Submenu for Arisan -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/data-arisan') }}"
                            class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Arisan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/jadwal') }}"
                            class="nav-link {{ $activeMenu == 'jadwals' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/kocok') }}"
                            class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kocok</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/history') }}"
                            class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>History Arisan</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-coins"></i>
                    <p>Simpan Pinjam <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
                </a>
                <!-- Submenu for Simpan Pinjam -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/simpanan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tabungan Anggota</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Acc Peminjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/index3') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Bayar Angsuran</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-chart-bar"></i>
                    <p>Laporan SPK<i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
                </a>
                <!-- Submenu for Laporan SPK -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/kriteria') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Kriteria</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/alternatif') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alternatif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/penilaian') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penilaian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/perhitungan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perhitungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/ranking') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ranking</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
