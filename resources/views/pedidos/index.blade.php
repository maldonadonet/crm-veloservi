@extends('theme.app')

@section('content')

    <div class="container">
        <h2 class="">Listado de Pedidos</h2>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @include('pedidos.search')
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-dm-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Cliente</td>
                            <td>Fecha</td>
                            <td>Monto</td>
                            <td>Estatus</td>
                            <td class="col-md-1">Operaciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidos as $item)
                        <tr>
                            <th>{{ $item->id }}</th>
                            <th>{{ $item->cliente }}</th>
                            <th>{{ $item->fecha }}</th>
                            <th>{{ $item->monto }}</th>
                            <th>{{ $item->estatus }}</th>
                            <th class="col-md-1">
                                <a href="{{URL::action('PedidosController@edit',$item->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $pedidos->appends(['searchText' => $searchText])->links() }}

@endsection