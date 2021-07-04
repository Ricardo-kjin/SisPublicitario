<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id('id_bitacoras');
            $table->date('fecha');
            $table->time('hora');
            $table->text('descripcion');
            $table->boolean('estado');
            $table->timestamps();
            $table->unsignedBigInteger('id_usuarios');
            $table->foreign('id_usuarios')->references('id_usuarios')->on('usuarios')
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
        Schema::dropIfExists('bitacoras');
    }
}
