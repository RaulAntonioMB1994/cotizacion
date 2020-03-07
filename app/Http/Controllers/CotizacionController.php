<?php

namespace App\Http\Controllers;

use App\Cotizacion;
use App\Producto;
use App\Marca;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cantidad_de_cotizaciones = Cotizacion::cantidad_de_cotizaciones() +1;
        return view("cotizacion.create",["cantidad_de_cotizaciones" => $cantidad_de_cotizaciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion;
        $cotizacion->nombre_del_cliente = $request->nombre_del_cliente;
        $cotizacion->telefono_del_cliente = $request->telefono_del_cliente;
        $cotizacion->nombre_de_la_empresa = $request->nombre_de_la_empresa;
        $cotizacion->telefono_de_la_empresa = $request->telefono_de_la_empresa;
        $cotizacion->correo_de_la_empresa = $request->correo_electronico_de_la_empresa;
        $cotizacion->fecha_de_cotizacion = Carbon::now();
        $cotizacion->condiciones = $request->condiciones;
        $cotizacion->validez = $request->validez;
        $cotizacion->entrega = $request->entrega;
        $cotizacion->descuento = 0;
        $cotizacion->save();
        $cantidad_de_cotizaciones = Cotizacion::cantidad_de_cotizaciones();
        return redirect()->route("detalle_cotizacion.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizacion $cotizacion)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id_cotizacion = $request->id_cotizacion;
        
      
        $cotizacion = Cotizacion::find($id_cotizacion);
        $cotizacion->descuento = $request->descuento;
        $cotizacion->save();
        return redirect()->route("detalle_cotizacion.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
