@extends("../layouts.master")

@section("body")

	<h2>Crear Categoria</h2>

	<a href="{{route('proveedores.index')}}">Regresar</a>

	<form action="{{route('proveedores.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="nombre">Proveedor:<label>
		<input type="text" name="nombre" placeholder="Proveedor" value="{{ old('nombre') }}">
		@error('nombre')
			<small>*{{ $message }}</small>
		@enderror 

		<label  for="rfc">RFC:<label>
		<input type="text" name="rfc" placeholder="RFC" value="{{ old('rfc') }}">
		@error('rfc')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="direccion">Dirección:<label>
		<textarea name="direccion" placeholder="Dirección">{{ old('direccion') }}</textarea>
		@error('direccion')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="email">Email:<label>
		<input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
		@error('email')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="telefono">Teléfono:<label>
		<input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
		@error('telefono')
			<small>*{{ $message }}</small>
		@enderror
		
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection