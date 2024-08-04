<?php

use App\Http\Controllers\AnggotaBukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggotaPeminjamanController;
use App\Http\Controllers\AnggotaSanksiController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PenulisBukuController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'adminAccess'])->name('admin.')->group(function () {
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/anggota', AnggotaController::class);
    Route::resource('/admin/rak', RakController::class);
    Route::resource('/admin/penulis', PenulisController::class);
    Route::resource('/admin/buku', BukuController::class);
    Route::resource('/admin/peminjaman', PeminjamanController::class);
    Route::resource('/admin/sanksi', SanksiController::class);
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'penulisAccess'])->name('penulis.')->group(function () {
    Route::resource('/penulis/buku', PenulisBukuController::class);
    Route::get('/penulis/dashboard', [DashboardController::class, 'penulisDashboard'])->name('penulis.dashboard');
});

Route::middleware(['auth', 'anggotaAccess'])->name('anggota.')->group(function () {
    Route::resource('/anggota/buku', AnggotaBukuController::class);
    Route::resource('/anggota/peminjaman', AnggotaPeminjamanController::class);
    Route::resource('/anggota/sanksi', AnggotaSanksiController::class);
    Route::get('/anggota/dashboard', [DashboardController::class, 'anggotaDashboard'])->name('anggota.dashboard');
});