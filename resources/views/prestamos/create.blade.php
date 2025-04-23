<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>
</head>
<body>
    <h1>📘 Registrar Nuevo Préstamo</h1>

    <form action="{{ route('prestamos.index') }}" method="POST">
        @csrf

        <label for="usuario_id">ID del Usuario:</label>
        <input type="number" name="usuario_id" required><br><br>

        <label for="libro_id">ID del Libro:</label>
        <input type="number" name="libro_id" required><br><br>

        <label for="fecha_prestamo">Fecha de Préstamo:</label>
        <input type="date" name="fecha_prestamo" required><br><br>

        <label for="fecha_limite">Fecha Límite de Devolución:</label>
        <input type="date" name="fecha_limite" required><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="Prestado">Prestado</option>
            <option value="Devuelto">Devuelto</option>
        </select><br><br>

        <button type="submit">Guardar Préstamo</button>
    </form>

    <br>
    <a href="{{ route('prestamos.index') }}">🔙 Ver listado de préstamos</a>
</body>
</html>
