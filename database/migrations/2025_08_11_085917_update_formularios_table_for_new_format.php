<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            // Eliminar campos antiguos
            $table->dropColumn([
                'gerencia',
                'fecha_actividad',
                'hora_actividad',
                'estado',
                'municipio',
                'parroquia',
                'lugar',
                'institucion_entes',
                'responsable',
                'tematica',
                'cantidad_personas',
                'requiere_cobertura',
                'requiere_protocolar',
                'apoyo_logistico',
                'otro_elemento'
            ]);

            // Agregar nuevos campos según el formato
            $table->string('unidad_solicitante')->nullable();
            $table->string('nombre_evento')->nullable();
            $table->date('fecha_evento')->nullable();
            $table->time('hora_evento')->nullable();
            $table->string('tipo_evento')->nullable();
            $table->string('institucion_responsable')->nullable();
            $table->string('lugar_evento')->nullable();
            
            // Servicios y requerimientos
            $table->string('servicio_catering')->nullable();
            $table->string('equipo_sonido')->nullable();
            $table->string('mobiliario')->nullable();
            $table->string('fotografia')->nullable();
            $table->string('protocolo')->nullable();
            $table->string('logistica_comunicacional')->nullable();
            $table->string('equipos_tecnologicos')->nullable();
            $table->string('internet_conectividad')->nullable();
            $table->string('insumos')->nullable();
            
            // Notas adicionales
            $table->text('notas_adicionales')->nullable();
            
            // Campos de firmas
            $table->string('elaborado_nombre')->nullable();
            $table->string('aprobado_nombre')->nullable();
            $table->string('autorizado_nombre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            // Eliminar nuevos campos
            $table->dropColumn([
                'unidad_solicitante',
                'nombre_evento',
                'fecha_evento',
                'hora_evento',
                'tipo_evento',
                'institucion_responsable',
                'lugar_evento',
                'servicio_catering',
                'equipo_sonido',
                'mobiliario',
                'fotografia',
                'protocolo',
                'logistica_comunicacional',
                'equipos_tecnologicos',
                'internet_conectividad',
                'insumos',
                'notas_adicionales',
                'elaborado_nombre',
                'aprobado_nombre',
                'autorizado_nombre'
            ]);

            // Restaurar campos antiguos
            $table->string('gerencia');
            $table->date('fecha_actividad');
            $table->string('hora_actividad');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            $table->string('lugar');
            $table->string('institucion_entes');
            $table->string('responsable');
            $table->string('tematica');
            $table->integer('cantidad_personas');
            $table->string('requiere_cobertura');
            $table->string('requiere_protocolar');
            $table->string('apoyo_logistico');
            $table->string('otro_elemento')->nullable();
        });
    }
};
