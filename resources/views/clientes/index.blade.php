<!-- resources/views/clientes/index.blade.php -->

<h1>Lista de Clientes</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombres }} {{ $cliente->apellidos }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
