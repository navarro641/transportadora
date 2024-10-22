<!-- resources/views/clientes/create.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Cliente</title>
</head>
<body>
    <h1>Registrar Nuevo Cliente</h1>
    
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        
        <label for="tipo_documento_id">Tipo de Documento:</label>
        <select name="tipo_documento_id" id="tipo_documento_id" required>
            <option value="">Seleccione un tipo de documento</option>
            @foreach($tiposDocumentos as $tipo)
                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option> <!-- Mostrar el nombre del tipo de documento -->
            @endforeach
        </select><br><br>

        <label for="documento">Documento:</label>
        <input type="number" name="documento" required><br><br>

        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" required><br><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br><br>

        <label for="celular">Celular:</label>
        <input type="number" name="celular" required><br><br>

        <label for="departamento_id">Departamento:</label>
        <select name="departamento_id" id="departamento_id" required>
            <option value="">Seleccione su departamento</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select><br><br>

        <label for="ciudad_municipio_id">Ciudad o Municipio:</label>
        <select name="ciudad_municipio_id" id="ciudad_municipio_id" required>
            <option value="">Seleccione su ciudad o municipio</option>
        </select><br><br>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#departamento_id').change(function() {
                    var departamentoId = $(this).val();
                    console.log(departamentoId); 

                    if (departamentoId) {
                        $.ajax({
                            url: '/ciudades/' + departamentoId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#ciudad_municipio_id').empty();
                                $('#ciudad_municipio_id').append('<option value="">Seleccione su ciudad o municipio</option>');
                                $.each(data, function(key, value) {
                                    $('#ciudad_municipio_id').append('<option value="' + value.id + '">' + value.nombre + '</option>');
                                });
                            },
                            error: function(xhr) {
                                console.log("Error:", xhr.responseText); // Para ver si hay algún error
                            }
                        });
                    } else {
                        $('#ciudad_municipio_id').empty();
                        $('#ciudad_municipio_id').append('<option value="">Seleccione su ciudad o municipio</option>');
                    }
                });
            });
        </script>


        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" required><br><br>

        <label for="barrio">Barrio:</label>
        <input type="text" name="barrio" required><br><br>

        <label for="contrasenia">Contraseña:</label>
        <input type="password" name="contrasenia" required><br><br>

        <button type="submit">Registrar Cliente</button>
    </form>
</body>
</html>
