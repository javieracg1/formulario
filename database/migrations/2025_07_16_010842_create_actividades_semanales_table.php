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
        Schema::create('actividades_semanales', function (Blueprint $table) {
            $table->id();
            $table->boolean('realiza_actividad')->default(false); // true para 'si', false para 'no'
            $table->string('nombre_gerencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividades_semanales');
    }
};
