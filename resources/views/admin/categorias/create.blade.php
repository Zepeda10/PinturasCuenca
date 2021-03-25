@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Categoria</h2>

	<form action="{{route('categorias.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="categoria">Categoria:<label>
		<input type="text" name="categoria" placeholder="Categoria">
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection