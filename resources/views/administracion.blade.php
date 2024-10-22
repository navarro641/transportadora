<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Sistema de Gestión de Transporte</h1>
        <p>Haz clic en el botón de abajo para registrar un nuevo cliente:</p>
        
        <a href="{{ route('clientes.create') }}">
            <button>Registrar Cliente</button>
        </a>

        <p>También puedes:</p>
        <a href="{{ route('vehiculos.create') }}">
            <button>Registrar Vehículo</button>
        </a>
        <a href="{{ route('vehiculos.index') }}"> <!-- Botón para ver vehículos -->
            <button>Ver Vehículos</button>
        </a>
        <a href="{{ route('conductores.create') }}">
            <button>Registrar Conductor</button>
        </a>
        <a href="{{ route('rutas.index') }}">
            <button>Ver rutas</button>
        </a>
        <a href="{{ route('rutas.create') }}"> <!-- Agregando un botón para crear una nueva ruta -->
            <button>Crear Ruta</button>
        </a>
       
    </div>
</body>
</html>

