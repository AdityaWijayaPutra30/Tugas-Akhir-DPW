<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\buku;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalPengguna = User::where('role', 'user')->count();
        $totalBuku = buku::count();
        $totalPinjaman = peminjaman::count();

        return view('admin.statistik', compact('totalPengguna', 'totalBuku', 'totalPinjaman'));
    }

    public function pengguna()
    {
        $users = User::all();
        return view('admin.pengguna', compact('users'));
    }

    public function buku()
    {
        $books = buku::all();
        return view('admin.buku', compact('books'));
    }

    public function peminjaman()
    {
        $loans = peminjaman::with(['user', 'buku'])->latest()->get();
        return view('admin.peminjaman', compact('loans'));
    }
}
