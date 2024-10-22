<?php

namespace Database\Seeders;

use App\Models\ConductorVehiculo;
use App\Models\EstadoPedidoEntrega;
use App\Models\Mantenimiento;
use App\Models\User;
use App\Models\MantenimientoRealizadoProximo;

use CalificacionesConductoresSeeder;
use Database\Seeders\CalificacionesConductoresSeeder as SeedersCalificacionesConductoresSeeder;
use Database\Seeders\EntregasSeeder as SeedersEntregasSeeder;
use Database\Seeders\MantenimientosRealizadosYProximosSeeder as SeedersMantenimientosRealizadosYProximosSeeder;
use EntregasSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MantenimientosRealizadosProximosSeeder;
use MantenimientosRealizadosYProximosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TiposDocumentosSeeder::class,
            DepartamentosSeeder::class,
            CiudadesMunicipiosSeeder::class,
            ClientesSeeder::class,
            EstadosConductoresSeeder::class,
            CategoriasLicenciasSeeder::class,
            ConductoresSeeder::class,
            EstadosVehiculosSeeder::class,
            TiposVehiculosSeeder::class,

            VehiculosSeeder::class,

            EstadosPedidosEntregasSeeder::class,
            TiposMantenimientosSeeder::class,
            TiposCargasSeeder::class,
            ConductoresVehiculosSeeder::class,
            MantenimientosSeeder::class,
            RutasSeeder::class,
            RutasVehiculosSeeder::class,
            PedidosSeeder::class,
            PedidosVehiculosSeeder::class,
            AdministradoresSeeder::class,
            SeedersMantenimientosRealizadosYProximosSeeder::class,
            GastosVehiculosSeeder::class,





    
           
            
            SeedersEntregasSeeder::class,
           


            SeedersCalificacionesConductoresSeeder::class
        ]);
    }
}
