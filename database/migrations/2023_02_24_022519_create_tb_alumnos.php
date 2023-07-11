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
        Schema::create('tb_alumnos', function (Blueprint $table) {
            $table->string("Matricula");
            $table->string('nombre');
            $table->string('apellido');
            $table->string('carrera');
            $table->string('no_telefono');
            $table->string('correo');
            $table->string('contraseña');
            $table->string("estado")->nullable();
            $table->date('fecha_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_alumnos');
    }
};