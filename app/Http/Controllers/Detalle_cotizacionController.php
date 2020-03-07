<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cotizacion;
use App\Detalle_Cotizacion;
use App\Producto;
class Detalle_cotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ultima_cotizacion = Cotizacion::ultima_cotizacion();
        $cantidad_de_cotizaciones = Cotizacion::cantidad_de_cotizaciones();
        $descuento = $ultima_cotizacion->descuento/100;
        $precio_descuento = $ultima_cotizacion->suma_ultima_cotizacion()*$descuento;
        $gran_total = $ultima_cotizacion->suma_ultima_cotizacion()-$precio_descuento;
        return view("detalle_cotizacion.index",[
            "cantidad_de_cotizaciones" => $cantidad_de_cotizaciones,
             "ultima_cotizacion" => $ultima_cotizacion,
             "descuento" => $descuento,
             "precio_descuento" => $precio_descuento,
             "gran_total" => $gran_total]);
  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name = $request->get('nombre_del_producto');
        $productos = Producto::orderBy('id_producto', 'ASC')->name($name)->paginate(5);

        $ultima_cotizacion = Cotizacion::ultima_cotizacion();
        $cantidad_de_cotizaciones = Cotizacion::cantidad_de_cotizaciones();

        return view("detalle_cotizacion.create",["cantidad_de_cotizaciones" => $cantidad_de_cotizaciones, "productos" => $productos, "ultima_cotizacion" => $ultima_cotizacion]);
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ultima_cotizacion = Cotizacion::ultima_cotizacion(); 
        $detalle_cotizacion = new Detalle_Cotizacion;
        $detalle_cotizacion->cantidad = $request->cantidad;
        $precio_de_venta = $request->cantidad * $request->precio;
        $detalle_cotizacion->precio_de_venta = $precio_de_venta ;
        $detalle_cotizacion->id_producto = $request->id_producto;
        $detalle_cotizacion->id_cotizacion = $ultima_cotizacion->id_cotizacion;
        $detalle_cotizacion->save();

        return redirect()->route("detalle_cotizacion.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle_cotizacion = Detalle_Cotizacion::find($id);
        $detalle_cotizacion->delete();
        return redirect()->route('detalle_cotizacion.index');
    }
}
