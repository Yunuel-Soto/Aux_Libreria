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
        Schema::create('tb_admins', function (Blueprint $table) {
            $table->string('clave_id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('no_telefono');
            $table->string('correo');
            $table->string('contraseña');
            $table->date('fecha_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_admins');
    }
};