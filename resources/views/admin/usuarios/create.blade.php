@extends('layouts.admin')

@section('titulo','Administración | Crear usuario')
@section('titulo2','Usuario')

@section('breadcrumbs')
@endsection

@section('contenido')
<a class="btn btn-primary btn-sm" style="margin-bottom: 15px;" href="{{route('usuarios.index')}}"><i class="fas fa-arrow-left"></i> Volver a lista de usuarios</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('usuarios.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Titulo</label>
                                <input type="text" name="txtTitulo" class="form-control">
                        </div>

                        <div class="from-group">
                            <label for="">Cuerpo</label>
                            <textarea name="txtCuerpo" class="form-control" cols="30" rows="12"></textarea>
                        </div>

                        <div class="from-group">
                            <button class="btn btn-primary">
                                Guardar
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
@endsection

@section('estilos')
@endsection