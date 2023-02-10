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
        Schema::create('vehiculos',function(Blueprint $table){
            $table->id();
            $table->string('placa',10);
            $table->string('color',10);
            $table->string('marca',20);
            $table->string('tipo_vehiculo',20);
            $table->integer('conductor');
            $table->integer('propietario');
            $table->foreign('conductor')->references('cedula')->on('personas');
            $table->foreign('propietario')->references('cedula')->on('personas');
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
        Schema::dropIfExists('vehiculos');
    }
};
