<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    public function run()
    {
        DB::table('clientes')->insert([
            [
                'tipo_documento_id' => 1,
                'documento' => 123456789,
                'nombres' => 'Juan',
                'apellidos' => 'Pérez',
                'correo' => 'juan.perez@example.com',
                'celular' => 3001234567,
                'departamento_id' => 1,
                'ciudad_municipio_id' => 1,
                'direccion' => 'Carrera 7 #123',
                'barrio' => 'Chapinero',
                'contrasenia' => bcrypt('password'),
            ],
        ]);
    }
}