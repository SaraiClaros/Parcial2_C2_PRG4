<?php

namespace App\Http\Controllers;

use App\Models\LibrosModel;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = LibrosModel::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        LibrosModel::create($request->all());
        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente');
    }

    public function show(LibrosModel $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(LibrosModel $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, LibrosModel $libro)
    {
        $libro->update($request->all());
        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(LibrosModel $libro)
    {
        $libro->delete();
        return redirect()->route('libros')->with('success', 'Libro eliminado correctamente');
    }
}

