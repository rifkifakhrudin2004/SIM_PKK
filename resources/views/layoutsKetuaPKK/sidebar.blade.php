<div class="sidebar">
      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/ketuaPKK/dashboard') }}"
                    class="nav-link  {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Pengguna</li>
            <li class="nav-item">
                <a href="{{ url('/ketuaPKK/history') }}"
                    class="nav-link {{ ($activeMenu ?? '') == 'history' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>History Arisan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('ketuaPKK.index') }}" class="nav-link {{ $activeMenu == 'konten' ? 'active' : '' }}"
                    onclick="loadContent('{{ route('ketuaPKK.index') }}')">
                    <i class="nav-icon far fa-user"></i>
                    <p>Upload Konten</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="loadContent('{{ route('logout') }}')">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ url('/ketuaPKK/dashboard') }}" class="nav-link  {{ ($activeMenu == 'dashboard')? 'active' : '' }} "> 
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-header">Data Pengguna</li>
      <li class="nav-item">
        <a href="{{ url('/ketuaPKK/history') }}" class="nav-link {{ ($activeMenu == 'history') ? 'active' : '' }}" onclick="loadContent('{{ route('ketuaPKK.history') }}')">
          <i class="nav-icon fas fa-layer-group"></i>
          <p>History Arisan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('ketuaPKK.index') }}" class="nav-link {{ ($activeMenu == 'konten') ? 'active' : '' }}" onclick="loadContent('{{ route('ketuaPKK.index') }}')">
          <i class="nav-icon far fa-user"></i>
          <p>Upload Konten</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link" onclick="loadContent('{{ route('logout') }}')">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>
</div>
