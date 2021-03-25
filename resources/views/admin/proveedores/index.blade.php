@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Proveedores</h2>

	<a href="{{route('proveedores.create')}}">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Proveedor</th>
				<th>RFC</th>
				<th>Dirección</th>
				<th>Email</th>
				<th>Teléfono</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($proveedores as $proveedor)
				<tr>
					<td>{{$proveedor->id}}</td>
					<td>{{$proveedor->nombre}}</td>
					<td>{{$proveedor->rfc}}</td>
					<td>{{$proveedor->direccion}}</td>
					<td>{{$proveedor->email}}</td>
					<td>{{$proveedor->telefono}}</td>
					<td><a href="{{route('proveedores.edit', $proveedor->id)}}">Editar</a></td>
					<td>
						<form action="{{route('proveedores.destroy',$proveedor)}}" method="post" accept-charset="utf-8">
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