<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/fontawesome-free/css/all.min.css')}}">

  <link rel="icon" href="{{asset('frontend/img/KKSI/LOGO KKSI 5 BENDERA KECIL Remake.png')}}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLte/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/summernote/summernote-bs4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('AdminLte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">


  <!-- myCSS -->
  <link rel="stylesheet" href="{{asset('frontend/css/myCSS/home.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/myCSS/userProfile.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/css/myCSS/fontImport.css')}}">


  @yield('css')


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('AdminLte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMART IDUKA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @role('company')
        <div class="image">
          <img src="{{auth()->user()->profileCompany->logo()}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->profileCompany->name()}}</a>
        </div>
        @endrole
        @hasrole('admin|super_admin')
          <div class="image">
          <img src="{{asset('foto-profile-user/image.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->username}}</a>
        </div>
        @endrole
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


<!-------------------------- MENU UNTUK ADMIN DAN SUPER ADMIN  ----------------------->
          
          @hasrole('admin|super_admin')
          <li class="nav-item">
            <a href="{{url('/dashboard/admin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('kategori.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('kualifikasi.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Kualifikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('status-nikah.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Status Pernikahan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Data Loker
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('dashboard/management/loker/belum-ditinjau')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Belum Ditinjau</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('dashboard/management/loker/sudah-ditinjau')}}" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>Sudah Ditinjau</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('/dashboard/management/pelamar')}}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Pelamar
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Management Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @role('super_admin')
              <li class="nav-item">
                <a href="{{route('admins.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              @endrole
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('companies.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perusahaan</p>
                </a>
              </li>
            </ul>
          </li>
          
          @endhasrole






<!---------------------- MENU UNTUK PERUSAHAAN --------------------------->
          @role('company')
          <li class="nav-item">
            <a href="{{route('company')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Management Loker
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/management/lowongan-kerja/create')}}" class="nav-link">
                  <i class="fas fa-folder-plus nav-icon"></i>
                  <p>Tambah loker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('lowongan-kerja.index')}}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>List Lowongan Kerja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('pelamar.index')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pelamar
              </p>
            </a>
          </li>
          {{--<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Management Pelamar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('pelamar.index')}}" class="nav-link">
                  <i class="fas fa-stopwatch nav-icon"></i>
                  <p>Belum Diproses</p>
                  @if(countPelamarPendingInCompany() > 0)
                  <span class="badge badge-info right">{{countPelamarPendingInCompany()}}</span>
                  @endif
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pelamar.gagal')}}" class="nav-link">
                  <i class="fas fa-times nav-icon"></i>
                  <p>lamaran gagal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pelamar.lolos')}}" class="nav-link">
                  <i class="fas fa-check nav-icon"></i>
                  <p>lamaran lolos</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="{{url('management/perlamar/interview')}}" class="nav-link">
              <i class="fas fa-calendar nav-icon"></i>
              <p>
                jadwal Inteview
              </p>
            </a>
          </li>
          @endrole






          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Pengaturan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            
            <ul class="nav nav-treeview">
               @role('company')
              <li class="nav-item">
                <a href="{{url('/profile-perusahaan')}}" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Profile Perusahaan</p>
                </a>
              </li>
              @endrole

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-id-card-alt nav-icon"></i>
                  <p>Pengaturan Akun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('logout') }}"
                class="nav-link"
                onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
          
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('nama_halaman')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



@yield('content')


    </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer bg-dark">
    <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Smart iduka</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLte/plugins/sparklines/sparkline.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLte/dist/js/adminlte.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>




<script src="{{asset('AdminLte/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
@yield('js')
</body>
</html>
