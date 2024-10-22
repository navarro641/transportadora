<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_vehiculo_id',
        'placa',
        'modelo',
        'capacidad_kg',
        'consumo_promedio_combustible_L_km',
        'estado_vehiculo_id',
    ];

    public function rutas_vehiculos()
    {
        return $this->belongsTo(RutaVehiculo::class);
    }

    public function estado()
    {
        return $this->belongsTo(EstadoVehiculo::class, 'estado_vehiculo_id');
    }

    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class);
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }

    public function conductoresVehiculos()
    {
        return $this->hasMany(ConductorVehiculo::class);
    }

    public function mantenimientosRealizadosProximos()
    {
        return $this->hasMany(MantenimientoRealizadoProximo::class);
    }

    public function gastosCombustible()
    {
        return $this->hasMany(GastoCombustible::class);
    }
}
