<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\RutaVehiculo; // Asegúrate de que el modelo apunte a la tabla correcta
use App\Models\MantenimientoRealizadoProximo;

class GastosVehiculosSeeder extends Seeder
{
    public function run()
    {
        // Obtener los registros de rutas_vehiculos (nombre correcto de la tabla)
        $rutasVehiculos = RutaVehiculo::all();

        foreach ($rutasVehiculos as $rutaVehiculo) {
            // Obtener el total de combustible de la tabla rutas_vehiculos
            $totalCombustible = $rutaVehiculo->total_valor_combustible;

            // Obtener el mantenimiento relacionado con esta ruta
            $mantenimientoRealizadoProximo = MantenimientoRealizadoProximo::where('vehiculo_id', $rutaVehiculo->vehiculo_id)->first();
            $precioMantenimiento = $mantenimientoRealizadoProximo->mantenimiento->precio;

            // Calcular el total (suma del mantenimiento y el valor del combustible)
            $total = $totalCombustible + $precioMantenimiento;

            // Insertar en la tabla gastos_vehiculo
            DB::table('gastos_vehiculo')->insert([
                'rutas_vehiculos_id' => $rutaVehiculo->id,
                'mantenimientos_realizados_proximos_id' => $mantenimientoRealizadoProximo->id,
                'total' => $total,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
