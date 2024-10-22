<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Conductor;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
{
    $request->validate([
        'correo' => 'required|email',
        'contrasenia' => 'required',
    ]);

    $conductor = Conductor::where('correo', $request->correo)->first();

    if ($conductor && Hash::check($request->contrasenia, $conductor->contrasenia)) {
        return redirect()->route('administracion'); 
    } else {
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }
}
}

