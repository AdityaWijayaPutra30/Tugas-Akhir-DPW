@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h4 class="text-center mb-4">Login Perpustakaan</h4>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Form Login --}}
                    <form method="POST" action="/login">
                        @csrf

                        {{-- Username --}}
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                                required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                                required>
                        </div>

                        {{-- Tombol Login --}}
                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                    {{-- Register --}}
                    <div class="text-center mt-3">
                        <span>Belum punya akun?</span>
                        <a href="/register" class="text-decoration-none">
                            Register
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
