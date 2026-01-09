<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ControllerPerpus;
// LOGIN
Route::get('/', [ControllerPerpus::class, 'login']);
Route::get('/login', [ControllerPerpus::class, 'login'])->name('login');
Route::post('/login', [ControllerPerpus::class, 'prosesLogin'])->name('login.process');
//LOGOUT
Route::post('/logout', [ControllerPerpus::class, 'logout'])->name('logout');


use App\Http\Controllers\UserDashboardController;

// USER DASHBOARD
Route::middleware('user')->group(function () {
Route::get('/user/home', [UserDashboardController::class, 'landing'])->name('user.home');
Route::get('/user/dashboard/{kategori?}', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/user/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
Route::get('/user/dipinjam', [UserDashboardController::class, 'dipinjam'])->name('user.dipinjam');
Route::get('/user/about', [UserDashboardController::class, 'about'])->name('user.about');
Route::get('/user/contact', [UserDashboardController::class, 'contact'])->name('user.contact');
Route::post('/user/borrow/{id}', [UserDashboardController::class, 'borrow'])->name('user.borrow');
Route::delete('/user/cancel/{id}', [UserDashboardController::class, 'cancelBorrow'])->name('user.cancel');
});

// ADMIN DASHBOARD

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.statistik');
    })->name('admin.dashboard');

    Route::get('/admin/pengguna', function () {
        return view('admin.pengguna');
    })->name('admin.pengguna');

    Route::get('/admin/buku', function () {
        return view('admin.buku');
    })->name('admin.buku');

    Route::get('/admin/peminjaman', function () {
        return view('admin.peminjaman');
    })->name('admin.peminjaman');

    Route::resource('buku', BukuController::class);
});


// REGISTER
Route::get('/register', [ControllerPerpus::class, 'register'])->name('register');
Route::post('/register', [ControllerPerpus::class, 'storeRegister'])->name('register.store');

// LUPA PASSWORD
Route::get('/forgot-password', [ControllerPerpus::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ControllerPerpus::class, 'prosesForgotPassword'])->name('forgot.password.process');

// LOGOUT
Route::get('/logout', [ControllerPerpus::class, 'logout'])->name('logout');





