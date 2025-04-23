<?php

namespace App\Http\Controllers;

use App\Models\Devolucion; // Asegúrate de importar el modelo
use Illuminate\Http\Request;

class DevolucionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las devoluciones
        $devoluciones = Devolucion::all();
        return view('devoluciones', compact('devoluciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('devoluciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación (si es necesario)
        $request->validate([
            'prestamo_id' => 'required|integer',
            'fecha_devolucion_real' => 'required|date',
            'observaciones' => 'nullable|string',
        ]);

        // Crear la devolución
        Devolucion::create($request->all());

        // Redirigir con un mensaje de éxito
        return redirect()->route('devoluciones.index')->with('success', 'Devolución registrada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $devolucion = Devolucion::findOrFail($id);
        return view('devoluciones.show', compact('devolucion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $devolucion = Devolucion::findOrFail($id);
        return view('devoluciones.edit', compact('devolucion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $devolucion = Devolucion::findOrFail($id);
        $devolucion->update($request->all());

        return redirect()->route('devoluciones.index')->with('success', 'Devolución actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $devolucion = Devolucion::findOrFail($id);
        $devolucion->delete();

        return redirect()->route('devoluciones.index')->with('success', 'Devolución eliminada correctamente.');
    }
}
