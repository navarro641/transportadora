<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoCombustible extends Model
{
    use HasFactory;

    protected $fillable = ['ruta_vehiculo_id', 'litros_consumidos', 'precio_litro', 'total'];

    public function rutaVehiculo()
    {
        return $this->belongsTo(RutaVehiculo::class);
    }
}
