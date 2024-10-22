<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConductoresVehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('conductores_vehiculos')->insert([
            [
                'vehiculo_id' => 1, // ID del vehículo
                'conductor_id' => 1,
            ],
        ]);
    }
}
