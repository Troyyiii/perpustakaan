<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan-Admin | Create Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center p-3">
                            <h1>Tambahkan Data Buku</h1>
                        </div>
                        <form action="{{ route('storeBuku') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul: </label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang: </label>
                                <input type="text" name="pengarang" id="pengarang" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit: </label>
                                <input type="text" name="penerbit" id="penerbit" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit: </label>
                                <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="genre_buku" class="form-label">Genre Buku: </label>
                                <input type="text" name="genre_buku" id="genre_buku" class="form-control"
                                    required>
                            </div>

                            <div class="row row-cols-auto mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Simpan</button>
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
