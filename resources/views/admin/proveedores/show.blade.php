@extends("../layouts.master")

@section("body")
	
	<h2>Show Proveedor</h2>

	<a href="{{route('proveedores.index')}}">Regresar</a>

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
		</tbody>
	</table>
	
@endsection

@section("pie")
@endsection