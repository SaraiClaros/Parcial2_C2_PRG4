<!DOCTYPE html>
<html>
<head>
    <title>Registrar Devolución</title>
</head>
<body>
    <h1>Registrar Devolución</h1>

    <form action="{{ route('devoluciones.store') }}" method="POST">
        @csrf

        <label for="prestamo_id">ID del Préstamo:</label>
        <input type="number" name="prestamo_id" required><br><br>

        <label for="fecha_devolucion_real">Fecha de Devolución Real:</label>
        <input type="date" name="fecha_devolucion_real" required><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea name="observaciones" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ url('/') }}">Volver al inicio</a>
</body>
</html>
