@extends("../layouts.master")

@section("body")

	<h2 class="titulo">Productos</h2>
	
	<div class="mt-3">
		<label for="buscar" class="block text-sm font-medium text-gray-700">Buscar</label>
		<form action="{{route('productos.index',$buscar,$categorias)}}" method="get" accept-charset="utf-8">
			<div class="grid grid-cols-6 gap-6">
				<div class="col-span-6 sm:col-span-2">
					<input type="text" name="buscar" placeholder="Producto, Código de barras">
				</div>

				<div class="col-span-6 sm:col-span-1">
					<select name="categoria_id" id="select_categoria_id">
						<option value="0">Categoría</option>
						@foreach($categorias as $categoria)
						<option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
						@endforeach
					</select>
				</div>

				<div class="col-span-6 sm:col-span-1">
					<button type="submit" class="btn-buscar">Buscar</button>
				</div>
				
			</div>
		</form>
	</div>

	<div class="mt-4 -ml-3">  
		<a class="btn-agregar hover:no-underline" href="{{route('productos.create')}}">Agregar</a>
	</div>
	
	<div class="mt-4">        
        <div class="mt-6">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">
					<table>
						<thead>
							<tr>
								<th class="w-14">Id</th>
								<th class="w-36">Producto</th>
								<th class="w-32">Código Barras</th>
								<th class="w-36">Descripción</th>
								<th class="w-14">Stock</th>
								<th class="w-32">Precio Compra</th>
								<th class="w-32">Precio Venta</th>
								<th class="w-14">IVA</th>
								<th class="w-32">Categoría</th>
								<th class="w-36">Proveedor</th>
								<th class="w-32">Imagen</th>
								<th class="w-11">Editar</th>
								<th class="w-11">Eliminar</th>
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
										<td><img class="rounded-sm w-20 h-12" src="/images/{{$producto->imagen->url}}" width="100"/></td> 
									@else
										<td><img class="rounded-sm w-20 h-12" src="/images/generico.jpg" width="100"/></td> 
									@endif
									<td>
										<a href="{{route('productos.edit', $producto->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>
									<td>
										<form class="form-eliminar" action="{{route('productos.destroy',$producto)}}" method="post" accept-charset="utf-8">
											@csrf
											@method('delete')
											<button type="submit">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-800 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</svg>
											</button>
										</form>
									</td>
								</tr>
							@endforeach	        
						</tbody>
					</table>
                </div>
				<div class="mt-3">
					{{ $productos->appends(request()->input())->links() }} 
				</div>		
            </div>
        </div>
    </div>
	
	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/admin/productos.js') }}"></script>
	
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('js/confirmacion-eliminar.js')}}"></script>
 

@endsection

@section("pie")
@endsection