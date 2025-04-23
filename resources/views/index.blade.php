<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Biblioteca</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 40px 20px 20px;
            color: #2c3e50;
            font-size: 2em;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            max-width: 800px;
            width: 90%;
        }

        li {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        li:hover {
            transform: translateY(-5px);
        }

        a {
            display: block;
            padding: 20px;
            text-align: center;
            color: #34495e;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            background-color: #3498db;
            color: white;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>📚 Bienvenido a la Biblioteca</h1>

    <nav>
        <ul>
            <li><a href="{{ route('libro.index') }}">📘 Libros</a></li>
            <li><a href="{{ route('usuario.index') }}">👤 Usuarios</a></li>
            <li><a href="{{ route('prestamos.index') }}">📤 Préstamos</a></li>
            <li><a href="{{ route('devoluciones.index') }}">📥 Devoluciones</a></li>
            <li><a href="{{ route('historial.index') }}">📄 Historial</a></li>
            <li><a href="{{ route('genero.index') }}">🏷️ Géneros</a></li>
            <li><a href="{{ route('existencias.index') }}">📦 Existencias</a></li>
        </ul>
    </nav>
</body>
</html>
