<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RutasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rutas')->insert([
            [
                'nombre'=>'Bogota_bucaramanga',
                'ciudad_origen'=>'Bogota',
                'ciudad_destino'=>'Bucaramanga',
                'distancia_km' => 400,
                'tiempo_estimado_h'=>34,
            ],
        ]);
    
    }
}
