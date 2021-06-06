@extends('layouts.app')

@section('content')
<div class="container">  <!-- Muestra login & register -->

<form action="{{ url('/anime') }}" method="post" enctype="multipart/form-data"> 
<!-- Se envía la información a esta ruta -> empleado.store -->
@csrf
@include('anime.form', ['modo' =>'Crear']) <!--Da el mensaje al crear los datos --> 
<!-- Hace referencia al form -->

</form>

</div>

@endsection
