<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = "marcas";

    protected $primaryKey = "id_marca";

    protected $fillable = [
        'nombre_de_la_marca'
    ];

    public function producto(){
        return $this->hasMany(Producto::class,'id_marca');
    }


    public function productos_de_Entel(){
        return $this->Producto::where('id_marca', '1');
    }
  
}
