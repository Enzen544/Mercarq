<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlueprintController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InvitationController; // Asegúrate de importar el controlador
use Illuminate\Support\Facades\Route;

// Ruta para la página principal (index)
Route::view('/', 'index')->name('home');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Planos (Blueprints) - Asegúrate de que BlueprintController tenga estos métodos
    Route::resource('blueprints', BlueprintController::class)->names([
        'index' => 'blueprints.index',
        'create' => 'blueprints.create',
        'store' => 'blueprints.store',
        'show' => 'blueprints.show',
        'edit' => 'blueprints.edit',
        'update' => 'blueprints.update',
        'destroy' => 'blueprints.destroy',
    ]);

    // Compras (Purchases) - Asegúrate de que PurchaseController tenga estos métodos
    Route::resource('purchases', PurchaseController::class)->names([
        'index' => 'purchases.index',
        'show' => 'purchases.show',
    ])->only(['index', 'show']);

    // Invitación/Registro de nuevos usuarios
    Route::get('/invite-user', [InvitationController::class, 'showInvitationForm'])->name('invite.user.form');
    Route::post('/invite-user', [InvitationController::class, 'inviteUser'])->name('invite.user');

    // Perfil (ya viene con Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
