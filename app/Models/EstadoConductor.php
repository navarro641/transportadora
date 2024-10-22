<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoConductor extends Model
{
    use HasFactory;
    protected $table = 'estados_conductores'; 


    protected $fillable = ['nombre'];

    public function conductores()
    {
        return $this->hasMany(Conductor::class);
    }
}
