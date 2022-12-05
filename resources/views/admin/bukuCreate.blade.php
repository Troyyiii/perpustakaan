@extends('layout.sneatlay')

@section('title')
E-Library | Tambah Buku - Admin
@endsection

@section('body-content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('admIndex') }}" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('template/sneat/assets/img/favicon/lib.png') }}" alt="logo_perpus"
                            style="width: 32px; height: 32px;">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">E-Library</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                    <a href="{{ route('admIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-home-circle"></i>

                        <div data-i18n="Analytics">Home</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admMhsIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-graduation"></i>

                        <div data-i18n="Analytics">Data Mahasiswa</div>
                    </a>
                </li>

                <li class="menu-item active">
                    <a href="{{ route('admBukuIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-book-alt"></i>

                        <div data-i18n="Analytics">Data Buku</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admPinjamIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-archive"></i>

                        <div data-i18n="Analytics">Data Pinjam</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    {{-- <form class="form-inline" action="{{ route('admBukuIndexCari') }}" method="GET">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Cari Buku..."
                                aria-label="Search..." value="{{ old('cari') }}" name="cari" id="cari" />
                        </div>
                    </div>
                    </form> --}}
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('template/sneat/assets/img/avatars/default.png') }}" alt
                                        class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('template/sneat/assets/img/avatars/default.png') }}"
                                                        alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admProfile', Auth::user()->id) }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Database / Data Buku /</span> Tambah
                        Data</h4>

                    <!-- Basic Layout -->
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <form action="{{ url()->previous() }}" class="mb-4">
                                        @csrf
                                        <button type="submit button" class="btn btn-primary">
                                            <i class="menu-icon tf-icons bx bx-arrow-back"></i>Kembali</button>
                                    </form>
                                    <h5 class="mb-0">Tambahkan Data Buku</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('storeBuku') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="cover" class="form-label">Cover Buku: </label>
                                            <input type="file" accept="image/*" name="cover" id="cover"
                                                class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul: </label>
                                            <input type="text" name="judul" id="judul" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="pengarang" class="form-label">Pengarang: </label>
                                            <input type="text" name="pengarang" id="pengarang" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="penerbit" class="form-label">Penerbit: </label>
                                            <input type="text" name="penerbit" id="penerbit" class="form-control"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tahun_terbit" class="form-label">Tahun Terbit: </label>
                                            <input type="text" name="tahun_terbit" id="tahun_terbit"
                                                class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="genre_buku" class="form-label">Genre Buku: </label>
                                            <input type="text" name="genre_buku" id="genre_buku" class="form-control"
                                                required>
                                        </div>

                                        <div class="row row-cols-auto mt-4">
                                            <div class="col">
                                                <button type="submit" class="btn btn-success"><i
                                                        class="menu-icon tf-icons bx bxs-save"></i>Simpan</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
    </div>
</div>
<!-- / Layout wrapper -->
@endsection
