<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan-Admin | Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-8">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <h1>Ubah Data Mahasiswa</h1>
                        </div>
                        <form class="form-check" action="{{ route('update', $mahasiswa->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nrp" class="form-label">NRP: </label>
                                <input type="text" name="nrp" id="nrp" value="{{ $mahasiswa->nrp }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama: </label>
                                <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="kelas" class="form-label">Kelas: </label>
                                <input type="text" name="kelas" id="kelas" value="{{ $mahasiswa->kelas }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Handphone: </label>
                                <input type="text" name="no_hp" id="no_hp" value="{{ $mahasiswa->no_hp }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahun_angkatan" class="form-label">Tahun Angkatan: </label>
                                <input type="text" name="tahun_angkatan" id="tahun_angkatan" value="{{ $mahasiswa->tahun_angkatan }}" class="form-control" required>
                            </div>

                            <div class="row row-cols-auto mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                </div>
                        </form>
                        <div class="col">
                            <form action="{{ url()->previous() }}">
                                <button type="submit" class="btn btn-secondary">Kembali</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
