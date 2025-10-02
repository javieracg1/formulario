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
            $table->json('instituciones_participantes')->nullable()->after('notas_adicionales');
            $table->json('responsables_participantes')->nullable()->after('instituciones_participantes');
            $table->json('cantidades_participantes')->nullable()->after('responsables_participantes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('formularios', function (Blueprint $table) {
            $table->dropColumn(['instituciones_participantes', 'responsables_participantes', 'cantidades_participantes']);
        });
    }
};
