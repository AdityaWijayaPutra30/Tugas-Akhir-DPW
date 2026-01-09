<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;
use App\Models\User;
use App\Models\peminjaman;
use Illuminate\Support\Facades\Session;

class UserDashboardController extends Controller
{
    public function landing()
    {
        return view('perpus.landing', [
            'title' => 'Beranda',
            'active' => 'home'
        ]);
    }

    public function index($kategori = null)
    {
        if ($kategori) {
            $books = buku::where('kategori', 'LIKE', $kategori)->get();
            $title = 'Kategori: ' . ucfirst($kategori);
            $activeDashboard = strtolower($kategori);
        } else {
            $books = buku::all();
            $title = 'Semua Buku';
            $activeDashboard = 'all';
        }

        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => $title,
            'active' => 'dashboard', // Main nav active state
            'activeDashboard' => $activeDashboard, // Sub nav (categories) active state
            'emptyMessage' => 'Tidak ada buku tersedia dalam kategori ini.'
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

    public function dipinjam()
    {
        $userId = session('user_id');
        $borrowedBooks = peminjaman::with('buku')
            ->where('user_id', $userId)
            ->where('status', 'dipinjam')
            ->get();

        return view('perpus.dipinjam', [
            'borrowedBooks' => $borrowedBooks,
            'title' => 'Buku Dipinjam',
            'active' => 'dipinjam'
        ]);
    }

    public function borrow($id)
    {
        $userId = session('user_id');

        // Check if book is already borrowed by this user and not yet returned (assuming 'dipinjam' means active)
        $existingBorrow = peminjaman::where('user_id', $userId)
            ->where('buku_id', $id)
            ->where('status', 'dipinjam')
            ->first();

        if ($existingBorrow) {
            return redirect()->back()->with('error', 'Anda sudah meminjam buku ini dan belum dikembalikan!');
        }
        
        peminjaman::create([
            'user_id' => $userId,
            'buku_id' => $id,
            'tanggal_pinjam' => now(),
            'tanggal_kembali' => now()->addDays(7),
            'status' => 'dipinjam'
        ]);

        return redirect()->route('user.dipinjam')->with('success', 'Buku berhasil dipinjam!');
    }

    public function cancelBorrow($id)
    {
        $borrow = peminjaman::findOrFail($id);
        $borrow->delete(); // Or update status to 'dibatalkan'

        return redirect()->back()->with('success', 'Peminjaman dibatalkan.');
    }

    public function about()
    {
        return view('perpus.about', [
            'title' => 'Tentang Kami',
            'active' => 'about'
        ]);
    }

    public function contact()
    {
        return view('perpus.contact', [
            'title' => 'Hubungi Kami',
            'active' => 'contact'
        ]);
    }
}
