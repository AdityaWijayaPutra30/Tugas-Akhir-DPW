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

    // LOGOUT
public function logout(Request $request)
{
    Session::flush();                 // gunanya buathapus semua session
    $request->session()->invalidate(); // invalidasi atau mengakhiri session
    $request->session()->regenerateToken();

    return redirect()->route('login');
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

        // gunanya buat cari user berdasarkan username
        $user = User::where('username', $request->username)->first();

        // 1. Cek login sebagai Regular User / Admin (Tabel users_perpus)
        if ($user && Hash::check($request->password, $user->password)) {
            // buat nyimpen session
            Session::put('login', true);
            Session::put('user_id', $user->id);
            Session::put('role', $user->role);
            Session::put('username', $user->username);

            // redirect berdasarkan role
            if ($user->role === 'user') {
                return redirect()->route('user.home');
            }
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        // 2. Cek login sebagai Developer (Tabel developers)
        // Gunakan model developer (\App\Models\developer)
        $developer = \App\Models\developer::where('username', $request->username)->first();

        if ($developer && Hash::check($request->password, $developer->password)) {
             // buat nyimpen session developer
            Session::put('login', true);
            Session::put('user_id', $developer->id);
            Session::put('role', $developer->role);
            Session::put('username', $developer->username);

            return redirect()->route('developer.dashboard');
        }

        // Jika tidak ditemukan di kedua tabel
        return back()->with('error', 'Username atau password salah');
    }

    // proses register
    public function storeRegister(Request $request)
    {
        // validasi
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users_perpus,username',
            'email' => 'required|email|unique:users_perpus,email|ends_with:@gmail.com,@yahoo.com',
            'password' => 'required|min:8',
        ], [
            'email.ends_with' => 'Email harus menggunakan domain @gmail.com atau @yahoo.com',
        ]);

        // nyimpen ke database
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
            'password_baru' => 'required|min:8',
        ]);

        // Cari user
        $user = User::where('username', $request->username)
            ->where('email', $request->email)
            ->first();

        // Cek apakah user ada
        if (!$user) {
            return back()->with('error', 'Username atau Email tidak ditemukan');
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect('/login')->with('success', 'Password berhasil diubah, silakan login dengan password baru');
    }


}
