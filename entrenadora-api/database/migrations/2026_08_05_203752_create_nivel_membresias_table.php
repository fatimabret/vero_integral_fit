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
    Schema::create('nivel_membresia', function (Blueprint $table) {
        $table->id('id_nivel'); // Equivale a SERIAL / PRIMARY KEY
        $table->string('descripcion', 50);
        $table->decimal('costo', 10, 2);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nivel_membresias');
    }
};
