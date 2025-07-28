<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlueprintController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/planos', function () {

    $blueprints = \App\Models\Blueprint::where('is_public', true)->latest()->paginate(9);
    return view('blueprints.public_index', compact('blueprints'));
})->name('blueprints.public.index');

// Página para ver el detalle de un plano público
Route::get('/planos/{blueprint}', function (\App\Models\Blueprint $blueprint) {
    // Verificar si es público
    if (!$blueprint->is_public) {
        abort(404);
    }
    return view('blueprints.public_show', compact('blueprint'));
})->name('blueprints.public.show');


// RUTAS PROTEGIDAS (Requieren login y verificación de email)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard principal del usuario
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestión de Planos del Usuario (CRUD)
    Route::resource('blueprints', BlueprintController::class)->names([
        'index' => 'blueprints.index',
        'create' => 'blueprints.create',
        'store' => 'blueprints.store',
        'show' => 'blueprints.show',
        'edit' => 'blueprints.edit',
        'update' => 'blueprints.update',
        'destroy' => 'blueprints.destroy',
    ]);

    // Historial de Compras del Usuario
    Route::resource('purchases', PurchaseController::class)->names([
        'index' => 'purchases.index',
        'show' => 'purchases.show',
    ])->only(['index', 'show']);

    // Invitar a un nuevo usuario (desde dentro de la app)
    Route::get('/invite-user', [InvitationController::class, 'showInvitationForm'])->name('invite.user.form');
    Route::post('/invite-user', [InvitationController::class, 'inviteUser'])->name('invite.user');

    // Gestión del Perfil del Usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
