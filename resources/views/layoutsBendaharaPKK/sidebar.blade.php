<div class="sidebar"> 
<<<<<<< HEAD
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
                <a href="{{ url('/bendaharaPKK/dashboard') }}" class="nav-link {{ ($activeMenu == 'dashboard')? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-tachometer-alt"></i> 
                    <p>Dashboard</p> 
                </a> 
            </li> 
            <li class="nav-header">Data Pengguna</li> 
            <li class="nav-item">
                <a href="{{ url('/dataBendahara') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Input Data Diri</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/bendaharaPKK/index') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>Data Anggota</p>
                </a>
            </li>
            <li class="nav-item"> 
                <a href="{{ url('/p') }}" class="nav-link {{ ($activeMenu == 'level')? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-layer-group"></i> 
                    <p>Arisan <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
                </a> 
                <!-- Submenu for Arisan -->
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/data-arisan') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Arisan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/jadwal') }}" class="nav-link {{ ($activeMenu == 'jadwals')? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Jadwal</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/pembukuan') }}" class="nav-link {{ ($activeMenu ?? '') == 'pembukuan' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pembukuan</p>
                        </a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item"> 
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'user')? 'active' : '' }}"> 
                    <i class="nav-icon far fa-user"></i> 
                    <p>Simpan Pinjam <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
                </a> 
                <!-- Submenu for Simpan Pinjam -->
                <ul class="nav nav-treeview">
                    {{-- <li class="nav-item">
                        <a href="{{ url('/bendaharaPKK/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data anggota</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ url('/simpanan') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Simpanan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/anggota/index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Acc pinjaman</p>
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
=======
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
              <a href="{{ url('/bendaharaPKK/dashboard') }}" class="nav-link {{ ($activeMenu == 'dashboard')? 'active' : '' }}"> 
                  <i class="nav-icon fas fa-tachometer-alt"></i> 
                  <p>Dashboard</p> 
              </a> 
          </li> 
          <li class="nav-header">Data Pengguna</li> 
          <li class="nav-item"> 
              <a href="{{ url('/p') }}" class="nav-link {{ ($activeMenu == 'level')? 'active' : '' }} "> 
                  <i class="nav-icon fas fa-layer-group"></i> 
                  <p>Arisan <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
              </a> 
              <!-- Submenu for Arisan -->
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/data-arisan') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Data Arisan</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/jadwal') }}" class="nav-link {{ ($activeMenu == 'jadwals')? 
                    'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jadwal</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/kocok') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Kocok</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/history') }}" class="nav-link {{ ($activeMenu ?? '') == 'arisans' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>History Arisan</p>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/pembukuan') }}" class="nav-link {{ ($activeMenu ?? '') == 'pembukuan' ? 'active' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Pembukuan</p>
                      </a>
                  </li>
              </ul>
          </li> 
          <li class="nav-item"> 
              <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'user')? 'active' : '' }}"> 
                  <i class="nav-icon far fa-user"></i> 
                  <p>Simpan Pinjam <i class="fas fa-angle-left right"></i></p> <!-- Icon kanan -->
              </a> 
              <!-- Submenu for Simpan Pinjam -->
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/bendaharaPKK/index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data anggota</p>
                    </a>
                </li>
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

          
>>>>>>> 45ce2edee3210b9f4e85565c7c4a3bfd8b3e338b
            <li class="nav-item"> 
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'user')? 'active' : '' }}"> 
                    <i class="nav-icon far fa-user"></i> 
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
  