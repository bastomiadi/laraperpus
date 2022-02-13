<?php

use App\Http\Controllers\{
    CatalogBookController,
    DashboardController,
    FaqController,
    HomeController
};
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/faq', FaqController::class)->name('faq');
Route::get('/catalog-book', CatalogBookController::class)->name('catalog.book');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
