<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Salida</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrar Salida de Producto</h1>
        <form action="{{ route('productos.registrarSalida', $producto->ucc) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cantidad_salida">Cantidad de Salida:</label>
                <input type="number" id="cantidad_salida" name="cantidad_salida" class="form-control" min="1" max="{{ $producto->cantidad_disponible }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Salida</button>
        </form>
    </div>
</body>
</html>
