@extends('layouts.admin')

@section('titulo','Administración | Noticias')
@section('titulo2','Noticias')

@section('breadcrumbs')
@endsection

@section('contenido')

<div class="container-fluid">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form id="deleteForm" method="POST">
      <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar noticia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estas seguro que quieres eliminar la noticia?
      </div>
      <div class="modal-footer">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger" onclick="formSubmit()">Eliminar</button>
      </div>
    </div>
      </form>
  </div>
</div>


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
                    <h3 class="card-title">Lista de noticias</h3>
                </div>
                <div class="card-body">
                    <a href="{{route('noticias.create')}}">
                        <i class="fas fa-plus"></i>Agregar noticia
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Noticia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí van las noticias -->
                            @foreach($noticias as $noticia)
                                <tr>
                                    <td>{{$noticia->titulo}}</td>
                                    <td>

                                    <form action="{{route('noticias.destroy', $noticia->id)}}" method="POST">


                                        <a href="{{route('noticias.show' ,$noticia->id)}}" class="btn btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a class="btn btn-primary" href="{{route('noticias.edit', $noticia->id)}}">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="deleteData({{$noticia->id}})">
                                            <i class="fas fa-times"></i>
                                            
                                        </a>
                                    </form>



                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
                                    <script>
                                    $('#myModal').on('shown.bs.modal', function () {
                                    $('#myInput').trigger('focus')})
                                    </script>

                                    <script>     
                                    function deleteData(id)
                                        {
                                            var id = id;
                                            var url = '{{ route("noticias.destroy", ":id") }}';
                                            url = url.replace(':id', id);
                                            $("#deleteForm").attr('action', url);
                                        }

                                        function formSubmit()
                                        {
                                            $("#deleteForm").submit();
                                        }
                                        </script>


@endsection

@section('estilos')
@endsection