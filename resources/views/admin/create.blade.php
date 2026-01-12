@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <h1>Tambah Buku</h1>
    </div>

    <div class="table-container" style="max-width: 800px;">
        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- NOTIF TIDAK BERHASIL --}}
            @if($errors->any())
            <div class="alert alert-danger mb-4" role="alert">
                <strong>Gagal menyimpan data!</strong> Periksa input kamu lalu coba lagi.
                <hr>
                <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ old('penulis') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Penerbit</label>
                    <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', 0) }}" min="0" required>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="date" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit') }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Cover Buku (Gambar)</label>
                <input type="file" name="cover" class="form-control" accept="image/*">
                <div class="form-text">
                    Format: JPG/JPEG/PNG/WEBP (max 2MB)
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                <a href="{{ route('admin.buku') }}" class="btn btn-secondary px-4">Kembali</a>
            </div>
        </form>
    </div>
@endsection
