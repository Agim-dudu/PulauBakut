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
<body style="background-image: url({{ asset('assets/img/wallpaperbetter.jpg') }}); ">
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="">Home</a>
                    <a class="nav-link active" href="{{route('admin.data_pengguna.index')}}">Data Pengguna</a>
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout<i class="fa fa-arrow-right ms-3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="userr">
        <form action="{{ route('admin.data_pengguna.update', $users->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label">Name</label>
                        <input type="text" class="form-control" name="inputUsername" id="inputUsername" value="{{ $users->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" value="{{ $users->firs_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputLastName" name="inputLastName" value="{{ $users->last_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="inputJenisKelamin" name="inputJenisKelamin" value="{{ $users->jenis_kelamin }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputLokasi" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="inputLokasi" name="inputLokasi" value="{{ $users->lokasi }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="{{ $users->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="inputPhone" name="inputPhone" value="{{ $users->no_telpon }}">
                    </div>
                    <div class="mb-3">
                        <label for="inputBirthday" class="form-label">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="inputBirthday" name="inputBirthday" value="{{ $users->tanggal_lahir }}">
                    </div>
                    <div class="mb-3">
                        <label for="is_adminInput" class="form-label">Level</label>
                        <input type="number" class="form-control" id="is_adminInput" name="is_adminInput" value="{{ $users->is_admin }}">
                    </div>
                    <div class="mb-3">
                        <label for="PasswordInput" class="form-label">Password</label>
                        <input type="password" class="form-control" id="PasswordInput" name="PasswordInput" value="{{ $users->password }}">
                    </div>
                </div>
            </div>
            @if ($users->avatar)
            <div class="mb-3">
                <img src="{{ asset('storage/app/images/avatar/' . $users->avatar) }}" width="200px" alt="Gambar" class="img-fluid">
            </div>
            @endif
            <div class="mb-3">
                <label for="avatar">Photo</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            <div class="row mx-1">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputElements = document.querySelectorAll('.form-control');
            
            inputElements.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    inputElement.parentNode.classList.toggle('active', inputElement.value !== '');
                });
            });
        });
    </script>
</body>
</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="">Home</a>
                    <a class="nav-link active" href="{{route('admin.data_pengguna.index')}}">Data Pengguna</a>
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout<i class="fa fa-arrow-right ms-3"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <form action="{{ route('admin.data_pengguna.update', $users->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Name</label>
                <input type="text" class="form-control" name="inputUsername" id="inputUsername" value="{{ $users->name }}">
            </div>
            <div class="mb-3">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" value="{{ $users->firs_name }}">
            </div>
            <div class="mb-3">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="inputLastName" value="{{ $users->last_name }}">
            </div>
            <div class="mb-3">
                <label for="inputJenisKelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="inputJenisKelamin" name="inputJenisKelamin" value="{{ $users->jenis_kelamin }}">
            </div>
            <div class="mb-3">
                <label for="inputLokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="inputLokasi" name="inputLokasi" value="{{ $users->lokasi }}">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="{{ $users->email }}">
            </div>
            <div class="mb-3">
                <label for="inputPhone" class="form-label">No Hp</label>
                <input type="text" class="form-control" id="inputPhone" name="inputPhone" value="{{ $users->no_telpon }}">
            </div>
            <div class="mb-3">
                <label for="inputBirthday" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="inputBirthday" name="inputBirthday" value="{{ $users->tanggal_lahir }}">
            </div>
            <div class="mb-3">
                <label for="is_adminInput" class="form-label">Level</label>
                <input type="number" class="form-control" id="is_adminInput" name="is_adminInput" value="{{ $users->is_admin }}">
            </div>
            <div class="mb-3">
                <label for="PasswordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="PasswordInput" name="PasswordInput" value="{{ $users->password }}">
            </div>
            @if ($users->avatar)
            <div class=" mb-3">
                <img src="{{ asset('storage/app/images/avatar/' . $users->avatar) }}" width="200px" alt="Gambar" class="img-fluid">
            </div>
            @endif
            <div class="mb-3">
                <label for="avatar">Photo</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
            </div>
            <div class="row mx-1">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> --}}
