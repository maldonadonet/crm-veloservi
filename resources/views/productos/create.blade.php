@extends('theme.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2 class="h3 text-primary text-uppercase">Alta de nuevo producto en el Inventario.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        datos del Producto
                    </div>
                    <div class="panel-body">
                        {!!Form::open(array('url'=>'productos','method'=>'POST','autocomplete'=>'true','files'=>'true','accept-charset'=>'UTF-8'))!!}
                        {{Form::token()}}

                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Nombre del Producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="nombre" class="form-control col-md-12 col-xs-12" value="{{ old('nombre') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                     Descripción del producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="descripcion" class="form-control col-md-12 col-xs-12" value="{{ old('descripcion') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Categoría:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="categoria" class="form-control">
                                        <option value="">Seleccionar Categoria</option>
                                        <option value="Farmacia">Farmacia</option>
                                        <option value="Ropa">Ropa</option>
                                        <option value="Tienda">Tienda</option>
                                        <option value="Zapatos">Zapatos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Precio del producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" step="0.01" id="" name="precio" class="form-control col-md-12 col-xs-12" value="{{ old('precio') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Stock(Inventario):
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" step="0.01" id="" name="stock" class="form-control col-md-12 col-xs-12" value="{{ old('stock') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Asociado:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="asociado_id" class="form-control">
                                        <option value="">Seleccionar Comercio</option>
                                        @foreach($asociados as $item)
                                        <option value="{{ $item->id}}">{{ $item->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Descuento al producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" step="0.01" id="" name="descuento" class="form-control col-md-12 col-xs-12" value="{{ old('descuento') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Puntos promocionales:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="number" step="0.01" id="" name="puntos" class="form-control col-md-12 col-xs-12" value="{{ old('puntos') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Estatus del producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="estatus" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" for="first-name">
                                    Imagen del producto:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="file" name="foto" class="form-control col-md-12 col-xs-12">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <br>
                                    <input type="reset" class="btn btn-danger" value="Cancelar">
                                    <input type="submit" class="btn btn-primary" value="Dar de alta">
                                </div>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>


@endsection