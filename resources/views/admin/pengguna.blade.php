@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <h1>Data Pengguna</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show w-75 mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-container">
        <table class="table-admin">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $user->role == 'admin' ? 'badge-admin' : ($user->role == 'user' ? 'badge-user' : 'badge-dev') }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
