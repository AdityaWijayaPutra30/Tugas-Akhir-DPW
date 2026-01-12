@extends('layouts.admin')

@section('content')
    <div class="jumbotron">
        <h1>Data Peminjaman</h1>
    </div>

    <div class="table-container">
        <table class="table-admin">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $loan->user->name ?? 'User Tidak Ditemukan' }}</td>
                    <td>{{ $loan->buku->judul ?? 'Buku Tidak Ditemukan' }}</td>
                    <td>{{ \Carbon\Carbon::parse($loan->tanggal_pinjam)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($loan->tanggal_kembali)->format('d M Y') }}</td>
                    <td>
                        @php
                            $statusClass = '';
                            switch(strtolower($loan->status)) {
                                case 'dipinjam': $statusClass = 'badge-user'; break;
                                case 'kembali': $statusClass = 'badge-dev'; break;
                                case 'dibatalkan': $statusClass = 'badge-admin'; break;
                                default: $statusClass = 'bg-secondary';
                            }
                        @endphp
                        <span class="badge {{ $statusClass }}">
                            {{ ucfirst($loan->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
