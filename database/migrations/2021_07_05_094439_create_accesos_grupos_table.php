<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccesosGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesos_grupos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_grupos');
            $table->unsignedBigInteger('id_accesos');

            $table->foreign('id_grupos')->references('id_grupos')->on('grupos')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_accesos')->references('id_accesos')->on('accesos')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->primary(['id_grupos','id_accesos']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesos_grupos');
    }
}
