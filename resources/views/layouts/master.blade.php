<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Google Font: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- fapicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css" rel="stylesheet">

  <style>
    /* PKB Custom Theme Settings */
    :root {
      --pkb-green: #006B3F;
      --pkb-green-dark: #004d2c;
      --pkb-gold: #FDB813;
      --pkb-gold-hover: #e0a310;
    }

    body {
      font-family: 'Poppins', sans-serif !important;
    }

    /* Navbar Glassmorphism */
    .main-header.navbar {
      background: rgba(0, 107, 63, 0.95) !important;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-bottom: none;
    }

    /* Content Wrapper Background */
    .content-wrapper {
      background-color: #f8fafc !important;
      animation: fadeIn 0.6s ease-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Core UI Elements */
    .bg-pkb-primary { background-color: var(--pkb-green) !important; color: #fff !important; }
    .text-pkb { color: var(--pkb-green) !important; }
    .btn-primary { background-color: var(--pkb-green); border-color: var(--pkb-green); transition: all 0.3s ease; }
    .btn-primary:hover { background-color: var(--pkb-green-dark); border-color: var(--pkb-green-dark); transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
    .btn-success { background-color: var(--pkb-green); border-color: var(--pkb-green); transition: all 0.3s ease; }
    .btn-success:hover { background-color: var(--pkb-green-dark); border-color: var(--pkb-green-dark); transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
    .btn-warning { background-color: var(--pkb-gold); border-color: var(--pkb-gold); color: #fff; transition: all 0.3s ease; }
    .btn-warning:hover { background-color: var(--pkb-gold-hover); border-color: var(--pkb-gold-hover); color: #fff; transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.15); }

    /* Interactive Cards */
    .card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    .card:hover {
      box-shadow: 0 8px 20px rgba(0,107,63,0.1);
      transform: translateY(-4px);
    }
    .card-header {
      background-color: transparent !important;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .card-header h3 {
      font-weight: 700;
      color: var(--pkb-green);
    }

    /* Sidebar Active States */
    .sidebar-dark-success .nav-sidebar > .nav-item > .nav-link.active,
    .sidebar-light-success .nav-sidebar > .nav-item > .nav-link.active {
      background-color: var(--pkb-green) !important;
      color: #fff !important;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0,107,63,0.3);
    }
    .nav-sidebar .nav-item .nav-link {
      transition: all 0.3s ease;
      border-radius: 8px;
      margin: 2px 0;
    }
    .nav-sidebar .nav-item .nav-link:hover {
      background-color: rgba(255,255,255,0.1);
      transform: translateX(4px);
    }

    /* Interactive Tables */
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(0,107,63,0.02);
    }
    .table tbody tr {
      transition: background-color 0.2s ease;
    }
    .table tbody tr:hover {
      background-color: rgba(0,107,63,0.08) !important;
    }
    .table thead th {
      border-bottom: 2px solid var(--pkb-green);
      color: var(--pkb-green);
    }

    /* Modern Scrollbar */
    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: var(--pkb-green); border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: var(--pkb-green-dark); }

    /* Form Controls & Inputs */
    .form-control {
      border-radius: 8px;
      border: 1px solid #e2e8f0;
      padding: 0.6rem 1rem;
      transition: all 0.3s ease;
      box-shadow: none !important;
    }
    .form-control:focus {
      border-color: var(--pkb-green);
      box-shadow: 0 0 0 3px rgba(0,107,63,0.15) !important;
    }

    /* Modern Badges */
    .badge {
      padding: 0.5em 1em;
      border-radius: 6px;
      font-weight: 500;
      letter-spacing: 0.3px;
    }
    .badge-success {
      background-color: #d1fae5 !important;
      color: #065f46 !important;
      border: 1px solid #10b981;
    }

    /* Global Button Radius */
    .btn {
      border-radius: 8px;
      font-weight: 500;
      padding: 0.5rem 1.5rem;
    }
    .btn-sm {
      padding: 0.25rem 0.5rem;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">
@include('layouts.navbar')
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('conten')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@include('layouts.footer')
