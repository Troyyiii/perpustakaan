@extends('layout.sneatlay')

@section('title')
E-Library | Home - User
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
                <li class="menu-item active">
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

                <li class="menu-item">
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
                    <form class="form-inline" action="{{ route('usrBukuIndexCari') }}" method="GET">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Cari Buku..."
                                    aria-label="Search..." value="{{ old('cari') }}" name="cari" id="cari" />
                            </div>
                        </div>
                    </form>
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
                    {{-- carousel --}}
                    <div class="container-fluid mt-4">
                        <div id="carouselExample-cf" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner" style="width: 1160px; height: 300px; border-radius: 25px;">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('image/banner1.jpg') }}"
                                        alt="First slide" />
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('image/banner2.jpg') }}"
                                        alt="Second slide" />
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample-cf" role="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample-cf" role="button"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                    {{-- /carousel --}}

                    <p class="fw-bold fs-2 py-3 mt-4"><span class="text-muted fw-light mb-1 fs-4 d-block">Selamat
                            Datang</span>{{ Auth::user()->name }}</p>

                    {{-- card --}}
                    <div class="container-fluid d-flex justify-content-between">
                        <h6 class="pb-1 mb-4 text-muted">Kumpulan Buku</h6>
                        <h5><a href="{{ route('usrBukuIndex') }}">Lebih Banyak</a></h6>
                    </div>
                    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
                        @foreach ($buku as $i => $dataBuku)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('upload/'.$dataBuku->file_name) }}" alt="Cover Buku" style="border-radius: 10px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $dataBuku->judul }}</h5>
                                    <p class="card-text">Pengarang : {{ $dataBuku->pengarang }}</p>
                                    <p class="card-text">Penerbit : {{ $dataBuku->penerbit }}</p>
                                    <p class="card-text">Tahun Terbit : {{ $dataBuku->tahun_terbit }}</p>
                                    <p class="card-text">Status : {{ $dataBuku->status }}</p>
                                    <a href="{{ route('usrBukuInfo', $dataBuku->id) }}" class="btn btn-outline-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{-- /card --}}
                </div>

                {{-- card --}}

                {{-- /card --}}

                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
</div>
</div>
@endsection
