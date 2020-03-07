@extends("layouts.app")

@section("content")
<div class="col-md-12 title">
    <h1>Nueva cotización</h1>
    <hr>
</div>

<div class="col-md-2 offset-md-10">
    <p style="font-weight: bold;">Nº de cotizacion: {{$cantidad_de_cotizaciones}}</p>

</div>
<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('cotizacion.store') }}" role="form">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                    <label for="nombre_de_cliente">Nombre del Cliente:</label>
                    <input name="nombre_del_cliente" type="text" class="form-control" id="nombre_del_cliente">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="telefono_del_cliente">Teléfono:</label>
                    <input name="telefono_del_cliente" type="text" class="form-control" id="telefono_del_cliente">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                    <label for="nombre_de_la_empresa">Empresa:</label>
                    <input name="nombre_de_la_empresa" type="text" class="form-control" id="nombre_de_la_empresa">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="telefono_de_la_empresa">Teléfono:</label>
                    <input name="telefono_de_la_empresa" type="text" class="form-control" id="telefono_de_la_empresa">
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="correo_electronico_de_la_empresa">Correo electronico:</label>
                    <input name="correo_electronico_de_la_empresa" type="email" class="form-control"
                        id="correo_electronico_de_la_empresa">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 col-sm-4">
                    <label for="condiciones_de_pago">Condiciones de pago:</label>
                    <select class="form-control" name="condiciones">
                        <option value="Contado">Contado</option>
                        <option value="Crédito 30 días">Crédito 30 días</option>
                        <option value="Crédito 60 días">Crédito 60 días</option>
                        <option value="Crédito 90 días">Crédito 90 días</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="condiciones_de_pago">Validez de la oferta:</label>
                    <select class="form-control" name="validez">
                        <option value="5 días">5 días</option>
                        <option value="10 días">10 días</option>
                        <option value="15 días">15 días</option>
                        <option value="20 días">20 días</option>
                        <option value="25 días">25 días</option>
                        <option value="30 días">30 días</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-4">
                    <label for="condiciones_de_pago">Tiempo de entrega:</label>
                    <select class="form-control" name="entrega">
                        <option value="Inmediata">Inmediata</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="submit" value="Guardar datos de cotización" class="btn btn-success btn-block">
                </div>
            </div>

        </form>
    </div>
</div>

@endsection