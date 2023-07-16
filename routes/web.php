<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\UsersController;

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

Route::resource('/master/mahasiswa', MahasiswaController::class)->middleware('isLogin');
Route::get('/master/mahasiswa/search', [MahasiswaController::class, 'search'])->name('mahasiswa.search');
Route::post('/master/mahasiswa/filter', [MahasiswaController::class, 'filter'])->name('mahasiswa.filter');

Route::get('/master/cetak_pdf', [MahasiswaController::class, 'cetak_pdf'])->name('cetak_pdf')->middleware('isLogin');
Route::get('/master/cetak_excel', [MahasiswaController::class, 'cetak_excel'])->name('cetak_excel')->middleware('isLogin');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('isLogin');
Route::get('/birth-year-chart', [DashboardController::class, 'birthYearChart']);
Route::get('/master/kota', [KotaController::class, 'index'])->name('kota.index')->middleware('isLogin');
Route::get('/master/kota/search', [KotaController::class, 'show'])->name('kota.search')->middleware('isLogin');

Route::get('/users', [UsersController::class, 'index'])->middleware('isLogin');

Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

// Route::get('/master/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/master/mahasiswa/{id}', [MahasiswaController::class, 'show'])->where('id', '[0-9]+');
