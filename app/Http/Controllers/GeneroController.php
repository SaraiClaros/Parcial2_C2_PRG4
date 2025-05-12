<?php

namespace App\Http\Controllers;

use App\Models\GeneroModel;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
   
    public function index()
    {
        $generos = GeneroModel::all(); 
        return view('genero.index', compact('generos'));
    }

    
    public function create()
    {
        return view('genero.create');
    }

   
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'genero' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

       
        GeneroModel::create($validated);

        
        return redirect()->route('genero.index')->with('success', 'Género registrado correctamente.');
    }

    
  

   
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'genero' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $genero = GeneroModel::findOrFail($id);
        $genero->update($validated);

        return redirect()->route('genero.index')->with('success', 'Género actualizado correctamente.');
    }

    
    public function destroy($genero_id)
    {
        $genero = GeneroModel::findOrFail($genero_id);
        $genero->delete();

        return redirect()->route('genero.index')->with('success', 'Género eliminado correctamente.');
    }
}
