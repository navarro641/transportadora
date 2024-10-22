<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PedidosVehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('pedidos_vehiculos')->insert([
            [
                'pedido_id' => 1, // ID del vehículo
                'vehiculo_id' => 1,
               
            ],
        ]);

    }
}
