<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">
</head>
<body>
    <h1>📚 Listado de Libros</h1>

    <a href="{{ route('libro.create') }}">➕ Registrar Nuevo Libro</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
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
                <th>Cantidad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->libros_id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>{{ $libro->editorial }}</td>
                    <td>{{ $libro->anio_publicacion }}</td>
                    <td>{{ $libro->genero }}</td>
                    <td>{{ $libro->cantidad_disponible }}</td>
                    <td>{{ $libro->estado }}</td>
                    <td>

                        <form action="{{ route('libro.destroy', $libro->libros_id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">🗑️ Eliminar</button>
                       </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
