@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Ventas</h2>


	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Folio</th>
				<th>Total</th>
				<th>Usuario</th>
				<th>Fecha</th>
				<th>Detalles</th>
			</tr>
		</thead>
		<tbody>
			@foreach($ventas as $venta)
				<tr>
					<td>{{$venta->id}}</td>
					<td>{{$venta->folio}}</td>
					<td>{{$venta->total}}</td>
					<td>{{$venta->user->usuario}}</td>
					<td>{{$venta->created_at}}</td>
					<td><a href="{{route('ventas.show', $venta->id)}}">Ver</a></td>			
				</tr>
	        @endforeach	        
		</tbody>
	</table>

		{{ $ventas->links() }}

@endsection

@section("pie")
@endsection