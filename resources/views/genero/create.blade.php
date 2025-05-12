<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Género</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

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
 
        <div class="butones">
        <button type="submit">Guardar Generos </button>
        <button type="submit">Consultar Generos</button>
        <button type="submit">Modificar Generos</button>
        <button type="submit">Eliminar Generos</button>
        </div>
       
    </form>

    <br>
    <a href="{{ route('genero.index') }}">🔙 Ver géneros registrados</a>
</body>
</html>
