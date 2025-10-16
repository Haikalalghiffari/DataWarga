<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\WargaController;

// Halaman awal langsung ke login
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/statistik', [App\Http\Controllers\StatistikController::class, 'index'])->name('statistik.index');


// === AUTH ===
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === PROTEKSI MANUAL TANPA MIDDLEWARE ===
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Rute CRUD — hanya bisa diakses setelah login
Route::group(['prefix' => '', 'middleware' => []], function () {
    Route::get('/rw', [RwController::class, 'index'])->name('rw.index')->middleware('check.session');
    Route::resource('rw', RwController::class)->except(['show']);

    Route::get('/rt', [RtController::class, 'index'])->name('rt.index')->middleware('check.session');
    Route::resource('rt', RtController::class)->except(['show']);

    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index')->middleware('check.session');
    Route::resource('warga', WargaController::class)->except(['show']);
});
