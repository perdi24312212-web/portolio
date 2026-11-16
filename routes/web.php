<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
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
    return view('welcome');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('home');

Route::get('/download-cv', function () {
    $path = public_path('cv/Perdi-CV.pdf');
    if (!file_exists($path)) {
        abort(404, 'File CV belum tersedia.');
    }

    return response()->download($path, 'Perdi-CV.pdf', [
        'Content-Type' => 'application/pdf',
    ]);
})->name('cv.download');

Route::post('/contact', [ContactController::class, 'send'])
    ->middleware('throttle:5,1')
    ->name('contact.send');
