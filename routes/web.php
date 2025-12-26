<?php

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

Route::get('/', [ControllerPerpus::class, 'login']);
Route::get('/login', [ControllerPerpus::class, 'login'])->name('login');
Route::post('/login', [ControllerPerpus::class, 'prosesLogin'])->name('login.process');

Route::get('/user/dashboard', function () {
    return view('perpus.userdashboard');
})->name('user.dashboard');
Route::get('/admin/dashboard', function () {
    return view('perpus.admindashboard');
})->name('admin.dashboard');

// REGISTER
Route::get('/register', [ControllerPerpus::class, 'register'])->name('register');
Route::post('/register', [ControllerPerpus::class, 'storeRegister'])->name('register.store');




