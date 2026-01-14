<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                            <h1>{{ session('username') ?? 'Guest' }}</h1>
                        </li>
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <span>Statistik</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pengguna') }}" class="{{ request()->routeIs('admin.pengguna') ? 'active' : '' }}">
                                <span>Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.buku') }}" class="{{ request()->routeIs('admin.buku') ? 'active' : '' }}">
                                <span>Buku</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.peminjaman') }}" class="{{ request()->routeIs('admin.peminjaman') ? 'active' : '' }}">
                                <span>Peminjaman</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
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

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="logoutModalLabel">Konfirmasi Logout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin keluar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
