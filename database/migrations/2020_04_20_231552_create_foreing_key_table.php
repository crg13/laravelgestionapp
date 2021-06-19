<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeingKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sedes_cliente', function (Blueprint $table) {
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
      });
      Schema::table('sede_instalacion', function (Blueprint $table) {
           $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->foreign('sedeCliente_id')->references('id')->on('sedes_cliente')->onDelete('cascade');

      });
      Schema::table('servicios', function (Blueprint $table) {
          $table->foreign('sedeInstalacion_id')->references('id')->on('sede_instalacion')->onDelete('cascade');
           $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
           $table->foreign('empleado_id')->references('id')->on('empleados')->onDelete('cascade');

      });
      Schema::table('despacho_toner', function (Blueprint $table) {
            $table->foreign('equipoSedeInstalacion_id')->references('id')->on('sede_instalacion')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sedes_cliente', function (Blueprint $table) {
            $table->dropForeign(['cliente_id']);
      });
      Schema::table('sede_instalacion', function (Blueprint $table) {
           $table->dropForeign(['equipo_id']);
            $table->dropForeign(['sedeCliente_id']);

      });
      Schema::table('servicios', function (Blueprint $table) {
          $table->dropForeign(['sedeInstalacion_id']);
           $table->dropForeign(['equipo_id']);
           $table->dropForeign(['empleado_id']);

      });
      Schema::table('despacho_toner', function (Blueprint $table) {
            $table->dropForeign(['equipoSedeInstalacion_id']);
      });

    }
}
