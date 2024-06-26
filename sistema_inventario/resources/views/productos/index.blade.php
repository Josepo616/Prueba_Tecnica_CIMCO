<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/productos/index.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Registrar una entrada de un nuevo producto</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Cantidad en Inventario</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>${{ number_format($producto->precio_unitario, 2) }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->proveedor->nombre }}</td>
                <td>{{ $producto->cantidad_disponible }}</td>
                <td>
                    <a href="{{ route('productos.salida', $producto->ucc) }}" class="btn btn-secondary">Registrar salida</a>
                    <a href="{{ route('productos.entrada', $producto->ucc) }}" class="btn btn-secondary">Registrar entrada</a>
                    <a href="{{ route('productos.ajustes', $producto->ucc) }}" class="btn btn-secondary">Registrar ajuste</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        
        <a href="javascript:history.back()" class="btn btn-cancel">Regresar</a>
    </div>
</body>
</html>
