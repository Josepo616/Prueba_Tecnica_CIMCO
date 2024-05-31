<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransaccionController extends Controller
{
    public function index()
    {
        $transacciones = Transaccion::all();
        return view('transacciones.index', compact('transacciones'));
    }

    public function createEntrada()
{
    $productos = Producto::all();
    $proveedores = Proveedor::all();
    $usuarios = User::all(); // Supongo que tienes un modelo User para los usuarios

    return view('transacciones.entrada', compact('productos', 'proveedores', 'usuarios'));
}
    
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|in:entrada,salida,ajuste',
            'cantidad' => 'required|integer|min:1',
            'usuario_id' => 'required|exists:users,id',
        ]);

        $productoId = $request->input('producto_id');
        $proveedorId = $request->input('proveedor_id');

        if ($request->tipo === 'entrada') {
            $producto = Producto::firstOrCreate(['nombre' => $request->nombre_producto], [
                'ucc' => $request->ucc,
                'descripcion' => $request->descripcion_producto,
                'cantidad_disponible' => $request->cantidad,
                'precio_unitario' => $request->precio_unitario,
            ]);

            $proveedor = Proveedor::firstOrCreate(['nombre' => $request->nombre_proveedor], [
                'direccion' => $request->direccion_proveedor,
                'telefono' => $request->telefono_proveedor,
            ]);

            $productoId = $producto->ucc;
            $proveedorId = $proveedor->id;
        }

        Transaccion::create([
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'producto_id' => $productoId,
            'proveedor_id' => $proveedorId,
            'cantidad' => $request->cantidad,
            'fecha_hora' => now(),
            'usuario_id' => $request->usuario_id,
        ]);

        return redirect()->route('transacciones.index')
            ->with('success', 'Transacción creada correctamente.');
    }
}