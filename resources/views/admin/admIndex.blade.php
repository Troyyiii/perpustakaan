@extends('layout.sneatlay')

@section('title')
Perpustakaan | Admin Home
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
                        <img src="template/sneat/assets/img/favicon/lib.png" alt="logo_perpus"
                            style="width: 32px; height: 32px;">
                    </span>
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Perpustakaan</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="{{ route('admIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>

                        <div data-i18n="Analytics">Home</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admMhsIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-layout"></i>

                        <div data-i18n="Analytics">Daftar Mahasiswa</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admBukuIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-layout"></i>

                        <div data-i18n="Analytics">Daftar Buku</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admBukuIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-layout"></i>

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
                        <i class="bx bx-menu bx-sm">
                            <iconify-icon icon="akar-icons:three-line-horizontal" style="color: #696cff;" width="30"
                                height="30"></iconify-icon>
                        </i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- Search -->
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                aria-label="Search..." />
                        </div>
                    </div>
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('template/sneat/assets/img/avatars/1.png') }}" alt
                                        class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('template/sneat/assets/img/avatars/1.png') }}"
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
                                    <a class="dropdown-item" href="#">
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
                    <p class="fw-bold fs-2 py-3 mb-4"><span class="text-muted fw-light mb-1 fs-4 d-block">Selamat
                            Datang</span>{{ Auth::user()->name }}</p>
                    <div class="row">
                        <div class="mb-4 order-0">
                            {{-- verifikasi akun --}}
                            <div class="card">
                                <h5 class="card-header">Verifikasi Akun</h5>
                                @if (session()->has('success'))
                                <div class="container-fluid">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <small>{{ session('success') }}</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NRP</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tahun Angkatan</th>
                                                <th>Waktu Registrasi</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($inactive as $dataMhs)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dataMhs->mahasiswa->nrp }}</td>
                                                <td>{{ $dataMhs->mahasiswa->nama }}</td>
                                                <td>{{ $dataMhs->mahasiswa->kelas }}</td>
                                                <td>{{ $dataMhs->mahasiswa->tahun_angkatan }}</td>
                                                <td>{{ $dataMhs->created_at->format('D M Y') }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <form action="{{ route('verifyMhs', $dataMhs->id) }}">
                                                                @csrf
                                                                <button type="submit button" class="btn btn-primary"
                                                                    onclick="return confirm('Verifikasi akun ini?')">Verifikasi</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <div class="row">
                        <div class="mb-4 order-0">
                            {{-- verifikasi akun --}}
                            <div class="card">
                                <h5 class="card-header">Verifikasi Pinjaman Buku</h5>
                                @if (session()->has('success'))
                                <div class="container-fluid">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <small>{{ session('success') }}</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id Buku</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>NRP Mahasiswa</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($pendingPinjam as $dataPjm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dataPjm->buku_id }}</td>
                                                <td>{{ $dataPjm->buku->judul }}</td>
                                                <td>{{ $dataPjm->buku->pengarang }}</td>
                                                <td>{{ $dataPjm->user->nrp }}</td>
                                                <td>{{ $dataPjm->user->nama }}</td>
                                                <td>{{ $dataPjm->user->kelas }}</td>
                                                <td>{{ $dataPjm->tanggal_pinjam }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <form action="{{ route('verifyMhs', $dataPjm->id) }}">
                                                                @csrf
                                                                <button type="submit button" class="btn btn-primary"
                                                                    onclick="return confirm('Verifikasi akun ini?')">Verifikasi</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- / Content -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->
        @endsection
