@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Producto</h2>

	<form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		@csrf
		<label  for="nombre">Producto:<label>
		<input type="text" name="nombre" placeholder="Producto">
		<label  for="cod_barras">Código de Barras:<label>
		<input type="text" name="cod_barras" placeholder="Código de Barras">
		<label  for="descripcion">Descripción:<label>
		<input type="text" name="descripcion" placeholder="Descripción">
		<label  for="stock">Stock:<label>
		<input type="text" name="stock" placeholder="Stock">
		<label  for="precio_compra">Precio de Compra:<label>
		<input type="text" name="precio_compra" placeholder="Precio de Compra">
		<label  for="precio_venta">Precio de Venta:<label>
		<input type="text" name="precio_venta" placeholder="Precio de Venta">
		<label  for="iva">IVA:<label>
		<input type="text" name="iva" placeholder="IVA">

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
		
		<label  for="imagen_id">Imagen:<label>
		<input name="imagen_id" type="file">
		
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection