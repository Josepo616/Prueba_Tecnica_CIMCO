<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes del Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos/ajuste.css') }}">
</head>
<body>
    <div class="container">
        <h2>Ajustes del Producto</h2>
        <form action="{{ route('productos.actualizar', ['ucc' => $producto->ucc]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ucc">UPC:</label>
                <input type="text" class="form-control" id="ucc" name="ucc" value="{{ $producto->ucc }}" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="cantidad_disponible">Cantidad Disponible:</label>
                <input type="number" class="form-control" id="cantidad_disponible" name="cantidad_disponible" value="{{ $producto->cantidad_disponible }}">
            </div>
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario:</label>
                <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" value="{{ $producto->precio_unitario }}">
            </div>
            <div class="form-group">
                <label for="proveedor_id">Proveedor:</label>
                <select class="form-control" id="proveedor_id" name="proveedor_id">
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" {{ $proveedor->id == $producto->proveedor_id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="javascript:history.back()" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>
