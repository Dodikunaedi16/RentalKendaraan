<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Route Halaman Utama (Landing Page)
Route::get('/', function () {
    return view('lending');
})->name('lending');

// Route Dashboard dengan Middleware Auth
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route Register
Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

// Route Login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses');
Route::get('login/keluar', [LoginController::class, 'keluar'])->name('login.keluar');

// Route yang membutuhkan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/users', function () {
        return view('users.index');
    })->name('users');

    Route::get('mobil', function () {
        return view('mobil.index');
    })->name('mobil');

    Route::get('transaksi', function () {
        return view('transaksi.index');
    })->name('transaksi');

    Route::get('laporan', function () {
        return view('laporan.index');
    })->name('laporan');

    Route::get('dataTransaksi', function () {
        return view('dataTransaksi.index');
    })->name('dataTransaksi');

    Route::get('tambah', function () {
        return view('tambah.index');
    })->name('tambah');
});
