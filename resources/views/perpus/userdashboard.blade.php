<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Pengguna - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .jumbotron-user {
            background-image: url("{{ asset('assets/background_home.png') }}");
            background-size: cover;
            background-position: center;
            background-color: #000000b3;
            background-blend-mode: darken;
            height: 400px;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">YuBook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-auto text-start text-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="ms-lg-auto mt-2 mt-lg-0">
                    <i class="fa-solid fa-user text-light me-2"></i>
                    <a href="{{ route('user.profile') }}" class="text-decoration-none text-light">{{ session('username') ?? 'Guest' }}</a>
                </div>
            </div>
        </div>
    </nav>


    <div class="jumbotron-user text-white text-center">
        <div class="jumbotron py-auto container">
            <h1 class="display-4 fw-semibold">Selamat Datang di YuBook</h1>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item nav-link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item {{ $active == 'top' ? 'active' : '' }}" href="{{ route('user.dashboard.top') }}">Populer</a></li>
                            <li><a class="dropdown-item {{ $active == 'recent' ? 'active' : '' }}" href="{{ route('user.dashboard.recent') }}">Terbaru</a></li>
                            <li><a class="dropdown-item {{ $active == 'rating' ? 'active' : '' }}" href="{{ route('user.dashboard.rating') }}">Peringkat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-link">
                        <a class="nav-link {{ $active == 'all' ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Semua</a>
                    </li>
                    <li class="nav-item nav-link">
                        <a class="nav-link {{ $active == 'dipinjam' ? 'active' : '' }}" href="{{ route('user.dipinjam') }}">My Buku</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari..." aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h3 class="mb-4">{{ $title }}</h3>
        <div class="row">
            @forelse($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->judul }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->penulis }}</h6>
                        <p class="card-text">{{ $book->penerbit }}</p>
                        <form action="{{ route('user.borrow', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin meminjam buku ini?')">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Pinjam</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>{{ $emptyMessage }}</p>
            </div>
            @endforelse
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>