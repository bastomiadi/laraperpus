<?php

use App\Http\Controllers\{
    CatalogBookController,
    DashboardController,
    FaqController,
    HomeController,
    RiwayatPeminjamanController
};
use App\Http\Controllers\Admin\{
    BookController,
    CategoryBookController,
    LoanController
};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/faq', FaqController::class)->name('faq');
Route::get('/catalog-book', [CatalogBookController::class, 'catalog'])->name('catalog.book');
Route::get('/catalog-book/{slug}', [CatalogBookController::class, 'category'])->name('catalog');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::middleware('role.admin')->prefix('admin')->group(function () {
        Route::resource('category', CategoryBookController::class);
        Route::resource('book', BookController::class);
        Route::resource('loan', LoanController::class);
    });

    // Mahasiswa
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/history', [RiwayatPeminjamanController::class, 'history'])->name('history');
        Route::get('/book', [RiwayatPeminjamanController::class, 'book'])->name('book');
        Route::get('/book/pinjam', [RiwayatPeminjamanController::class, 'pinjam'])->name('pinjam');
        Route::get('/book/create', [RiwayatPeminjamanController::class, 'create'])->name('pinjam.create');
        Route::post('/book/pinjam', [RiwayatPeminjamanController::class, 'store'])->name('pinjam.store');
    });
});

require __DIR__ . '/auth.php';
