<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoVehiculo extends Model
{
    use HasFactory;

    protected $fillable = ['gasto_combustible_id', 'gasto_mantenimiento_id', 'total'];

    public function gastoCombustible()
    {
        return $this->belongsTo(GastoCombustible::class);
    }

    public function gastoMantenimiento()
    {
        return $this->belongsTo(GastoMantenimiento::class);
    }
}
