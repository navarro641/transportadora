<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $table = 'administradores';

    protected $fillable = [
        'nombre',
        'correo',
        'contrasenia',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($administrador) {
            $administrador->contrasenia = bcrypt($administrador->contrasenia);
        });
    }
}
