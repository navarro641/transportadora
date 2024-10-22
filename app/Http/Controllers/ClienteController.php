<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\TipoDocumento;
use App\Models\Departamento;
use App\Models\CiudadMunicipio;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $tiposDocumentos = TipoDocumento::all();
        $departamentos = Departamento::all();
        return view('clientes.create', compact('tiposDocumentos', 'departamentos'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required',
            'documento' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'celular' => 'required|integer',
            'departamento_id' => 'required',
            'ciudad_municipio_id' => 'required',
            'direccion' => 'required|string|max:45',
            'barrio' => 'nullable|string|max:45',
            'contrasenia' => 'required|string|max:45',
        ]);

        Cliente::create($validatedData);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado con éxito.');
    }

    public function edit(Cliente $cliente)
    {
        $tiposDocumentos = TipoDocumento::all();
        $departamentos = Departamento::all();
        return view('clientes.edit', compact('cliente', 'tiposDocumentos', 'departamentos'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $validatedData = $request->validate([
            'tipo_documento_id' => 'required',
            'documento' => 'required|integer',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'celular' => 'required|integer',
            'departamento_id' => 'required',
            'ciudad_municipio_id' => 'required',
            'direccion' => 'required|string|max:45',
            'barrio' => 'nullable|string|max:45',
            'contrasenia' => 'required|string|max:45',
        ]);

        $cliente->update($validatedData);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito.');
    }
}
