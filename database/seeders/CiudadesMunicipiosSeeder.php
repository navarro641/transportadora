<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class CiudadesMunicipiosSeeder extends Seeder
{
    public function run()
    {
        DB::table('ciudades_municipios')->insert([
            ['departamento_id' => 1, 'nombre' => 'Bogotá'],
            ['departamento_id' => 2, 'nombre' => 'Medellín'],
            ['departamento_id' => 3, 'nombre' => 'Cali'],
        ]);
    }
}
