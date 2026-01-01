<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class UserDashboardController extends Controller
{
    public function index()
    {
        $books = buku::all(); // Mengambil semua buku
        return view('perpus.userdashboard', compact('books'));
    }

    public function top()
    {
        $books = buku::all(); 
        return view('perpus.userdashboard_top', compact('books'));
    }

    public function recent()
    {
        $books = buku::all(); 
        return view('perpus.userdashboard_recent', compact('books'));
    }

    public function rating()
    {
        $books = buku::all();
        return view('perpus.userdashboard_rating', compact('books'));
    }
}
