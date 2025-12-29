@extends('layouts.app')

@section('title', 'Register')


@push('styles')
<link rel="stylesheet" href="{{ asset('css/registerlogin.css') }}">
@endpush

@section('content')

<div class="container-register">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card shadow-sm" id="background-form">
                <div class="card-body">

                    <h4 class="text-center mb-4">Sign Up</h4>

                    {{-- Error Validation --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-success w-100">
                            Sign Up
                        </button>
                    </form>

                    <div class="mt-3">
                        Sudah punya akun?
                        <a href="/login" class="fs-6">Login</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection