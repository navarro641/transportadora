<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $fillable = ['vehiculo_id', 'tipo_mantenimiento_id', 'descripcion', 'precio'];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }

    public function tipoMantenimiento()
    {
        return $this->belongsTo(TipoMantenimiento::class);
    }
}
