<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Entrega;

class CalificacionesConductoresSeeder extends Seeder
{
    public function run()
    {
        // Obtener todas las entregas que ya tienen fecha de entrega realizada
        $entregas = Entrega::whereNotNull('fecha_hora_entrega_realizada')->get();

        foreach ($entregas as $entrega) {
            // Verificar si la entrega se realizó a tiempo
            $entregaATiempo = $entrega->fecha_hora_entrega_realizada == $entrega->fecha_hora_extimada_entrega ? 5 : 0;

            // Definir si hubo un accidente (puedes modificar la lógica si tienes un campo de accidente en otro lugar)
            $accidente = rand(0, 1) == 0 ? 5 : 0; // Ejemplo aleatorio donde 5 es sin accidente y 0 es con accidente

            // Calcular la calificación promedio
            $calificacion = ($entregaATiempo + $accidente) / 2;

            // Insertar el registro en la tabla `calificaciones_conductores`
            DB::table('calificaciones_conductores')->insert([
                'entrega_id' => $entrega->id,
                'entrega_a_tiempo' => $entregaATiempo,
                'accidente' => $accidente,
                'calificacion' => $calificacion,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

