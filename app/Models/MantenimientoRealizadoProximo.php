<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoRealizadoProximo extends Model
{
    use HasFactory;
    protected $table = 'mantenimientos_realizados_proximos';


    protected $fillable = ['vehiculo_id', 'mantenimiento_id', 'fecha_mantenimiento_realizado', 'fecha_proximo_mantenimiento'];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function mantenimiento()
    {
        return $this->belongsTo(Mantenimiento::class);
    }
}
