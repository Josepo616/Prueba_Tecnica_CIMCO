<!-- resources/views/proveedores/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Proveedores</h1>
        <a href="{{ route('proveedores.create') }}">Crear Proveedor</a>
        <ul>
            @foreach($proveedores as $proveedor)
                <li>{{ $proveedor->nombre }} - {{ $proveedor->contacto }}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
