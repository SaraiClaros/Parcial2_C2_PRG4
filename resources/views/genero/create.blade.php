<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Género</title>
</head>
<body>
    <h1>Registrar Nuevo Género</h1>

    <form action="{{ route('genero.index') }}" method="POST">
        @csrf

        <label for="genero">Nombre del Género:</label>
        <input type="text" name="genero" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea name="descripcion" rows="4" cols="50"></textarea><br><br>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <a href="{{ route('genero.index') }}">🔙 Ver géneros registrados</a>
</body>
</html>
