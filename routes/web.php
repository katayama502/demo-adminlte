<?php

use App\Http\Controllers\{DashboardController, ProductController, SearchController, AnalyticsController, SalesController};
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('dashboard'));

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('products', ProductController::class)->except(['show']);

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');

Route::get('/sales', [SalesController::class, 'index'])->name('sales');