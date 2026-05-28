<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'usuario' => $request->usuario,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->rol === 'admin') {
                return redirect('/admin');
            }

            return redirect('/perfil');
        }

        return back()->withErrors([
            'usuario' => 'Credenciales incorrectas'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}