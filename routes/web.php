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
Route::middleware(['user', 'prevent-back-history'])->group(function (){
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
use App\Http\Controllers\AdminController;

Route::middleware(['admin', 'prevent-back-history'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/pengguna', [AdminController::class, 'pengguna'])->name('admin.pengguna');

    Route::get('/admin/buku', [AdminController::class, 'buku'])->name('admin.buku');

    Route::get('/admin/peminjaman', [AdminController::class, 'peminjaman'])->name('admin.peminjaman');

});
    Route::put('/buku/{id}/add-stock', [BukuController::class, 'addStock'])->name('buku.addStock');
    Route::resource('buku', BukuController::class);

// DEVELOPER DASHBOARD
use App\Http\Controllers\DeveloperController;

Route::middleware(['developer', 'prevent-back-history'])->group(function () {
    Route::get('/developer/dashboard', [DeveloperController::class, 'index'])->name('developer.dashboard');
    Route::get('/developer/statistik', [DeveloperController::class, 'statistik'])->name('developer.statistik');
    Route::get('/developer/pengguna', [DeveloperController::class, 'pengguna'])->name('developer.pengguna');
    Route::get('/developer/pengguna/{id}/edit', [DeveloperController::class, 'editPengguna'])->name('developer.edit_pengguna');
    Route::put('/developer/pengguna/{id}', [DeveloperController::class, 'updatePengguna'])->name('developer.update_pengguna');
    Route::delete('/developer/pengguna/{id}', [DeveloperController::class, 'destroyPengguna'])->name('developer.destroy_pengguna');
    
    // Admin Management
    Route::get('/developer/admin', [DeveloperController::class, 'admin'])->name('developer.admin');
    Route::get('/developer/admin/{id}/edit', [DeveloperController::class, 'editAdmin'])->name('developer.edit_admin');
    Route::put('/developer/admin/{id}', [DeveloperController::class, 'updateAdmin'])->name('developer.update_admin');
    Route::delete('/developer/admin/{id}', [DeveloperController::class, 'destroyAdmin'])->name('developer.destroy_admin');

    // Read-only Data Pages
    Route::get('/developer/buku', [DeveloperController::class, 'buku'])->name('developer.buku');
    Route::get('/developer/peminjaman', [DeveloperController::class, 'peminjaman'])->name('developer.peminjaman');
});



// REGISTER
Route::get('/register', [ControllerPerpus::class, 'register'])->name('register');
Route::post('/register', [ControllerPerpus::class, 'storeRegister'])->name('register.store');

// LUPA PASSWORD
Route::get('/forgot-password', [ControllerPerpus::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ControllerPerpus::class, 'prosesForgotPassword'])->name('forgot.password.process');

// LOGOUT
Route::get('/logout', [ControllerPerpus::class, 'logout'])->name('logout');





