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
        // Eliminar la tabla si existe
        Schema::dropIfExists('formularios');
        
        // Crear la tabla completa desde cero
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            
            // Campos básicos del formulario
            $table->string('unidad_solicitante')->nullable();
            $table->string('nombre_evento')->nullable();
            $table->date('fecha_evento')->nullable();
            $table->time('hora_desde')->nullable();
            $table->time('hora_hasta')->nullable();
            $table->text('objetivo_evento')->nullable();
            $table->string('tipo_evento')->nullable();
            $table->text('tipo_evento_otro')->nullable();
            
            // Lugar del evento
            $table->string('ambiente')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('lugar_evento')->nullable();
            $table->string('capacidad')->nullable();
            $table->text('descripcion_lugar')->nullable();
            
            // Servicios de catering
            $table->string('servicio_catering_nuevo')->nullable();
            $table->text('servicio_catering_otro')->nullable();
            
            // Equipo de comunicaciones (4 dropdowns)
            $table->string('comunicacion_1')->nullable();
            $table->string('comunicacion_2')->nullable();
            $table->string('comunicacion_3')->nullable();
            $table->string('comunicacion_4')->nullable();
            
            // Equipo de tecnologías (4 dropdowns)
            $table->string('tecnologia_1')->nullable();
            $table->string('tecnologia_2')->nullable();
            $table->string('tecnologia_3')->nullable();
            $table->string('tecnologia_4')->nullable();
            
            // Información institucional
            $table->string('institucion_responsable')->nullable();
            $table->string('nombre_responsable')->nullable();
            $table->string('cargo_responsable')->nullable();
            $table->string('telefono_responsable')->nullable();
            $table->string('email_responsable')->nullable();
            
            // Campos de firma
            $table->string('elaborado_nombre')->nullable();
            $table->string('aprobado_nombre')->nullable();
            $table->string('autorizado_nombre')->nullable();
            
            // Fecha y hora de registro
            $table->timestamp('fechaRegistro')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
