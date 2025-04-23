<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Biblioteca</title>
</head>
<body>
    <h1>📚 Bienvenido a la Biblioteca</h1>

    <nav>
        <ul>
            <li><a href="{{ route('libros.index') }}">📘 Libros</a></li>
            <li><a href="{{ route('usuarios.index') }}">👤 Usuarios</a></li>
            <li><a href="{{ route('prestamos.index') }}">📤 Préstamos</a></li>
            <li><a href="{{ route('devoluciones.index') }}">📥 Devoluciones</a></li>
            <li><a href="{{ route('historial.index') }}">📄 Historial</a></li>
            <li><a href="{{ route('generos.index') }}">🏷️ Géneros</a></li>
            <li><a href="{{ route('existencias.index') }}">📦 Existencias</a></li>
        </ul>
    </nav>
</body>
</html>
