<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="{{ asset('/') }}assets/css/admin/create.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body style="background-image: url({{ asset('assets/img/home.png') }}); ">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="">Home</a>
                    <a class="nav-link active" href="{{route('admin.data_fasilitas.index')}}">Fasilitas</a>
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout<i
                                class="fa fa-arrow-right ms-3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="building">
        <form action="{{ route('admin.data_fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required value="{{ $fasilitas->judul }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required>{{$fasilitas->deskripsi}}</textarea>
            </div>
            {{-- @if ($fasilitas->gambar)
            <div class=" mb-3">
                <img src="{{ asset('/') }}storage/app/images/{{ $fasilitas->gambar }}" width="200px" alt="Gambar" class="img-fluid">
            </div>
            @endif --}}
            <div class="mb-3">
                <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <div class="row mx-1">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="">Home</a>
                    <a class="nav-link active" href="{{route('admin.data_fasilitas.index')}}">Fasilitas</a>
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout<i
                                class="fa fa-arrow-right ms-3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <form action="{{ route('admin.data_fasilitas.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" required value="{{ $fasilitas->judul }}">
            </div>
            <div class="mb-3">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required>{{$fasilitas->deskripsi}}</textarea>
            </div>
            @if ($fasilitas->gambar)
            <div class=" mb-3">
                <img src="{{ asset('/') }}storage/app/images/{{ $fasilitas->gambar }}" width="200px" alt="Gambar" class="img-fluid">
            </div>
            @endif
            <div class="mb-3">
                <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            <div class="row mx-1">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> --}}