@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Categorías</h2>

	<a href="{{route('categorias.create')}}">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Categoría</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categorias as $categoria)
				<tr>
					<td>{{$categoria->id}}</td>
					<td>{{$categoria->categoria}}</td>
					<td><a href="{{route('categorias.edit', $categoria->id)}}">Editar</a></td>
					<td>
						<form action="{{route('categorias.destroy',$categoria)}}" method="post" accept-charset="utf-8">
							@csrf
							@method('delete')
							<button type="submit">Eliminar</button>
						</form>
					</td>
				</tr>
	        @endforeach	        
		</tbody>
	</table>


@endsection

@section("pie")
@endsection