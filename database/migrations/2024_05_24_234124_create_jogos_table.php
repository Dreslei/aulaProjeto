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
        Schema::create('jogos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("requisitos");
            $table->string('imagens');
            $table->date('data_lancamento');
            $table->unsignedBigInteger('distribuidora_id');
            $table->unsignedBigInteger('genero_id');
            $table->timestamps();

            $table->foreign('distribuidora_id')->references('id')->on('distribuidoras');
            $table->foreign('genero_id')->references('id')->on('generos');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogos');
    }
};
