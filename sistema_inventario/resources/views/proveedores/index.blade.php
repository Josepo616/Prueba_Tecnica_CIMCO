<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="{{ asset('css/proveedores/index.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Crear Proveedor</a>
        <ul>
            @foreach($proveedores as $proveedor)
                <li>{{ $proveedor->nombre }} - {{ $proveedor->telefono }} - {{ $proveedor->direccion }}</li>
            @endforeach
        </ul>
        
        <a href="javascript:history.back()" class="btn btn-cancel">Regresar</a>
    </div>
</body>
</html>
