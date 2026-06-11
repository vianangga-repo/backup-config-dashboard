<?php

use App\Http\Controllers\BackupDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// 1. Halaman utama sebelum login (Bawaan Laravel)
Route::get('/', function () {
    return view('welcome');
});

// 2. Grup Route setelah Login (Terproteksi Middleware Auth)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Satukan rute dashboard bawaan Breeze ke Controller Anda
    Route::get('/dashboard', [BackupDashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/dashboard/backup/download/{filename}', [BackupDashboardController::class, 'download'])->name('backup.download');

    Route::get('/bgpnoc', [BackupDashboardController::class, 'bgpnoc'])->name('bgpnoc');

    // Halaman list file Tandes
    Route::get('/distribution/tandes',[BackupDashboardController::class, 'disttandes'])->name('distri.tandes');
    // Eksekusi download file Tandes
    Route::get('/distribution/tandes/download/{filename}', [BackupDashboardController::class, 'downloadTandes'])->name('distri.tandes.download');

    // Halaman list file Dinkes
    Route::get('/distribution/dinkes',[BackupDashboardController::class, 'distdinkes'])->name('distri.dinkes');
    // Eksekusi download file Dinkes
    Route::get('/distribution/dinkes/download/{filename}', [BackupDashboardController::class, 'downloadDinkes'])->name('distri.dinkes.download');

    
    // Tambahkan kembali rute profile bawaan Breeze ini:
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Rute Autentikasi bawaan Breeze (Login, Logout, dll)
require __DIR__.'/auth.php';