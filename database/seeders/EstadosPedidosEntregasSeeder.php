<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EstadosPedidosEntregasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('estados_pedidos_entregas')->insert([
            ['nombre' => 'Pendiente'],
            ['nombre' => 'En preparacion'],
            ['nombre' => 'Entregado'],
            ['nombre' => 'Cancelado'],

        ]);
    }
}
