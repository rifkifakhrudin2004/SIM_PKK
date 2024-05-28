<div class="sidebar"> 
  <!-- SidebarSearch Form --> 
  <div class="form-inline mt-2"> 
    <div class="input-group" data-widget="sidebar-search"> 
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">       <div class="input-group-append"> 
        <button class="btn btn-sidebar"> 
          <i class="fas fa-search fa-fw"></i> 
        </button> 
      </div> 
    </div> 
  </div> 
  <!-- Sidebar Menu --> 
  <nav class="mt-2"> 
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
      <li class="nav-item"> 
        <a href="{{ url('/user/dashboard') }}" class="nav-link  {{ ($activeMenu == 'dashboard')? 
        'active' : '' }} "> 
                  <i class="nav-icon fas fa-tachometer-alt"></i> 
                  <p>Dashboard</p> 
                </a> 
              </li> 
              <li class="nav-header">Data Pengguna</li> 
              <li class="nav-item"> 
                <a href="{{ url('/users') }}" class="nav-link {{ ($activeMenu == 'user')? 
        'active' : '' }} "> 
                  <i class="nav-icon fas fa-layer-group"></i> 
                  <p>History Arisan</p> 
                </a> 
              </li> 
              <li class="nav-item"> 
                <a href="{{ url('/user/konten') }}" class="nav-link {{ ($activeMenu == 'konten')? 
        'active' : '' }}"> 
                  <i class="nav-icon far fa-user"></i> 
                  <p>Upload Konten</p> 
                </a> 
              </li> 
              
              <li class="nav-item"> 
            <a href="{{ route('logout') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a> 
          </li> 
              {{-- <li class="nav-header">Data Barang</li> 
              <li class="nav-item"> 
                <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 
        'kategori')? 'active' : '' }} ">  --}}
                  {{-- <i class="nav-icon far fa-bookmark"></i> 
                  <p>Pembukuan</p> 
                </a> 
              </li> 
              <li class="nav-item"> 
                <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 
        'barang')? 'active' : '' }} ">  --}}
                  {{-- <i class="nav-icon far fa-list-alt"></i> 
                  <p>Data Barang</p> 
                </a> 
              </li> 
              <li class="nav-header">Data Transaksi</li> 
              <li class="nav-item"> 
                <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok')? 
        'active' : '' }} "> 
                  <i class="nav-icon fas fa-cubes"></i> 
                  <p>Stok Barang</p> 
                </a> 
              </li> 
              <li class="nav-item"> 
                <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 
                  'penjualan')? 'active' : '' }} "> 
                            <i class="nav-icon fas fa-cash-register"></i> 
                            <p>Transaksi Penjualan</p>  --}}
                          </a> 
                        </li> 
                      </ul> 
                    </nav> </div>  
                  
        