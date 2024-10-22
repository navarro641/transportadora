<!-- resources/views/vehiculos/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Vehículos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Capacidad (kg)</th>
                    <th>Consumo (L/km)</th>
                    <th>Velocidad (km/h)</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->id }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->capacidad_kg }}</td>
                    <td>{{ $vehiculo->consumo_promedio_combustible_L_km }}</td>
                    <td>{{ $vehiculo->velocidad_promedio_kmh }}</td>
                    <td>{{ $vehiculo->estado ? $vehiculo->estado->nombre : 'Sin estado' }}</td>
                    <td>
                        @if($vehiculo->estado && $vehiculo->estado->nombre === 'Mantenimiento')
                            <a href="{{ route('mantenimientos.index', ['id' => $vehiculo->id]) }}" class="btn">Finalizar Mantenimiento</a>
                        @else
                            {{-- <a href="{{ route('mantenimientos.index', ['vehiculo' => $vehiculo->id]) }}" class="btn">Mandar al Taller</a> --}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</body>
</html>
