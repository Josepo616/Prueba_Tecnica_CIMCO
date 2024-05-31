<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'ucc';

    protected $fillable = [
        'ucc',
        'nombre',
        'descripcion',
        'cantidad_disponible',
        'precio_unitario',
        'proveedor_id',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }
}
