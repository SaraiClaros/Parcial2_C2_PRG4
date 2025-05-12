<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>📚 Registrar Nuevo Libro</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="libroForm" action="{{ route('libro.store') }}" method="POST">
        <input type="hidden" name="libros_id" value="{{ old('libros_id', $libros->libros_id ?? '') }}">

        @csrf

        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libros->titulo ?? '') }}" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="{{ old('autor', $libros->autor ?? '') }}" required>

        <label for="editorial">Editorial:</label>
        <input type="text" name="editorial" id="editorial" value="{{ old('editorial', $libros->editorial ?? '') }}" required>

        <label for="anio_publicacion">Año de Publicación:</label>
        <input type="number" name="anio_publicacion" id="anio_publicacion" value="{{ old('anio_publicacion', $libros->anio_publicacion ?? '') }}" required>

        <label for="genero">Género:</label>
        <input type="text" name="genero" id="genero" value="{{ old('genero', $libros->genero ?? '') }}" required>

        <label for="clasificacion_tematica">Clasificación Temática:</label>
        <input type="text" name="clasificacion_tematica" id="clasificacion_tematica" value="{{ old('clasificacion_tematica', $libros->clasificacion_tematica ?? '') }}">

        <label for="cantidad_disponible">Cantidad Disponible:</label>
        <input type="number" name="cantidad_disponible" id="cantidad_disponible" value="{{ old('cantidad_disponible', $libros->cantidad_disponible ?? '') }}" required>

        <label for="estado">Estado:</label>
        <select name="estado" id="estado" required>
            <option value="Disponible" {{ isset($libros) && $libros->estado == 'Disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="Prestado" {{ isset($libros) && $libros->estado == 'Prestado' ? 'selected' : '' }}>Prestado</option>
            <option value="No disponible" {{ isset($libros) && $libros->estado == 'No disponible' ? 'selected' : '' }}>No disponible</option>
        </select>

        <div class="butones">
            <button type="submit" name="accion" value="guardar">📘 Guardar Libro</button>
            <button type="submit" name="accion" value="consultar">🔍 Consultar Libro</button>
            <button type="submit" name="accion" value="modificar">✏️ Modificar Libro</button>
            <button type="submit" name="accion" value="eliminar">🗑️ Eliminar Libro</button>
        </div>
    </form>

    <br>
    <a href="{{ route('libro.index') }}">🔙 Ver listado de libros</a>

    <script>
        $(document).ready(function() {
            $('#consultar').on('click', function() {
                var titulo = $('#titulo').val();
                var autor = $('#autor').val();

                $.ajax({
                    url: '{{ route('libro.consultarAjax') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        titulo: titulo,
                        autor: autor
                    },
                    success: function(response) {
                        if (response.error) {
                            alert(response.error);
                        } else {
                            
                            $('#editorial').val(response.editorial);
                            $('#anio_publicacion').val(response.anio_publicacion);
                            $('#genero').val(response.genero);
                            $('#clasificacion_tematica').val(response.clasificacion_tematica);
                            $('#cantidad_disponible').val(response.cantidad_disponible);
                            $('#estado').val(response.estado);
                        }
                    },
                    error: function() {
                        alert('Ocurrió un error al consultar el libro.');
                    }
                });
            });
        });
    </script>
</body>
</html>
