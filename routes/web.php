<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\PengajuanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'role:Mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'mahasiswa'])
        ->name('mahasiswa.dashboard');

    Route::resource('mahasiswa/pengajuan', PengajuanController::class);

});


// Dashboard Admin TU
Route::middleware(['auth', 'role:Admin TU'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');
});

// Dashboard Kaprodi
Route::middleware(['auth', 'role:Kaprodi'])->group(function () {
    Route::get('/kaprodi/dashboard', [DashboardController::class, 'kaprodi'])
        ->name('kaprodi.dashboard');
});

// Dashboard Dekan
Route::middleware(['auth', 'role:Dekan'])->group(function () {
    Route::get('/dekan/dashboard', [DashboardController::class, 'dekan'])
        ->name('dekan.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
