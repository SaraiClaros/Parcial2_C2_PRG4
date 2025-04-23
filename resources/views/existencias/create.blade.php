<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Existencia</title>
</head>
<body>
    <h1>Registrar Nueva Existencia</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('existencias.store') }}" method="POST">
        @csrf

        <label for="libros_id">ID del Libro:</label>
        <input type="number" name="libros_id" required><br><br>

        <label for="ubicacion_general">Ubicación General:</label>
        <input type="text" name="ubicacion_general" required><br><br>

        <label for="codigo_identificacion">Código de Identificación:</label>
        <input type="text" name="codigo_identificacion" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('existencias.index') }}">🔙 Ver existencias registradas</a>
</body>
</html>
