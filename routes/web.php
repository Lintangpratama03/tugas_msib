<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;

// Mengarahkan langsung ke halaman charts
Route::get('/', [ChartController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/charts', [ChartController::class, 'index']);
Route::get('/api/charts', [ChartController::class, 'apiCharts']);
