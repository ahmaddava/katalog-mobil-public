<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman utama (Homepage)
Route::get('/', [PageController::class, 'home'])->name('home');

// Halaman daftar semua mobil dengan filter
Route::get('/mobil', [PageController::class, 'cars'])->name('cars.index');

// Halaman detail mobil
Route::get('/mobil/{car}', [PageController::class, 'carDetail'])->name('car.detail');

// Halaman statis
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');