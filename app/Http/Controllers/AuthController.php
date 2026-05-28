<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'usuario' => $request->usuario,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            if (Auth::user()->rol == 'admin') {
                return redirect('/admin');
            }

            return redirect('/perfil');
        }

        return back()->withErrors([
            'usuario' => 'Credenciales incorrectas'
        ]);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
