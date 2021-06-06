
@if(count($errors)>0) <!-- Si hay errores los muestra -->

    <div clas="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error) <!-- Lista de errores -->
    <li> {{ $error }} </li>
     @endforeach
    </<ul>
    </div>

@endif

<br>

<style>

body {
  background-image: url('/img/form-a.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

body {
	font-family: poppins;
	font-size: 16px;
	color: #fff;
}

.form-box {
	background-color: rgba(0, 0, 0, 0.5);
	margin: auto auto;
	padding: 40px;
	border-radius: 5px;
	box-shadow: 0 0 10px #000;
	position: absolute;
	
	left: 0;
	right: 0;
	width: 800px;
	height: 1050px;
}

</style>

<div class="form-box">

<center><h1>{{ $modo }} Anime</h1></center>

<div class="form-group">

<br>

<!-- Agrupa -->
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($anime->Nombre)?$anime->Nombre:old('Nombre') }}" id="Nombre"> 
<!-- Si hay error conserva el campo anterior -->
 <br><br>
 </div>

<div class="form-group">
<label for="Genero"> Género </label>
<input type="text" class="form-control" name="Genero" value="{{ isset($anime->Genero)? $anime->Genero:old('Genero') }}" id="Genero">
<br><br>
</div>

<div class="form-group">
<label for="Episodios"> Episodios </label>
<input type="text" class="form-control" name="Episodios" value="{{ isset($anime->Episodios)? $anime->Episodios:old('Episodios') }}" id="Episodios">
<br><br>
</div>

<div class="form-group">
 <label for="Temporadas"> Temporadas </label>
<input type="text" class="form-control" name="Temporadas" value="{{ isset($anime->Temporadas)? $anime->Temporadas:old('Temporadas') }}" id="Temporadas">
<br><br>
</div>

<div class="form-group">
<label for="EstudioAnimacion"> Estudio </label>
<select class="form-select" name="estudio_id" id="estudio_id">

@foreach ($estudios as $estudio)
  <option name="estudio_id" value="{{ isset($estudio->id)?$estudio->id:old('id') }}" id="estudio_id">{{ isset($estudio->Nombre)?$estudio->Nombre:old('Nombre') }}</option>
@endforeach
</select>
<br><br>
</div>

<br>

<div class="form-group">
<label for="Valoracion"> Valoración </label>
<input type="text" class="form-control" name="Valoracion" value="{{ isset($anime->Valoracion)? $anime->Valoracion:old('Valoracion') }}" id="Valoracion">
<br><br>
</div>

<div class="form-group">
<label for="Foto"> Foto </label>

@if(isset($anime->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$anime->Foto }}" width="100" alt="">
@endif
<input class="btn btn-success" type="file" class="form-control" name="Foto" value="" id="Foto">
<br><br>

<input  class="btn btn-primary" type="submit" value="{{ $modo }} datos"> 


<a class="btn btn-danger" href="{{ url('anime/') }}">Regresar</a> <!-- Redirecciona al inicio -->

</div>

</div>

<br>


