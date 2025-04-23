<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">
</head>
<body>
    <h1>📖 Listado de Libros</h1>

    <a href="{{ route('libro.create') }}">➕ Registrar Nuevo Libro</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Año</th>
                <th>Género</th>
                <th>Clasificación</th>
                <th>Disponible</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->editorial }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>{{ $libro->clasificacion_tematica }}</td>
                    <td>{{ $libro->cantidad_disponible }}</td>
                    <td>{{ $libro->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/') }}" class="footer-link">🔙 Volver al inicio</a>
</body>
</html>
