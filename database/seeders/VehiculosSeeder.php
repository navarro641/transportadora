<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('vehiculos')->insert([
            [
                'tipo_vehiculo_id' => 1, // Asegúrate de que este ID exista en la tabla tipos_vehiculos
                'placa' => 'ABC123',
                'modelo' => 'Toyota',
                'capacidad_kg' => 1000,
                'consumo_promedio_combustible_L_km' => 15,
                'velocidad_promedio_kmh' => 80,
                'estado_vehiculo_id' => 1 // Asegúrate de que este ID exista en la tabla estados_vehiculos
            ],
        ]);
    }
}
