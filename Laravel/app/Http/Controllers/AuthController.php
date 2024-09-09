<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);

        $credentials = $request->only('correo', 'contraseña');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Inicio de sesión exitoso', 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'Credenciales incorrectas', 'status' => 401], 401);
        }
    }
}
