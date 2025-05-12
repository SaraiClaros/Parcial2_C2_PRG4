@extends('barra')

@section('title', 'Inicio - Biblioteca')

@section('content')

    <div class="container">
        <h1>📚 Bienvenido a la Biblioteca</h1>

       
            <ul>
                <li><a href="{{ route('libro.index') }}">📘 Libros</a></li>
                <li><a href="{{ route('usuario.index') }}">👤 Usuarios</a></li>
                <li><a href="{{ route('prestamos.index') }}">📤 Préstamos</a></li>
                <li><a href="{{ route('devoluciones.index') }}">📥 Devoluciones</a></li>
                <li><a href="{{ route('historial.index') }}">📄 Historial</a></li>
                <li><a href="{{ route('genero.index') }}">🏷️ Géneros</a></li>
                <li><a href="{{ route('existencias.index') }}">📦 Existencias</a></li>
            </ul>
       

        <div class="content">
            <p>Bienvenido a la Biblioteca Central, donde puedes explorar una gran variedad de libros, gestionar tus préstamos y devoluciones, y más.</p>
        </div>
    </div>

@endsection
