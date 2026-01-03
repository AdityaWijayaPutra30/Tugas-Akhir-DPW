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

use App\Http\Controllers\UserDashboardController;

// USER DASHBOARD
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::get('/user/dashboard/top', [UserDashboardController::class, 'top'])->name('user.dashboard.top');
Route::get('/user/dashboard/recent', [UserDashboardController::class, 'recent'])->name('user.dashboard.recent');
Route::get('/user/dashboard/rating', [UserDashboardController::class, 'rating'])->name('user.dashboard.rating');
Route::get('/admin/dashboard', function () {
    return view('perpus.admindashboard');
})->name('admin.dashboard');

// REGISTER
Route::get('/register', [ControllerPerpus::class, 'register'])->name('register');
Route::post('/register', [ControllerPerpus::class, 'storeRegister'])->name('register.store');

// LUPA PASSWORD
Route::get('/forgot-password', [ControllerPerpus::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [ControllerPerpus::class, 'prosesForgotPassword'])->name('forgot.password.process');

Route::resource('buku', BukuController::class);




