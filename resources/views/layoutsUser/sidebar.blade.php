<div class="sidebar"> 
  <!-- Sidebar Menu --> 
  <nav class="mt-2"> 
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
      <li class="nav-item"> 
        <a href="{{ url('/adminPKK') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}"> 
          <i class="nav-icon fas fa-tachometer-alt"></i> 
          <p>Dashboard</p> 
        </a> 
      </li> 
      <li class="nav-header">Data Pengguna</li> 
      <li class="nav-item"> 
        <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'users') ? 'active' : '' }}"> 
          <i class="nav-icon fas fa-layer-group"></i> 
          <p>Kelola Pengguna</p> 
        </a> 
      </li> 
      {{-- <li class="nav-item"> 
        <a href="{{ url('/user/konten') }}" class="nav-link {{ ($activeMenu == 'konten') ? 'active' : '' }}"> 
          <i class="nav-icon far fa-user"></i> 
          <p>Validasi Konten</p> 
        </a> 
      </li>  --}}
      <!-- Uncomment and complete the following block if needed
      <li class="nav-header">Pembukuan</li>
      <li class="nav-item"> 
        <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}"> 
          <i class="nav-icon far fa-bookmark"></i> 
          <p>Pembukuan</p> 
        </a> 
      </li> 
      <li class="nav-item"> 
        <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'barang') ? 'active' : '' }}"> 
          <i class="nav-icon far fa-list-alt"></i> 
          <p>Data Barang</p> 
        </a> 
      </li> 
      -->
      <li class="nav-item"> 
        <a href="{{ route('logout') }}" class="nav-link"> 
          <i class="nav-icon fas fa-sign-out-alt"></i> 
          <p>Logout</p> 
        </a> 
      </li> 
    </ul> 
  </nav> 
</div>
