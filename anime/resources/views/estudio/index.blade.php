@extends('layouts.app')
@section('content')
<div class="container">




@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje')}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <sapan aria-hidden="true">&times;</span>
      </button>


      </div>
@endif

<style>
body {
  background-image: url('/img/index-e.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

<center><a href="{{ url('estudio/create') }}" class="btn btn-dark" >Agregar Nuevo Estudio</a>
<br/>
<br/>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Fundadores</th>
            <th class="text-center">Oficina</th>
            <th class="text-center">Website</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $estudios as $estudio)
        <tr>
            <td><br><br><br>{{ $estudio->id }}</td>

            <td>
            <img class= "img-fluid rounded"  src="{{ asset('storage').'/'.$estudio->Foto }}" width="170" heigh="340" alt="">
            </td>
    
            <td><br><br><br><br><center>{{ $estudio->Nombre }}</td>
            <td><br><br><br><br><center>{{ $estudio->Fundador }}</td>
            <td><br><br><br><br><center>{{ $estudio-> Oficina }}</td>
            <td><br><br><br><br><center><a href={{$estudio->Website}}>{{ $estudio->Website }}></td>
            <td>
            <br><br><br>
            <a href="{{ url('/estudio/'.$estudio->id.'/edit') }}" class="btn btn-primary" >
            Editar 

            </a>
   
            <form action="{{ url('/estudio/'.$estudio->id) }}" class="d-inline" method="post">
            

	@csrf
	
            {{ method_field('DELETE') }}
           <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

             </td>
        </tr>
        @endforeach

    </tbody>

</table>
<div class="d-flex justify-content-center">
                {!! $estudios->links() !!}
            </div>   
</div>
@endsection
