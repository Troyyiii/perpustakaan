<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan | Sign-in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('template/sneat/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('template/sneat/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('template/sneat/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('template/sneat/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('template/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('template/sneat/assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('template/sneat/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('template/sneat/assets/js/config.js') }}"></script>
</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <div class="text-center p-2">
                            <h1><b>E-</b>Library</h1>
                            <hr>
                        </div>
                        <h4 class="mb-2">Selamat datang di E-Library! </h4>
                        <p class="mb-4">Sign-in sekarang dan mulailah jelajahi dunia dengan buku</p>

                        <form id="formAuthentication" class="mb-3" action="/loginCheck" method="POST">
                            @csrf
                            @if (session()->has('errormsg'))
                            <div class="alert alert-danger" role="alert">
                                <small>{{ session('errormsg') }}</small>
                            </div>
                            @endif
                            @if (session()->has('scsregistmsg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <small>{{ session('scsregistmsg') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email')
                                is-invalid @enderror" id="email" name="email"
                                    placeholder="Masukkan alamat email" value="{{ old('email') }}" autofocus
                                    required />
                                @error('email')
                                <div class="invalid-feedback">
                                    <small>Format email yang dimasukkan salah</small>
                                </div>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required />
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Belum punya akun?</span>
                            <a href="/register">
                                <span>Buat akun</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Login -->

            </div>
        </div>
    </div>

    {{-- SCRIPT --}}
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('template/sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('template/sneat/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('template/sneat/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('template/sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('template/sneat/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('template/sneat/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
