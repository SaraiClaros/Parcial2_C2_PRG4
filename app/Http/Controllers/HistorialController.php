<?php

namespace App\Http\Controllers;

use App\Models\HistorialModel;
use App\Models\PrestamosModel;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * Mostrar el listado de historiales.
     */
    public function index()
    {
        $historiales = HistorialModel::with('prestamo')->get(); 
        return view('historial.index', compact('historiales'));
    }

    /**
     * Mostrar el formulario para crear un nuevo historial.
     */
    public function create()
    {
        $prestamos = PrestamosModel::all(); 
        return view('historial.create', compact('prestamos'));
    }

    /**
     * Almacenar un nuevo historial en la base de datos.
     */
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'prestamos_id' => 'required|integer|exists:prestamos,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|string|in:Activo,Devuelto,En Proceso',
            'observaciones' => 'nullable|string',
        ]);

       
        HistorialModel::create($validated);

       
        return redirect()->route('historial.index')->with('success', 'Historial registrado correctamente.');
    }


    /**
     * Actualizar los datos de un historial.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'prestamos_id' => 'required|integer|exists:prestamos,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'estado' => 'required|string|in:Activo,Devuelto,En Proceso',
            'observaciones' => 'nullable|string',
        ]);

        $historial = HistorialModel::findOrFail($id);
        $historial->update($validated);

        return redirect()->route('historial.index')->with('success', 'Historial actualizado correctamente.');
    }

    /**
     * Eliminar un historial.
     */
    public function destroy($id)
    {
        $historial = HistorialModel::findOrFail($id);
        $historial->delete();

        return redirect()->route('historial.index')->with('success', 'Historial eliminado correctamente.');
    }
}
