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
            background-image: linear-gradient(rgba(255, 255, 255, 0.81), rgba(114, 114, 114, 0.8)), url("{{ asset('assets/background_dashboard.png') }}");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
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
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            min-height: 50vh;
            margin-top: 40px;
            padding: 40px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .book-item {
            display: flex;
            flex-wrap: wrap;
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
            position: relative;
            overflow: hidden;
            min-height: 500px;
            height: auto;
            padding: 100px 0;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .navbar-secondary {
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(5px);
            z-index: 1000;
        }

        /* Back to Top Button */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #198754;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border: 2px solid white;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        #backToTop:hover {
            background-color: #146c43;
            transform: translateY(-5px);
            color: white;
        }

        #backToTop.show {
            opacity: 1;
            visibility: visible;
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
        <div class="jumbotron-bg" id="jumbotronBg"></div>
        <div class="jumbotron py-auto container">
            <h1 class="display-4 fw-semibold">Selamat Datang di <span class="text-warning">Yubook</span></h1>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-secondary sticky-top shadow-sm">
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
                        <a class="nav-link {{ $active == 'dipinjam' ? 'active' : '' }}" href="{{ route('user.dipinjam') }}">Riwayat Peminjaman</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="{{ route('user.dipinjam') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari..." aria-label="Search" value="{{ request('search') }}" />
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass me-1"></i> Cari</button>
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
                        <div><span class="badge bg-primary mb-2" style="font-weight: 500; font-size: 0.7rem;">{{ ucfirst($borrow->buku->kategori ?? '-') }}</span></div>
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

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="display: block; margin-bottom: -1px; margin-top: 6rem;"><path fill="#212529" fill-opacity="1" d="M0,32L30,48C60,64,120,96,180,122.7C240,149,300,171,360,181.3C420,192,480,192,540,160C600,128,660,64,720,64C780,64,840,128,900,144C960,160,1020,128,1080,133.3C1140,139,1200,181,1260,170.7C1320,160,1380,96,1410,64L1440,32L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
    <footer class="bg-dark text-light py-3">
        <div class="container">
            <p class="text-center">&copy; {{ date('Y') }} YuBook. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" id="backToTop" title="Ke Atas">
        <i class="fa-solid fa-chevron-up"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        window.addEventListener('scroll', function() {
            const scrollValue = window.scrollY;
            const jumbotronBg = document.getElementById('jumbotronBg');
            const backToTop = document.getElementById('backToTop');

            // Zoom effect for jumbotron
            if (scrollValue < 600) {
                const scale = 1 + (scrollValue / 2000);
                jumbotronBg.style.transform = `scale(${scale})`;
            }

            // Back to top button visibility
            if (scrollValue > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // Smooth scroll to top
        document.getElementById('backToTop').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>
