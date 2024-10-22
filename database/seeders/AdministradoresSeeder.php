<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdministradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administradores')->insert([
            
                'nombre' => 'Admin Principal',
                'correo' => 'admin1@empresa.com',
                'contrasenia' => Hash::make('admin12345'), 


            ]
                
                
        );
    }
}
