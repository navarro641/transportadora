<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento_id',
       
        'nombres',
        'apellidos',
        'documento',
        'correo',
        'celular',
        'departamento_id',
        'ciudad_municipio_id',
        'direccion',
        'barrio',
        'contrasenia',
    ];

    // Relaciones
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ciudadMunicipio()
    {
        return $this->belongsTo(CiudadMunicipio::class);
    }
}
