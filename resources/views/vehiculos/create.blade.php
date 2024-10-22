<!-- resources/views/vehiculos/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrar Vehículo</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf
            <div>
                <label for="tipo_vehiculo_id">Tipo de Vehículo:</label>
                <select name="tipo_vehiculo_id" id="tipo_vehiculo_id">
                    @foreach ($tiposVehiculos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="placa">Placa:</label>
                <input type="text" name="placa" id="placa" required>
            </div>
            <div>
                <label for="modelo">Modelo:</label>
                <input type="text" name="modelo" id="modelo" required>
            </div>
            <div>
                <label for="capacidad_kg">Capacidad (kg):</label>
                <input type="number" name="capacidad_kg" id="capacidad_kg" required>
            </div>
            <div>
                <label for="consumo_promedio_combustible_L_km">Consumo Promedio (L/km):</label>
                <input type="number" name="consumo_promedio_combustible_L_km" id="consumo_promedio_combustible_L_km" required>
            </div>
            <div>
                <label for="velocidad_promedio_kmh">Velocidad Promedio (km/h):</label>
                <input type="number" name="velocidad_promedio_kmh" id="velocidad_promedio_kmh" required>
            </div>
            <div>
                <label for="estado_vehiculo_id">Estado del Vehículo:</label>
                <select name="estado_vehiculo_id" id="estado_vehiculo_id">
                    @foreach ($estadosVehiculos as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Registrar Vehículo</button>
        </form>
        
    </div>
</body>
</html>

