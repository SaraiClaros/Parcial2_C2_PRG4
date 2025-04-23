<?php

namespace App\Http\Controllers;

use App\Models\DevolucionesModel;
use App\Models\PrestamosModel;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    /**
     * Mostrar el listado de devoluciones.
     */
    public function index()
    {
        $devoluciones = DevolucionesModel::with('prestamo')->get(); 
        return view('devoluciones.index', compact('devoluciones'));
    }

    /**
     * Mostrar el formulario para crear una nueva devolución.
     */
    public function create()
    {
        $prestamos = PrestamosModel::all(); 
        return view('devoluciones.create', compact('prestamos'));
    }

    /**
     * Almacenar una nueva devolución en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'prestamo_id' => 'required|integer|exists:prestamos,id',
            'fecha_devolucion_real' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

       
        Devolucion::create($validated);

        
        return redirect()->route('devoluciones.index')->with('success', 'Devolución registrada correctamente.');
    }

   

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'prestamo_id' => 'required|integer|exists:prestamos,id',
            'fecha_devolucion_real' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        $devolucion = DevolucionesModel::findOrFail($id);
        $devolucion->update($validated);

        return redirect()->route('devoluciones.index')->with('success', 'Devolución actualizada correctamente.');
    }

   
    public function destroy($id)
    {
        $devolucion = DevolucionesModel::findOrFail($id);
        $devolucion->delete();

        return redirect()->route('devoluciones.index')->with('success', 'Devolución eliminada correctamente.');
    }
}
