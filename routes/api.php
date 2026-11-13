<?php

use App\Http\Controllers\Api\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::prefix('portfolio')->group(function () {
    Route::get('/profile', [PortfolioController::class, 'profile']);
    Route::get('/skills', [PortfolioController::class, 'skills']);
    Route::get('/projects', [PortfolioController::class, 'projects']);
    Route::get('/projects/{slug}', [PortfolioController::class, 'projectDetail']);
    Route::get('/experiences', [PortfolioController::class, 'experiences']);
    Route::get('/certificates', [PortfolioController::class, 'certificates']);
});
