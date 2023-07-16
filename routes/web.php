<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;

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
// Halaman utama login.

Route::redirect('/', '/login');
Route::get('/login', [SessionController::class, 'index']);
Route::post('/login/check', [SessionController::class, 'login']); //check email dan password

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/master/mahasiswa', MahasiswaController::class);
Route::get('/master/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');

// Route::get('/master/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/master/mahasiswa/{id}', [MahasiswaController::class, 'show'])->where('id', '[0-9]+');
