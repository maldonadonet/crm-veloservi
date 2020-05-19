@extends('theme.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Detalles del Pedido del cliente: {{ $pedido->nombre }}</h2>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">Datos del Cliente</div>
                    <div class="panel-body">
                        <strong>Datos del cliente</strong>
                        <p><strong class="text-primary">Nombre: </strong>{{ $pedido->nombre }}</p>
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
                        <p><strong class="text-primary">Monto del pedido: </strong>{{ $pedido->monto }}</p>
                        <p><strong class="text-primary">Estatus del pedido: </strong><span class="badge badge-primary" style="background-color:#c70039; padding:5px">{{ $pedido->estatus }}</span></p>
                        <p><strong class="text-primary">Repartidor asignado:</strong> {{ $pedido->repartidor_id }}</p>
                        <p><strong class="text-primary">Total del Pedido: <strong style="font-size:1.3em">{{ $pedido->monto }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Productos solicitados</div>
                    <div class="panel-body">
                        <p><strong class="text-primary">Id del pedido:</strong><span style="color:#c70039">{{ $pedido->id }}</span></p>           
                        <P><strong class="text-primary">Comercio: </strong><span style="color:#c70039">{{ $pedido->sucursal }}</span></P>
                        <p><strong class="text-primary">Ubicación del comercio: </strong><span style="color:#c70039">{{ $pedido->direccion }}</span></p>
                        <p><strong class="text-primary">Productos solicitados </strong><span style="color:#c70039">{{ $pedido->productos }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection