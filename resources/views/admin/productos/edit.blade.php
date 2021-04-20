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
		<input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
		@error('nombre')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="cod_barras">Código de Barras:<label>
		<input type="text" name="cod_barras" value="{{ old('cod_barras', $producto->cod_barras) }}">
		@error('cod_barras')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="descripcion">Descripción:<label>
		<input type="text" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
		@error('descripcion')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="stock">Stock:<label>
		<input type="text" name="stock" value="{{ old('stock', $producto->stock) }}">
		@error('stock')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="precio_compra">Precio de Compra:<label>
		<input type="text" name="precio_compra" value="{{ old('precio_compra', $producto->precio_compra) }}">
		@error('precio_compra')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="precio_venta">Precio de Venta:<label>
		<input type="text" name="precio_venta" value="{{ old('precio_venta', $producto->precio_venta) }}">
		@error('precio_venta')
			<small>*{{ $message }}</small>
		@enderror

		<label  for="iva">IVA:<label>
		<input type="text" name="iva" value="{{ old('iva', $producto->iva) }}">
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
		
		<img src="/images/{{$producto->imagen ? $producto->imagen->url :  'generico.jpg' }}" width="100"/>
		<label  for="imagen_id">Imagen:<label>
		<input name="imagen_id" type="file">

		<input type="submit" name="enviar" value="Actualizar">
	</form>
	
@endsection

@section("pie")
@endsection