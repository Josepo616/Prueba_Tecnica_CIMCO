<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Entrada de Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos/entrada.css') }}">
</head>
<body>
    <div class="container">
        <h1>Registrar Entrada de Producto</h1>
        <form action="{{ route('productos.entrada', $producto->ucc) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="cantidad_entrada">Cantidad de Entrada:</label>
                <input type="number" id="cantidad_entrada" name="cantidad_entrada" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Entrada</button>
            <a href="javascript:history.back()" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
