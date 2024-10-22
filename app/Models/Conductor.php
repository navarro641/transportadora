<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = [
        'tipo_documento_id',
        'documento',
        'nombres',
        'apellidos',
        'correo',
        'celular',
        'experiencia_meses',
        'categoria_licencia_id',
        'numero_licencia',
        'fecha_expedicion_licencia',
        'fecha_vencimiento_licencia',
        'estado_conductor_id',
        'contrasenia',
    ];

    public function estadoConductor()
    {
        return $this->belongsTo(EstadoConductor::class);
    }

    public function categoriaLicencia()
    {
        return $this->belongsTo(CategoriaLicencia::class);
    }
}
