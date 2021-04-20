@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Editar Usuario</h2>

	<a href="{{route('usuarios.index')}}">Regresar</a>

	<form action="{{route('usuarios.update',$usuario)}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		@csrf
		@method('put')
		<label  for="usuario">Usuario:<label>
		<input type="text" name="usuario" value="{{ old('usuario', $usuario->usuario) }}">
		@error('usuario')
			<small>*{{ $message }}</small>
		@enderror
		
		<select name="role_id">
			@foreach($roles as $rol)
			<option value="{{ $rol->id }}">{{ $rol->rol }}</option>}
			@endforeach
		</select>
		<img src="/images/{{$usuario->imagen ? $usuario->imagen->url :  'generico.jpg' }}" width="100"/>
		<label  for="imagen_id">Foto:<label>
		<input name="imagen_id" type="file">
		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection