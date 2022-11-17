@extends('layout.sneatlay')

@section('title')
    Perpustakaan | Sign-up
@endsection

@section('body-content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <div class="text-center p-2">
                            <h1><b>E-</b>Library</h1>
                            <hr>
                        </div>
                        <h4 class="mb-2">Buat akun</h4>
                        <p class="mb-4">Cari dan baca buku favoritmu sekarang juga!</p>

                        <form id="formAuthentication" class="mb-3" action="/registerStore" method="POST">
                            @csrf

                            {{-- nama --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name')
                                is-invalid @enderror" id="name" name="name" placeholder="Nama lengkap"
                                    autofocus value="{{ old('name') }}" required />
                                @error('name')
                                <div class="invalid-feedback">
                                    <small>Format nama tidak sesuai</small>
                                </div>
                                @enderror
                            </div>

                            {{-- email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email')
                                is-invalid @enderror" id="email" name="email" placeholder="Masukkan emailmu"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                <div class="invalid-feedback">
                                    <small>Format email yang dimasukkan salah</small>
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- nrp --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nrp" class="form-label">NRP</label>
                                        <input type="tel" pattern="[0-9]{10}" class="form-control @error('nrp')
                                        is-invalid @enderror" id="nrp" name="nrp" placeholder="NRP"
                                            value="{{ old('nrp') }}" required />
                                        @error('nrp')
                                        <div class="invalid-feedback">
                                            <small>Format nrp yang dimasukkan salah</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- no hp --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No. hp</label>
                                        <input type="tel" pattern="[0-9]{12}" class="form-control @error('no_hp')
                                        is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Nomor handphone"
                                            autofocus value="{{ old('no_hp') }}" required/>
                                        @error('no_hp')
                                        <div class="invalid-feedback">
                                            <small>Format nomor handphone tidak sesuai</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- kelas --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <input type="text" class="form-control @error('kelas')
                                        is-invalid @enderror" id="kelas" name="kelas" placeholder="Kelas"
                                            autofocus value="{{ old('kelas') }}" required />
                                        @error('kelas')
                                        <div class="invalid-feedback">
                                            <small>Format kelas tidak sesuai</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- tahun angkatan --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tahun_angkatan" class="form-label">Tahun angkatan</label>
                                        <input type="tel" pattern="[0-9]{4}" class="form-control @error('tahun_angkatan')
                                        is-invalid @enderror" id="tahun_angkatan" name="tahun_angkatan" placeholder="Tahun angkatan"
                                            value="{{ old('tahun_angkatan') }}" required />
                                        @error('tahun_angkatan')
                                        <div class="invalid-feedback">
                                            <small>Format tahun angkatan yang dimasukkan salah</small>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- password --}}
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" id="password" class="form-control @error('password')
                                    is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required autocomplete="current-password"/>
                                @error('password')
                                <div class="invalid-feedback">
                                    <small>Password harus terdiri dari 8 karakter</small>
                                </div>
                                @enderror
                            </div>

                            {{-- password confirmation --}}
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password" class="form-control @error('password')
                                is-invalid @enderror" name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password_confirmation" required autocomplete="current-password" />
                                @error('password')
                                <div class="invalid-feedback">
                                    <small>Password tidak sesuai</small>
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah punya akun?</span>
                            <a href="/login">
                                <span>Sign-in sekarang</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->

            </div>
        </div>
    </div>
@endsection
