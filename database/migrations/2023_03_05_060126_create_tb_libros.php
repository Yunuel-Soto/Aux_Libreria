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
        Schema::create('tb_libros', function (Blueprint $table) {
            $table->increments('id_libro');
            $table->string('titulo');
            $table->string('edicion');
            $table->string('editorial');
            $table->string('carrera');
            $table->string('autor');
            $table->string('tipo');
            $table->integer('cantidad');
            $table->string('imagen')->nullable();
            $table->integer('disponibles');
            $table->date('fecha_registro');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_libros');
    }
};