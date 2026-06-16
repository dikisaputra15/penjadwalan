 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Penjadwalan</span>
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

          <li class="nav-item">
            <a href="{{ Route('kegiatan.index') }}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Kegiatan
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ Route('jadwal.index') }}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Jadwal
              </p>
            </a>
          </li>

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
