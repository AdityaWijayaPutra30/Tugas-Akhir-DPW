@extends('layouts.developer')

@section('content')
    <div class="jumbotron">
        <h1>Statistik Perpus</h1>
    </div>

    <div class="stats-wrapper">
        <div class="stats-container">
            <div class="stats-item">
                <div class="stats-label">Data Pengguna :</div>
                <div class="data-box box-teal">
                    {{ $totalPengguna }}
                </div>
            </div>
            <div class="stats-item">
                <div class="stats-label">Data Buku :</div>
                <div class="data-box box-green">
                    {{ $totalBuku }}
                </div>
            </div>
            <div class="stats-item">
                <div class="stats-label">Data Pinjaman :</div>
                <div class="data-box box-red">
                    {{ $totalPinjaman }}
                </div>
            </div>
        </div>
    </div>
@endsection


