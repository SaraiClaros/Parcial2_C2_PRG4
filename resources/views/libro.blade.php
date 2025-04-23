<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro</title>
</head>
<body>
    <h1>📘 Registrar Nuevo Libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" name="autor" required><br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" required><br><br>

        <label for="anio_publicacion">Año de Publicación:</label>
        <input type="number" name="anio_publicacion" min="1500" max="2099" required><br><br>

        <label for="genero">Género:</label>
        <input type="text" name="genero" required><br><br>

        <label for="clasificacion_tematica">Clasificación Temática:</label>
        <input type="text" name="clasificacion_tematica" required><br><br>

        <label for="cantidad_disponible">Cantidad Disponible:</label>
        <input type="number" name="cantidad_disponible" min="0" required><br><br>

        <label for="estado">Estado:</label>
        <select name="estado" required>
            <option value="Disponible">Disponible</option>
            <option value="Prestado">Prestado</option>
            <option value="No disponible">No disponible</option>
        </select><br><br>

        <button type="submit">Guardar Libro</button>
    </form>

    <br>
    <a href="{{ route('libros.index') }}">🔙 Volver al listado de libros</a>
</body>
</html>
