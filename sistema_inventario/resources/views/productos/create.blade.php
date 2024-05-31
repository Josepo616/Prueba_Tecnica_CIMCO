<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos/create.css') }}">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ucc">UPC del Producto:</label>
                <input type="text" id="ucc" name="ucc" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del Producto:</label>
                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="cantidad_disponible">Cantidad Disponible:</label>
                <input type="number" id="cantidad_disponible" name="cantidad_disponible" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="number" id="precio_unitario" name="precio_unitario" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="proveedor_id">Proveedor:</label>
                <select id="proveedor_id" name="proveedor_id" class="form-control" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                    @endforeach
                </select>
                <a href="{{ route('proveedores.create') }}">Crear nuevo proveedor</a>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Producto</button>
            <a href="javascript:history.back()" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
