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
  background-image: url('/img/1.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

#MainTable {
    width: 100%;
    background-color: #D8F0DA;
    border: 1px;
    min-width: 100%;
    position: relative;
    opacity: 0.97;
    background: transparent;
}

</style>

<center><a href="{{ url('anime/create') }}" class="btn btn-dark" >Agregar Nuevo Anime</a>
<br/>
<br/>
<table  class="table table-light table-bordered" >
    <thead class="thead-dark ">
        <tr >
            <th class="text-center">#</th>
            <th class="text-center">Foto</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Género</th>
            <th class="text-center">Episodios</th>
            <th class="text-center">Temporadas</th>
            <th class="text-center">Estudio</th>
            <th class="text-center">Valoración</th>
            <th class="text-center">Acciones </th>
        </tr>
    </thead>

    <tbody>
        @foreach( $animes as $anime)
        <tr>
            <td><br><br><br><br>{{ $anime->id }}</td>

            <td>
            <img class= "img-fluid rounded"  src="{{ asset('storage').'/'.$anime->Foto }}" width="170" heigh="340" alt="">
            </td>
    
            <td><br><br><br><br><center>{{ $anime->Nombre }}</td>
            <td><br><br><br><br><center>{{ $anime->Genero }}</td>
            <td><br><br><br><br><center>{{ $anime->Episodios }}</td>
            <td><br><br><br><br><center>{{ $anime->Temporadas }}</td>
            @foreach ($estudios as $estudio)
            @if($estudio->id===$anime->estudio_id)
            <td><br><br><br><br><center> {{$estudio->Nombre}}</td>
            @endif
            @endforeach
            <td><br><br><br><br><center>{{ $anime->Valoracion }} 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
  <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
</svg></td>


           


            <td>
        
           <br><br><br> <a href="{{ url('/anime/'.$anime->id.'/edit') }}" class="btn btn-primary" >
            Editar 

            </a>
   
            <form action="{{ url('/anime/'.$anime->id) }}" class="d-inline" method="post">
            

	@csrf
	
            {{ method_field('DELETE') }}
           <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">

            </form>

             </td>
        </tr>
        @endforeach

    </tbody>

</table>

@endsection
