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
        Schema::create('equipos_torneos', function (Blueprint $table) {
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('torneo_id');
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('torneo_id')->references('id')->on('torneos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_torneos');
    }
};