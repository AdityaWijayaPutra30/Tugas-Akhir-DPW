@extends('layouts.developer')

@section('content')
    <div class="jumbotron">
        <h1><i class="fa-solid fa-book me-2"></i>Data Buku</h1>
    </div>

    <!-- No Add Button for Developer -->

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
                    <!-- No Action Column -->
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
