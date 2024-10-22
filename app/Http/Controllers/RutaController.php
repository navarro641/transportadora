<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruta;
use App\Models\Vehiculo;
use App\Models\RutaVehiculo;
use App\Models\EstadoVehiculo;


class RutaController extends Controller
{
    public function index()
    {
        // Obtener todas las rutas de la base de datos
        $rutas = Ruta::all();

        // Pasar las rutas a la vista
        return view('rutas.index', compact('rutas'));
    }

    public function create()
    {
        // Retornar la vista para crear una nueva ruta
        return view('rutas.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|max:50',
            'ciudad_origen' => 'required|max:50',
            'ciudad_destino' => 'required|max:50',
            'distancia_km' => 'required|integer',
            'tiempo_estimado_h' => 'required|integer',
        ]);

        // Crear una nueva ruta con los datos ingresados
        Ruta::create($request->all());

        // Redirigir a la lista de rutas con un mensaje de éxito
        return redirect()->route('rutas.index')->with('success', 'Ruta creada exitosamente');
    }

    public function asignarVehiculo(Request $request)
{
    $request->validate([
        'ruta_id' => 'required|exists:rutas,id',
        'vehiculo_id' => 'required|exists:vehiculos,id',
    ]);

    RutaVehiculo::create([
        'ruta_id' => $request->ruta_id,
        'vehiculo_id' => $request->vehiculo_id,
        'fecha_hora_asignacion' => now(),
        'litros_consumidos' => 0, 
        'precio_litro' => 0, 
        'total_valor_combustible' => 0, 
    ]);

    $this->actualizarEstadoVehiculo($request->vehiculo_id, 'Asignado');

    return redirect()->route('rutas.index')->with('success', 'Vehículo asignado correctamente.');
}


    public function crearAsignacion()
{
    // Obtener todas las rutas y vehículos
    $rutas = Ruta::all();
    $vehiculos = Vehiculo::all();

    // Pasar las rutas y vehículos a la vista
    return view('rutas.asignarVehiculo', compact('rutas', 'vehiculos'));
}


    
    public function asignar(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'ruta_id' => 'required|exists:rutas,id',
            'vehiculo_id' => 'required|exists:vehiculos,id',
        ]);

        // Crea la asignación
        RutaVehiculo::create([
            'ruta_id' => $request->ruta_id,
            'vehiculo_id' => $request->vehiculo_id,
            'fecha_hora_asignacion' => now(),
            'litros_consumidos' => 0, // Inicializa en 0, puedes actualizarlo después
            'precio_litro' => 0, // Inicializa en 0, puedes actualizarlo después
            'total_valor_combustible' => 0, // Inicializa en 0, puedes actualizarlo después
        ]);

        // Actualiza el estado del vehículo
        $vehiculo = Vehiculo::find($request->vehiculo_id);
        $vehiculo->estado_vehiculo_id = 2; // Supongamos que el ID 2 es para "en uso"
        $vehiculo->save();

        // Redirige o devuelve una respuesta
        return redirect()->route('rutas.index')->with('success', 'Vehículo asignado correctamente.');
    }

    public function show(Ruta $ruta, Vehiculo $vehiculo)
    {
        // Obtener todas las asignaciones de esa ruta y vehículo
        $asignaciones = RutaVehiculo::where('ruta_id', $ruta->id)
                                    ->where('vehiculo_id', $vehiculo->id)
                                    ->with(['ruta', 'vehiculo'])
                                    ->get();
    
        // Retornar la vista con los datos necesarios
        return view('asignaciones.show', compact('ruta', 'vehiculo', 'asignaciones'));
    }

    protected function actualizarEstadoVehiculo($vehiculoId, $estadoNombre)
{
    // Buscar el ID del estado "Asignado"
    $estadoAsignado = EstadoVehiculo::where('nombre', $estadoNombre)->first();

    // Verifica que se haya encontrado el estado
    if ($estadoAsignado) {
        // Actualizar el estado del vehículo a "asignado"
        $vehiculo = Vehiculo::find($vehiculoId);
        if ($vehiculo) {
            $vehiculo->estado_vehiculo_id = $estadoAsignado->id; // Usar el ID encontrado
            $vehiculo->save();
        } else {
            return redirect()->route('rutas.index')->with('error', 'Vehículo no encontrado.');
        }
    } else {
        return redirect()->route('rutas.index')->with('error', 'Estado "Asignado" no encontrado.');
    }
}



    


   



    
}
