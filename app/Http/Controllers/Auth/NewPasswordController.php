<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
   

    /**
     * 
     * 
     * @return \Illuminate\View\View
     */
    public function showSimpleResetForm(Request $request): View|RedirectResponse 
    {
        $email = session('simple_reset_email');

        if (!$email) {
             return redirect()->route('password.request');
        }

        return view('auth.simple-reset-password', ['email' => $email]);
    }

    /**
     * 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function processSimpleReset(Request $request): RedirectResponse
    {
        $email = session('simple_reset_email');

        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'La sesión ha expirado. Por favor, intenta nuevamente.']);
        }

        $request->validate([
           
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
           
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $user = \App\Models\User::where('email', $email)->first();

        if (!$user) {
            session()->forget('simple_reset_email'); 
            return redirect()->route('password.request')->withErrors(['email' => 'Usuario no encontrado.']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        event(new PasswordReset($user));

        session()->forget('simple_reset_email');

        return redirect()->route('login')->with('status', '¡Tu contraseña ha sido cambiada exitosamente! Ahora puedes iniciar sesión con tu nueva contraseña.');
    }
}