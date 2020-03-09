<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Simple Invoice - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('/assets/css/bootstrap.css') }}" rel="stylesheet" />
    <style type="text/css">
        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }

        p {
            color: dodgerblue;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>
                <h2> <img height="100" width="130" src="{{url('/assets/img/logo.png')}}" alt="...">
                </h2>
            </div>
            <div class="col-xs-6 col-md-6 text-right"><br>
                <strong style="font-size: 90%;color: black;"> Nº de cotización: {{$cantidad_de_cotizaciones}}</strong><br>
                <strong style="font-size: 90%;color: black;"> Fecha de cotización: {{$ultima_cotizacion->fecha_de_cotizacion}}</strong>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info"  style="text-align: center;">
                <strong style="font-size: 80%;">DATOS RELEVANTES</strong><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 ">
                <address style="font-size: 80%;">
                    <strong style="color: dodgerblue;">Datos de la empresa:</strong><br>
                    <strong> Nombre:</strong> {{$ultima_cotizacion->nombre_de_la_empresa}}<br>
                    <strong> Telefono:</strong> {{$ultima_cotizacion->telefono_de_la_empresa}}<br>
                    <strong> Correo:</strong> {{$ultima_cotizacion->correo_de_la_empresa}}<br>
                </address>
            </div>
            <div class="col-xs-6 text-right">
                <address style="font-size: 80%;">
                    <strong style="color: dodgerblue;">Datos del cliente: </strong><br>
                    <strong> Nombre:</strong> {{$ultima_cotizacion->nombre_del_cliente}}<br>
                    <strong> Telefono: </strong> {{$ultima_cotizacion->telefono_del_cliente}}<br>
                </address>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info"  style="text-align: left;">
                <strong style="font-size: 80%;">A continuación le presentamos nuestra oferta por los productos estimados. Esperamos sea de su conformidad.</strong>
            </div>
        </div>
        <div class="row">
            
            <table class="table table-bordered" style="font-size: 80%;">
                <thead>
                    <tr>
                        <td><strong>Código</strong></td>
                        <td class="text-center"><strong>Descripción</strong></td>
                        <td class="text-center"><strong>Cantidad</strong></td>
                        <td class="text-center"><strong>Precio Unidad($)</strong></td>
                        <td class="text-right"><strong>Precio Total($)</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ultima_cotizacion->productos as $detalle_de_cotizacion)
                    <tr>
                        <td>{{$detalle_de_cotizacion->codigo_del_producto}}</td>
                        <td class="text-center">{{$detalle_de_cotizacion->nombre_del_producto}},{{$detalle_de_cotizacion->modelo_del_producto}},peso:{{$detalle_de_cotizacion->peso_del_producto}}</td>
                        <td class="text-center">{{$detalle_de_cotizacion->pivot->cantidad}}</td>
                        <td class="text-right">{{$detalle_de_cotizacion->precio_del_producto}}</td>
                        <td class="text-right">{{$detalle_de_cotizacion->pivot->precio_de_venta}}</td>
                    </tr>
                    @endforeach
                    <tr >
                        <th colspan="4" style="text-align: right;">Total($) :</th>
                        <td style="text-align: right;">{{$ultima_cotizacion->suma_ultima_cotizacion()}}</td> 
                    </tr>
                    <tr >
                        <th colspan="4" style="text-align: right;">Descuento ({{$descuento}}%) : </th>
                        <td style="text-align: right;">{{$precio_descuento}}</td> 
                    </tr>
                    <tr >
                        <th colspan="4" style="text-align: right;">Gran Total: </th>
                        <td style="text-align: right;">{{$gran_total}}</td> 
                    </tr>
                </tbody>
            </table>
        </div>
       
    <div class="row">
        <div class="panel panel-info"  style="text-align: right;">
            <strong style="font-size: 80%;">Cada uno de los productos contiene su respectivo IVA.</strong><br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 text-center">
            <address style="font-size: 80%;"><br>
                <strong> Condiciones de pago:</strong> {{$ultima_cotizacion->condiciones}}<br>
                <strong> Validez de la oferta: </strong> {{$ultima_cotizacion->validez}}<br>
                <strong> Tiempo de entrega: </strong> {{$ultima_cotizacion->entrega}}<br>
            </address>
        </div><br><br><br><br>
    </div>
    <div class="row">
        <div class="col-xs-6 text-left">
            <address style="font-size: 80%;">
                <strong>__________________</strong><br>
                <strong>Vendedor</strong>
            </address>
        </div>
        <div class="col-xs-6 text-center">
            <address style="font-size: 80%;">
                <strong>__________________</strong><br>
                <strong>Cotizador</strong>
            </address>
        </div>
        <div class="col-xs-6 text-right">
            <address style="font-size: 80%;">
                <strong>__________________</strong><br>
                <strong>Cliente</strong>
            </address>
        </div>
    </div>
</div>

</body>

</html>