@extends('theme.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Usuarios registrados en la plataforma</h2>
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
                @include('usuarios.search')
            </div>
            <div class="col-sm-12 col-md-8">
                <a href="usuarios/create" class="btn btn-primary">Agregar nuevo Usuario</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <table class="table table-bordered table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Id</th>
                            <th>Email</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <!-- <th class="col-md-1">Imagen</th> -->
                            <th>Operaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->tipo_usuario }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->estatus }}</td>
                                <td>
                                    
                                </td>
                                <td>
                                    <a href="{{URL::action('UsersController@show',$item->id)}}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{URL::action('UsersController@edit',$item->id)}}">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-pencil fa-1x" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <a href="{{URL::action('UsersController@show',$item->id)}}">
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

    {{ $usuarios->appends(['searchText' => $searchText])->links() }}

@endsection