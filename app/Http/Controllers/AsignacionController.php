<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\DB;
use App\Models\RutaVehiculo;

class AsignacionController extends Controller
{
    public function index()
    {
        // Obtener todas las asignaciones
        $asignaciones = RutaVehiculo::with(['ruta', 'vehiculo'])->get();

        return view('asignaciones.index', compact('asignaciones'));
    }
    public function destroy($id)
{
    $asignacion = RutaVehiculo::findOrFail($id);
    $asignacion->delete();

    return redirect()->route('asignaciones.index')->with('success', 'Asignación eliminada con éxito.');
}
}

