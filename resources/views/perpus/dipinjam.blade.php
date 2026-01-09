<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta n wport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Dipinjam - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .btn-kembali {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 8px 25px;
            border-radius: 4px;
            text-decoration: none;
            float: right;
            margin: 20px;
            font-size: 14px;
        }

        .btn-kembali:hover {
            background-color: #a50000;
            color: white;
        }

        .main-container {
            background-color: #D9D9D9;
            min-height: 80vh;
            margin-top: 80px;
            padding: 40px;
            border-radius: 4px;
        }

        .book-item {
            display: flex;
            margin-bottom: 30px;
            position: relative;
        }

        .book-placeholder {
            width: 120px;
            height: 160px;
            background-color: #9E9E9E;
            margin-right: 25px;
            flex-shrink: 0;
        }

        .book-info {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .book-title {
            font-weight: 500;
            font-size: 18px;
            margin-bottom: 5px;
            color: #333;
        }

        .book-date {
            font-size: 14px;
            color: #444;
            margin-bottom: 5px;
        }

        .btn-batal {
            background-color: #8B0000;
            color: white;
            border: none;
            padding: 5px 20px;
            border-radius: 4px;
            width: fit-content;
            margin-top: 10px;
            font-size: 14px;
            text-decoration: none;
            text-align: center;
        }

        .btn-batal:hover {
            background-color: #a50000;
            color: white;
        }

        hr {
            border-top: 1px solid #777;
            margin: 20px 0;
            opacity: 1;
        }
        
        .empty-state {
            text-align: center;
            padding: 50px;
            color: #666;
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
                            Kategori
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user.dashboard', 'manga') }}">Manga</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.dashboard', 'novel') }}">Novel</a></li>
                            <li><a class="dropdown-item" href="{{ route('user.dashboard', 'pengetahuan') }}">Pengetahuan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-link">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">Semua</a>
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

    <div class="container">
        <div class="main-container shadow-sm">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @forelse($borrowedBooks as $borrow)
                <div class="book-item">
                    <div class="book-placeholder">
                        @if($borrow->buku && $borrow->buku->cover)
                            <img src="{{ asset('storage/' . $borrow->buku->cover) }}" alt="{{ $borrow->buku->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="book-info">
                        <div class="book-title">{{ $borrow->buku->judul ?? 'Judul Tidak Diketahui' }}</div>
                        <div class="book-date">Tanggal Pinjam: {{ \Carbon\Carbon::parse($borrow->tanggal_pinjam)->format('d/m/Y') }}</div>
                        <div class="book-date">Tanggal Pengembalian: {{ \Carbon\Carbon::parse($borrow->tanggal_kembali)->format('d/m/Y') }}</div>
                        <form action="{{ route('user.cancel', $borrow->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan peminjaman?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-batal">Batal</button>
                        </form>
                    </div>
                </div>
                @if(!$loop->last)
                    <hr>
                @endif
            @empty
                <div class="empty-state">
                    <i class="fa-solid fa-book-open fa-3x mb-3"></i>
                    <h4>Belum ada buku yang dipinjam</h4>
                    <p>Silakan cari buku di dashboard dan lakukan peminjaman.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>