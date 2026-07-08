 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link text-center" style="border-bottom: 1px solid rgba(255,255,255,0.1);">
      <i class="fas fa-globe text-white" style="font-size: 1.5rem; vertical-align: middle; margin-right: 8px;"></i>
      <span class="brand-text font-weight-bold text-white">SI PKB</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Hi, {{auth()->user()->name}}</li>
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          @if(auth()->check() && auth()->user()->roles !== 'pegawai' && auth()->user()->roles !== 'kepala')
          <li class="nav-item">
            <a href="{{ Route('user.index') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Management User
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ Route('wilayah.index') }}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Wilayah
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ Route('pegawai.index') }}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Anggota
              </p>
            </a>
          </li>
          @endif

          @if(auth()->check() && auth()->user()->roles !== 'kepala')
          <li class="nav-item">
            <a href="{{ Route('kegiatan.index') }}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Kegiatan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ Route('jadwal.index') }}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>
          @endif

        <li class="nav-item">
            <a href="{{ Route('lapkegiatan.index') }}" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Laporan Kegiatan
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
