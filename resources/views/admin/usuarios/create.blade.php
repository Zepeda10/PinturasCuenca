@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Usuario</h2>

	<a href="{{route('usuarios.index')}}">Regresar</a>

	<form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		@csrf
		<label  for="usuario">Usuario:<label>
		<input type="text" name="usuario" placeholder="Usuario">
		<label  for="password">Contraseña:<label>
		<input type="text" name="password" placeholder="Contraseña">
		<label for="">Tipo</label>
		<select name="role_id">
			@foreach($roles as $rol)
			<option value="{{ $rol->id }}">{{ $rol->rol }}</option>}
			@endforeach
		</select>
		
		<label  for="imagen_id">Foto:<label>
		<input name="imagen_id" type="file">
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection