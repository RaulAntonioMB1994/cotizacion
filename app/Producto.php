<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    protected $table = "productos";

    protected $primaryKey = "id_producto";

    protected $fillable = [
        'codigo_del_producto',
        'nombre_del_producto',
        'modelo_del_producto',
        'estado_del_producto',
        'unidad_de_medida_del_producto',
        'peso_del_producto',
        'fecha_agregada_del_producto',
        'precio del producto',
        'id_marca'
    ];

    public function marca(){
        return $this->BelongsTo(Marca::class ,'id_marca');
    }
    
    public function cotizacion(){
        return $this->belongsToMany(Cotizacion::class,'detalle_cotizacion','id_producto','id_cotizacion')
            ->withPivot('cantidad','precio_de_venta');
    }

    public function scopeName($query, $name)
    {

        if ($name) {
            return $query->where('nombre_del_producto', 'LIKE', '%' . $name . '%');
        }
    }
}


