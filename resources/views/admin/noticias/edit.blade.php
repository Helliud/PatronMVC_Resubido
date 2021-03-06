@extends('layouts.admin')

@section('titulo','Administración | Editar noticia')
@section('titulo2','Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')
<a class="btn btn-primary btn-sm" style="margin-bottom: 15px;" href="{{route('noticias.index')}}"><i class="fas fa-arrow-left"></i> Volver a lista de noticias</a>
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
                    <h3 class="card-title">Editar noticia: {{$noticia->id}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('noticias.update', $noticia->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nombre</label>
                                <input type="text" name="txtNombre" class="form-control" value="{{$noticia->name}}">
                        </div>

                        <div class="from-group">
                            <label for="">Email</label>
                            <input type="text" name="txtEmail" class="form-control" value="{{$noticia->email}}">
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