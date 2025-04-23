<?php

namespace App\Http\Controllers;

use App\Models\GeneroModel;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Mostrar el listado de géneros.
     */
    public function index()
    {
        $generos = GeneroModel::all(); 
        return view('genero.index', compact('generos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo género.
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Almacenar un nuevo género en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'genero' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

       
        GeneroModel::create($validated);

        
        return redirect()->route('genero.index')->with('success', 'Género registrado correctamente.');
    }

    
  

    /**
     * Actualizar los datos de un género.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'genero' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $genero = GeneroModel::findOrFail($id);
        $genero->update($validated);

        return redirect()->route('genero.index')->with('success', 'Género actualizado correctamente.');
    }

    /**
     * Eliminar un género.
     */
    public function destroy($id)
    {
        $genero = GeneroModel::findOrFail($id);
        $genero->delete();

        return redirect()->route('genero.index')->with('success', 'Género eliminado correctamente.');
    }
}
