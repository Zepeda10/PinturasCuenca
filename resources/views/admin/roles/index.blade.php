@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Roles</h2>

	<a href="{{route('roles.create')}}">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Rol</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $rol)
				<tr>
					<td>{{$rol->id}}</td>
					<td>{{$rol->rol}}</td>
					<td><a href="{{route('roles.edit', $rol->id)}}">Editar</a></td>
					<td>
						<form action="{{route('roles.destroy',$rol)}}" method="post" accept-charset="utf-8">
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