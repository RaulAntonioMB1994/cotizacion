<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string('codigo_producto');
            $table->string('nombre_del_producto');
            $table->string('modelo_del_producto');
            $table->boolean('estado_del_producto');
            $table->string('unidad_de_medida_del_producto');
            $table->string('peso_del_producto');
            $table->string('fecha_agregada_del_producto');
            $table->string('precio_del_Producto');
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
        Schema::dropIfExists('productos');
    }
}
