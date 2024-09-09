<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Usuario extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create(Request $request)
    {
        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'rol' => $request->rol,
            'estatus' => $request->estatus,
            'correo' => $request->correo,
            'contraseña' => $request->contraseña,
            'fecha_alta' => now()
        ]);

        if (!$usuario) {
            return response()->json(['message' => 'Error al crear el usuario', 'status' => 500], 500);
        }

        return response()->json(['usuario' => $usuario, 'status' => 201], 201);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado', 'status' => 404], 404);
        }

        $estatus = $request->input('estatus', $usuario->estatus);

        $usuario->update([
            'nombre' => $request->input('nombre', $usuario->nombre),
            'apellidos' => $request->input('apellidos', $usuario->apellidos),
            'rol' => $request->input('rol', $usuario->rol),
            'estatus' => $estatus,
            'correo' => $request->input('correo', $usuario->correo),
            'contraseña' => $request->input('contraseña', $usuario->contraseña),
            'fecha_modificacion' => now(),
            'fecha_baja' => $estatus === 'inactivo' ? now() : null,
        ]);

        return response()->json(['usuario' => $usuario, 'status' => 200], 200);
    }

    public function delete($id)
    {
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado', 'status' => 404], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito', 'status' => 200], 200);
    }

}
