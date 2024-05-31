<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Ruta predeterminada que redirige a la página de login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/productos/{ucc}/salida', [ProductoController::class, 'salida'])->name('productos.salida');
    Route::post('/productos/{ucc}/salida', [ProductoController::class, 'registrarSalida'])->name('productos.registrarSalida');
    Route::get('/productos/{ucc}/entrada', [ProductoController::class, 'entrada'])->name('productos.entrada');
    Route::post('/productos/{ucc}/entrada', [ProductoController::class, 'registrarEntrada'])->name('productos.registrarEntrada');
    Route::get('/productos/{ucc}/ajustes', [ProductoController::class, 'ajustes'])->name('productos.ajustes');
    Route::put('/productos/{ucc}/ajustes', [ProductoController::class, 'actualizar'])->name('productos.actualizar');

    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
    Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');


    Route::get('/transacciones', [TransaccionController::class, 'index'])->name('transacciones.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/csrf-token', function () {
        return response()->json(['token' => csrf_token()]);
    });
});
