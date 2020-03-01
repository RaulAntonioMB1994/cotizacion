<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marcas";

    protected $primaryKey = "id_marca";

    protected $fillable = [
        'id_marca',
        'nombre_de_la_marca'
    ]

}
