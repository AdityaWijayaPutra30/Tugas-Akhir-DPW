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

    public function index(Request $request, $kategori = null)
    {
        $search = $request->query('search');
        $query = buku::query();

        if ($kategori) {
            $query->where('kategori', 'LIKE', $kategori);
            $activeDashboard = strtolower($kategori);
        } else {
            $activeDashboard = 'all';
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('judul', 'LIKE', "%$search%")
                  ->orWhere('penulis', 'LIKE', "%$search%")
                  ->orWhere('penerbit', 'LIKE', "%$search%");
            });
        }

        $books = $query->get();

        if ($search) {
            $title = 'Hasil Pencarian: "' . $search . '"';
        } elseif ($kategori) {
            $title = 'Kategori: ' . ucfirst($kategori);
        } else {
            $title = 'Semua Buku';
        }

        // Check for overdue books
        $overdueBooks = [];
        if (session('user_id')) {
            $overdueBooks = peminjaman::with('buku')
                ->where('user_id', session('user_id')) // ini buat ngecek user_id dengan user yang lagi login (session)
                ->where('status', 'dipinjam') //ini gunanya ngecek status buku dipinjam atau tidak, kalo tidak dipinjam berarti overduebook tidak akan terisi
                ->whereDate('tanggal_kembali', '<', now()) // ngecek tanggal
                ->get() // jika semua syarat valid, data terambil dan masuk ke $overdueBooks
                ->map(function($peminjaman) { // map gunanya buat merapihkan data yang diambil tadi agar tampil dengan rapih
                    $daysOverdue = now()->diffInDays($peminjaman->tanggal_kembali); // mengambil data berapa hari perbedaan tgl now() dengan tanggal_kembali
                    return [ //gunanya untuk merapihkan data 
                        'judul' => $peminjaman->buku->judul,
                        'tanggal_kembali' => $peminjaman->tanggal_kembali,
                        'days_overdue' => $daysOverdue
                    ];
                });
        }
        //guna array yang dibawah ini, untuk mewarisi variable ke view userdashboard
        return view('perpus.userdashboard', [
            'books' => $books,
            'title' => $title,
            'active' => 'dashboard', // Main nav active state
            'activeDashboard' => $activeDashboard, // Sub nav (categories) active state
            'emptyMessage' => $search ? 'Tidak ada buku yang cocok dengan pencarian Anda.' : 'Tidak ada buku tersedia dalam kategori ini.',
            'overdueBooks' => $overdueBooks
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

    public function dipinjam(Request $request)
    {
        $userId = session('user_id');
        $search = $request->query('search');

        $query = peminjaman::with('buku')
            ->where('user_id', $userId)
            ->where('status', 'dipinjam');

        if ($search) {
            $query->whereHas('buku', function($q) use ($search) {
                $q->where('judul', 'LIKE', "%$search%")
                  ->orWhere('penulis', 'LIKE', "%$search%")
                  ->orWhere('penerbit', 'LIKE', "%$search%");
            });
        }

        $borrowedBooks = $query->get();

        return view('perpus.dipinjam', [
            'borrowedBooks' => $borrowedBooks,
            'title' => $search ? 'Hasil Pencarian di My Buku: "' . $search . '"' : 'Buku Dipinjam',
            'active' => 'dipinjam'
        ]);
    }

    public function borrow($id)
    {
        $userId = session('user_id');
        $book = buku::findOrFail($id);

        // Server-side check for stock
        if ($book->stok < 1) {
            return redirect()->back()->with('error', 'Maaf, stok buku ini sedang habis.');
        }

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

        // Decrement stock
        $book->decrement('stok');

        return redirect()->route('user.dipinjam')->with('success', 'Buku berhasil dipinjam!');
    }

    public function cancelBorrow($id)
    {
        $borrow = peminjaman::with('buku')->findOrFail($id);

        // Increment stock back
        if ($borrow->buku) {
            $borrow->buku->increment('stok');
        }

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
