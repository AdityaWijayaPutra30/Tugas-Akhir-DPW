<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function index()
    {
        $books = buku::all(); // Mengambil semua buku
        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => 'Semua Buku',
            'active' => 'all',
            'emptyMessage' => 'Tidak ada buku tersedia.'
        ]);
    }

    public function top()
    {
        $books = buku::all(); 
        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => 'Buku Terpopuler',
            'active' => 'top',
            'emptyMessage' => 'Belum ada buku populer.'
        ]);
    }

    public function recent()
    {
        $books = buku::all(); 
        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => 'Buku Terbaru',
            'active' => 'recent',
            'emptyMessage' => 'Belum ada buku terbaru.'
        ]);
    }

    public function rating()
    {
        $books = buku::all();
        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => 'Buku Berdasarkan Peringkat',
            'active' => 'rating',
            'emptyMessage' => 'Belum ada data rating.'
        ]);
    }

    public function profile()
    {
        $user = User::where('id', session('user_id'))->first();
        return view('perpus.profile', [
            'user' => $user,
            'title' => 'Profil Pengguna',
            'active' => 'profile' 
        ]);
    }
}
