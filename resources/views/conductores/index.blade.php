<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Conductores</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Conductores</h1>

        <a href="{{ route('conductores.create') }}">Crear Nuevo Conductor</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conductores as $conductor)
                    <tr>
                        <td>{{ $conductor->id }}</td>
                        <td>{{ $conductor->nombres }} {{ $conductor->apellidos }}</td>
                        <td>{{ $conductor->documento }}</td>
                        <td>{{ $conductor->estado }}</td>
                        <td>
                            <a href="{{ route('conductores.show', $conductor->id) }}">Ver</a>
                            <a href="{{ route('conductores.edit', $conductor->id) }}">Editar</a>
                            <form action="{{ route('conductores.destroy', $conductor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
