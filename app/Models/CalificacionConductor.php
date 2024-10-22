<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionConductor extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrega_id',
        'entrega_a_tiempo',
        'accidente',
        'calificacion',
    ];

    public function entrega()
    {
        return $this->belongsTo(Entrega::class);
    }
}
