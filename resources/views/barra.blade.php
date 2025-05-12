<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Biblioteca')</title>
    <link rel="stylesheet" href="{{ asset('css/barra.css') }}">
</head>
<body>

<div class="navbar-container">
    <nav>
        <a href="{{ url('/') }}">🏠 HOME</a>
        <a href="{{ url('/') }}">📘 DESCRUBRE</a>
        <a href="{{ url('registros') }}"> 📄REGISTROS</a>
        <a href="{{ route('prestamos.index') }}">🤝 NOSOTROS</a>
    </nav>
</div>

@yield('content')

<footer>
    📖 Book Organizer {{ date('Y') }}
</footer>

</body>
</html>
