<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial',60)->unique();
            $table->string('marca',60);
            $table->string('modelo',60);
            $table->string('tipo_equipo',60);
            $table->integer('contador');
            $table->date('fecha_mnto',60);
            $table->string('id_tecnico',60);
            $table->text('observaciones')->nullable();
            $table->json('otromnto')->nullable();
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('equipos');
    }
}
