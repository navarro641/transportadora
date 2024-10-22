<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RutaVehiculo extends Model
{
    use HasFactory;
    protected $table = 'rutas_vehiculos';

    protected $fillable = [
        'ruta_id',
        'vehiculo_id',
        'fecha_hora_asignacion',
        'litros_consumidos',
        'precio_litro',
        'total_valor_combustible',
    ];
    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
