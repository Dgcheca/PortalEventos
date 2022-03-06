<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedBigInteger('juego_id');
            $table->date('fecha');
            $table->string('hora_inicio');
            $table->string('descripcion');
            $table->integer('aforo_maximo');
            $table->integer('nequipos');
            $table->string('tipo');
            $table->unsignedBigInteger('user_id');
            $table->foreign('juego_id')->references('id')->on('juegos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneos');
    }
};
