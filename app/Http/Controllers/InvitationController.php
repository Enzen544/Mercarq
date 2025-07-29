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
     * 
     */
    public function showInvitationForm()
    {
        return view('auth.invite'); 
    }

    /**
     * 
     */
    public function inviteUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'email.unique' => 'Este correo electrónico ya está registrado.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role' => 'user', 
        ]);

       

       
        // $user->invited_by = auth()->id();
        // $user->save();

        return redirect()->route('dashboard')->with('success', 'Usuario invitado y registrado exitosamente.');
    }
}
