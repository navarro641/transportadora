<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CiudadMunicipio extends Model
{
    use HasFactory;
    protected $table = 'ciudades_municipios'; 


    protected $fillable = ['departamento_id', 'nombre'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
