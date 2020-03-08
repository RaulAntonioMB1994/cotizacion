@extends("layouts.app")

@section("content")

<div class="col-md-12 title">
    <h1>Nueva cotización</h1>
    <hr>
</div>
<div class="row">
    <div class="col-md-6">
        <a href="{{url('/cotizacion/detalle_cotizacion/create')}}" class="btn btn-primary btn-fab">
            Productos
        </a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descuento">
            Descuento
        </button>
        <a href="{{url('/cotizacion/detalle_cotizacion/pdf')}}" class="btn btn-primary btn-fab">
            Productos
        </a>
        <a href="{{route('detalle_cotizacion.pdf')}}" class="btn btn-primary btn-fab">
            Imprimir
        </a>
    </div>
    <div class="col-md-3 offset-md-3">
        <p style="font-weight: bold;">Nº de cotizacion: {{$cantidad_de_cotizaciones}}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p style="font-weight: bold;">Datos de la cotización</p>
            </div>
            <div class="col-md-4">
                <p>Nombre del cliente : {{$ultima_cotizacion->nombre_del_cliente}}</p>
            </div>
            <div class="col-md-4">
                <p>Telefono del cliente : {{$ultima_cotizacion->telefono_del_cliente}}</p>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <p>Nombre de la empresa : {{$ultima_cotizacion->nombre_de_la_empresa}}</p>
            </div>
            <div class="col-md-4">
                <p>Telefono de la empresa : {{$ultima_cotizacion->telefono_de_la_empresa}}</p>
            </div>
            <div class="col-md-4">
                <p>Correo de la empresa : {{$ultima_cotizacion->correo_de_la_empresa}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="font-weight: bold;">Información relevante</p>
            </div>
            <div class="col-md-4">
                <p>Condiciones : {{$ultima_cotizacion->condiciones}}</p>
            </div>
            <div class="col-md-4">
                <p>Validez del documento : {{$ultima_cotizacion->validez}}</p>
            </div>
            <div class="col-md-4">
                <p>Tipo de entrega : {{$ultima_cotizacion->entrega}}</p>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12"><br>
    <p style="font-weight: bold;">Detalles de la cotización:</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Cant.</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio Unit.($)</th>
                <th scope="col">Precio Total($)</th>
                <th scope="col">Accion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ultima_cotizacion->productos as $detalle_de_cotizacion)
            <tr>
                <th scope="row">{{$detalle_de_cotizacion->codigo_del_producto}}</th>
                <td>{{$detalle_de_cotizacion->pivot->cantidad}}</td>
                <td>{{$detalle_de_cotizacion->nombre_del_producto}}</td>
                <td>{{$detalle_de_cotizacion->precio_del_producto}}</td>
                <td>{{$detalle_de_cotizacion->pivot->precio_de_venta}}</td>
                <td><a
                        href="{{route('detalle_cotizacion.destroy',$detalle_de_cotizacion->pivot->id_detalle_cotizacion)}}">Eliminar</a>
                </td>
            </tr>
            @endforeach
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <th>Total($) : </th>
                <th>{{$ultima_cotizacion->suma_ultima_cotizacion()}}</th>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td>Descuento ({{$descuento}}%) : </td>
            <td>{{$precio_descuento}}</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <th>Gran Total: </th>
            <th>{{$gran_total}}</th>
                <td></td>
            </tr>
        </tbody>


    </table>
</div>

<div class="modal fade" id="descuento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('cotizacion.update') }}" role="form">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingreso de descuento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="descuento">Descuento(%):</label>
                            <input name="descuento" type="number" class="form-control" id="descuento" max="100" min="0"
                                value="{{$ultima_cotizacion->descuento}}">
                             <input name="id_cotizacion" type="hidden" class="form-control" value="{{$ultima_cotizacion->id_cotizacion}}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection