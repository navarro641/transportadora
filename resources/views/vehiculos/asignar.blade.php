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
        <h1>Asignar Vehículo</h1>

        <form action="{{ route('rutas.asignar') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ruta_id">Ruta:</label>
                <select name="ruta_id" id="ruta_id" required>
                    <!-- Aquí debes llenar las rutas desde la base de datos -->
                    @foreach ($rutas as $ruta)
                        <option value="{{ $ruta->id }}">{{ $ruta->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="vehiculo_id">Vehículo:</label>
                <select name="vehiculo_id" id="vehiculo_id" required>
                    @foreach ($vehiculos as $vehiculo)
                        <option value="{{ $vehiculo->id }}">{{ $vehiculo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Asignar Vehículo</button>
        </form>
    </div>
</body>
</html>
