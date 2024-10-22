<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ciudad_origen',
        'ciudad_destino',
        'distancia_km',
        'tiempo_estimado_h',
    ];

    public function rutasVehiculos()
    {
        return $this->hasMany(RutaVehiculo::class);
    }
    
}
