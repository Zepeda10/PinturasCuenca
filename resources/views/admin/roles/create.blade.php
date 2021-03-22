@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Rol</h2>

	<form action="{{route('roles.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="rol">Rol:<label>
		<input type="text" name="rol" placeholder="Rol">
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection