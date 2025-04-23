<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Actividad</title>
</head>
<body>
    <h1>Registrar Nueva Actividad</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('historial.store') }}" method="POST">
        @csrf

        <label for="usuario_id">ID del Usuario:</label>
        <input type="number" name="usuario_id" required><br><br>

        <label for="accion">Acción:</label>
        <input type="text" name="accion" required><br><br>

        <label for="detalle">Detalle:</label><br>
        <textarea name="detalle" rows="4" cols="50"></textarea><br><br>

        <label for="fecha">Fecha:</label>
        <input type="datetime-local" name="fecha" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('historial.index') }}">🔙 Ver historial</a>
</body>
</html>
