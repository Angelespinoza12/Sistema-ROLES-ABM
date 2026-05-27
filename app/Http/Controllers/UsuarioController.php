<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    public function index()
    {

        if(Auth::user()->role != 'admin'){

            return redirect('/perfil');
        }

        $usuarios = User::all();

        return view('admin', compact('usuarios'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'username' => 'required|unique:users',

            'password' => 'required|min:8',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'username' => $request->username,

            'role' => $request->role,

            'telefono' => $request->telefono,

            'cargo' => $request->cargo,

            'universidad' => $request->universidad,

            'aula' => $request->aula,

            'semestre' => $request->semestre,

            'password' => Hash::make($request->password)

        ]);

        return redirect('/admin')
        ->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {

        $usuario = User::findOrFail($id);

        return view('editar', compact('usuario'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'username' => $request->username,

            'role' => $request->role,

            'telefono' => $request->telefono,

            'cargo' => $request->cargo,

            'universidad' => $request->universidad,

            'aula' => $request->aula,

            'semestre' => $request->semestre,

        ]);

        return redirect('/admin')
        ->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {

        User::destroy($id);

        return redirect('/admin')
        ->with('success', 'Usuario eliminado correctamente');
    }

    public function perfil()
    {

        return view('perfil');
    }
}