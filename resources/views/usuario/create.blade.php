@extends('barra')

@section('title', 'Usuario - Biblioteca')

@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<body>
    <h1 style="color: #DAF7A6 ;">👤 Registrar Nuevo Usuario</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form  id="form-usuario"method="POST">
        @csrf
        <input type="hidden" id="usuarios_id" name="usuarios_id" value="PUT"> 
        <div class="form-group">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" class="borde-negro" id="nombre" name="nombre" required><br><br>
        </div>

        <div class="form-group">
        <label for="email">Correo Electrónico:</label>
        <input type="email" class="borde-negro" id="email" name="email" ><br><br>
        </div>

        <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password"  class="borde-negro" id="password" name="password" ><br><br>
        </div>

        <div class="form-group">
        <label for="rol">Rol:</label>
        <select name="rol" id="rol">
            <option value="admin">Administrador</option>
            <option value="lector">Lector</option>
        </select><br><br>
        </div>

        <div class="butones">
        <button type="submit" name="accion" value="guardar">📘 Guardar Usuario</button>
        <button type="button" id="consultar" name="accion" value="consultar">🔍 Consultar Usuario</button>
        <button type="button" id="modificar" name="accion" value="modificar">✏️ Modificar Usuario</button>
        <button type="submit" name="accion" value="eliminar">🗑️ Eliminar Usuario</button>
        </div>
    </form>

    <br>
    <a href="{{ route('usuario.index') }}" class="enlace-volver">🔙 Ver listado de usuarios</a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#consultar').on('click', function () {
            var nombre = $('#nombre').val();

            $.ajax({
                url: '{{ route('usuario.consultar') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    nombre: nombre,
                },
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        $('#usuarios_id').val(response.id);
                        $('#email').val(response.email);
                        $('#password').val(response.password);
                        $('#rol').val(response.rol);
                    }
                },
                error: function () {
                    alert('Ocurrió un error al consultar el género.');
                }
            });
        });

        $('#modificar').on('click', function () {
            let id = $('#usuarios_id').val();

            if (!id) {
                alert('Primero debes consultar un usuario existente.');
                return;
            }

            let form = $('#form-usuario');
            form.attr('action', '{{ url("usuario") }}/' + id);


            
            if ($('input[name="_method"]').length === 0) {
                form.append('<input type="hidden" name="_method" value="PUT">');
            }

            form.submit();
        });
    });
</script>

</body>
</html>

@endsection