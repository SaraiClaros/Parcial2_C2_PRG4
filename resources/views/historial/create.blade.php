<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Actividad</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<body>
    <h1>Registrar Nueva Actividad</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('historial.store') }}" method="POST">
        @csrf

        <label for="usuarios_id">ID del Usuario:</label>
        <input type="number" name="usuarios_id" required><br><br>

        <label for="accion">Acción:</label>
        <input type="text" name="accion" required><br><br>

        <label for="detalle">Detalle:</label><br>
        <textarea name="detalle" rows="4" cols="50"></textarea><br><br>

        <label for="fecha">Fecha:</label>
        <input type="datetime-local" name="fecha" required><br><br>

        <div class="butones">
        <button type="submit">Guardar Historial</button>
        <button type="submit">Modificar Historial</button>
        <button type="submit">Consultar Historial</button>
        <button type="submit">Eliminar Historial</button>
        
        </div>
       
    </form>

    <br>
    <a href="{{ route('historial.index') }}">🔙 Ver historial</a>
</body>
</html>
