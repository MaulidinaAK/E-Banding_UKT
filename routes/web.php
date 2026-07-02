<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Mahasiswa\PengajuanController;
use App\Http\Controllers\Admin\PengajuanController as AdminPengajuanController;
use App\Http\Controllers\DekanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {

    $role = auth()->user()->role->name;

    return match ($role) {

        'Mahasiswa' => redirect()->route('mahasiswa.dashboard'),

        'Admin TU' => redirect()->route('admin.dashboard'),

        'Kaprodi' => redirect()->route('kaprodi.dashboard'),

        'Dekan' => redirect()->route('dekan.dashboard'),

        default => redirect('/'),

    };

})->name('dashboard');



Route::middleware(['auth', 'role:Mahasiswa'])->group(function () {

    Route::get('/mahasiswa/dashboard', [DashboardController::class, 'mahasiswa'])
        ->name('mahasiswa.dashboard');

    Route::resource('mahasiswa/pengajuan', PengajuanController::class);

});


// Dashboard Admin TU
Route::middleware(['auth', 'role:Admin TU'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');

    Route::get('/admin/pengajuan', [AdminPengajuanController::class, 'index'])
        ->name('admin.pengajuan.index');

    Route::get(
    '/admin/pengajuan/{pengajuan}',
    [AdminPengajuanController::class, 'show']
)->name('admin.pengajuan.show');

    Route::patch(
    '/admin/pengajuan/{pengajuan}/status',
    [AdminPengajuanController::class, 'updateStatus']
)->name('admin.pengajuan.updateStatus');

    Route::get('/admin/riwayat', [AdminPengajuanController::class, 'riwayat'])
    ->name('admin.riwayat');

});

// Dashboard Kaprodi
Route::middleware(['auth', 'role:Kaprodi'])->group(function () {

    Route::get('/kaprodi/dashboard', [DashboardController::class, 'kaprodi'])
        ->name('kaprodi.dashboard');

    Route::get('/kaprodi/pengajuan', [AdminPengajuanController::class, 'kaprodiIndex'])
        ->name('kaprodi.pengajuan.index');

    Route::get('/kaprodi/pengajuan/{pengajuan}', [AdminPengajuanController::class, 'kaprodiShow'])
        ->name('kaprodi.pengajuan.show');

    Route::patch('/kaprodi/pengajuan/{pengajuan}/status',
        [AdminPengajuanController::class, 'kaprodiUpdateStatus'])
        ->name('kaprodi.pengajuan.updateStatus');

    Route::get('/kaprodi/riwayat', [AdminPengajuanController::class, 'kaprodiRiwayat'])
    ->name('kaprodi.riwayat');

});

// Dashboard Dekan

Route::middleware(['auth', 'role:Dekan'])->group(function () {

    Route::get('/dekan/dashboard', [DashboardController::class, 'dekan'])
        ->name('dekan.dashboard');

    Route::get('/dekan/pengajuan', [DekanController::class, 'index'])
        ->name('dekan.pengajuan.index');

    Route::get('/dekan/pengajuan/{pengajuan}', [DekanController::class, 'show'])
        ->name('dekan.pengajuan.show');

    Route::patch('/dekan/pengajuan/{pengajuan}/status',
        [DekanController::class, 'updateStatus'])
        ->name('dekan.pengajuan.updateStatus');

    Route::get('/dekan/riwayat',
        [DekanController::class, 'riwayat'])
        ->name('dekan.riwayat');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});


require __DIR__.'/auth.php';
