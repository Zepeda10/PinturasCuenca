@extends("../layouts.master")

@section('title', 'Proveedores')

@section("body")

	<h2 class="titulo">Editar Proveedor</h2>

	<div class="mb-4 mt-2">
		<a class="flex items-center text-green-700 hover:text-green-600 hover:no-underline" href="{{route('proveedores.index')}}">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
			</svg>
			<span class="-my-5 mx-1 font-semibold">Regresar</span>
		</a> 
	</div>

	<div class="mt-3">
		<form action="{{route('proveedores.update',$proveedor)}}" method="post" accept-charset="utf-8">
			@csrf
			@method('put')

			<div class="grid grid-cols-3 gap-4">
				<div class="col-start-1 col-end-2">
					<label  for="nombre">Proveedor</label>
					<input type="text" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}">
					@error('nombre')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="rfc">RFC</label>
					<input type="text" name="rfc" value="{{ old('rfc', $proveedor->rfc) }}">
					@error('rfc')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="direccion">Dirección</label>
					<textarea name="direccion">{{ old('direccion', $proveedor->direccion) }}</textarea>
					@error('direccion')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="email">Email</label>
					<input type="text" name="email" value="{{ old('email', $proveedor->email) }}">
					@error('email')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label class="block text-sm font-medium text-gray-700" for="telefono">Teléfono</label>
					<input type="text" name="telefono" value="{{ old('telefono', $proveedor->telefono) }}">
					@error('telefono')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-2 -ml-3">	
					<div class="col-start-2 ml-80 mt-8">
						<button type="submit" class="btn-enviar px-3" name="enviar">Actualizar</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	
@endsection

@section("pie")
@endsection