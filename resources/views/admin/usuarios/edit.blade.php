@extends('layouts.admin')

@section('titulo','Administración | Editar usuario')
@section('titulo2','Usuarios')

@section('breadcrumbs')
@endsection

@section('contenido')
<a class="btn btn-primary btn-sm" style="margin-bottom: 15px;" href="{{route('usuarios.index')}}"><i class="fas fa-arrow-left"></i> Volver a lista de usuarios</a>
    <div class="row">
        <div class="col-md-12">
        @if(Session::has('exito'))
            <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{Session::get('exito')}}
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{Session::get('error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar usuario: {{$usuario->id}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('usuarios.update', $usuario->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nombre</label>
                                <input type="text" name="txtNombre" class="form-control" value="{{$usuario->name}}">
                        </div>

                        <div class="from-group">
                            <label for="">Email</label>
                            <input type="email" name="txtEmail" class="form-control" value="{{$usuario->email}}">
                        </div>

                        <div class="from-group">
                            <label for="">Contraseña</label>
                            <input type="password" name="txtContrasena" class="form-control" value="" id="password">
                        </div>

                        <div class="from-group">
                            <label for="">Confirmar contraseña</label>
                            <input type="password" name="txtContrasena" class="form-control" value="" id="confirm_password">
                        </div>
                        <br>

                        <div class="from-group">
                            <button class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las contraseñas no coinciden.");
    } else {
        confirm_password.setCustomValidity('');
    }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
 </script>
@endsection

@section('estilos')
@endsection