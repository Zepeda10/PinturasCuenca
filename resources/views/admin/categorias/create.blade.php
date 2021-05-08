@extends("../layouts.master")

@section("body")

	<h2>Crear Categoria</h2>

	<a href="{{route('categorias.index')}}">Regresar</a>

	<form action="{{route('categorias.store')}}" method="post" accept-charset="utf-8">
		@csrf
		<label  for="categoria">Categoria:<label>
		<input type="text" name="categoria" placeholder="Categoria">
		@error('categoria')
			<small>*{{ $message }}</small>
		@enderror
		
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection