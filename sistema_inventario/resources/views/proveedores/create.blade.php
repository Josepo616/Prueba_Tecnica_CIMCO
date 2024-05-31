<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proveedor</title>
    <link rel="stylesheet" href="{{ asset('css/proveedores/create.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Proveedor</h1>
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Proveedor:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección del Proveedor:</label>
                <input type="text" id="direccion" name="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono del Proveedor:</label>
                <input type="text" id="telefono" name="telefono" class="form-control" required>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
                <a href="javascript:history.back()" class="btn btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
