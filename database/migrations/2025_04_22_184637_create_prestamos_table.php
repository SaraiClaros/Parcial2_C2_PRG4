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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('prestamos_id');
            $table->unsignedInteger('usuarios_id');
            $table->unsignedInteger('libros_id');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            $table->enum('estado', ['En curso', 'Devuelto', 'Atrasado']);
            $table->timestamps();
    
            $table->foreign('usuarios_id')->references('usuarios_id')->on('usuarios')->onDelete('cascade');
            $table->foreign('libros_id')->references('libros_id')->on('libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
