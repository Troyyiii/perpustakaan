@extends('layout.sneatlay')

@section('title')
E-Library | Sign-in
@endsection

@section('body-content')
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
                    <h4 class="mb-2">Selamat datang di E-Library </h4>
                    <p class="mb-4">Sign-in sekarang dan mulailah jelajahi dunia melalui buku</p>

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
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        {{-- email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control @error('email')
                                is-invalid @enderror" id="email" name="email" placeholder="Masukkan alamat email"
                                value="{{ old('email') }}" autofocus required />
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
@endsection
