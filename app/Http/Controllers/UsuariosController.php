<?php

namespace App\Http\Controllers;

use App\Models\UsuariosModel;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // Mostrar el listado de usuarios
    public function index()
    {
        $usuarios = UsuariosModel::all();
        return view('usuario.index', compact('usuarios'));
    }

    // Mostrar el formulario para crear un nuevo usuario
    public function create()
    {
        return view('usuario.create');
    }

    // Almacenar un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:8',
            'rol' => 'required|in:admin,lector',
        ]);

        $validated['password'] = bcrypt($validated['password']); // encripta la contraseña

        UsuariosModel::create($validated);

        return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente.');
    }


    // Actualizar el usuario
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'password' => 'nullable|string|min:8',
            'rol' => 'required|in:admin,lector',
        ]);

        $usuario = UsuariosModel::findOrFail($id);
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        $usuario->update($validated);

        return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = UsuariosModel::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
