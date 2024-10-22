<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\TipoMantenimiento;
use App\Models\Mantenimiento;
use App\Models\MantenimientoRealizadoProximo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MantenimientoController extends Controller
{
    public function index($id)
{
    $vehiculo = Vehiculo::findOrFail($id);
    $tiposMantenimiento = TipoMantenimiento::all(); 
    return view('mantenimientos.index', compact('vehiculo', 'tiposMantenimiento'));
}

    public function realizarMantenimiento(Request $request)
    {

        // dd($request->all());

        $validated = $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'mantenimiento_id' => 'required|exists:mantenimientos,id',
            'fecha_mantenimiento_realizado' => 'required|date',
        ]);

        $mantenimientoRealizado = new MantenimientoRealizadoProximo();
        $mantenimientoRealizado->vehiculo_id = $request->vehiculo_id;
        $mantenimientoRealizado->mantenimiento_id = $request->mantenimiento_id;
        $mantenimientoRealizado->fecha_mantenimiento_realizado = $request->fecha_mantenimiento_realizado;

        $fechaProximoMantenimiento = Carbon::parse($request->fecha_mantenimiento_realizado)->addMonths(6);
        $mantenimientoRealizado->fecha_proximo_mantenimiento = $fechaProximoMantenimiento;

        $mantenimientoRealizado->save();

        return redirect()->back()->with('success', 'Mantenimiento registrado exitosamente. El próximo mantenimiento será el ' . $fechaProximoMantenimiento->format('d-m-Y'));
    }
    public function obtenerMantenimientosPorTipo($tipoMantenimientoId)
    {
        $mantenimientos = Mantenimiento::where('tipo_mantenimiento_id', $tipoMantenimientoId)->get();

        return response()->json(['mantenimientos' => $mantenimientos]);
    }
     public function realizar(Request $request)
{
    $request->validate([
        'vehiculo_id' => 'required|exists:vehiculos,id',
        'mantenimiento_id' => 'required|exists:mantenimientos,id',
        'fecha_mantenimiento_realizado' => 'required|date',
    ]);

    $mantenimiento = new Mantenimiento();
    $mantenimiento->vehiculo_id = $request->vehiculo_id;
    $mantenimiento->mantenimiento_id = $request->mantenimiento_id;
    $mantenimiento->fecha_mantenimiento_realizado = $request->fecha_mantenimiento_realizado;
    $mantenimiento->save();

    $estadoMantenimientoId = 2; 
    $vehiculo = Vehiculo::findOrFail($request->vehiculo_id);
    $vehiculo->estado_id = $estadoMantenimientoId;
    $vehiculo->save();

    return redirect()->route('vehiculos.index')->with('success', 'Mantenimiento registrado exitosamente.');
}


 
     public function finalizar(Request $request, $id)
{
    $request->validate([
        'fecha_mantenimiento_realizado' => 'required|date',
    ]);

    $mantenimiento = Mantenimiento::findOrFail($id);

    $estadoOperativoId = 1; 
    $vehiculo = $mantenimiento->vehiculo; 
    $vehiculo->estado_id = $estadoOperativoId;
    $vehiculo->save();

    $mantenimiento->fecha_mantenimiento_realizado = $request->fecha_mantenimiento_realizado;
    $mantenimiento->save();

    return redirect()->route('vehiculos.index')->with('success', 'Mantenimiento finalizado.');
}

}

