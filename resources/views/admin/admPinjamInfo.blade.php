<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Admin | Lihat Daftar Pinjam</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ route('admIndex') }} " class="navbar-brand">
                    {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                    <span class="brand-text font-weight-light">E-Library</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admIndex') }}" class="nav-link">Home</a>
                        </li>
                    </ul>

                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- SEARCH FORM -->
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">E-Library</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div> --}}
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('admBukuIndex') }}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Buku
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
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
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Home <small>Admin</small></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h2>Lihat Data Pinjam</h2>
                                </div>
                                <div class="card-body">
                                    @if ($message = Session::get('success'))
                                    <div class="container-fluid">
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            {{ $message }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="container-float mb-3">
                                        <form action="{{ route('admPinjamIndex') }}">
                                            @csrf
                                            <button type="submit button" class="btn btn-secondary">Kembali</button>
                                        </form>
                                    </div>
                                    <form class="form-check" action="{{ route('admPjmKembali', $pinjam->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nrp" class="form-label">NRP: </label>
                                            <input type="text" name="nrp" id="nrp" value="{{ $pinjam->mahasiswa->nrp }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama: </label>
                                            <input type="text" name="nama" id="nama" value="{{ $pinjam->mahasiswa->nama }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="kelas" class="form-label">Kelas: </label>
                                            <input type="text" name="kelas" id="kelas" value="{{ $pinjam->mahasiswa->kelas }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tahun_angkatan" class="form-label">Tahun Angkatan: </label>
                                            <input type="text" name="tahun_angkatan" id="tahun_angkatan" value="{{ $pinjam->mahasiswa->tahun_angkatan }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="no_telp" class="form-label">No Telepon: </label>
                                            <input type="text" name="no_telp" id="no_telp" value="{{ $pinjam->mahasiswa->no_hp }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="id" class="form-label">Id Buku: </label>
                                            <input type="text" name="id" id="id" value="{{ $pinjam->buku->id }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul Buku: </label>
                                            <input type="text" name="judul" id="judul" value="{{ $pinjam->buku->judul }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="pengarang" class="form-label">Pengarang Buku: </label>
                                            <input type="text" name="pengarang" id="pengarang" value="{{ $pinjam->buku->pengarang }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="penerbit" class="form-label">Penerbit Buku: </label>
                                            <input type="text" name="penerbit" id="penerbit" value="{{ $pinjam->buku->penerbit }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tahun_terbit" class="form-label">Tahun Terbit Buku: </label>
                                            <input type="text" name="tahun_terbit" id="tahun_terbit" value="{{ $pinjam->buku->tahun_terbit }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="genre_buku" class="form-label">Genre Buku: </label>
                                            <input type="text" name="genre_buku" id="genre_buku" value="{{ $pinjam->buku->genre_buku }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam: </label>
                                            <input type="text" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->format('l, d F Y') }}"
                                                class="form-control" required disabled readonly>
                                        </div>

                                        <div class="row row-cols-auto mt-4">
                                            <div class="col">
                                                <button type="submit" class="btn btn-success" onclick="return confirm('Buku akan dikembalikan?')">Kembalikan Buku</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        {{-- <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer> --}}
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('template/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
