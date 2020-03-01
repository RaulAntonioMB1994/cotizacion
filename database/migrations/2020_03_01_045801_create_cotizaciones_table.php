<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id_cotizacion');
            $table->date('fecha_de_cotizacion');
            $table->string('nombre_del_cliente');
            $table->string('telefono_del_cliente');
            $table->string('nombre_de_la_empresa');
            $table->string('telefono_de_la_empresa');
            $table->string('correo_de_la_empresa');
            $table->string('condiciones');
            $table->string('validez');
            $table->string('entrega');
            $table->integer('descuento');
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
        Schema::dropIfExists('cotizaciones');
    }
}
