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
            $table->string('institucion_responsable_1')->nullable();
            $table->integer('cantidad_participantes_1')->nullable();
            $table->string('grado_participantes_1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn(['institucion_responsable_1', 'cantidad_participantes_1', 'grado_participantes_1']);
        });
    }
};
