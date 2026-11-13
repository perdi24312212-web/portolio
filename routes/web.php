<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/api/portfolio', [PortfolioController::class, 'apiIndex'])->name('api.portfolio');
Route::get('/api/projects', [PortfolioController::class, 'apiProjects'])->name('api.projects');
Route::get('/api/skills', [PortfolioController::class, 'apiSkills'])->name('api.skills');
Route::get('/api/experience', [PortfolioController::class, 'apiExperience'])->name('api.experience');

Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');
