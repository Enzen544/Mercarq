<?php

namespace App\Http\Controllers;

use App\Models\Solicitud; 
use App\Models\Purchase; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * 
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

       
        $solicitudes = Solicitud::whereHas('blueprint', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->with('blueprint') 
        ->latest() 
        ->paginate(10); 

        return view('purchases.index', compact('solicitudes'));
    }

    
    public function show(Purchase $purchase)
    {
        if ($purchase->user_id !== Auth::id()) {
            abort(403);
        }

        $purchase->load('blueprint.user');

       
        return view('purchases.show', compact('purchase'));
    }
}