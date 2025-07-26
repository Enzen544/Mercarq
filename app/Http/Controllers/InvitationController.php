<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class InvitationController extends Controller
{
    /**
     * Muestra el formulario para invitar a un nuevo usuario.
     */
    public function showInvitationForm()
    {
        return view('auth.invite'); // Asegúrate de crear esta vista
    }

    /**
     * Procesa la invitación/registro de un nuevo usuario.
     */
    public function inviteUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            // Mensajes de error personalizados (opcional)
            'email.unique' => 'Este correo electrónico ya está registrado.',
        ]);

        // Si la validación falla, redirige de vuelta con errores
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Crear el nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role' => 'user', // O el rol por defecto que quieras
        ]);

        // Aquí podrías asignar roles, enviar correo de bienvenida, etc.
        // Por ahora, simplemente lo creamos.

        // Opcional: Registrar quién lo invitó
        // $user->invited_by = auth()->id();
        // $user->save();

        return redirect()->route('dashboard')->with('success', 'Usuario invitado y registrado exitosamente.');
    }
}
