<?php

namespace App\Http\Controllers;

use App\Models\DevolucionesModel;
use App\Models\PrestamosModel;
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    
    public function index()
    {
        $devoluciones = DevolucionesModel::with('prestamos')->get(); 
        return view('devoluciones.index', compact('devoluciones'));
    }

    public function create()
    {
        $prestamos = PrestamosModel::all(); 
        return view('devoluciones.create', compact('prestamos'));
    }

    public function destroy($devoluciones_id)
    {
        $devoluciones = DevolucionesModel::findOrFail($devoluciones_id);
        $devoluciones->delete();

        return redirect()->route('devoluciones.index')->with('success', 'devoluciones eliminada correctamente.');
    }

   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prestamos_id' => 'required|integer|exists:prestamos,prestamos_id',
            'fecha_devolucion_real' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        DevolucionesModel::create($validated);

        return redirect()->route('devoluciones.index')->with('success', 'Devolución registrada correctamente.');
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'prestamos_id' => 'required|integer|exists:prestamos,prestamos_id',
            'fecha_devolucion_real' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        $devolucion = DevolucionesModel::findOrFail($id);
        $devolucion->update($validated);

        return redirect()->route('devoluciones.index')->with('success', 'Devolución actualizada correctamente.');
    }

    
  
}
