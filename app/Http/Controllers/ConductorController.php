<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use App\Models\TipoDocumento;
use App\Models\CategoriaLicencia;
use App\Models\EstadoConductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConductorController extends Controller
{
    public function index()
    {
        $conductores = Conductor::all();

        return view('conductores.index', compact('conductores'));
    }

    public function create()
    {
        // Obtener los datos necesarios para los selects (tipos de documento, categorías, estados)
        $tiposDocumentos = TipoDocumento::all();
        $categoriasLicencias = CategoriaLicencia::all();
        $estadosConductores = EstadoConductor::all();

        // Retornar la vista de creación con los datos
        return view('conductores.create', compact('tiposDocumentos', 'categoriasLicencias', 'estadosConductores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documentos,id',
            'documento' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|max:100',
            'celular' => 'required|string|max:15',
            'experiencia_meses' => 'required|integer',
            'categoria_licencia_id' => 'required|exists:categorias_licencias,id',
            'numero_licencia' => 'required|integer',
            'fecha_expedicion_licencia' => 'required|date',
            'fecha_vencimiento_licencia' => 'required|date',
            'estado_conductor_id' => 'required|exists:estados_conductores,id',
            'contrasenia' => 'required|string|min:6', // Validar la contraseña
        ]);
    
        $conductorData = $request->all();
    
        $conductorData['contrasenia'] = Hash::make($request->contrasenia);
    
        if (Conductor::create($conductorData)) {
            return redirect()->route('conductores.index')->with('success', 'Conductor creado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Error al crear el conductor');
        }
    }


public function show($id)
{
    $conductor = Conductor::find($id);

    if (!$conductor) {
        return redirect()->route('conductores.index')->with('error', 'Conductor no encontrado.');
    }

    return view('conductores.show', ['conductor' => $conductor]);
}


    public function edit($id)
    {
        // Obtener el conductor por ID
        $conductor = Conductor::findOrFail($id);

        // Obtener los datos necesarios para los selects (tipos de documento, categorías, estados)
        $tiposDocumentos = TipoDocumento::all();
        $categoriasLicencias = CategoriaLicencia::all();
        $estadosConductores = EstadoConductor::all();

        return view('conductores.edit', compact('conductor', 'tiposDocumentos', 'categoriasLicencias', 'estadosConductores'));
    }

    public function update(Request $request, $id)
    {
        // Validar la información ingresada
        $request->validate([
            'tipo_documento_id' => 'required|exists:tipos_documentos,id',
            'documento' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email|max:100',
            'celular' => 'required|string|max:15',
            'experiencia_meses' => 'required|integer',
            'categoria_licencia_id' => 'required|exists:categorias_licencias,id',
            'numero_licencia' => 'required|integer',
            'fecha_expedicion_licencia' => 'required|date',
            'fecha_vencimiento_licencia' => 'required|date',
            'estado_conductor_id' => 'required|exists:estados_conductores,id',
        ]);

        // Actualizar el conductor
        $conductor = Conductor::findOrFail($id);
        $conductor->update($request->all());

        // Redirigir a la lista de conductores con un mensaje de éxito
        return redirect()->route('conductores.index')->with('success', 'Conductor actualizado exitosamente');
    }

    public function destroy($id)
    {
        // Eliminar el conductor
        $conductor = Conductor::findOrFail($id);
        $conductor->delete();

        // Redirigir a la lista de conductores con un mensaje de éxito
        return redirect()->route('conductores.index')->with('success', 'Conductor eliminado exitosamente');
    }
}
