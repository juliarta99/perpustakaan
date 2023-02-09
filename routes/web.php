<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest')->name('login');

Route::get('/dashboard/user/create', [UserController::class, 'create']);
Route::post('/dashboard/user', [UserController::class, 'store']);
Route::get('/dashboard/user', [UserController::class, 'all']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');