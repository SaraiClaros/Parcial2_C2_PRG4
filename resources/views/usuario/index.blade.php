<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">
</head>
<body>
    <h1>👥 Listado de Usuarios</h1>

    <a href="{{ route('usuario.create') }}">➕ Registrar Nuevo Usuario</a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuarios_id }}</td>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol }}</td>
                    <td>
                    <form action="{{ route('usuario.destroy', $usuario->usuarios_id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este Usuario?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">🗑️ Eliminar</button>
                    </form>
        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
