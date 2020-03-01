<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Cotizacion extends Model
{
    protected $table = "detalle_cotizacion";

    protected $primaryKey = "id_detalle_cotizacion";

    protected $fillable = [
        'id_detalle_cotizacion',
        'cantidad',
        'precio_de_venta',
        'id_cotizacion',
        'id_producto'
    ]
}
