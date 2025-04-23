<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Géneros</title>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">
</head>
<body>
    <h1>🎭 Listado de Géneros</h1>
    <link rel="stylesheet" href="{{ asset('css/stilos.css') }}">


    <a href="{{ route('genero.create') }}">➕ Registrar Nuevo Género</a>
    <br><br>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Género</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($generos as $genero)
                <tr>
                    <td>{{ $genero->id }}</td>
                    <td>{{ $genero->genero }}</td>
                    <td>{{ $genero->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ url('/') }}">🔙 Volver al inicio</a>
</body>
</html>
