<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoVehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'vehiculo_id',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
