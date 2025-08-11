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
            // Nuevo campo para objetivo del evento
            $table->string('objetivo_evento')->nullable();
            // Nuevo campo para especificar tipo de evento cuando se selecciona "otro"
            $table->string('tipo_evento_otro')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            // Eliminar los nuevos campos
            $table->dropColumn([
                'objetivo_evento',
                'tipo_evento_otro'
            ]);
        });
    }
};
