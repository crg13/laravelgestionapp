<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSedeInstalacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede_instalacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id')->unsigned();
            $table->integer('sedeCliente_id')->unsigned();
            $table->string('ubicacion',60);
            $table->string('ciudad',60);
            $table->date('fecha_instalacion');
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
        Schema::dropIfExists('sede_instalacion');
    }
}
