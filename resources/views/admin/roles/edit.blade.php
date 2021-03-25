@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Editar Rol</h2>

	<a href="{{route('roles.index')}}">Regresar</a>

	<form action="{{route('roles.update',$rol)}}" method="post" accept-charset="utf-8">
		@csrf
		@method('put')
		<label  for="rol">Rol:<label>
		<input type="text" name="rol" value="{{$rol->rol}}">
		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection