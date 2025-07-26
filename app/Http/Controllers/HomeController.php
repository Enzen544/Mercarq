<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

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
        return view('index'); // Cambiamos 'welcome' por 'index'
    }
}
