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
    Schema::create('categoria_ejercicio', function (Blueprint $table) {
        $table->unsignedBigInteger('id_ejercicio');
        $table->unsignedBigInteger('id_categoria');
        
        // Llave primaria compuesta
        $table->primary(['id_ejercicio', 'id_categoria']);

        // Llaves foráneas con borrado en cascada (si borras un ejercicio, se borra de esta tabla)
        $table->foreign('id_ejercicio')->references('id_ejercicio')->on('ejercicio')->onDelete('cascade');
        $table->foreign('id_categoria')->references('id_categoria')->on('categoria')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_ejercicio');
    }
};
