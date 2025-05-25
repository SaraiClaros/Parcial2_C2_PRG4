<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<body>
    <h1>📘 Registrar Nuevo Préstamo</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST" id="form-prestamo">
    @csrf
    <input type="hidden" id="prestamos_id" name="prestamos_id" value="">

    <label for="prestamos_id_input">ID del Préstamo a consultar:</label>
    <input type="number" id="prestamos_id_input" placeholder="Solo para consultar"><br><br>

    <label for="usuarios_id">ID del Usuario:</label>
    <input type="number" id="usuarios_id" name="usuarios_id" required><br><br>

    <label for="libros_id">ID del Libro:</label>
    <input type="number" id="libros_id" name="libros_id" required><br><br>

    <label for="fecha_prestamo">Fecha de Préstamo:</label>
    <input type="date" id="fecha_prestamo" name="fecha_prestamo" required><br><br>

    <label for="fecha_devolucion">Fecha Límite de Devolución:</label>
    <input type="date" id="fecha_devolucion" name="fecha_devolucion" required><br><br>

    <label for="estado">Estado:</label>
    <select id="estado" name="estado" required>
        <option value="En curso">En curso</option>
        <option value="Devuelto">Devuelto</option>
        <option value="Atrasado">Atrasado</option>
    </select><br><br>

    <button type="submit">Guardar Préstamo</button>
    <button type="button" id="consultar">🔍 Consultar Préstamo</button>
    <button type="button" id="modificar">✏️ Modificar Préstamo</button>
</form>

    <br>
    <a href="{{ route('prestamos.index') }}">🔙 Ver listado de préstamos</a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#consultar').on('click', function () {
        var id = $('#prestamos_id_input').val();

        $.ajax({
            url: '{{ route("prestamos.consultar") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                prestamos_id: id
            },
            success: function (response) {
                if (response.error) {
                    alert(response.error);
                } else {
                    $('#prestamos_id').val(response.id);
                    $('#usuarios_id').val(response.usuarios_id);
                    $('#libros_id').val(response.libros_id);
                    $('#fecha_prestamo').val(response.fecha_prestamo);
                    $('#fecha_devolucion').val(response.fecha_devolucion);
                    $('#estado').val(response.estado);
                }
            },
            error: function () {
                alert('Error al consultar el préstamo.');
            }
        });
    });

    $('#modificar').on('click', function () {
        let id = $('#prestamos_id').val();

        if (!id) {
            alert('Primero consulta un préstamo para poder modificar.');
            return;
        }

        let form = $('#form-prestamo');
        form.attr('action', '/prestamos/' + id);

        if ($('input[name="_method"]').length === 0) {
            form.append('<input type="hidden" name="_method" value="PUT">');
        }

        form.submit();
    });
});
</script>
</body>
</html>
