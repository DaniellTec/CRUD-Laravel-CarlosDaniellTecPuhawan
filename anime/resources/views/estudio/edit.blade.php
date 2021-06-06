

@extends('layouts.app')

@section('content')
<div class="container"> <!-- Muestra login & register -->

<form action="{{ url('/estudio/'.$estudio->id) }}" method="post" enctype="multipart/form-data"> <!--  -->

@csrf <!-- Cifra --> 
{{ method_field('PATCH') }} <!-- Actualiza los datos -->  
@include('estudio.form', ['modo' =>'Editar']) <!--Da el mensaje al editar los datos --> 

</form>

</div>

@endsection