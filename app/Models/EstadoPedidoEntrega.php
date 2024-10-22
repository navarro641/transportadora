<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedidoEntrega extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
