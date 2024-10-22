<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación de Vehículo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Asignación de Vehículo a Ruta</h1>

        <h2>Vehículos Asignados</h2>
        <table>
            <thead>
                <tr>
                    <th>Ruta Asignada</th>
                    <th>Vehículo Asignado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->ruta->nombre }}</td> <!-- Nombre de la ruta -->
                    <td>{{ $asignacion->vehiculo->placa }}</td> <!-- Placa del vehículo -->
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('rutas.index') }}">Regresar</a>
    </div>
</body>
</html>
