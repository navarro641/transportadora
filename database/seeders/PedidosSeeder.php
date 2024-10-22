<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            [
                'guia_pedido' => 'BBB777',
                'cliente_id' => 1,
                'ciudad_origen' => 'Bucaramanga',
                'ciudad_destino' => 'Bucaramanga', 
                'tipo_carga_id' => 1,
                'descripcion' => 'Portatil',
                'peso(kg)' => 6,
                'cantidad' => 4,

                'fecha_hora_solicitud' =>now(),
                
                'estado_id' => 1,
                
            ],
        ]);
    }
}
