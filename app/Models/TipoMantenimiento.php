<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMantenimiento extends Model
{
    use HasFactory;
    protected $table = 'tipos_mantenimientos'; 

    protected $fillable = ['nombre'];

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class);
    }
}
