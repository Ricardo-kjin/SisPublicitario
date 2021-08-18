<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('direccion', 200);
            $table->decimal('area_terreno', 8, 2);
            $table->decimal('area_construida', 8, 2);
            $table->decimal('area_libre', 8, 2);
            $table->integer('habitaciones')->nullable();//X
            $table->integer('baños')->nullable(); //X
            $table->integer('pisos')->nullable();
            $table->integer('garajes')->nullable();
            $table->string('foto_principal')->nullable();
            $table->string('servicio')->nullable();
            $table->string('tipo_inmueble');
            $table->unsignedInteger('zona_id');
            $table->timestamps();

            $table->foreign('zona_id')->references('id')->on('zonas')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
}
