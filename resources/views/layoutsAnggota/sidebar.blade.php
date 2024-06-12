<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/anggota/dashboard') }}" class="nav-link {{ ($activeMenu ?? '') == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/dataAnggota') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-edit"></i>
                    <p>Input Data Diri</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/p') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-piggy-bank"></i>
                    <p>Arisan <i class="fas fa-angle-left right"></i></p>
                </a>
                
                <!-- Submenu for Arisan -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/anggota/data-arisan') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Arisan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/anggota/jadwal') }}" class="nav-link {{ ($activeMenu ?? '') == 'jadwal' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/anggota/history') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>History Arisan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/anggota/pembukuan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembukuan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('/p') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-coins"></i>
                    <p>Simpan Pinjam <i class="fas fa-angle-left right"></i></p>
                </a>
                <!-- Submenu for Simpan Pinjam -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/simpan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Status Tabungan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pinjaman') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ajukan Peminjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pembukuan-pinjam') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembukuan</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link {{ ($activeMenu ?? '') == 'penjualan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
