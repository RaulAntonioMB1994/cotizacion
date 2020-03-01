<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = "Cotizaciones";

    protected $primaryKey = 'id_cotizacion';

    protected $fillable = [
        'id_cotizacion',
        'fecha_de_cotizacion',
        'nombre_del_cliente',
        'telefono_del_cliente',
        'nombre_de_la_empresa',
        'telefono_de_la_empresa',
        'correo_de_la_empresa',
        'condiciones',
        'validez',
        'entrega',
        'descuento'
    ];

}