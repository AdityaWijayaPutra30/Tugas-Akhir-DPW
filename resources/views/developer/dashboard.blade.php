@extends('layouts.developer')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Developer Dashboard, {{ session('username') ?? 'Guest' }}!</h1>
    </div>
@endsection
