@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">
@endpush

@section('content')

<div class="row justify-content-center">
    <div class="col">
        <div class="card" id="background-form">
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
                    <div class="mt-5">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username"
                            required>
                    </div>

                    {{-- Password --}}
                    <div class="mt-5">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password"
                            required>
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit" class="btn btn-success w-100 mt-5">
                        Login
                    </button>
                </form>

                {{-- Register --}}
                <div class="mt-3">
                    <span>Belum punya akun?</span>
                    <a href="/register" class="fs-6">
                        Sign Up
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection