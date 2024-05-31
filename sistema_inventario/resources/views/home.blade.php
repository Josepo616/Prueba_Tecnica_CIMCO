<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
  <div class="container">
    <h1>Bienvenido</h1>
    <p>Seleccione una de las siguientes opciones:</p>
    <ul class="option-list">
      <li><a href="{{ route('productos.index') }}">Productos</a></li>
      <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
      <li><a href="{{ route('transacciones.index') }}">Transacciones</a></li>
      <li><a href="{{ route('users.index') }}">Usuarios</a></li>
    </ul>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">Cerrar Sesión</button>
    </form>
  </div>
</body>
</html>
