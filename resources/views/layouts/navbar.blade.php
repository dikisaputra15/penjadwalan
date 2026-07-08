<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <div class="animation__shake text-center text-pkb">
        <i class="fas fa-globe fa-3x mb-2"></i>
        <h2 class="font-weight-bold">SI PKB</h2>
    </div>
</div>
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand bg-pkb-primary navbar-dark shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
              <a class="btn btn-danger" title="Logout" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
