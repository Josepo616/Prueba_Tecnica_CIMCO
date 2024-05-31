<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacciones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Transacciones</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>UPC</th>
                    <th>Tipo</th>
                    <th>Producto</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Fecha y Hora</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transacciones as $transaccion)
                    <tr>
                        <td>{{ $transaccion->producto_id }}</td>
                        <td>{{ ucfirst($transaccion->tipo) }}</td>
                        <td>{{ $transaccion->producto->nombre ?? 'N/A' }}</td>
                        <td>{{ $transaccion->producto->proveedor->nombre ?? 'N/A' }}</td>
                        <td>{{ $transaccion->cantidad }}</td>
                        <td>{{ $transaccion->fecha_hora }}</td>
                        <td>{{ $transaccion->usuario->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
