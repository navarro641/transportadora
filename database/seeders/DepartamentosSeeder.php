<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    public function run()
    {
        DB::table('departamentos')->insert([
            ['nombre' => 'Cundinamarca'],
            ['nombre' => 'Antioquia'],
            ['nombre' => 'Valle del Cauca'],
        ]);
    }
}
