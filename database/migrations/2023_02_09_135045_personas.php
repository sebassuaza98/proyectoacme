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
        Schema::create('personas',function(Blueprint $table){
            $table->id();
            $table->integer('cedula')->unique();
            $table->string('primer_nombre',20);
            $table->string('segundo_nombre',20);
            $table->string('apellidos',20);
            $table->string('direccion',50);
            $table->string('telefono',11);
            $table->string('cuidad',12);
            $table->string('rol',12);
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
        Schema::dropIfExists('personas');
    }
};
