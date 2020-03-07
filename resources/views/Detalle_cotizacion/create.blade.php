@extends("layouts.app")

@section("content")

<div class="col-md-12 title">
    <h1>Nueva cotización</h1>
    <hr>
</div>
<div class="row">
    <div class="col-md-4">
        <a href="{{url('/cotizacion/detalle_cotizacion/index')}}" class="btn btn-primary btn-fab">
            Volver
        </a>
    </div>
    <div class="col-md-2 offset-md-6">
        <p style="font-weight: bold;">Nº de cotizacion: {{$cantidad_de_cotizaciones}}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <p style="font-weight: bold;">Lista de productos:</p>
            </div>
            <div class="col-md-4 offset-md-4">
                <form method="GET" action="{{ route('detalle_cotizacion.create') }}" role="form">
                    <input type="text" value="" name="nombre_del_producto" class="form-control"
                        placeholder="Buscar por producto">
                </form>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Codigo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio($)</th>
                            <th scope="col">Agregar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                        <form method="POST" action="{{ route('detalle_cotizacion.store') }}" role="form">
                            {{ csrf_field() }}
                            <tr>
                                <th scope="row">{{$producto->codigo_del_producto}}</th>
                                <td>{{$producto->nombre_del_producto}}</td>
                                <td>{{$producto->marca->nombre_de_la_marca}}</td>
                                <td>
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" value="1">

                                </td>
                                <td>
                                    <input type="number" name="precio" id="precio" class="form-control"
                                        value="{{$producto->precio_del_producto}}">

                                </td>
                                <input type="hidden" name="id_producto" value="{{$producto->id_producto}}">
                                <td><button type="submit">+</button></td>
                            </tr>
                        </form>


                        @endforeach

                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{$productos->render()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>

            </div>
            <div class="modal-body">
                <div class="col-lg-4 col-lg-offset-4">
                    <form method="GET" action="{{ route('detalle_cotizacion.create') }}" role="form">
                        <input type="text" value="" name="nombre_del_producto" class="form-control"
                            placeholder="Buscar por producto">
                    </form>

                </div>

                <div class="col-md-12">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio($)</th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <form method="POST" action="{{ route('detalle_cotizacion.store') }}" role="form">
                                {{ csrf_field() }}
                                <tr>
                                    <th scope="row">{{$producto->codigo_del_producto}}</th>
                                    <td>{{$producto->nombre_del_producto}}</td>
                                    <td>{{$producto->marca->nombre_de_la_marca}}</td>
                                    <td>
                                        <input type="number" name="cantidad" id="cantidad" class="form-control"
                                            value="1">

                                    </td>
                                    <td>
                                        <input type="number" name="precio" id="precio" class="form-control"
                                            value="{{$producto->precio_del_producto}}">

                                    </td>
                                    <input type="hidden" name="id_producto" value="{{$producto->id_producto}}">
                                    <td><button type="submit">+</button></td>
                                </tr>
                            </form>


                            @endforeach

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            {{$productos->render()}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#exampleModal').modal({backdrop: 'static', keyboard: false, show :true})

</script>

<script>
    $('body').removeClass('modal-open');
$('.modal-backdrop').remove();
</script>
@endsection