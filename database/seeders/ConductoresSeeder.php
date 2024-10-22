<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ConductoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('conductores')->insert([
            [
                'tipo_documento_id' => 1,
                'documento' => 123456780,
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'correo' => 'juan@example.com',
                'celular' => 3001284567,
                'experiencia_meses' => 23,
                'categoria_licencia_id' => 1,
                'numero_licencia' => 93456780,
                'fecha_expedicion_licencia' => '2022-01-01',
                'fecha_vencimiento_licencia' => '2025-01-01',
                'estado_conductor_id' => 2,
                'contrasenia' => bcrypt('password'),

            ],
        ]);
    }
}
