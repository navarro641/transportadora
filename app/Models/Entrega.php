<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'estado_pedido_entrega_id', 'fecha_entrega_realizada'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function estadoPedidoEntrega()
    {
        return $this->belongsTo(EstadoPedidoEntrega::class);
    }
}
