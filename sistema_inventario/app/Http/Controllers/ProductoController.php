<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Transaccion;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('productos.create', compact('proveedores'));
    }

    
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'ucc' => 'required|unique:productos,ucc',
        'nombre' => 'required',
        'descripcion' => 'nullable',
        'cantidad_disponible' => 'required|integer|min:0',
        'precio_unitario' => 'required|numeric|min:0',
        'proveedor_id' => 'required|exists:proveedores,id',
    ]);

    // Crear un nuevo producto
    $producto = Producto::create($request->all());

    // Registrar una transacción de entrada para el producto creado
    Transaccion::create([
        'tipo' => 'entrada',
        'producto_id' => $request->ucc, // Cambiar a 'ucc'
        'cantidad' => $request->cantidad_disponible,
        'proveedor_id' => $request->proveedor_id,
        'usuario_id' => auth()->user()->id, // Suponiendo que estás utilizando autenticación de usuario
        'fecha_hora' => now(), // Registrar la fecha y hora actual
    ]);

    // Redireccionar con un mensaje de éxito
    return redirect()->route('productos.index')
        ->with('success', 'Producto creado correctamente.');
}


    public function salida($ucc)
    {
        $producto = Producto::where('ucc', $ucc)->firstOrFail();
        return view('productos.salida', compact('producto'));
    }

    public function registrarSalida(Request $request, $ucc)
    {
        $producto = Producto::where('ucc', $ucc)->firstOrFail();

        $request->validate([
            'cantidad_salida' => 'required|integer|min:1|max:' . $producto->cantidad_disponible,
        ]);

        $cantidadSalida = $request->cantidad_salida;

        // Actualizar la cantidad disponible del producto
        $producto->update([
            'cantidad_disponible' => $producto->cantidad_disponible - $cantidadSalida,
        ]);

        // Registrar una transacción de salida para el producto
        Transaccion::create([
            'tipo' => 'salida',
            'producto_id' => $producto->ucc,
            'cantidad' => $cantidadSalida,
            'proveedor_id' => $producto->proveedor_id,
            'usuario_id' => auth()->user()->id,
            'fecha_hora' => now(),
        ]);

        return redirect()->route('productos.index')->with('success', 'Salida registrada correctamente.');
    }

    public function entrada($ucc)
    {
        $producto = Producto::where('ucc', $ucc)->firstOrFail();
        return view('productos.entrada', compact('producto'));
    }

    public function registrarEntrada(Request $request, $ucc)
    {
        $producto = Producto::where('ucc', $ucc)->firstOrFail();

        $request->validate([
            'cantidad_entrada' => 'required|integer|min:1', // No hay límite máximo de cantidad en una entrada
        ]);

        $cantidadEntrada = $request->cantidad_entrada;

        // Actualizar la cantidad disponible del producto
        $producto->update([
            'cantidad_disponible' => $producto->cantidad_disponible + $cantidadEntrada,
        ]);

        // Registrar una transacción de entrada para el producto
        Transaccion::create([
            'tipo' => 'entrada',
            'producto_id' => $producto->ucc,
            'cantidad' => $cantidadEntrada,
            'proveedor_id' => $producto->proveedor_id,
            'usuario_id' => auth()->user()->id,
            'fecha_hora' => now(),
        ]);

        return redirect()->route('productos.index')->with('success', 'Entrada registrada correctamente.');
    }

    public function ajustes($ucc)
{
    $producto = Producto::where('ucc', $ucc)->firstOrFail();
    $proveedores = Proveedor::all();
    return view('productos.ajustes', compact('producto', 'proveedores'));
}

public function actualizar(Request $request, $ucc)
{
    $producto = Producto::where('ucc', $ucc)->firstOrFail();

    $request->validate([
        'nombre' => 'required',
        // Agrega aquí las reglas de validación para los campos que deseas editar
    ]);

    // Actualizar los detalles del producto
    $producto->update($request->all());

    // Registrar una transacción de ajuste para el producto
    Transaccion::create([
        'tipo' => 'ajuste',
        'producto_id' => $producto->ucc,
        'cantidad' => $request->cantidad_disponible,
        'proveedor_id' => $producto->proveedor_id,
        'usuario_id' => auth()->user()->id,
        'fecha_hora' => now(),
    ]);

    return redirect()->route('productos.index')->with('success', 'Detalles del producto actualizados correctamente.');
}

}
