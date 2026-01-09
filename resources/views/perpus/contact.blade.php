<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact - YuBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f9fa;
        }

        .navbar-user {
            background-color: #212529;
        }

        .btn-custom {
            background-color: #0d6efd;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0b5ed7;
            color: white;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-user">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}">YuBook</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-auto text-start text-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" href="{{ route('user.home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'about' ? 'active' : '' }}" href="{{ route('user.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $active == 'contact' ? 'active' : '' }}" href="{{ route('user.contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="ms-lg-auto mt-2 mt-lg-0">
                    <i class="fa-solid fa-user text-light me-2"></i>
                    <a href="{{ route('user.profile') }}" class="text-decoration-none text-light">{{ session('username') ?? 'Guest' }}</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 p-4">
                    <h2 class="fw-bold mb-4">Hubungi Kami</h2>
                    <p class="text-muted">Punya keluhan atau ingin bertanya sesuatu? Silakan isi formulir di bawah ini atau hubungi kami melalui media sosial.</p>
                    
                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-envelope me-3 text-primary"></i>
                            <span>support@yubook.com</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-phone me-3 text-primary"></i>
                            <span>+62 812 3456 7890</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa-solid fa-location-dot me-3 text-primary"></i>
                            <span>Jl. Perpustakaan No. 123, Jakarta</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="nama@perusahaan.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesan</   >
                            <textarea class="form-control" rows="4" placeholder="Tuliskan pesan Anda"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>
