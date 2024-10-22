<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     
     */
    public function up()
    {
        Schema::create('tipos_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('ciudades_municipios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_documento_id')->constrained('tipos_documentos')->onDelete('cascade');
            $table->integer('documento');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('correo', 45)->unique();
            $table->string('celular', 15);
            $table->foreignId('departamento_id')->constrained('departamentos')->onDelete('cascade');
            $table->foreignId('ciudad_municipio_id')->constrained('ciudades_municipios')->onDelete('cascade');
            $table->string('direccion', 45);
            $table->string('barrio', 45);
            $table->string('contrasenia', 100);
            $table->timestamps();
        });

        Schema::create('estados_conductores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('categorias_licencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('conductores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_documento_id')->constrained('tipos_documentos')->onDelete('cascade');
            $table->integer('documento');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('correo', 100);
            $table->string('celular', 15);
            $table->integer('experiencia_meses');   
            $table->foreignId('categoria_licencia_id')->constrained('categorias_licencias')->onDelete('cascade');
            $table->integer('numero_licencia');
            $table->date('fecha_expedicion_licencia');
            $table->date('fecha_vencimiento_licencia');
            $table->foreignId('estado_conductor_id')->constrained('estados_conductores')->onDelete('cascade');
            $table->string('contrasenia', 100);

            $table->timestamps();
        });


        Schema::create('estados_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('tipos_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_vehiculo_id')->constrained('tipos_vehiculos')->onDelete('cascade');
            $table->string('placa', 10)->unique();
            $table->string('modelo', 45);
            $table->integer('capacidad_kg');
            $table->integer('consumo_promedio_combustible_L_km')->default(20);
            $table->integer('velocidad_promedio_kmh')->default(60);
            $table->foreignId('estado_vehiculo_id')->constrained('estados_vehiculos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('estados_pedidos_entregas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('tipos_mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('tipos_cargas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        Schema::create('conductores_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->foreignId('conductor_id')->constrained('conductores')->onDelete('cascade');
            $table->timestamps();
        });
 

        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->foreignId('tipo_mantenimiento_id')->constrained('tipos_mantenimientos')->onDelete('cascade');
            $table->string('descripcion', 50);
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });

        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('ciudad_origen', 50);
            $table->string('ciudad_destino', 50);
            $table->integer('distancia_km')->default(0);
            $table->integer('tiempo_estimado_h')->default(0);
            

            $table->timestamps();
        });


        Schema::create('rutas_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruta_id')->constrained('rutas')->onDelete('cascade');
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->datetime('fecha_hora_asignacion');
            $table->integer('litros_consumidos');
            $table->decimal('precio_litro', 8, 2);
            $table->decimal('total_valor_combustible', 8, 2);
            $table->timestamps();
        });

        

        Schema::create('mantenimientos_realizados_proximos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->foreignId('mantenimiento_id')->constrained('mantenimientos')->onDelete('cascade');
            $table->date('fecha_mantenimiento_realizado');
            $table->date('fecha_proximo_mantenimiento');
            $table->timestamps();
        });

        Schema::create('gastos_vehiculo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rutas_vehiculos_id')->constrained('rutas_vehiculos')->onDelete('cascade');
            $table->foreignId('mantenimientos_realizados_proximos_id')->constrained('mantenimientos_realizados_proximos')->onDelete('cascade');
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });

        

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('guia_pedido');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->string('ciudad_origen', 50);
            $table->string('ciudad_destino', 50);
            $table->foreignId('tipo_carga_id')->constrained('tipos_cargas')->onDelete('cascade');
            $table->string('descripcion', 100);
            $table->decimal('peso(kg)', 8,2);
            $table->integer('cantidad');   
            $table->datetime('fecha_hora_solicitud');
            $table->foreignId('estado_id')->constrained('estados_pedidos_entregas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('pedidos_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehiculo_id')->constrained('vehiculos')->onDelete('cascade');
            $table->datetime('fecha_hora_salida');
            $table->datetime('fecha_hora_extimada_entrega');
            $table->datetime('fecha_hora_entrega_realizada')->nullable();
            $table->foreignId('estado_id')->constrained('estados_pedidos_entregas')->onDelete('cascade');
            $table->timestamps();
        });


        Schema::create('calificaciones_conductores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrega_id')->constrained('entregas')->onDelete('cascade');
            $table->boolean('entrega_a_tiempo')->default(0); 
            $table->boolean('accidente')->default(0);   
            $table->decimal('calificacion', 8,2);
            $table->timestamps();
        });

        Schema::create('administradores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('correo', 45)->unique();
            $table->string('contrasenia', 100);
            $table->timestamps();
        });

       

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_documentos');
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('ciudades_municipios');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('estados_conductores');
        Schema::dropIfExists('categorias_licencias');
        Schema::dropIfExists('conductores');
        Schema::dropIfExists('estados_vehiculos');
        Schema::dropIfExists('tipos_vehiculos');
        Schema::dropIfExists('vehiculos');
        Schema::dropIfExists('estados_pedidos_entregas');
        Schema::dropIfExists('tipos_mantenimientos');
        Schema::dropIfExists('tipos_cargas');
        Schema::dropIfExists('conductores_vehiculos');
        Schema::dropIfExists('mantenimientos');
        Schema::dropIfExists('rutas');
        Schema::dropIfExists('rutas_vehiculos');
        Schema::dropIfExists('gastos_combustible');
        Schema::dropIfExists('gastos_mantenimientos');
        Schema::dropIfExists('gastos_vehiculo');
        Schema::dropIfExists('proximos_mantenimientos');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_vehiculos');
        Schema::dropIfExists('entregas');
        Schema::dropIfExists('calificaciones_conductores');
        Schema::dropIfExists('administradores');


    }
};
