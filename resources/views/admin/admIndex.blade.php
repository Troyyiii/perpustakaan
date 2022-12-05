@extends('layout.sneatlay')

@section('title')
E-Library | Home - Admin
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
                <li class="menu-item active">
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

                <li class="menu-item">
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
                    <p class="fw-bold fs-2 py-3 mb-4"><span class="text-muted fw-light mb-1 fs-4 d-block">Selamat
                            Datang</span>{{ Auth::user()->name }}</p>
                    <div class="row">
                        <div class="mb-4 order-0">
                            {{-- verifikasi akun --}}
                            <div class="card">
                                <h5 class="card-header">Verifikasi Akun</h5>
                                @if (session()->has('success'))
                                <div class="container-fluid">
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <small>{{ session('success') }}</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
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
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($inactive as $i => $dataMhs)
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
                                                                <button type="submit button" class="btn btn-success"
                                                                    onclick="return confirm('Verifikasi pembuatan akun {{ $dataMhs->mahasiswa->nama }} ({{ $dataMhs->mahasiswa->nrp }})')"><i
                                                                        class="menu-icon tf-icons bx bxs-check-circle"></i>Verifikasi</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="{{ route('deleteMhsI', $dataMhs->id) }}">
                                                                @csrf
                                                                <button type="submit button" class="btn btn-danger"
                                                                    onclick="return confirm('Batalkan pengajuan verifikasi akun {{ $dataMhs->mahasiswa->nama }} ({{ $dataMhs->mahasiswa->nrp }})')"><i
                                                                        class="menu-icon tf-icons bx bxs-trash-alt"></i>Batalkan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="id" value="{{ ++$i }}">
                                            </tr>
                                            @endforeach
                                            @if ($i == '0')
                                            <td class="text-center" colspan="7">Tidak ada data terbaru</td>
                                            @endif
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
                            {{-- verifikasi peminjaman buku --}}
                            <div class="card">
                                <h5 class="card-header">Verifikasi Pinjaman Buku</h5>
                                @if (session()->has('successPjm'))
                                <div class="container-fluid">
                                    <div class="alert alert-info alert-dismissible" role="alert">
                                        <small>{{ session('successPjm') }}</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                @endif
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Cover Buku</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>NRP Mahasiswa</th>
                                                <th>Nama</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($pendingPinjam as $y => $dataPjm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('upload/'.$dataPjm->buku->file_name) }}"
                                                        alt="Cover Buku" style="width: 60px; height: 80px;"></td>
                                                <td>{{ $dataPjm->buku->judul }}</td>
                                                <td>{{ $dataPjm->buku->pengarang }}</td>
                                                <td>{{ $dataPjm->mahasiswa->nrp }}</td>
                                                <td>{{ $dataPjm->mahasiswa->nama }}</td>
                                                <td>{{ $dataPjm->created_at->format('D M Y') }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <form action="{{ route('verifyPjm', $dataPjm->id) }}">
                                                                @csrf
                                                                <button type="submit button" class="btn btn-success"
                                                                    onclick="return confirm('Verifikasi peminjaman buku {{ $dataPjm->buku->judul}}')"><i
                                                                        class="menu-icon tf-icons bx bxs-check-circle"></i>Verifikasi</button>
                                                            </form>
                                                        </div>
                                                        <div class="col-auto">
                                                            <form action="{{ route('deletePinjamI', $dataPjm->id) }}">
                                                                @csrf
                                                                <button type="submit button" class="btn btn-danger"
                                                                    onclick="return confirm('Batalkan pengajuan peminjaman {{ $dataPjm->buku->judul}}')"><i
                                                                        class="menu-icon tf-icons bx bxs-trash-alt"></i>Batalkan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="id" value="{{ ++$y }}">
                                            </tr>
                                            @endforeach
                                            @if ($y == '0')
                                            <td class="text-center" colspan="8">Tidak ada data terbaru</td>
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
