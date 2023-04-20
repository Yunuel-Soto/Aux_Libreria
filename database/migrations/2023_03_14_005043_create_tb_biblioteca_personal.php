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
        Schema::create('tb_biblioteca_personal', function (Blueprint $table) {
            $table->increments('id_biblioPersonal');
            $table->string('matricula');
            $table->string('id_libro');
            $table->string('status');
            $table->date('Fecha_expedicion');
            $table->date('Fecha_termino');
            $table->date('Fecha_actual')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_biblioteca_personal');
    }
};