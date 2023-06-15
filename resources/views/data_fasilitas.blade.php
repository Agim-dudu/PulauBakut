<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('/') }}assets/dasboard/ha.css" />

	<title>Fasilitas</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-cabinet'></i>
			<span class="text">Pulau Bakut</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{route('index')}}">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.history') }}">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Order Tiket</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.data_florafauna.index') }}">
					<i class='bx bxs-florist'></i>
					<span class="text">Flora & Fauna</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.data_galery.index') }}">
					<i class='bx bxs-image'></i>
					<span class="text">Galery</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('admin.data_fasilitas.index') }}">
					<i class='bx bxs-buildings'></i>
					<span class="text">Fasilitas</span>
				</a>
			</li>
			<li >
				<a href="{{ route('admin.data_pengguna.index') }}">
					<i class='bx bxs-group'></i>
					<span class="text">Data Pengguna</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.data_contact.index') }}">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Pesan</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout" id="logout-link">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
				
				<script>
					document.getElementById("logout-link").addEventListener("click", function(e) {
						e.preventDefault(); // Mencegah link mengarah ke URL yang sebenarnya
				
						// Mengirim permintaan POST ke rute logout
						fetch("{{ route('logout') }}", {
							method: "POST",
							headers: {
								"Content-Type": "application/json",
								"X-CSRF-TOKEN": "{{ csrf_token() }}"
							},
							body: JSON.stringify({}) // Mengirim body kosong jika diperlukan
						})
						.then(response => {
							// Logika setelah permintaan logout berhasil
							alert("Anda telah logout"); // Menampilkan pesan logout
							
							// Setelah logout berhasil, Anda dapat mengarahkan pengguna ke halaman lain jika diperlukan
							window.location.href = "/login";
						})
						.catch(error => {
							// Logika jika terjadi kesalahan saat permintaan logout
							console.error("Terjadi kesalahan:", error);
						});
					});
				</script>
			</li>
		</ul>
	</section>
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="{{ route('admin.data_contact.index') }}" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">
					@php
                        $n= 0;
                        @endphp
                        @foreach ($contacts as $contact)
                        @php
                            $n++;
                        @endphp
                        @endforeach
						<th style="padding: 0 30px 5px 30px;" scope="row">{{ $n }}</th>
				</span>
			</a>
            <a href="#" >
				@auth
				@php
					$loggedInUser = auth()->user();
				@endphp
				
				@if (!$loggedInUser->provider && $loggedInUser->avatar)
					<td><img style="width: 36px;height: 36px;object-fit: cover;border-radius: 50%;" src="{{ asset('storage/app/images/avatar/' . $loggedInUser->avatar) }}" alt="User Avatar"></td>
				@elseif ($loggedInUser->provider == 'google' && $loggedInUser->avatar)
					<td><img style="width: 36px;height: 36px;object-fit: cover;border-radius: 50%;" src="{{ $loggedInUser->avatar }}" alt="Google Image"></td>
				@else
					<td><img style="width: 36px;height: 36px;object-fit: cover;border-radius: 50%;" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="default"></td>
				@endif
				@endauth
			</a>
		</nav>
		<main>
            @if(session('success'))
            <div style="color: rgb(59, 59, 223) " class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
			<div class="head-title">
				<div class="left">
					<h1 id="transaksi">Fasilitas</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Data</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Fasilitas</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="table-data">
				<div class="tambah-datapenju">
					<a href="{{route('admin.data_fasilitas.create')}}" class="btn">Tambah Data</a>
				</div>

				<div class="order">
					<table>
						<thead>
							<tr>
								<th style="padding: 0 30px 5px 30px;">No</th>
                                <th style="padding: 0 30px 5px 30px;">Gambar</th>
                                <th style="padding: 0 30px 5px 30px;">Judul</th>
                                <th style="padding: 0 30px 5px 30px;">Deskripsi</th>
                                <th style="padding: 0 30px 5px 30px;">Tanggal</th>
                                <th style="padding: 0 30px 5px 30px;">Aksi</th>
							</tr>
						</thead>
						<tbody>
                            @php
                            $n= 1;
                        @endphp
                        @foreach ($fasilitas as $fasilitass)
                        <tr>
                            <th style="padding: 0 30px 5px 30px;" scope="row">{{ $n }}</th>
                            <td style="padding: 0 30px 5px 30px;"><img style="width: 100px;height: 100px;object-fit: cover;border-radius: 10%;" src="{{ asset('/') }}storage/app/images/{{ $fasilitass->gambar }}"></td>
                            <td style="padding: 0 30px 5px 30px;">{{ $fasilitass->judul }}</td>
                            <td style="padding: 0 30px 5px 30px;">{{ ($fasilitass->deskripsi)}}</td>
                            <td style="padding: 0 30px 5px 30px;">{{ ($fasilitass->created_at)}}</td>
                            <td style="padding: 0 30px 5px 30px;">
                                <a href="{{route('admin.data_fasilitas.edit', $fasilitass->id)}}" class="btn1">Edit</a>
                                <form action="{{ route('admin.data_fasilitas.destroy', $fasilitass->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-top:10px;" class="btn2"
                                        onclick="confirm('anda yakin ingin menghapus data ini? ')"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach
						</tbody>
					</table>
				</div>
		</main>

	</section>
	<!-- CONTENT -->


	<script src="{{ asset('/') }}assets/dasboard/ha.js"></script>
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
                    <a class="nav-link" aria-current="page" href="{{route('index')}}">Home</a>
                    <a class="nav-link" href="{{ route('admin.data_pengguna.index') }}">Data Pengguna</a>
                    <a class="nav-link" href="{{route('admin.data_florafauna.index')}}">Flora & Fauna</a>
                    <a class="nav-link" href="{{route('admin.history')}}">History Tiket</a>
                    <a class="nav-link active" href="{{route('admin.data_fasilitas.index')}}">Fasilitas</a>
                    <a class="nav-link" href="{{route('admin.data_galery.index')}}">Galery</a>
                    <a class="nav-link" href="{{route('admin.data_contact.index')}}">Pesan Pengguna</a>
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


    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1>Fasilitas</h1>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <a href="{{route('admin.data_fasilitas.create')}}" class="btn btn-success">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n= 1;
                        @endphp
                        @foreach ($fasilitas as $fasilitass)
                        <tr>
                            <th scope="row">{{ $n }}</th>
                            <td><img style="width:100px; border-radius:50%;" src="{{ asset('/') }}storage/app/images/{{ $fasilitass->gambar }}"></td>
                            <td>{{ $fasilitass->judul }}</td>
                            <td>{{ ($fasilitass->deskripsi)}}</td>
                            <td>{{ ($fasilitass->created_at)}}</td>
                            <td>
                                <a href="{{route('admin.data_fasilitas.edit', $fasilitass->id)}}" class="btn btn-primary mb-3">Edit</a>
                                <form action="{{ route('admin.data_fasilitas.destroy', $fasilitass->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="confirm('anda yakin ingin menghapus data ini? ')"
                                        type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html> --}}
