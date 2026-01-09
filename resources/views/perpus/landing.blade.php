<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YuBook - {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }

        body{
            background-image: url("{{ asset('assets/background_home.png') }}");
            background-size: cover;
            background-position: center;
            background-color: #000000b3;
            background-blend-mode: darken;
        }
        
        .jumbotron {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 80px 10%;
            min-height: calc(100vh - 56px);
        }

        .jumbotron .left {
            flex: 1;
            padding-right: 50px;
        }

        .jumbotron .left h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .jumbotron .left p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .jumbotron .right {
            flex: 1;
            text-align: right;
        }

        .jumbotron .right img {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) translateX(10px) rotate(2deg);
            }
            66% {
                transform: translateY(-10px) translateX(-10px) rotate(-2deg);
            }
        }

        @media (max-width: 991px) {
            .jumbotron {
                flex-direction: column;
                text-align: center;
                padding: 50px 20px;
            }
            .jumbotron .left {
                padding-right: 0;
                margin-bottom: 40px;
            }
            .jumbotron .right {
                text-align: center;
            }
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
    
    <div class="jumbotron text-white">
        <div class="left">
            <h1>Selamat Datang di YuBook <span class="fw-bold">{{ session('username') ?? 'Guest' }}</span></h1>
            <p>Tempat yang tepat untuk menemukan buku yang Anda butuhkan</p>
            <a href="{{ route('user.dashboard') }}" class="btn btn-success btn-lg">Buka Dashboard</a>
        </div>
        <div class="right">
            <img src="{{ asset('assets/logo-welcome.png') }}" alt="Landing Page">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
