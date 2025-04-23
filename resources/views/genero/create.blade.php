<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Género</title>
</head>
<body>
    <h1>Registrar Nuevo Género</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('genero.store') }}" method="POST">
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
