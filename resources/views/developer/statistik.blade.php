@extends('layouts.developer')

@section('content')
    <div class="jumbotron">
        <h1>Statistik Perpus</h1>
    </div>

    <div class="stats-wrapper">
        <div class="stats-container">
            <div class="stats-item">
                <div class="stats-label"><i class="fa-solid fa-users me-2 fs-4"></i>Data Pengguna :</div>
                <div class="data-box box-teal d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-user fs-1 me-3"></i>
                    <span class="fs-2">{{ $totalPengguna }}</span>
                </div>
            </div>
            <div class="stats-item">
                <div class="stats-label"><i class="fa-solid fa-book me-2 fs-4"></i>Data Buku :</div>
                <div class="data-box box-green d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-book-open fs-1 me-3"></i>
                    <span class="fs-2">{{ $totalBuku }}</span>
                </div>
            </div>
            <div class="stats-item">
                <div class="stats-label"><i class="fa-solid fa-clipboard-list me-2 fs-4"></i>Data Pinjaman :</div>
                <div class="data-box box-red d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-chart-bar fs-1 me-3"></i>
                    <span class="fs-2">{{ $totalPinjaman }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection


