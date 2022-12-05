@extends('layout.sneatlay')

@section('title')
E-Library | History Peminjaman - User
@endsection

@section('body-content')
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="{{ route('usrIndex') }}" class="app-brand-link">
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
                    <a href="{{ route('usrIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-home-circle"></i>

                        <div data-i18n="Analytics">Home</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('usrBukuIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-book-alt"></i>

                        <div data-i18n="Analytics">Daftar Buku</div>
                    </a>
                </li>

                <li class="menu-item active">
                    <a href="{{ route('usrPinjamIndex') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-history"></i>

                        <div data-i18n="Analytics">History Peminjaman</div>
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
                    {{-- <form class="form-inline" action="{{ route('usrBukuIndexCari') }}" method="GET">
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
                                                <small class="text-muted">User</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('usrProfile', Auth::user()->id) }}">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Perpustakaan /</span> History
                        Peminjaman
                    </h4>
                    <div class="row">
                        <div class="mb-4 order-0">
                            {{-- data buku --}}
                            <div class="card">
                                <h2 class="card-header text-center fw-bold">History Peminjaman</h2>
                                @if ($message = Session::get('success'))
                                <div class="container-fluid">
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Penerbit</th>
                                                <th scope="col">Pengarang</th>
                                                <th scope="col">Tanggal Pinjam</th>
                                                <th scope="col">Tanggal Kembali</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($listPinjam as $i => $dataPinjam)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $dataPinjam->buku->judul }}</td>
                                                <td>{{ $dataPinjam->buku->penerbit }}</td>
                                                <td>{{ $dataPinjam->buku->pengarang }}</td>
                                                <td>{{ \Carbon\Carbon::parse($dataPinjam->tanggal_pinjam)->format('l, d F Y') }}
                                                </td>
                                                @if ($dataPinjam->stats == 'Telah Dikembalikan')
                                                <td>{{ \Carbon\Carbon::parse($dataPinjam->tanggal_kembali)->format('l, d F Y') }}
                                                </td>
                                                @else
                                                <td>Belum Dikembalikan</td>
                                                @endif
                                                <td>{{ $dataPinjam->stats }}</td>
                                                <input type="hidden" name="id" value="{{ ++$i }}">
                                            </tr>
                                            @endforeach
                                            @if ($i == '0')
                                            <td class="text-center" colspan="7">Tidak ada terbaru</td>
                                            @endif
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
    </div>
</div>
<!-- / Layout wrapper -->
@endsection
