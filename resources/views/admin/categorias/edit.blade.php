@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Editar Categoría</h2>

	<a href="{{route('categorias.index')}}">Regresar</a>

	<form action="{{route('categorias.update',$categoria)}}" method="post" accept-charset="utf-8">
		@csrf
		@method('put')
		<label  for="categoria">Categoria:<label>
		<input type="text" name="categoria" value="{{$categoria->categoria}}">
		@error('categoria')
			<small>*{{ $message }}</small>
		@enderror
		
		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection