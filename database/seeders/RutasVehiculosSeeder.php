<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutasVehiculosSeeder extends Seeder
{
    public function run()
    {
        $precioLitro = 3.50;

        $rutasVehiculos = [
            [
                'ruta_id' => 1, // ID de la ruta
                'vehiculo_id' => 1,
                'fecha_hora_asignacion' => '2024-10-11 08:00:00',
            ],
        ];

        foreach ($rutasVehiculos as $rutaVehiculo) {
            // Obtener la distancia desde la tabla 'rutas'
            $ruta = DB::table('rutas')->find($rutaVehiculo['ruta_id']);
            $vehiculo = DB::table('vehiculos')->find($rutaVehiculo['vehiculo_id']);

            $litrosConsumidos = $ruta->distancia_km / $vehiculo->consumo_promedio_combustible_L_km;
            $totalValorCombustible = $litrosConsumidos * $precioLitro;

            DB::table('rutas_vehiculos')->insert([
                'ruta_id' => $rutaVehiculo['ruta_id'],
                'vehiculo_id' => $rutaVehiculo['vehiculo_id'],
                'fecha_hora_asignacion' => $rutaVehiculo['fecha_hora_asignacion'],
                'litros_consumidos' => $litrosConsumidos,
                'precio_litro' => $precioLitro,
                'total_valor_combustible' => $totalValorCombustible,
            ]);
        }
    }
}

