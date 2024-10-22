<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriasLicenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('categorias_licencias')->insert([
            ['nombre' => 'C2'],
            ['nombre' => 'C3'],
        ]);
    }
}
