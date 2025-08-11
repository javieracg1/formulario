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
            // Nuevos campos para los desplegables de lugar del evento
            $table->string('ambiente')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('capacidad')->nullable();
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
                'ambiente',
                'modalidad',
                'capacidad'
            ]);
        });
    }
};
