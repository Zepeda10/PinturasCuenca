@extends("../layouts.master")

@section('title', 'Usuarios')

@section("body")

	<h2 class="titulo">Crear Usuario</h2>

	<div class="mb-4 mt-2">
		<a class="text-green-700 hover:text-green-600" href="{{route('usuarios.index')}}">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
			</svg>
			<span class="absolute -my-5 mx-6 font-semibold">Regresar</span>
		</a> 
	</div>

	<div class="mt-3">
		<form action="{{route('usuarios.store')}}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
			@csrf
			
			<div class="grid grid-cols-3 gap-4">
				<div class="col-start-1 col-end-2">
					<label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
					<input type="text" name="usuario" placeholder="Usuario" value="{{ old('usuario') }}">
					@error('usuario')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				
				<div class="col-start-1 col-end-2">
					<label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
					<input type="text" name="password" placeholder="Contraseña" value="{{ old('password') }}">
					@error('password')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>

				<div class="col-start-1 col-end-2">
					<label for="email" class="block text-sm font-medium text-gray-700">Email</label>
					<input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
					@error('email')
						<small class="text-red-600 mt-9 ml-1">*{{ $message }}</small>
					@enderror
				</div>
				

				<div class="col-start-1 col-end-2">
					<label for="imagen_id" class="block text-sm font-medium text-gray-700">Foto</label>
					<input name="imagen_id" type="file">
				</div>

				<div class="col-start-1">
					<label for="role_id" class="block text-sm font-medium text-gray-700">Tipo</label>
					<select name="role_id">
						@foreach($roles as $rol)
						<option value="{{ $rol->id }}">{{ $rol->rol }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-start-1 ml-2.5">	
					<div class="col-start-1 ml-80">
						<button type="submit" class="btn-enviar px-3" name="enviar">Añadir</button>
					</div>
				</div>	
			</div>
		</form>
	</div>

@endsection

@section("pie")
@endsection