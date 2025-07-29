<?php


namespace App\Http\Controllers;

use App\Models\Blueprint; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
       
        $latestBlueprints = Blueprint::where('is_public', true)
                                    ->latest()
                                    ->limit(6)
                                    ->get();

        return view('index', compact('latestBlueprints'));
    }
}
