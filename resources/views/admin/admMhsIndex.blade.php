<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan-Admin | Home Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5">
        <div class="p-3 text-center">
            <h1>Daftar Mahasiswa</h1>
            <hr>
        </div>

        <a href="/logout">Logout</a><br>
        <a href="/admBukuIndex">Database Buku</a>
        <div class="row justify-content-center">
            <div class="col-11">
                @if ($message = Session::get('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="container mx-auto">
                    <div class="container mb-2">
                        <form action="{{ route('mhsCreate') }}">
                            @csrf
                            <button type="submit button" class="btn btn-primary">Add +</button>
                        </form>
                    </div>
                    <table class="table">
                        <thead class="table-info">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">NRP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">No. HP</th>
                                <th scope="col">Tahun angkatan</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($mahasiswa as $dataMhs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dataMhs->nrp }}</td>
                            <td>{{ $dataMhs->nama }}</td>
                            <td>{{ $dataMhs->kelas }}</td>
                            <td>{{ $dataMhs->no_hp }}</td>
                            <td>{{ $dataMhs->tahun_angkatan }}</td>
                            <td>{{ $dataMhs->created_at->format('D M Y') }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <form action="{{ route('showMhs', $dataMhs->id) }}">
                                            @csrf
                                            <button type="submit button" class="btn btn-success">Edit</button>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('deleteMhs', $dataMhs->id) }}">
                                            @csrf
                                            <button type="submit button" class="btn btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
