<?php

namespace App\Http\Controllers;

use App\Models\LibrosModel;
use App\Models\GeneroModel;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Mostrar el listado de libros.
     */
    public function index()
    {
        $libros = LibrosModel::with('genero')->get(); 
        return view('libro.index', compact('libros'));
    }

    /**
     * Mostrar el formulario para crear un nuevo libro.
     */
    public function create()
    {
        $generos = GeneroModel::all();  
        return view('libro.create', compact('generos'));
    }

    /**
     * Almacenar un nuevo libro en la base de datos.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer',
            'genero_id' => 'required|integer|exists:generos,id',
            'clasificacion_tematica' => 'nullable|string',
            'cantidad_disponible' => 'required|integer|min:0',
            'estado' => 'required|in:Disponible,Prestado,No disponible',
        ]);

        
        LibrosModel::create($validated);

      
        return redirect()->route('libro.index')->with('success', 'Libro registrado correctamente.');
    }


    /**
     * Actualizar los datos de un libro.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer',
            'genero_id' => 'required|integer|exists:generos,id',
            'clasificacion_tematica' => 'nullable|string',
            'cantidad_disponible' => 'required|integer|min:0',
            'estado' => 'required|in:Disponible,Prestado,No disponible',
        ]);

        $libro = LibrosModel::findOrFail($id);
        $libro->update($validated);

        return redirect()->route('libro.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Eliminar un libro.
     */
    public function destroy($id)
    {
        $libro = LibrosModel::findOrFail($id);
        $libro->delete();

        return redirect()->route('libro.index')->with('success', 'Libro eliminado correctamente.');
    }
}
