<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class MantenimientosRealizadosYProximosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $fechaMantenimientoRealizado = Carbon::create(2024, 10, 11);
        $fechaProximoMantenimiento = $fechaMantenimientoRealizado->copy()->addMonths(6);

        DB::table('mantenimientos_realizados_proximos')->insert([
            [
                'vehiculo_id' => 1,
                'mantenimiento_id' => 1,
                'fecha_mantenimiento_realizado' => $fechaMantenimientoRealizado,
                'fecha_proximo_mantenimiento' => $fechaProximoMantenimiento,
            ]
        ]);
    
    }
}

