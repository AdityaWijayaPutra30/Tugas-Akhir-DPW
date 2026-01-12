<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">

<div class="container" style="max-width:720px;">
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="mb-3">Tambah Buku</h4>

      {{-- NOTIF BERHASIL --}}
      @if(session('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      @endif

        {{-- NOTIF TIDAK BERHASIL --}}
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <strong>Gagal menyimpan data!</strong> Periksa input kamu lalu coba lagi.
            <hr>
            <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
            </ul>
        </div>
        @endif


      <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data" novalidate>
        @csrf

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
            <input type="number" name="stok" class="form-control" value="{{ old('stok',0) }}" min="0" required>
          </div>
          <div class="col-md-8 mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="date" name="tahun_terbit" class="form-control" value="{{ old('tahun_terbit') }}" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Cover Buku (Gambar)</label>
          <input type="file" name="cover" class="form-control" accept="image/*">
          <div class="form-text">
            Format: JPG/JPEG/PNG/WEBP (max 2MB)
          </div>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
