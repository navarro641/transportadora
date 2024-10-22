<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use App\Models\RutaVehiculo;
use App\Models\Entrega;
use Carbon\Carbon;

class EntregasSeeder extends Seeder
{
    public function run()
    {
        // Datos de las entregas
        $entregas = [
            [
                'vehiculo_id' => 1, // El ID del vehículo que realiza la entrega
                'fecha_hora_salida' => '2024-10-12 09:00:00',
                'estado_id' => 1, // Estado inicial de la entrega
            ],
        ];

        foreach ($entregas as $entregaData) {
            // Obtener información del vehículo y la ruta asignada
            $vehiculo = Vehiculo::find($entregaData['vehiculo_id']);
            $rutaVehiculo = RutaVehiculo::where('vehiculo_id', $entregaData['vehiculo_id'])->first();

            if ($vehiculo && $rutaVehiculo) {
                // Obtener la distancia en km y la velocidad promedio del vehículo
                $distanciaKm = $rutaVehiculo->distancia_km;
                $velocidadPromedio = $vehiculo->velocidad_promedio_kmh;

                // Calcular el tiempo estimado en horas
                $tiempoEstimadoHoras = $distanciaKm / $velocidadPromedio;

                // Calcular la fecha y hora estimada de entrega
                $fechaHoraSalida = Carbon::parse($entregaData['fecha_hora_salida']);
                $fechaHoraEstimadaEntrega = $fechaHoraSalida->addHours($tiempoEstimadoHoras);

                // Insertar la entrega en la base de datos con `fecha_hora_entrega_realizada` como null
                Entrega::create([
                    'vehiculo_id' => $entregaData['vehiculo_id'],
                    'fecha_hora_salida' => $entregaData['fecha_hora_salida'],
                    'fecha_hora_extimada_entrega' => $fechaHoraEstimadaEntrega,
                    'fecha_hora_entrega_realizada' => null, // Entrega aún no realizada
                    'estado_id' => $entregaData['estado_id'],
                ]);
            }
        }
    }
}
