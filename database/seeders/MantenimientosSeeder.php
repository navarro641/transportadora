<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MantenimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('mantenimientos')->insert([
            [
                'vehiculo_id' => 1,
                'tipo_mantenimiento_id' => 1,
                'descripcion' => 'Cambio de aceite',
                'precio' => 2300,
                
            ],
        ]);
    }
}
