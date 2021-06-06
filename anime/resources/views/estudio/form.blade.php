@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
	<ul>

		@foreach( $errors->all() as $error)
		<li> {{ $error }} </li>
		@endforeach

	</ul>
</div>

@foreach( $errors->all() as $error)
{{ $error}}
@endforeach

@endif

<br>

<style>

body {
  background-image: url('/img/form-e.jpg');
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
	height: 770px;
}


</style>

<div class="form-box">

<center><h1>{{ $modo }} Estudio</h1></center>

<div class="form-group">

<br>

<!-- Agrupa -->
<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($estudio->Nombre)?$estudio->Nombre:old('Nombre') }}" id="Nombre"> 
<!-- Si hay error conserva el campo anterior -->
 <br>
 </div>

 <div class="form-group">
 <label for="Fundador"> Fundador </label>
<input type="text" class="form-control" name="Fundador" value="{{ isset($estudio->Fundador)? $estudio->Fundador:old('Fundador') }}" id="Fundador">
<br><br>
</div>

<div class="form-group">
<label for="Oficina"> Oficina </label>
<input type="text" class="form-control" name="Oficina" value="{{ isset($estudio->Oficina)? $estudio->Oficina:old('Oficina') }}" id="Oficina">
<br><br>
</div>

<div class="form-group">
<label for="Website"> Website </label>
<input type="text" class="form-control" name="Website" value="{{ isset($estudio->Website)? $estudio->Website:old('Website') }}" id="Website">
<br><br>
</div>

<div class="form-group">
<label for="Foto"> Foto </label>

@if(isset($estudio->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$estudio->Foto }}" width="100" alt="">
@endif
<input class="btn btn-success" type="file" class="form-control" name="Foto" value="" id="Foto">
<br><br>

<input class="btn btn-primary" type="submit" value="{{ $modo }} datos"> 


<a class="btn btn-danger" href="{{ url('estudio/') }}">Regresar</a> <!-- Redirecciona al inicio -->

</div>

</div>

<br>


