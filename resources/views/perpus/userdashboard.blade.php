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

        body {
            background-image: linear-gradient(rgba(255, 255, 255, 0.81), rgba(114, 114, 114, 0.8)), url("{{ asset('assets/background_dashboard.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        .jumbotron-user {
            position: relative;
            overflow: hidden;
            min-height: 500px;
            height: auto;
            padding: 100px 0;
            display: flex;
            align-items: center;
        }

        .jumbotron-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('assets/background_home.png') }}");
            background-size: cover;
            background-position-y: -100px;
            background-color: #000000b3;
            background-blend-mode: darken;
            background-attachment: fixed;
            z-index: -1;
            transition: transform 0.1s linear;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm">
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
        <div class="jumbotron-bg" id="jumbotronBg"></div>
        <div class="jumbotron py-auto container">
            <h1 class="display-4 fw-semibold">Selamat Datang di <span class="text-warning">YuBook</span></h1>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg">
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
                            <li><a class="dropdown-item {{ $activeDashboard == 'manga' ? 'active' : '' }}" href="{{ route('user.dashboard', 'manga') }}">Manga</a></li>
                            <li><a class="dropdown-item {{ $activeDashboard == 'novel' ? 'active' : '' }}" href="{{ route('user.dashboard', 'novel') }}">Novel</a></li>
                            <li><a class="dropdown-item {{ $activeDashboard == 'pengetahuan' ? 'active' : '' }}" href="{{ route('user.dashboard', 'pengetahuan') }}">Pengetahuan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-link">
                        <a class="nav-link {{ $activeDashboard == 'all' ? 'active' : '' }}" href="{{ route('user.dashboard') }}">Semua</a>
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
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4">
            @forelse($books as $book)
            <div class="col mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <img
                        src="{{ $book->cover ? Storage::url($book->cover) : asset('assets/placeholder.png') }}"
                        class="card-img-top"
                        alt="Cover {{ $book->judul }}"
                        style="height:220px; object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title h6 mb-2 fw-bold text-truncate" title="{{ $book->judul }}">{{ $book->judul }}</h5>
                        <span class="badge bg-danger mb-2 p-1" style="font-weight: 500; font-size: 0.65rem; width: fit-content;">{{ ucfirst($book->kategori) }}</span>
                        
                        <div class="mb-2 text-muted small">
                            <div class="d-flex align-items-center mb-1">
                                <i class="fa-solid fa-user-pen me-2" style="width: 16px;"></i>
                                <span class="text-truncate">{{ $book->penulis }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-1">
                                <i class="fa-solid fa-building me-2" style="width: 16px;"></i>
                                <span class="text-truncate">{{ $book->penerbit }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-box me-2" style="width: 16px;"></i>
                                <span>Stok: <strong>{{ $book->stok }}</strong></span>
                            </div>
                        </div>

                        <div class="mt-auto">
                            @if($book->stok > 0)
                                <button type="button" class="btn btn-success w-100 btn-sm" data-bs-toggle="modal" data-bs-target="#borrowModal{{ $book->id }}">
                                    <i class="fa-solid fa-book-open me-1"></i>Pinjam
                                </button>
                            @else
                                <button type="button" class="btn btn-secondary w-100 btn-sm" disabled>Stok Habis</button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Borrow Confirmation Modal -->
                <div class="modal fade" id="borrowModal{{ $book->id }}" tabindex="-1" aria-labelledby="borrowModalLabel{{ $book->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="borrowModalLabel{{ $book->id }}"><i class="fa-solid fa-circle-info me-2 text-primary"></i>Konfirmasi Peminjaman</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-3">Apakah kamu yakin ingin meminjam buku ini?</p>
                                
                                <div class="card mb-3 border-0 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ $book->cover ? Storage::url($book->cover) : asset('assets/placeholder.png') }}" class="img-fluid rounded-start h-100" alt="{{ $book->judul }}" style="object-fit: cover; max-height: 150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-2">
                                                <h6 class="card-title fw-bold mb-1">{{ $book->judul }}</h6>
                                                <p class="card-text small text-muted mb-1"><i class="fa-solid fa-user-pen me-1"></i> {{ $book->penulis }}</p>
                                                <p class="card-text small text-muted mb-1"><i class="fa-solid fa-building me-1"></i> {{ $book->penerbit }}</p>
                                                <span class="badge bg-secondary">{{ ucfirst($book->kategori) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="alert alert-warning py-2 mb-0 small">
                                    <i class="fa-solid fa-triangle-exclamation me-1"></i> Pastikan kamu mengembalikan buku tepat waktu.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <form action="{{ route('user.borrow', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Ya, Pinjam</button>
                                </form>
                            </div>
                        </div>
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


    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="display: block; margin-bottom: -1px; margin-top: 6rem;"><path fill="#212529" fill-opacity="1" d="M0,32L30,48C60,64,120,96,180,122.7C240,149,300,171,360,181.3C420,192,480,192,540,160C600,128,660,64,720,64C780,64,840,128,900,144C960,160,1020,128,1080,133.3C1140,139,1200,181,1260,170.7C1320,160,1380,96,1410,64L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <footer class="bg-dark text-light py-3">
        <div class="container">
            <p class="text-center">&copy; {{ date('Y') }} YuBook. All rights reserved.</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('scroll', function() {
            const scrollValue = window.scrollY;
            const jumbotronBg = document.getElementById('jumbotronBg');
            
            // Only zoom if the jumbotron is visible (scroll is less than its height)
            if (scrollValue < 600) {
                const scale = 1 + (scrollValue / 2000);
                jumbotronBg.style.transform = `scale(${scale})`;
            }
        });
    </script>
</body>

</html>