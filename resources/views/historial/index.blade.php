<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Actividades</title>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">
</head>
<body>
    <h1>📜 Historial de Actividades</h1>

    <a href="{{ route('historial.create') }}">➕ Registrar Nueva Actividad</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario ID</th>
                <th>Acción</th>
                <th>Detalle</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $historial)
                <tr>
                    <td>{{ $historial->id }}</td>
                    <td>{{ $historial->usuario_id }}</td>
                    <td>{{ $historial->accion }}</td>
                    <td>{{ $historial->detalle }}</td>
                    <td>{{ $historial->fecha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
