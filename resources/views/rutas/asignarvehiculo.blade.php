<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Vehículo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Asignar Vehículo a Ruta</h1>

        <form action="{{ route('rutas.asignar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ruta_id">Selecciona una Ruta:</label>
                <select name="ruta_id" required>
                    @foreach ($rutas as $ruta)
                        <option value="{{ $ruta->id }}">{{ $ruta->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="vehiculo_id">Selecciona un Vehículo:</label>
                <select name="vehiculo_id" required>
                    @foreach ($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}">{{ $vehiculo->modelo }} - {{ $vehiculo->placa }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Asignar Vehículo</button>
        </form>
    </div>
</body>
</html>
