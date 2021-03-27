@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Categoria</h2>

	<a href="{{route('proveedores.index')}}">Regresar</a>

	<form action="{{route('proveedores.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="nombre">Proveedor:<label>
		<input type="text" name="nombre" placeholder="Proveedor">
		<label  for="rfc">RFC:<label>
		<input type="text" name="rfc" placeholder="RFC">
		<label  for="direccion">Dirección:<label>
		<input type="text" name="direccion" placeholder="Dirección">
		<label  for="email">Email:<label>
		<input type="text" name="email" placeholder="Email">
		<label  for="telefono">Teléfono:<label>
		<input type="text" name="telefono" placeholder="Teléfono">
		
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection