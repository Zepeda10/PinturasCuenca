@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Ventas</h2>

	<form action="{{route('verventas.index',$folio,$users)}}" method="get" accept-charset="utf-8">
		<label for="folio">Buscar:</label>
		<input type="text" name="folio" placeholder="Folio">

		<label  for="user_id">Usuario:<label>
		<select name="user_id" id="select_user_id">
			<option value="0">Usuario</option>
			@foreach($users as $user)
			<option value="{{ $user->id }}">{{ $user->usuario }}</option>
			@endforeach
	</select>

		<button type="submit">Buscar</button>
	</form>



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

	{{ $ventas->appends(request()->input())->links() }} 

@endsection

@section("pie")
@endsection