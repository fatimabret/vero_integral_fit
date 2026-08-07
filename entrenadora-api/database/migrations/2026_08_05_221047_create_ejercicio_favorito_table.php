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
    Schema::create('ejercicio_favorito', function (Blueprint $table) {
        $table->unsignedBigInteger('id_ejercicio');
        $table->unsignedBigInteger('id_usuario');
        $table->date('fecha_agregado')->default(now());
        
        // Llave primaria compuesta
        $table->primary(['id_ejercicio', 'id_usuario']);

        // Llaves foráneas
        $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicio')->onDelete('cascade');
        $table->foreign('id_usuario')->references('id_usuario')->on('usuario')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejercicio_favorito');
    }
};
