<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class ControllerPerpus extends Controller
{
    // tampil login
    public function login()
    {
        return view('perpus.login');
    }

    // tampil register
    public function register()
    {
        return view('perpus.register');
    }
    public function prosesLogin(Request $request)


    {
        // validasi
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // cek user & password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Username atau password salah');
        }

        // simpan session
        Session::put('login', true);
        Session::put('user_id', $user->id);
        Session::put('role', $user->role);
        Session::put('username', $user->username);

        // redirect berdasarkan role
        if ($user->role === 'user') {
            return redirect()->route('user.dashboard');
        }
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }


        // kalau nanti ada admin
        return redirect('/login');
    }

    // proses register
    public function storeRegister(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users_perpus,username',
            'email' => 'required|email|unique:users_perpus,email',
            'password' => 'required|min:3',
        ]);

        // simpan ke database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // redirect ke login
        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login');
    }

    // Tampil Lupa Password
    public function forgotPassword()
    {
        return view('perpus.forgot_password');
    }

    // Proses Lupa Password
    public function prosesForgotPassword(Request $request)
    {
        // Validasi
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password_lama' => 'required',
            'password_baru' => 'required|min:3',
        ]);

        // Cari user
        $user = User::where('username', $request->username)
            ->where('email', $request->email)
            ->first();

        // Cek apakah user ada
        if (!$user) {
            return back()->with('error', 'Username atau Email tidak ditemukan');
        }

        // Cek password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama salah');
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect('/login')->with('success', 'Password berhasil diubah, silakan login dengan password baru');
    }
}
