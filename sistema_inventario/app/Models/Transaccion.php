<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    protected $table = 'transacciones';
    protected $fillable = [
        'tipo', 'producto_id', 'proveedor_id', 'cantidad', 'fecha_hora', 'usuario_id'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id', 'ucc');
    }

    public function proveedor()
    {
        // Relación a través del producto
        return $this->belongsTo(Proveedor::class, 'producto_id', 'ucc');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}