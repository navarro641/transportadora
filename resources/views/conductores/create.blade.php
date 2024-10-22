<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Conductor</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crear Conductor</h1>

        <form action="{{ route('conductores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo_documento_id">Tipo de Documento</label>
                <select name="tipo_documento_id" id="tipo_documento_id" required>
                    @foreach ($tiposDocumentos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="documento">Número de Documento</label>
                <input type="text" name="documento" required>
            </div>

            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" required>
            </div>

            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" required>
            </div>

            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" required>
            </div>

            <div class="form-group">
                <label for="celular">Celular</label>
                <input type="text" name="celular" required>
            </div>

            <div class="form-group">
                <label for="experiencia_meses">Experiencia en Meses</label>
                <input type="number" name="experiencia_meses" required>
            </div>

            <div class="form-group">
                <label for="categoria_licencia_id">Categoría de Licencia</label>
                <select name="categoria_licencia_id" id="categoria_licencia_id" required>
                    @foreach ($categoriasLicencias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="numero_licencia">Número de Licencia</label>
                <input type="text" name="numero_licencia" required>
            </div>

            <div class="form-group">
                <label for="fecha_expedicion_licencia">Fecha de Expedición de Licencia</label>
                <input type="date" name="fecha_expedicion_licencia" required>
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento_licencia">Fecha de Vencimiento de Licencia</label>
                <input type="date" name="fecha_vencimiento_licencia" required>
            </div>

            <div class="form-group">
                <label for="estado_conductor_id">Estado del Conductor</label>
                <select name="estado_conductor_id" id="estado_conductor_id" required>
                    @foreach ($estadosConductores as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Crear Conductor</button>
        </form>
    </div>
</body>
</html>
