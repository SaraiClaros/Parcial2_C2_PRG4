<?php

namespace App\Http\Controllers;

use App\Models\PrestamosModel;
use App\Models\UsuariosModel;
use App\Models\LibrosModel;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{
    
    public function index()
    {
        $prestamos = PrestamosModel::with(['usuarios', 'libros'])->get(); 
        return view('prestamos.index', compact('prestamos'));
    }

    
    public function create()
    {
        $usuarios = UsuariosModel::all();  
        $libros = LibrosModel::all();  
        return view('prestamos.create', compact('usuarios', 'libros'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'usuarios_id' => 'required|exists:usuarios,usuarios_id',
            'libros_id' => 'required|exists:libros,libros_id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|in:En curso,Devuelto,Atrasado',
        ]);

        PrestamosModel::create($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado correctamente.');
    }


    
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'usuarios_id' => 'required|exists:usuarios,usuarios_id',
            'libros_id' => 'required|exists:libros,libros_id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|in:activo,devuelto',
        ]);

        $prestamo = PrestamosModel::findOrFail($id);
        $prestamo->update($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado correctamente.');
    }


    public function destroy($prestamos_id)
    {
        $prestamo = PrestamosModel::findOrFail($prestamos_id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado correctamente.');
    }
}
