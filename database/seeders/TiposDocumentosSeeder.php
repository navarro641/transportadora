<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TiposDocumentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('tipos_documentos')->insert([
            ['nombre' => 'Cédula de Ciudadanía'],
            ['nombre' => 'Pasaporte'],
            ['nombre' => 'Tarjeta de Identidad'],
        ]);
    }
}
