@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Editar Proveedor</h2>

	<a href="{{route('proveedores.index')}}">Regresar</a>

	<form action="{{route('proveedores.update',$proveedor)}}" method="post" accept-charset="utf-8">
		@csrf
		@method('put')
		<label  for="nombre">Proveedor:<label>
		<input type="text" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}">
		@error('nombre')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="rfc">RFC:<label>
		<input type="text" name="rfc" value="{{ old('rfc', $proveedor->rfc) }}">
		@error('rfc')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="direccion">Dirección:<label>
		<textarea name="direccion">{{ old('direccion', $proveedor->direccion) }}</textarea>
		@error('direccion')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="email">Email:<label>
		<input type="text" name="email" value="{{ old('email', $proveedor->email) }}">
		@error('email')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="telefono">Teléfono:<label>
		<input type="text" name="telefono" value="{{ old('telefono', $proveedor->telefono) }}">
		@error('telefono')
			<small>*{{ $message }}</small>
		@enderror

		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection