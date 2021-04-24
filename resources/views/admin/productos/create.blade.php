@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	<h2>Crear Producto</h2>

	<a href="{{route('productos.index')}}">Regresar</a>

	<form action="{{route('productos.store')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
		@csrf
		<label  for="nombre">Producto:<label>
		<input type="text" name="nombre" placeholder="Producto" value="{{ old('nombre') }}">
		@error('nombre')
			<small>*{{ $message }}</small>
		@enderror 

		<label  for="cod_barras">Código de Barras:<label>
		<input type="text" name="cod_barras" placeholder="Código de Barras" value="{{ old('cod_barras') }}">
		@error('cod_barras')
			<small>*{{ $message }}</small>
		@enderror

		<label for="descripcion">Descripción:<label>
		<textarea name="descripcion" placeholder="Descripción">{{ old('descripcion') }}</textarea>
		@error('descripcion')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="stock">Stock:<label>
		<input type="text" name="stock" placeholder="Stock" value="{{ old('stock') }}">
		@error('stock')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="precio_compra">Precio de Compra:<label>
		<input type="text" name="precio_compra" placeholder="Precio de Compra" value="{{ old('precio_compra') }}">
		@error('precio_compra')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="precio_venta">Precio de Venta:<label>
		<input type="text" name="precio_venta" placeholder="Precio de Venta" value="{{ old('precio_venta') }}">
		@error('precio_venta')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="iva">IVA:<label>
		<input type="text" name="iva" placeholder="IVA" value="{{ old('iva') }}">
		@error('iva')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="categoria_id">Categoría:<label>
		<select name="categoria_id">
			@foreach($categorias as $categoria)
			<option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>}
			@endforeach
		</select>

		@error('categoria_id')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="proveedor_id">Proveedor:<label>
		<select name="proveedor_id">
			@foreach($proveedores as $proveedor)
			<option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>}
			@endforeach
		</select>

		@error('proveedor_id')
			<small>*{{ $message }}</small>
		@enderror
		
		<label  for="imagen_id">Imagen:<label>
		<input name="imagen_id" type="file">
		
		<input type="submit" name="enviar" value="Añadir">
	</form>

@endsection

@section("pie")
@endsection