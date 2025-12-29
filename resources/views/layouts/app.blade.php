<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Online')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>

    {{-- Navbar (opsional) --}}
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-center" href="#">YuBook</a>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>