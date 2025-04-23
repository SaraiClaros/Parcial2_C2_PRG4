<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Existencias</title>
</head>
<body>
    <h1>📚 Listado de Existencias</h1>

    <a href="{{ route('existencias.create') }}">➕ Registrar Nueva Existencia</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID Existencia</th>
                <th>Libro ID</th>
                <th>Ubicación General</th>
                <th>Código Identificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach($existencias as $existencia)
                <tr>
                    <td>{{ $existencia->id_existencia }}</td>
                    <td>{{ $existencia->libro_id }}</td>
                    <td>{{ $existencia->ubicacion_general }}</td>
                    <td>{{ $existencia->codigo_identificacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
