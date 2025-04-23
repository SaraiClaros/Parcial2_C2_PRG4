<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<body>
    <h1>📘 Registrar Nuevo Préstamo</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf

        <label for="usuarios_id">ID del Usuario:</label>
        <input type="number" name="usuarios_id" required><br><br>

        <label for="libros_id">ID del Libro:</label>
        <input type="number" name="libros_id" required><br><br>

        <label for="fecha_prestamo">Fecha de Préstamo:</label>
        <input type="date" name="fecha_prestamo" required><br><br>

        <label for="fecha_devolucion">Fecha Límite de Devolución:</label>
        <input type="date" name="fecha_devolucion" required><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="En curso">En curso</option>
            <option value="Devuelto">Devuelto</option>
            <option value="Atrasado">Atrasado</option>
        </select><br><br>

        <button type="submit">Guardar Préstamo</button>
    </form>

    <br>
    <a href="{{ route('prestamos.index') }}">🔙 Ver listado de préstamos</a>
</body>
</html>
