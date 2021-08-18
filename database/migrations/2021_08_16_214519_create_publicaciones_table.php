<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->double('precio');
            $table->string('tipo_publicacion');
            $table->unsignedBigInteger('inmueble_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('inmueble_id')->references('id')
            ->on('inmuebles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicaciones');
    }
}
