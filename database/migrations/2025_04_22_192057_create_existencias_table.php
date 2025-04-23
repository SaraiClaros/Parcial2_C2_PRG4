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
        Schema::create('existencias', function (Blueprint $table) {
        $table->increments('id_existencia'); 
        $table->unsignedInteger('libros_id');
        $table->string('ubicacion_general');
        $table->string('codigo_identificacion')->unique(); 

        $table->timestamps();
        $table->foreign('libros_id')->references('id')->on('libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('existencias');
    }
};
