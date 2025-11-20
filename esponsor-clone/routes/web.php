<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CreatorProfileController;
use App\Http\Controllers\CreatorLinkController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PublicCreatorController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Ruta de Bienvenida (Home)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren autenticación)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard del creador (vista principal con estadísticas)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Gestión del perfil de creador
    Route::put('/creator-profile', [CreatorProfileController::class, 'update'])->name('creator.profile.update');
    
    // CRUD de links (crear, editar, eliminar)
    Route::post('/links', [CreatorLinkController::class, 'store'])->name('links.store');
    Route::put('/links/{link}', [CreatorLinkController::class, 'update'])->name('links.update');
    Route::delete('/links/{link}', [CreatorLinkController::class, 'destroy'])->name('links.destroy');
    Route::post('/links/reorder', [CreatorLinkController::class, 'reorder'])->name('links.reorder');
    
    // Perfil de usuario (configuración de cuenta)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Rutas Públicas (no requieren autenticación)
|--------------------------------------------------------------------------
*/

// Página pública del creador (/@username)
Route::get('/@{slug}', [PublicCreatorController::class, 'show'])->name('creator.public');

// Enviar apoyo a un creador (POST desde la página pública)
Route::post('/@{slug}/support', [SupportController::class, 'store'])->name('support.store');

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación (Login, Registro, etc.)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
