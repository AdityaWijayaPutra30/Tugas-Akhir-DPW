<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Developer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        /* Custom style for active statistik link */
        .menu a.active-statistik span {
            color: red !important;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-admin">
        <div class="sidebar-admin">
            <div class="sidebar-container">
                <div class="logo">
                    <img src="{{ asset('assets/dashboard.png') }}" alt="Logo">
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <!-- Assuming we want to show the username like in admin dashboard -->
                            <h1>{{ session('username') ?? 'Developer' }}</h1>
                        </li>
                        <li>
                            <a href="{{ route('developer.statistik') }}" class="{{ request()->routeIs('developer.statistik') ? 'active-statistik' : '' }}">
                                <span>Statistik</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('developer.pengguna') }}" class="{{ request()->routeIs('developer.pengguna') || request()->routeIs('developer.edit_pengguna') ? 'active-statistik' : '' }}">
                                <span>Edit Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('developer.admin') }}" class="{{ request()->routeIs('developer.admin') || request()->routeIs('developer.edit_admin') ? 'active-statistik' : '' }}">
                                <span>Edit Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('developer.buku') }}" class="{{ request()->routeIs('developer.buku') ? 'active-statistik' : '' }}">
                                <span>Data Buku</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('developer.peminjaman') }}" class="{{ request()->routeIs('developer.peminjaman') ? 'active-statistik' : '' }}">
                                <span>Data Peminjaman</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="return confirm('Apakah Anda yakin ingin logout?')">
                                <span class="text-danger">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>  
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
