<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignaciones de Vehículos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Asignaciones de Vehículos</h1>

        @if ($asignaciones->isNotEmpty())
            <table>
                <thead>
                    <tr>
                        <th>Nombre de la Ruta</th>
                        <th>Placa del Vehículo</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asignaciones as $asignacion)
                        <tr>
                            <td>{{ $asignacion->ruta->nombre }}</td>
                            <td>{{ $asignacion->vehiculo->placa }}</td>
                            <td>
                                <form action="{{ route('asignaciones.destroy', $asignacion->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay asignaciones registradas en la base de datos.</p>
        @endif
    </div>
</body>
</html>
