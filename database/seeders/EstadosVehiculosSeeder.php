<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class EstadosVehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('estados_vehiculos')->insert([
            ['nombre' => 'Asignado'],
            ['nombre' => 'Disponible'],
            ['nombre' => 'Eliminado'],
            ['nombre' => 'Mantenimiento'],

        ]);
    }
}
