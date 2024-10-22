<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Vehículos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Añadimos jQuery para facilitar AJAX -->
</head>
<body>
    <div class="container">
        <h1>Mantenimiento de Vehículos</h1>

        <h2>Vehículo: {{ $vehiculo->placa }} - {{ $vehiculo->modelo }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Tipo de Mantenimiento</th>
                    <th>Mantenimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select id="tipo_mantenimiento" onchange="cargarMantenimientos()">
                            <option value="">Seleccionar</option>
                            @foreach($tiposMantenimiento as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div id="mantenimiento_opciones"></div>
                    </td>
                    <td>
                        <button id="confirmar" style="display: none;" onclick="confirmarMantenimiento()">Confirmar</button>
                    </td>
                </tr>
            </tbody>
        </table>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <script>
        function cargarMantenimientos() {
            var tipoMantenimientoId = document.getElementById('tipo_mantenimiento').value;

            // Si no se ha seleccionado un tipo de mantenimiento, no hacemos nada
            if (!tipoMantenimientoId) {
                document.getElementById('mantenimiento_opciones').innerHTML = '';
                document.getElementById('confirmar').style.display = 'none';
                return;
            }

            // Hacer una solicitud AJAX al servidor para obtener los mantenimientos
            $.ajax({
                url: '/mantenimientos/tipo/' + tipoMantenimientoId, // Ruta que obtendrá los mantenimientos
                type: 'GET',
                success: function(response) {
                    var mantenimientos = response.mantenimientos;

                    var selectHtml = '<select name="mantenimiento_id" id="mantenimiento_id" required>';
                    selectHtml += '<option value="">Seleccionar Mantenimiento</option>';

                    mantenimientos.forEach(function(mantenimiento) {
                        selectHtml += '<option value="' + mantenimiento.id + '">' + mantenimiento.descripcion + '</option>';
                    });
                    selectHtml += '</select>';

                    document.getElementById('mantenimiento_opciones').innerHTML = selectHtml;
                    document.getElementById('confirmar').style.display = 'block'; // Muestra el botón de confirmar
                }
            });
        }

        function confirmarMantenimiento() {
            var vehiculoId = "{{ $vehiculo->id }}"; // Obtener el ID del vehículo
            var mantenimientoId = document.getElementById('mantenimiento_id').value;

            // Redirigir a la ruta para registrar el mantenimiento
            window.location.href = '/mantenimientos/realizar/' + vehiculoId + '/' + mantenimientoId;
        }
    </script>
    
    <h3>Finalizar Mantenimiento</h3>
    <form method="POST" action="{{ route('mantenimientos.finalizar') }}">
        @csrf
        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
        <label for="fecha_mantenimiento_realizado">Fecha de Mantenimiento Realizado:</label>
        <input type="date" name="fecha_mantenimiento_realizado" required>
        <button type="submit">Finalizar</button>
    </form>
</body>
</html>
