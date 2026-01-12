<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\buku;
use App\Models\peminjaman;

class DeveloperController extends Controller
{
    public function index()
    {
        return view('developer.dashboard');
    }

    public function statistik()
    {
        $totalPengguna = User::where('role', 'user')->count();
        $totalBuku = buku::count();
        $totalPinjaman = peminjaman::count();

        return view('developer.statistik', compact('totalPengguna', 'totalBuku', 'totalPinjaman'));
    }
    public function pengguna()
    {
        $users = User::where('role', 'user')->get();
        return view('developer.pengguna', compact('users'));
    }

    public function editPengguna($id)
    {
        $user = User::findOrFail($id);
        return view('developer.edit_pengguna', compact('user'));
    }

    public function updatePengguna(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users_perpus,username,' . $user->id,
            'email' => 'required|email|unique:users_perpus,email,' . $user->id . '|ends_with:@gmail.com,@yahoo.com',
            'role' => 'required|in:user,admin',
            'password' => 'nullable|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('developer.pengguna')->with('success', 'Data pengguna berhasil diperbarui');
    }

    public function destroyPengguna($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('developer.pengguna')->with('success', 'Data pengguna berhasil dihapus');
    }

    // Admin Methods
    public function admin()
    {
        $admins = User::where('role', 'admin')->get();
        return view('developer.admin', compact('admins'));
    }

    public function editAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('developer.edit_admin', compact('user'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users_perpus,username,' . $user->id,
            'email' => 'required|email|unique:users_perpus,email,' . $user->id . '|ends_with:@gmail.com,@yahoo.com',
            'role' => 'required|in:user,admin',
            'password' => 'nullable|min:8',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('developer.admin')->with('success', 'Data admin berhasil diperbarui');
    }

    public function destroyAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('developer.admin')->with('success', 'Data admin berhasil dihapus');
    }

    // Read-only Data Methods
    public function buku()
    {
        $books = buku::all();
        return view('developer.buku', compact('books'));
    }

    public function peminjaman()
    {
        $loans = peminjaman::with(['user', 'buku'])->latest()->get();
        return view('developer.peminjaman', compact('loans'));
    }
}
