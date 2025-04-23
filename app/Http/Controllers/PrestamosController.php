<?php

namespace App\Http\Controllers;

use App\Models\PrestamosModel;
use App\Models\UsuariosModel;
use App\Models\LibrosModel;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    /**
     * Mostrar el listado de préstamos.
     */
    public function index()
    {
        $prestamos = PrestamosModel::with(['usuario', 'libro'])->get(); 
        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo préstamo.
     */
    public function create()
    {
        $usuarios = UsuariosModel::all();  
        $libros = LibrosModel::all();  
        return view('prestamos.create', compact('usuarios', 'libros'));
    }

    /**
     * Almacenar un nuevo préstamo en la base de datos.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'libro_id' => 'required|integer|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|in:activo,devuelto',
        ]);

       
        PrestamosModel::create($validated);

        
        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
    }

    
    /**
     * Actualizar los datos de un préstamo.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'usuario_id' => 'required|integer|exists:usuarios,id',
            'libro_id' => 'required|integer|exists:libros,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|in:activo,devuelto',
        ]);

        $prestamo = PrestamosModel::findOrFail($id);
        $prestamo->update($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }

    /**
     * Eliminar un préstamo.
     */
    public function destroy($id)
    {
        $prestamo = PrestamosModel::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}
