<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaLicencia extends Model
{
    use HasFactory;
    protected $table = 'categorias_licencias'; 


    protected $fillable = ['nombre'];

    public function conductores()
    {
        return $this->hasMany(Conductor::class);
    }
}
