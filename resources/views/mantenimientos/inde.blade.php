<!-- resources/views/mantenimientos/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento de Vehículos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>Mantenimiento de Vehículos</h1>

        <h2>Vehículo en Mantenimiento</h2>
        <table>
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Tipo de Mantenimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>
                        <select id="tipo_mantenimiento_{{ $vehiculo->id }}" onchange="cargarMantenimientos({{ $vehiculo->id }})">
                            <option value="">Seleccionar</option>
                            @foreach($tiposMantenimiento as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div id="mantenimiento_opciones_{{ $vehiculo->id }}"></div>
                    </td>
                </tr>
            </tbody>
        </table>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <script>
        function cargarMantenimientos(vehiculoId) {
            var tipoMantenimientoId = document.getElementById('tipo_mantenimiento_' + vehiculoId).value;

            if (!tipoMantenimientoId) {
                document.getElementById('mantenimiento_opciones_' + vehiculoId).innerHTML = '';
                return;
            }

            $.ajax({
                url: '/mantenimientos/tipo/' + tipoMantenimientoId,
                type: 'GET',
                success: function(response) {
                    var mantenimientos = response.mantenimientos;

                    var selectHtml = '<select name="mantenimiento_id" required>';
                    selectHtml += '<option value="">Seleccionar Mantenimiento</option>';

                    mantenimientos.forEach(function(mantenimiento) {
                        selectHtml += '<option value="' + mantenimiento.id + '">' + mantenimiento.descripcion + '</option>';
                    });
                    selectHtml += '</select>';

                    var formHtml = '<form method="POST" action="{{ route('mantenimientos.realizar') }}">' +
                        '@csrf' +
                        '<input type="hidden" name="vehiculo_id" value="' + vehiculoId + '">' +
                        '<label for="mantenimiento_id">Seleccionar Mantenimiento:</label>' + selectHtml +
                        '<label for="fecha_mantenimiento_realizado">Fecha de Mantenimiento:</label>' +
                        '<input type="date" name="fecha_mantenimiento_realizado" required>' +
                        '<button type="submit">Mandar al Taller</button>' +
                        '</form>';

                    document.getElementById('mantenimiento_opciones_' + vehiculoId).innerHTML = formHtml;
                }
            });
        }
    </script>
</body>
</html>
