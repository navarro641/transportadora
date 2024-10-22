<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CiudadMunicipioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConductorController;
use App\Http\Controllers\RutaController;
use App\Models\Ruta;
use App\Models\Vehiculo;
use App\Models\RutaVehiculo;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\AuthController;

// Cambia la ruta a la raíz
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Clientes
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::resource('clientes', ClienteController::class);

// Ciudades/Municipios
Route::get('/ciudades/{departamentoId}', [CiudadMunicipioController::class, 'obtenerCiudades']);

// Vehículos
Route::resource('vehiculos', VehiculoController::class);
Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

// Conductores
Route::resource('conductores', ConductorController::class);

// Rutas
Route::get('/rutas', [RutaController::class, 'index'])->name('rutas.index');
Route::get('/rutas/create', [RutaController::class, 'create'])->name('rutas.create');
Route::post('/rutas', [RutaController::class, 'store'])->name('rutas.store');
Route::get('/rutas/asignar-vehiculo', [RutaController::class, 'asignarVehiculo'])->name('rutas.asignarVehiculo');
Route::post('/rutas/asignar', [RutaController::class, 'asignar'])->name('rutas.asignar');

// // // Asignaciones de vehículos
Route::get('/vehiculos/asignar', [VehiculoController::class, 'asignar'])->name('vehiculos.asignar');
// Route::get('/asignaciones/{ruta}/{vehiculo}', function (Ruta $ruta, Vehiculo $vehiculo) {
//     $asignaciones = RutaVehiculo::where('ruta_id', $ruta->id)->get();
//     return view('asignaciones.show', compact('ruta', 'vehiculo', 'asignaciones'));
// })->name('asignaciones.show');

Route::get('/asignaciones', [AsignacionController::class, 'index'])->name('asignaciones.index');
Route::resource('asignaciones', AsignacionController::class);


// // Mantenimientos
// // Ruta para mostrar el formulario de mantenimiento para un vehículo específico
Route::get('/mantenimientos/{vehiculo}', [MantenimientoController::class, 'index'])->name('mantenimientos.index');

// // Ruta para registrar el mantenimiento
Route::post('/mantenimientos/realizar', [MantenimientoController::class, 'realizarMantenimiento'])->name('mantenimientos.realizar');

// // Ruta para obtener mantenimientos por tipo
Route::get('/mantenimientos/tipo/{tipoMantenimientoId}', [MantenimientoController::class, 'obtenerMantenimientosPorTipo']);

// // Ruta para finalizar el mantenimiento
Route::post('/mantenimientos/finalizar', [MantenimientoController::class, 'finalizar'])->name('mantenimientos.finalizar');

Route::get('/mantenimientos/{id}', [MantenimientoController::class, 'index'])->name('mantenimientos.index');

Route::get('rutas/asignar', [RutaController::class, 'crearAsignacion'])->name('rutas.asignarVehiculo');
Route::post('rutas/asignar', [RutaController::class, 'asignar'])->name('rutas.asignar');



Route::get('/quienes-somos', function () {
    return view('quienes-somos'); // Página de ¿Quiénes Somos?
})->name('quienes-somos');

Route::get('/servicios', function () {
    return view('servicios'); // Página de Servicios
})->name('servicios');

Route::get('/registrarse', function () {
    return view('registrarse'); // Página de registro
})->name('registrarse');

Route::get('/iniciar-sesion', function () {
    return view('iniciosesion'); // Página de Ingresar (iniciar sesión)
})->name('iniciar-sesion');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/administracion', function() {
    return view('administracion');
})->name('admin.dashboard'); // Vista de administración