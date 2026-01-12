@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <h1>Data Buku</h1>
    </div>

    <div class="d-flex justify-content-end mb-3" style="width: 95%; max-width: 1200px;">
        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
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
                    <td>
                        <div class="d-flex gap-1">
                            <form action="{{ route('buku.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
