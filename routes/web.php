<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\UserController;

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
// home
Route::get('/', [HomeController::class, 'index'])->name('home');
// login & logout
Route::get('/login', [UserController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest')->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// show buku
Route::get('/pinjam/{buku:id}', [HomeController::class, 'pinjam']);
// peminjaman & pengembalian (user)
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->middleware('auth');
Route::get('/pengembalian', [PengembalianController::class, 'index'])->middleware('auth');
// home dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('is_petugas');
// peminjaman resource
Route::get('/dashboard/peminjaman/all', [PeminjamanController::class, 'all'])->middleware('is_petugas');
Route::resource('/dashboard/peminjaman', PeminjamanController::class)->middleware('is_petugas');
// pengembalian resource
Route::get('/dashboard/pengembalian/all', [PengembalianController::class, 'all'])->middleware('is_petugas');
Route::resource('/dashboard/pengembalian', PengembalianController::class)->middleware('is_petugas');
// buku resource
Route::resource('/dashboard/buku', BukuController::class)->middleware('is_petugas');
// kategori resource
Route::resource('/dashboard/kategori', KategoriController::class)->middleware('is_petugas');
// rak resource
Route::resource('/dashboard/rak', RakController::class)->middleware('is_petugas');
// sanksi recource
Route::resource('/dashboard/sanksi', SanksiController::class)->middleware('is_petugas');
// user resource
Route::get('/dashboard/user/all', [UserController::class, 'all'])->middleware('is_admin');
Route::resource('/dashboard/user', UserController::class)->middleware('is_admin');
