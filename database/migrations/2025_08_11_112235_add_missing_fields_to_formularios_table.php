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
            // Agregar campos faltantes
            $table->string('unidad_solicitante_missing')->nullable();
            $table->string('nombre_evento_missing')->nullable();
            $table->date('fecha_evento_missing')->nullable();
            $table->time('hora_desde_missing')->nullable();
            $table->string('objetivo_evento_missing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn([
                'unidad_solicitante_missing',
                'nombre_evento_missing', 
                'fecha_evento_missing',
                'hora_desde_missing',
                'objetivo_evento_missing'
            ]);
        });
    }
};