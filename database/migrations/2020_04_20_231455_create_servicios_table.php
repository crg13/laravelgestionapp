<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->integer('sedeInstalacion_id')->unsigned();
            $table->integer('equipo_id')->unsigned();
            $table->integer('empleado_id')->unsigned();
            $table->string('tipo_servicio');
            $table->text('detalle_servicio');
            $table->date('fecha_inicio');
            $table->string('estado_servicio');
            $table->date('fecha_fin');
            $table->text('observaciones');
            $table->timestamps();
            $table->primary(['sedeInstalacion_id', 'empleado_id','equipo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
