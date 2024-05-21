<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/anggota/dashboard') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/p') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>Arisan <i class="fas fa-angle-left right"></i></p>
                </a>
                <!-- Submenu for Arisan -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/data-arisan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Arisan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/jadwal') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/pembukuan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembukuan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ url('/p') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Simpan PInjam <i class="fas fa-angle-left right"></i></p>
                </a>
                <!-- Submenu for Simpan Pinjam -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/menabung') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Menabung</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/meminjam') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Meminjam</p>
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
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'penjualan' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
