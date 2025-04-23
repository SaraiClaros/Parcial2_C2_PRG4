<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Préstamos</title>
</head>
<body>
    <h1>📚 Listado de Préstamos</h1>

    <a href="{{ route('prestamos.create') }}">➕ Registrar Nuevo Préstamo</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Usuario</th>
                <th>ID Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha Límite</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->usuario_id }}</td>
                    <td>{{ $prestamo->libro_id }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_limite }}</td>
                    <td>{{ $prestamo->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
