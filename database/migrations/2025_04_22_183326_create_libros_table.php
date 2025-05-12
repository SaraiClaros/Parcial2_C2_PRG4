<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
        $table->increments('libros_id'); 
        $table->string('titulo');
        $table->string('autor');
        $table->string('editorial');
        $table->year('anio_publicacion');
        $table->string('genero');
        $table->string('clasificacion_tematica');
        $table->integer('cantidad_disponible');
        $table->enum('estado', ['Disponible', 'Prestado', 'No disponible']);
        $table->timestamps(); 

        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }

    
};
