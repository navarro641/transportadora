<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\TipoVehiculo;
use App\Models\EstadoVehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $vehiculos = Vehiculo::with('estado')->get(); 
    return view('vehiculos.index', compact('vehiculos'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener tipos de vehículos y estados de vehículos
        $tiposVehiculos = TipoVehiculo::all();
        $estadosVehiculos = EstadoVehiculo::all();

        return view('vehiculos.create', compact('tiposVehiculos', 'estadosVehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_vehiculo_id' => 'required|exists:tipos_vehiculos,id',
            'placa' => 'required|string|max:10|unique:vehiculos',
            'modelo' => 'required|string|max:45',
            'capacidad_kg' => 'required|integer',
            'consumo_promedio_combustible_L_km' => 'required|integer', 
            'estado_vehiculo_id' => 'required|exists:estados_vehiculos,id',
        ]);
    
        Vehiculo::create($validatedData);
    
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar detalles de un vehículo
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.show', compact('vehiculo'));
    }
    //asignar vehiculos a la ruta
    public function asignar()
    {
        $vehiculos = Vehiculo::all();
        return view('vehiculos.asignar', compact('vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener vehículo y datos para el formulario
        $vehiculo = Vehiculo::findOrFail($id);
        $tiposVehiculo = TipoVehiculo::all();
        $estadosVehiculo = EstadoVehiculo::all();
        return view('vehiculos.edit', compact('vehiculo', 'tiposVehiculo', 'estadosVehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo_vehiculo_id' => 'required|exists:tipos_vehiculos,id',
            'placa' => 'required|string|max:10|unique:vehiculos,placa,' . $id,
            'modelo' => 'required|string|max:45',
            'capacidad_kg' => 'required|integer',
            'consumo_promedio_combustible_L_km' => 'required|integer',
            'velocidad_promedio_kmh' => 'required|integer',
            'estado_vehiculo_id' => 'required|exists:estados_vehiculos,id',
        ]);

        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar vehículo
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado exitosamente.');
    }
}

