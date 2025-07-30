<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlueprintController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\InvitationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/planos', [App\Http\Controllers\BlueprintController::class, 'publicIndex'])
    ->name('blueprints.public.index');

Route::get('/planos/{blueprint}', function (\App\Models\Blueprint $blueprint) {
    if (!$blueprint->is_public) {
        abort(404);
    }
    return view('blueprints.public_show', compact('blueprint'));
})->name('blueprints.public.show');

Route::get('/planos/{blueprint}/descargar', [
    App\Http\Controllers\BlueprintController::class, 
    'downloadFree'
])->name('blueprints.download-free');

Route::get('/manuales', function () {
    return view('manuals.index');
})->name('manuals.index');

Route::post('/planos/{blueprint}/comprar-whatsapp', [BlueprintController::class, 'whatsappPurchase'])->name('blueprints.whatsapp-purchase');
Route::post('/planos/{blueprint}/descarga-gratuita', [BlueprintController::class, 'freeDownload'])->name('blueprints.free-download');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('blueprints', BlueprintController::class)->names([
        'index' => 'blueprints.index',
        'create' => 'blueprints.create',
        'store' => 'blueprints.store',
        'show' => 'blueprints.show',
        'edit' => 'blueprints.edit',
        'update' => 'blueprints.update',
        'destroy' => 'blueprints.destroy',
    ]);

    Route::resource('purchases', PurchaseController::class)->names([
        'index' => 'purchases.index',
        'show' => 'purchases.show',
    ])->only(['index', 'show']);

    Route::get('/invite-user', [InvitationController::class, 'showInvitationForm'])->name('invite.user.form');
    Route::post('/invite-user', [InvitationController::class, 'inviteUser'])->name('invite.user');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';