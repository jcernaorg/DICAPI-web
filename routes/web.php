<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AIController;
use App\Http\Controllers\BlogPublicController;

// Ruta principal (inicio)
Route::get('/', function () {
    return view('welcome');
});

// Redirección global para cualquier otra ruta
Route::any('{any}', function () {
    return redirect('/');
})->where('any', '.*');

// Route::get('/', [ProgramController::class, 'index'])->name('home');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/programs', [ProgramController::class, 'list'])->name('programs');
// Route::get('/program-details/{id}', [ProgramController::class, 'show'])->name('program-details');

// Route::get('/donations', [DonationController::class, 'index'])->name('donations');
// Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');

// Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/blog', [BlogPublicController::class, 'index'])->name('blog');
// Route::get('/blog/{blog:slug}', [BlogPublicController::class, 'show'])->name('blog-review');

// Route::get('/teams', [TeamController::class, 'index'])->name('teams');

// Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
// Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Route::get('/terms-conditions', function () {
//     return view('terms-conditions');
// })->name('terms-conditions');

// Route::get('/privacy-policy', function () {
//     return view('privacy-policy');
// })->name('privacy-policy');

// Route::get('/mision', function () {
//     return view('mision');
// })->name('mision');

// Route::get('/vision', function () {
//     return view('vision');
// })->name('vision');

// Route::get('/404', function () {
//     return view('errors.404');
// })->name('404');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes (no middleware)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Blog management
        Route::resource('blogs', BlogController::class);
        Route::patch('blogs/{blog}/toggle-status', [BlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
        
        // AI Content generation
        Route::post('ai/generate', [AIController::class, 'generateContent'])->name('ai.generate');
    });
});
