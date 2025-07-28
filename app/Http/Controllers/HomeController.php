<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Blueprint; // Importamos el modelo de planos
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Muestra la página principal del sitio.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
       
        $latestBlueprints = Blueprint::where('is_public', true)
                                    ->latest()
                                    ->limit(5)
                                    ->get();

        return view('index', compact('latestBlueprints'));
    }
}
