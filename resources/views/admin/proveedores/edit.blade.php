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
		<input type="text" name="nombre" value="{{$proveedor->nombre}}">
		<label  for="rfc">RFC:<label>
		<input type="text" name="rfc" value="{{$proveedor->rfc}}">
		<label  for="direccion">Dirección:<label>
		<input type="text" name="direccion" value="{{$proveedor->direccion}}">
		<label  for="email">Email:<label>
		<input type="text" name="email" value="{{$proveedor->email}}">
		<label  for="telefono">Teléfono:<label>
		<input type="text" name="telefono" value="{{$proveedor->telefono}}">

		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection