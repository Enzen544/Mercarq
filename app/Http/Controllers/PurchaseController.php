<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Ahora Intelephense debería entender que $user es una instancia de User
        $purchases = $user->purchases()->with('blueprint')->latest()->paginate(10);
        
        return view('purchases.index', compact('purchases'));
    }

    public function show(Purchase $purchase)
    {
        // Verificar que la compra pertenezca al usuario
        if ($purchase->user_id !== Auth::id()) {
            abort(403);
        }
        return view('purchases.show', compact('purchase'));
    }
}
