<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Usuario</title>
</head>
<body>
    <h1>👤 Registrar Nuevo Usuario</h1>

    <form action="{{ route('usuario.index') }}" method="POST">
        @csrf

        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="admin">Administrador</option>
            <option value="lector">Lector</option>
        </select><br><br>

        <button type="submit">Guardar Usuario</button>
    </form>

    <br>
    <a href="{{ route('usuario.index') }}">🔙 Ver listado de usuarios</a>
</body>
</html>
