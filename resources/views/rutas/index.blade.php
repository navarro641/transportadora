<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Rutas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .btn {
            padding: 10px 15px;
            margin: 5px;
            color: #fff;
            background-color: #007BFF;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Rutas</h1>
        
        <!-- Botones para Crear Ruta y Asignar Vehículo -->
        <div class="mb-4">
            <a href="{{ route('rutas.create') }}" class="btn">Crear Ruta</a>
            <a href="{{ route('rutas.asignarVehiculo') }}" class="btn btn-secondary">Asignar Vehículo</a>
            <a href="{{ route('asignaciones.index') }}" class="btn">Ver Asignaciones</a> <!-- Botón para Ver Asignaciones -->


        </div>

        <!-- Tabla de Rutas -->
        @if($rutas->count())
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ciudad Origen</th>
                        <th>Ciudad Destino</th>
                        <th>Distancia (Km)</th>
                        <th>Tiempo Estimado (Horas)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rutas as $ruta)
                        <tr>
                            <td>{{ $ruta->id }}</td>
                            <td>{{ $ruta->nombre }}</td>
                            <td>{{ $ruta->ciudad_origen }}</td>
                            <td>{{ $ruta->ciudad_destino }}</td>
                            <td>{{ $ruta->distancia_km }}</td>
                            <td>{{ $ruta->tiempo_estimado_h }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No hay rutas registradas en la base de datos.</p>
        @endif
    </div>
    

</body>
</html>
