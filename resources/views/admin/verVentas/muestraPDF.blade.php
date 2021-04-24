	
<h2>{{ $title }}</h2>
<h3>Creación del reporte: {{ $date }}</h3>

<p>Folio: {{ $venta->folio }}</p>
<p>Total: {{ $venta->total }}</p>
<p>Usuario: {{ $venta->user->usuario }}</p>
<p>Fecha: {{ $venta->created_at }}</p>

<table border="1">
	<thead>
		<tr>
			<th>Id</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Precio Individual</th>
		</tr>
	</thead>
	<tbody>
		@foreach($detalle as $d)
			<tr>
				<td>{{$d->id}}</td>
				<td>{{$d->nombre}}</td>
				<td>{{$d->cantidad}}</td>
				<td>{{$d->precio_individual}}</td>		
			</tr>
        @endforeach	        
	</tbody>
</table>
