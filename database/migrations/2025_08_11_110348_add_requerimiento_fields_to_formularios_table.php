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
            // Eliminar campos antiguos que no se usan
            $table->dropColumn([
                'servicio_catering',
                'equipo_sonido',
                'mobiliario',
                'fotografia',
                'protocolo',
                'logistica_comunicacional',
                'equipos_tecnologicos',
                'internet_conectividad',
                'insumos'
            ]);

            // Nuevos campos
            $table->string('descripcion_lugar')->nullable();
            $table->string('servicio_catering_nuevo')->nullable();
            $table->string('servicio_catering_otro')->nullable();
            
            // Campos de comunicación
            $table->string('comunicacion_1')->nullable();
            $table->string('comunicacion_2')->nullable();
            $table->string('comunicacion_3')->nullable();
            $table->string('comunicacion_4')->nullable();
            
            // Campos de tecnología
            $table->string('tecnologia_1')->nullable();
            $table->string('tecnologia_2')->nullable();
            $table->string('tecnologia_3')->nullable();
            $table->string('tecnologia_4')->nullable();
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
                'descripcion_lugar',
                'servicio_catering_nuevo',
                'servicio_catering_otro',
                'comunicacion_1',
                'comunicacion_2',
                'comunicacion_3',
                'comunicacion_4',
                'tecnologia_1',
                'tecnologia_2',
                'tecnologia_3',
                'tecnologia_4'
            ]);

            // Restaurar campos antiguos
            $table->string('servicio_catering')->nullable();
            $table->string('equipo_sonido')->nullable();
            $table->string('mobiliario')->nullable();
            $table->string('fotografia')->nullable();
            $table->string('protocolo')->nullable();
            $table->string('logistica_comunicacional')->nullable();
            $table->string('equipos_tecnologicos')->nullable();
            $table->string('internet_conectividad')->nullable();
            $table->string('insumos')->nullable();
        });
    }
};
