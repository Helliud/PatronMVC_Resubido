@extends('layouts.admin')

@section('titulo','Administración | Editar noticia')
@section('titulo2','Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Editar noticia: {{$noticia->id}}</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Titulo</label>
                                <input type="text" name="txtTitulo" class="form-control" value="{{$noticia->titulo}}">
                        </div>

                        <div class="from-group">
                            <label for="">Cuerpo</label>
                            <textarea name="txtCuerpo" class="form-control" cols="30" rows="12">{{$noticia->cuerpo}}</textarea>
                        </div>

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
@endsection

@section('estilos')
@endsection