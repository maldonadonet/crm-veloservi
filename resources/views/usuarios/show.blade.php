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
                        <p>Nombre: {{ $usuario->nombre }}</p>
                        <p>Teléfono: {{ $usuario->telefono }}</p>
                        <p>Cuidad: {{ $usuario->cuidad }}</p>
                        <p>Colonia: {{ $usuario->colonia }}</p>
                        <p>Calle: {{ $usuario->calle }}</p>
                    </div>
                    <div class="panel-footer">
                        Veloservi App
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
                        <p>Correo eléctronico: {{ $usuario->email }}</p>
                        <p>Tipo de usuario: {{ $usuario->tipo_usuario }}</p>
                        <p>Rol: {{ $usuario->rol }}</p>
                        <p>Estatus: {{ $usuario->estatus }}</p>
                        <p>Fecha de creación: {{ $usuario->fecha_creacion }}</p>
                    </div>
                    <div class="panel-footer">
                        Veloservi App
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection