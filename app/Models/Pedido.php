<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'guia_pedido',
        'cliente_id',
        'ciudad_origen',
        'ciudad_destino',
        'tipo_carga_id',
        'fecha_creacion',
        'fecha_entrega',
        'estado_pedido_entrega_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function tipoCarga()
    {
        return $this->belongsTo(TipoCarga::class);
    }

    public function estadoPedidoEntrega()
    {
        return $this->belongsTo(EstadoPedidoEntrega::class);
    }

    public function entregas()
    {
        return $this->hasMany(Entrega::class);
    }
}
