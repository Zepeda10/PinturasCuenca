@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Show Venta</h2>


	<a href="{{route('verventas.index')}}">Regresar</a>

		<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Folio</th>
				<th>Total</th>
				<th>Usuario</th>
				<th>Fecha</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>{{$venta->id}}</td>
				<td>{{$venta->folio}}</td>
				<td>{{$venta->total}}</td>
				<td>{{$venta->user->usuario}}</td>
				<td>{{$venta->created_at}}</td>			
			</tr>
     
		</tbody>
	</table>

@endsection

@section("pie")
@endsection