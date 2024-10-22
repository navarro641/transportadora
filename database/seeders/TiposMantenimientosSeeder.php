<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class TiposMantenimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('tipos_mantenimientos')->insert([
            ['nombre' => 'Preventivo'],
            ['nombre' => 'Correctivo'],
        ]);
    }
}
