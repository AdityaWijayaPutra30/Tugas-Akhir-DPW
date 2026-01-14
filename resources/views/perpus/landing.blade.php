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

        body {
            background-image: url("{{ asset('assets/background_home.png') }}");
            background-size: cover;
            background-position: center;
            background-color: #000000b3;
            background-blend-mode: darken;
            background-attachment: fixed;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: #fff;
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
                transform: translateY(-20px) translateX(1   0px) rotate(2deg);
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

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
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
            <h1>Selamat Datang di YuBook <span class="fw-bold text-warning">{{ session('username') ?? 'Guest' }}</span></h1>
            <p>Tempat yang tepat untuk menemukan buku yang Anda butuhkan</p>
            <a href="{{ route('user.dashboard') }}" class="btn btn-success btn-lg">Buka Dashboard</a>
        </div>
        <div class="right">
            <img src="{{ asset('assets/logo-welcome.png') }}" alt="Landing Page">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Back to top button visibility
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.scrollY > 300) {
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
