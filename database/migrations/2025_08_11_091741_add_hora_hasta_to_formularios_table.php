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
            // Renombrar hora_evento a hora_desde
            $table->renameColumn('hora_evento', 'hora_desde');
            // Agregar campo hora_hasta
            $table->time('hora_hasta')->nullable()->after('hora_desde');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            // Eliminar campo hora_hasta
            $table->dropColumn('hora_hasta');
            // Renombrar hora_desde de vuelta a hora_evento
            $table->renameColumn('hora_desde', 'hora_evento');
        });
    }
};
