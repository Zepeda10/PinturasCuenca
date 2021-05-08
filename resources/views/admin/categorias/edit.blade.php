@extends("../layouts.master")

@section('title', 'Categorías')

@section("body")

	<h2 class="titulo">Editar Categoría</h2>

	<div class="mb-4 mt-2">
		<a class="text-green-700 hover:text-green-600" href="{{route('categorias.index')}}">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
			</svg>
			<span class="absolute -my-5 mx-6 font-semibold">Regresar</span>
		</a> 
	</div>


	<div class="mt-3">
		<label for="categoria" class="block text-sm font-medium text-gray-700">Categoría</label>
		<form action="{{route('categorias.update',$categoria)}}" method="post" accept-charset="utf-8">
			@csrf
			@method('put')
			<div class="grid grid-cols-6 gap-6">
				<div class="col-span-6 sm:col-span-2">
					<input type="text" name="categoria" value="{{$categoria->categoria}}">
				</div>
				@error('categoria')
					<small class="absolute text-red-600 mt-9 ml-1">*{{ $message }}</small>
				@enderror

				<div class="absolute mt-14 ml-72">
					<div class="ml-4">
						<button type="submit" class="btn-enviar" name="enviar">Actualizar</button>
					</div>
				</div>
			</div>		
		</form>
	</div>
	
@endsection

@section("pie")
@endsection