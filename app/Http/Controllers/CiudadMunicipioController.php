<?php

namespace App\Http\Controllers;
use App\Models\CiudadMunicipio;


use Illuminate\Http\Request;

class CiudadMunicipioController extends Controller
{
    public function obtenerCiudades($departamentoId)
    {
        $ciudades = CiudadMunicipio::where('departamento_id', $departamentoId)->get();
        return response()->json($ciudades);
    }
}
