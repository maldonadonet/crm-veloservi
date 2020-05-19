@extends('theme.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Detalles del Pedido del cliente: {{ $pedido->cliente }}</h2>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos del Cliente</div>
                    <div class="panel-body">
                        <p><strong class="text-primary">Nombre: </strong>{{ $pedido->cliente }}</p>
                        <p><strong class="text-primary">Teléfono de contacto: </strong>{{ $pedido->telefono }}</p>
                        <p>
                            <strong class="text-primary">Dirección de entrega: </strong>
                            <ul class="list-group">
                                <li class="list-group-item">Cuidad: {{ $pedido->cuidad }}</li>
                                <li class="list-group-item">Colonia: {{ $pedido->colonia }}</li>
                                <li class="list-group-item">Calle: {{ $pedido->calle }}</li>
                                <li class="list-group-item">Referencia al domicilio: {{ $pedido->referencia }}</li>
                            </ul>
                        </p>
                        <p><strong class="text-primary">Fecha del pedido: </strong>{{ $pedido->fecha }}</p>
                        <p><strong class="text-primary">Estatus del pedido: </strong><span class="badge badge-primary" style="background-color:#c70039; padding:5px">{{ $pedido->estatus }}</span></p>
                        <p><strong class="text-primary">Total del Pedido: $ <strong style="font-size:1.3em">{{ $pedido->monto }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Productos solicitados</div>
                    <div class="panel-body">
                        <table class="table table primary table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Pedido</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detalles as $item)
                                <tr>
                                    <td scope="row">{{ $item->pedido_id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->costo }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection