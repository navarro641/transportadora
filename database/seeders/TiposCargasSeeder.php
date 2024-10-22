<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposCargasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tipos_cargas')->insert([
            ['nombre' => 'Fragil'],
            ['nombre' => 'Perecedera'],
        ]);
    }
}
