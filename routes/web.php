<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Temporary Route untuk Migrasi di Vercel (Hapus nanti!)
Route::get('/migrate-db', function () {
    try {
        Artisan::call('migrate:fresh --seed --force');
        return "Database berhasil di-migrate & seed! Silakan buka halaman utama.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');

// Route untuk halaman mobil
Route::get('/mobil', [PageController::class, 'cars'])->name('cars.index');
Route::get('/mobil/{car}', [PageController::class, 'carDetail'])->name('car.detail');

Route::get('/test-image', function() {
    $path = public_path('storage/01JHMN055N833T7KA585E3D1X4.png'); // Ganti dengan nama file yang ada
    if(file_exists($path)) {
        return "File exists at: " . $path;
    } else {
        return "File does not exist at: " . $path;
    }
});