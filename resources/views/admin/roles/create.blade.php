@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Rol</h2>

	<a href="{{route('roles.index')}}">Regresar</a>

	<form action="{{route('roles.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="rol">Rol:<label>
		<input type="text" name="rol" placeholder="Rol">

		@error('rol')
			<small>*{{ $message }}</small>
		@enderror

		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection