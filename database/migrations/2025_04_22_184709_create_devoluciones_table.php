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
        Schema::create('devoluciones', function (Blueprint $table) {
        $table->increments('devoluciones_id'); 
        $table->unsignedInteger('prestamos_id');
        $table->date('fecha_devolucion_real');
        $table->text('observaciones')->nullable(); 
        $table->timestamps();

       
        $table->foreign('prestamos_id')->references('prestamos_id')->on('prestamos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoluciones');
    }
};
