<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Estado</th>
            <th>Ciudad</th>
            <th>Dirección</th>
            <th>Código postal</th>
            <th>Giro comercial</th>
            <th>Comentarios</th>
            <th>Registrado por</th>        
        </tr>
    </thead>
    <tbody>
        @foreach($prospects as $prospect)
            <tr>
                <td>{{ $prospect->name }}</td>
                <td>{{ $prospect->phone }}</td>
                <td>{{ $prospect->email }}</td>
                <td>{{ $prospect->state }}</td>
                <td>{{ $prospect->city }}</td>
                <td>{{ $prospect->address }}</td>
                <td>{{ $prospect->zip_code }}</td>
                <td>{{ $prospect->comercial_business }}</td>
                <td>{{ $prospect->commentary }}</td>
                <td>{{ $prospect->register_by }}</td>
            </tr>
        @endforeach
    </tbody>
</table>