<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PlantillaController;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones.index');
Route::get('/publicaciones/{id}', [PublicacionController::class, 'show'])->name('publicaciones.show');
Route::get('/publicaciones/{id}/download', [PublicacionController::class, 'download'])->name('publicaciones.download');

Route::get('/plantillas', [PlantillaController::class, 'index'])->name('plantillas.index');
Route::get('/plantillas/{id}', [PlantillaController::class, 'show'])->name('plantillas.show');

Route::get('/admin-login', function () {
    return view('admin-login');
});

Route::post('/admin-login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

// Backoffice Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/publicaciones', [AdminController::class, 'publicaciones'])->name('admin.publicaciones');
    Route::post('/publicaciones', [AdminController::class, 'storePublicacion'])->name('admin.publicaciones.store');
    Route::put('/publicaciones/{id}', [AdminController::class, 'updatePublicacion'])->name('admin.publicaciones.update');
    Route::delete('/publicaciones/{id}', [AdminController::class, 'deletePublicacion'])->name('admin.publicaciones.delete');
    
    Route::get('/plantillas', [AdminController::class, 'plantillas'])->name('admin.plantillas');
    Route::post('/plantillas', [AdminController::class, 'storePlantilla'])->name('admin.plantillas.store');
    Route::put('/plantillas/{id}', [AdminController::class, 'updatePlantilla'])->name('admin.plantillas.update');
    Route::delete('/plantillas/{id}', [AdminController::class, 'deletePlantilla'])->name('admin.plantillas.delete');
})->middleware('auth');

// Download Routes
Route::get('/download/plantilla/{id}', [AdminController::class, 'downloadPlantilla'])->name('download.plantilla');
