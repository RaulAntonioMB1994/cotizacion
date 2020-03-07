<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    protected $table = "cotizaciones";

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

    public static function cantidad_de_cotizaciones(){
        return Cotizacion::all()->count();
    }

    public static function ultima_cotizacion(){
        return Cotizacion::all()->last();
    }

   
    public function productos(){
        return $this->belongsToMany(Producto::class,'detalle_cotizacion','id_cotizacion','id_producto')
            ->withPivot('id_detalle_cotizacion','cantidad','precio_de_venta');
    }

    public function suma_ultima_cotizacion(){
        return $this->belongsToMany(Producto::class,'detalle_cotizacion','id_cotizacion','id_producto')
        ->withPivot('cantidad','precio_de_venta')->sum('precio_de_venta');
}

    
}
