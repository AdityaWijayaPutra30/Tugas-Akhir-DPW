@extends('layouts.app')

@section('title', 'Yubook - Lupa Password')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col">
        <div class="card" id="background-form">
            <div class="card-body">

                <h4 class="text-center mb-4">Lupa Password</h4>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Form Lupa Password --}}
                <form method="POST" action="/forgot-password">
                    @csrf

                    {{-- Username --}}
                    <div class="mt-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    {{-- Email --}}
                    <div class="mt-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                    </div>

                    {{-- Password Lama --}}
                    <div class="mt-3">
                        <label class="form-label">Password Lama</label>
                        <input type="password" name="password_lama" class="form-control" placeholder="Masukkan password lama" required>
                    </div>

                    {{-- Password Baru --}}
                    <div class="mt-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password_baru" class="form-control" placeholder="Masukkan password baru" required>
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="btn btn-warning w-100 mt-4">
                        Ganti Password
                    </button>
                </form>

                {{-- Back to Login --}}
                <div class="mt-3 text-center">
                    <a href="/login" class="fs-6 text-decoration-none">
                        Kembali ke Login
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
