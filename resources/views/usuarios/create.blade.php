@extends('theme.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2 class="h3 text-primary text-uppercase">Alta de nuevo Usuario en el sistema.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        datos del Usuario
                    </div>
                    <div class="panel-body">
                        {!!Form::open(array('url'=>'usuarios','method'=>'POST','autocomplete'=>'true','files'=>'true','accept-charset'=>'UTF-8'))!!}
                        {{Form::token()}}

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Nombre:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="nombre" class="form-control col-md-12 col-xs-12" value="{{ old('nombre') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Direccion fiscal:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="direccion" class="form-control col-md-12 col-xs-12" value="{{ old('direccion') }}">
                                </div>
                            </div>

                             <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Cuidad:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="cuidad" class="form-control col-md-12 col-xs-12" value="{{ old('cuidad') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Teléfono:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="tel" id="" name="telefono" class="form-control col-md-12 col-xs-12" value="{{ old('telefono') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    DNI
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="" name="dni" class="form-control col-md-12 col-xs-12" value="{{ old('dni') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Correo electrónico:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" id="" name="email" class="form-control col-md-12 col-xs-12" value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Contraseña de acceso:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="password" id="" name="password" class="form-control col-md-12 col-xs-12" value="{{ old('password') }}">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Tipo de usuario:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="tipo_usuario" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="admin">Administrador</option>
                                        <option value="asociado">Asociado</option>
                                        <option value="repartidor">Repartidor</option>
                                        <option value="cliente">Repartidor</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Rol:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="rol" name="rol" class="form-control">
                                        <option value="">Seleccionar rol (Solo para Asociados)</option>
                                        <option value="Productos">Productos</option>
                                        <option value="Paqueteria">Paqueteria</option>
                                        <option value="Transporte">Transporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                    Estatus:
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <select name="estatus" id="" class="form-control">
                                        <option value="">Seleccionar</option>
                                        <option value="activo">Activo</option>
                                        <option value="inactivo"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
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