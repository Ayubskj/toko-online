<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ... kode Breeze yang sudah ada (dashboard & profile) ...

// --- TAMBAHKAN KODE INI DI SINI ---//
// --- AREA ADMIN --- //
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Resource CRUD (Gunakan ::class, jangan pakai .php)
    Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class, ['names' => [
        'index' => 'admin.produk.index',
        'create' => 'admin.produk.create',
        'store' => 'admin.produk.store',
        'show' => 'admin.produk.show',
        'edit' => 'admin.produk.edit',
        'update' => 'admin.produk.update',
        'destroy' => 'admin.produk.destroy',
    ]]);
    Route::resource('kategori', \App\Http\Controllers\Admin\KategoriController::class, ['names' => [
        'index' => 'admin.kategori.index',
        'create' => 'admin.kategori.create',
        'store' => 'admin.kategori.store',
        'show' => 'admin.kategori.show',
        'edit' => 'admin.kategori.edit',
        'update' => 'admin.kategori.update',
        'destroy' => 'admin.kategori.destroy',
    ]]);
});
// ----------------------------------

require __DIR__.'/auth.php'; // Ini harus tetap di paling bawah

