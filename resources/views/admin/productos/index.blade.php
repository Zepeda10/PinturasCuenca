@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Productos</h2>

	<a href="{{route('productos.create')}}">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Producto</th>
				<th>Código Barras</th>
				<th>Descripción</th>
				<th>Stock</th>
				<th>Precio Compra</th>
				<th>Precio Venta</th>
				<th>IVA</th>
				<th>Categoría</th>
				<th>Proveedor</th>
				<th>Imagen</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($productos as $producto)
				<tr>
					<td>{{$producto->id}}</td>
					<td>{{$producto->nombre}}</td>
					<td>{{$producto->cod_barras}}</td>
					<td>{{$producto->descripcion}}</td>
					<td>{{$producto->stock}}</td>
					<td>{{$producto->precio_compra}}</td>
					<td>{{$producto->precio_venta}}</td>
					<td>{{$producto->iva}}</td>
					<td>{{$producto->categoria->categoria}}</td>
					<td>{{$producto->proveedor->nombre}}</td>
					@if ($producto->imagen)
						<td><img src="/images/{{$producto->imagen->url}}" width="100"/></td> 
					@else
						<td><img src="/images/generico.jpg" width="100"/></td> 
					@endif
					<td><a href="{{route('productos.edit', $producto->id)}}">Editar</a></td>
					<td>
						<form action="{{route('productos.destroy',$producto)}}" method="post" accept-charset="utf-8">
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