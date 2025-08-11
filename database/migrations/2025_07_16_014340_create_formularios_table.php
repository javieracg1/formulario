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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
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
            $table->boolean('atendido')->default(false);
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
