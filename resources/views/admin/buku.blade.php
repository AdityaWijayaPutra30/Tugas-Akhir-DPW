@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <h1><i class="fa-solid fa-book me-2"></i>Data Buku</h1>
    </div>

    <div class="d-flex justify-content-end mb-3" style="width: 95%; max-width: 1200px;">
        <a href="{{ route('buku.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus me-1"></i>Tambah Buku</a>
    </div>

    <div class="table-container">
        <table class="table-admin">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Stok</th>
                    <th>Tahun</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ $book->cover ? Storage::url($book->cover) : asset('assets/placeholder.png') }}" alt="Cover" style="width: 50px; height: 75px; object-fit: cover; border-radius: 5px;">
                    </td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->penerbit }}</td>
                    <td>{{ $book->stok }}</td> 
                    <td>{{ \Carbon\Carbon::parse($book->tahun_terbit)->format('Y') }}</td>
                    <td>{{ $book->kategori }}</td> 
                    <td>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addStockModal{{ $book->id }}">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <form action="{{ route('buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash me-1"></i>Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- Add Stock Modal -->
                <div class="modal fade" id="addStockModal{{ $book->id }}" tabindex="-1" aria-labelledby="addStockModalLabel{{ $book->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addStockModalLabel{{ $book->id }}">Tambah Stok Buku</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('buku.addStock', $book->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <p>Menambahkan stok untuk buku: <strong>{{ $book->judul }}</strong></p>
                                    <div class="mb-3">
                                        <label for="jumlah_stok" class="form-label">Jumlah Stok Tambahan</label>
                                        <input type="number" class="form-control" name="jumlah_stok" min="1" required placeholder="Masukkan jumlah stok">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
