<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Str; 

class PasswordResetLinkController extends Controller
{
    /**
     * 
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * 
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe tener un formato válido.',
        ]);

       
        $user = User::where('email', $request->email)->first();

        if (!$user) {
          
             return back()->withInput($request->only('email'))
                         ->withErrors(['email' => 'No encontramos ninguna cuenta con esa dirección de correo electrónico.']);
        }

        session(['reset_email_for_new_password' => $request->email]);
        
        return redirect()->route('password.set-new.form'); 
        
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $email = session('reset_email_for_new_password');

        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'La sesión ha expirado. Por favor, intenta nuevamente.']);
        }

        $request->validate([
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $user = User::where('email', $email)->first(); 

        if (!$user) {
             session()->forget('reset_email_for_new_password');
             return redirect()->route('password.request')->withErrors(['email' => 'Usuario no encontrado.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        
        session()->forget('reset_email_for_new_password');

        return redirect()->route('login')->with('status', '¡Tu contraseña ha sido establecida exitosamente! Ahora puedes iniciar sesión.');
    }
}
