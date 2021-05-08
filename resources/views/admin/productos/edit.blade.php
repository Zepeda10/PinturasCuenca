@extends("../layouts.master")

@section("body")

	<h2 class="titulo">Editar Producto</h2>

	<div class="mb-4 mt-2">
		<a class="flex items-center text-green-700 hover:text-green-600 hover:no-underline" href="{{route('productos.index')}}">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
			</svg>
			<span class="-my-5 mx-1 font-semibold">Regresar</span>
		</a> 
	</div>

	<img class="rounded-sm" src="/images/{{$producto->imagen ? $producto->imagen->url :  'generico.jpg' }}" width="100"/>

	<div class="mt-3">
		<form action="{{route('productos.update',$producto)}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			@csrf
			@method('put')

			<div class="grid grid-cols-3 gap-4">
				<div class="col-start-1 col-end-2">
					<label for="nombre" class="block text-sm font-medium text-gray-700">Producto</label>
					<input type="text" name="nombre" placeholder="Producto" value="{{ old('nombre', $producto->nombre) }}">
					@error('nombre')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror 
				</div>

				<div class="col-start-2 col-end-2">
				    <label for="cod_barras" class="block text-sm font-medium text-gray-700">Código de Barras</label>
					<input type="text" name="cod_barras" placeholder="Código de Barras" value="{{ old('cod_barras', $producto->cod_barras) }}">
					@error('cod_barras')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>
				
				<div class="col-start-1 col-end-2">
					<label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
					<textarea name="descripcion" placeholder="Descripción">{{ old('descripcion', $producto->descripcion) }}</textarea>
					@error('descripcion')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="stock">Stock</label>
					<input type="text" name="stock" placeholder="Stock" value="{{ old('stock', $producto->stock) }}">
					@error('stock')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="precio_compra">Precio de Compra</label>
					<input type="text" name="precio_compra" placeholder="Precio de Compra" value="{{ old('precio_compra', $producto->precio_compra) }}">
					@error('precio_compra')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="precio_venta">Precio de Venta</label>
					<input type="text" name="precio_venta" placeholder="Precio de Venta" value="{{ old('precio_venta', $producto->precio_venta) }}">
					@error('precio_venta')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="imagen_id">Imagen</label>
					<input name="imagen_id" type="file">
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="iva">IVA</label>
					<input type="text" name="iva" placeholder="IVA" value="{{ old('iva', $producto->iva) }}">
					@error('iva')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="categoria_id">Categoría</label>
					<select name="categoria_id">
						@foreach($categorias as $categoria)
						<option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
						@endforeach
					</select>

					@error('categoria_id')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="proveedor_id">Proveedor</label>
					<select name="proveedor_id">
						@foreach($proveedores as $proveedor)
						<option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
						@endforeach
					</select>

					@error('proveedor_id')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>
				
				<div class="col-start-2 -ml-3">	
					<div class="col-start-2 ml-80">
						<button type="submit" class="btn-enviar px-3" name="enviar">Actualizar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	
@endsection

@section("pie")
@endsection