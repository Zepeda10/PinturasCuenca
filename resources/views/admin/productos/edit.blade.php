@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Editar Producto</h2>

	<a href="{{route('productos.index')}}">Regresar</a>

	<form action="{{route('productos.update',$producto)}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		@csrf
		@method('put')
		<label  for="nombre">Producto:<label>
		<input type="text" name="nombre" value="{{$producto->nombre}}">
		<label  for="cod_barras">Código de Barras:<label>
		<input type="text" name="cod_barras" value="{{$producto->cod_barras}}">
		<label  for="descripcion">Descripción:<label>
		<input type="text" name="descripcion" value="{{$producto->descripcion}}">
		<label  for="stock">Stock:<label>
		<input type="text" name="stock" value="{{$producto->stock}}">
		<label  for="precio_compra">Precio de Compra:<label>
		<input type="text" name="precio_compra" value="{{$producto->precio_compra}}">
		<label  for="precio_venta">Precio de Venta:<label>
		<input type="text" name="precio_venta" value="{{$producto->precio_venta}}">
		<label  for="iva">IVA:<label>
		<input type="text" name="iva" value="{{$producto->iva}}">
		<label  for="categoria_id">Categoría:<label>
		<select name="categoria_id">
			@foreach($categorias as $categoria)
			<option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>}
			@endforeach
		</select>
		<label  for="proveedor_id">Proveedor:<label>
		<select name="proveedor_id">
			@foreach($proveedores as $proveedor)
			<option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>}
			@endforeach
		</select>
		<img src="/images/{{$producto->imagen ? $producto->imagen->url :  'generico.jpg' }}" width="100"/>
		<label  for="imagen_id">Imagen:<label>
		<input name="imagen_id" type="file">

		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection