<!-- resources/views/devoluciones/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Devolución</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

   

</head>
<body>
    <h1>Registrar Devolución</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('devoluciones.store') }}" method="POST">
        @csrf

        <label for="prestamos_id">ID del Préstamo:</label>
        <input type="number" name="prestamos_id" required><br><br>

        <label for="fecha_devolucion_real">Fecha de Devolución Real:</label>
        <input type="date" name="fecha_devolucion_real" required><br><br>

        <label for="observaciones">Observaciones:</label><br>
        <textarea name="observaciones" rows="4" cols="50"></textarea><br><br>

        <div class="botones">
        <button type="submit">Guardar Devoluciones</button>
        <button type="submit">Consultar Devoluciones</button>
        <button type="submit">Modificar Devoluciones</button>
        <button type="submit">Eliminar Devoluciones</button>
        </div>
        
    </form>

    <br>
    <a href="{{ url('/') }}">Volver al inicio</a>
</body>
</html>
