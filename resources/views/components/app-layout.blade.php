<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <header>
        {{ $header ?? '' }}
    </header>

    <main>
        {{ $slot }}
    </main>

</body>
</html>
