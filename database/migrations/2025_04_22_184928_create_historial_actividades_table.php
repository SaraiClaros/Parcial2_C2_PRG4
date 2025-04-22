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
        Schema::create('historial_actividades', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedInteger('usuario_id');
            $table->string('accion'); 
            $table->text('detalle')->nullable();
            $table->dateTime('fecha');
            $table->timestamps();
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_actividades');
    }
};
