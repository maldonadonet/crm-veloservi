@extends('theme.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h2>Datos del usuario</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div-panel-title>
                            Datos Personales
                        </div-panel-title>
                    </div>
                    <div class="panel-body">

                        {!! Form::model($usuario,['method'=>'PUT','route'=>['usuarios.update',$usuario->id],'id'=>'demo-form2','files'=>'true']) !!}
                        {{Form::token()}}

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Nombre:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="nombre" class="form-control col-md-12 col-xs-12" value="{{ $usuario->nombre }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Telefono:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="telefono" class="form-control col-md-12 col-xs-12" value="{{ $usuario->telefono }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Cuidad:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="cuidad" class="form-control col-md-12 col-xs-12" value="{{ $usuario->cuidad }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Colonia:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="colonia" class="form-control col-md-12 col-xs-12" value="{{ $usuario->colonia }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Calle:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="calle" class="form-control col-md-12 col-xs-12" value="{{ $usuario->calle }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <br>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                            </div>
                        </div>


                       

                    </div>
                    <div class="panel-footer">
                        <input type="submit" value="Actualizar datos" class="btn btn-primary">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div-panel-title>
                            Datos operativos
                        </div-panel-title>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Email:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="email" name="email" class="form-control col-md-12 col-xs-12" value="{{ $usuario->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Tipo de Usuario:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="tipo_usuario" class="form-control">
                                    <option value="{{ $usuario->tipo_usuario }}">{{ $usuario->tipo_usuario }}</option>
                                    <option value="Admin">Administrador</option>
                                    <option value="Asociado">Asociado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Rol:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" id="" name="rol" class="form-control col-md-12 col-xs-12" value="{{ $usuario->rol }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                Estatus:
                            </label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <select name="estatus" class="form-control">
                                    <option value="{{ $usuario->estatus }}">{{ $usuario->estatus }}</option>
                                    <option value="activo">Activor</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-footer">
                        Veloservi App
                    </div>
                </div>
            </div>
        </div>
    </div>
     {!!Form::close()!!}



@endsection