
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Devoluciones</title>
    <style>
       
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd; 
            padding: 8px; 
            text-align: left; 
        }

        th {
            background-color: #f2f2f2;
        }

      
        .no-result {
            text-align: center;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Listado de Devoluciones</h1>

    <a href="{{ route('devoluciones.create') }}">Registrar Nueva Devolución</a><br><br>

  
    @if ($devoluciones->isEmpty())
        <p class="no-result">No hay devoluciones registradas.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID del Préstamo</th>
                    <th>Fecha de Devolución Real</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devoluciones as $devolucion)
                    <tr>
                        <td>{{ $devolucion->prestamo_id }}</td>
                        <td>{{ $devolucion->fecha_devolucion_real }}</td>
                        <td>{{ $devolucion->observaciones }}</td>
                        <td>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
