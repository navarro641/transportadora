<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Ruta</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crear Ruta</h1>

        <form action="{{ route('rutas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la Ruta</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="ciudad_origen">Ciudad de Origen</label>
                <input type="text" name="ciudad_origen" required>
            </div>

            <div class="form-group">
                <label for="ciudad_destino">Ciudad de Destino</label>
                <input type="text" name="ciudad_destino" required>
            </div>

            <div class="form-group">
                <label for="distancia_km">Distancia (km)</label>
                <input type="number" name="distancia_km" required>
            </div>

            <div class="form-group">
                <label for="tiempo_estimado_h">Tiempo Estimado (h)</label>
                <input type="number" name="tiempo_estimado_h" required>
            </div>

            <button type="submit">Crear Ruta</button>
        </form>
    </div>
</body>
</html>
