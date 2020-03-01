<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDetalleCotizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_cotizacion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cotizacion')->unsigned();
            $table->unsignedBigInteger('id_producto')->unsigned();

            $table->foreign('id_cotizacion')->references('id_cotizacion')->on('cotizaciones');
            $table->foreign('id_producto')->references('id_producto')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_cotizacion', function (Blueprint $table) {
            //
        });
    }
}
