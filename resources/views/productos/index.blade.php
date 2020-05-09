@extends('theme.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Listado de Productos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                @if (session('message'))
                    <div class="alert alert-success text-primary">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                @include('productos.search')
            </div>
            <div class="col-sm-12 col-md-8">
                <a href="productos/create" class="btn btn-primary">Agregar producto</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Asociado</th>
                            <th class="col-md-1">Imagen</th>
                            <th class="col-md-1">Operaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->producto }}</td>
                                <td>{{ $item->categoria }}</td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>{{ $item->asociado }}</td>
                                <td>
                                    <img src="images/productos/{{ $item->foto }}" width="40%">
                                </td>
                                <td>
                                    <a href="{{URL::action('ProductosController@edit',$item->id)}}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-pencil fa-1x" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{URL::action('ProductosController@show',$item->id)}}">
                                        <button class="btn btn-info btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $productos->appends(['searchText' => $searchText])->links() }}

@endsection