@extends("../layouts.master")

@section('title', 'Usuarios')

@section("body")

@if(session('msg-alert') == 'eliminado' || session('msg-alert') == 'actualizado' || session('msg-alert') == 'agregado')
	<div class="px-6 py-3 border-1 border-green-400 rounded relative mb-2 -mt-7 bg-green-100 text-green-500">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex float-left mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
		</svg>
		<span class="inline-block align-middle mr-8">
			¡Registro <b>{{session('msg-alert')}}</b> exitósamente!
		</span>
		<button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-3 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
			<span>×</span>
		</button>
	</div>
@endif
	
	<h2 class="titulo">Usuarios</h2>

	<div class="mt-3">
		<label for="buscar" class="block text-sm font-medium text-gray-700">Buscar</label>
		<form action="{{route('usuarios.index',$buscar)}}" method="get" accept-charset="utf-8">
			<div class="grid grid-cols-6 gap-6">
				<div class="col-span-6 sm:col-span-2">
					<input type="text" name="buscar" placeholder="Usuario">
				</div>

				<div class="col-span-6 sm:col-span-1">
					<button type="submit" class="btn-buscar">Buscar</button>
				</div>			
			</div>
		</form>
	</div>

	<div class="mt-4 -ml-3">   
		<a class="btn-agregar hover:no-underline" href="{{route('usuarios.create')}}">Agregar</a>
	</div>

	<div class="mt-4">        
        <div class="mt-6">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden ml-2">
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Usuario</th>
								<th>Tipo</th>
								<th>Email</th>
								<th>Editar</th>
								<th>Eliminar</th> 
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
								<tr>
									<td>{{$usuario->id}}</td>
									<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-11 h-11">
											@if ($usuario->imagen)
												<img class="w-full h-full rounded-full" src="/images/{{$usuario->imagen->url}}" alt="" />
											@else
												<img class="w-full h-full rounded-full" src="/images/generico.jpg" alt="" />
											@endif
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">{{$usuario->usuario}}</p>
                                        </div>
                                    </div>
                                </td>
									@if ($usuario->role)
										<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">{{$usuario->role->rol}}</td>
									@else
										<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
											<span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
												<span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
												<span class="relative">Sin rol</span>
											</span>
										</td>
									@endif

									<td>{{$usuario->email}}</td>

									@if (Auth::user()->id == 1 and $usuario->id == 1)

									<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
										<a href="{{route('usuarios.edit', $usuario->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>

									@elseif (Auth::user()->id !=1 and $usuario->id == 1)
									
									<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
									<div class="to">
										<span class="tooltiptext2">No tiene permisos para esta acción</span>
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-800 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
										</svg>
										</div>
									</td>

									@else

									<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
										<a href="{{route('usuarios.edit', $usuario->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>

									@endif

									@if($usuario->id == 1)
									<td>
										<div class="to">
										<span class="tooltiptext2">Admin Default</span>
											<svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-blue-800 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
											</svg>
										</div>									
									</td>

									@else
									<td class="px-4 py-4 border-b border-gray-200 bg-white text-sm">
										<form action="{{route('usuarios.destroy',$usuario)}}" method="post" accept-charset="utf-8" class="form-eliminar">
											@csrf
											@method('delete')
											<button type="submit">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-800 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</svg>
											</button>
										</form>
									</td>
										
									@endif

									

									
								</tr>
							@endforeach	        
						</tbody>
					</table>
                </div>
				<div class="mt-3">
					{{ $usuarios->links() }}
				</div>
            </div>
        </div>
    </div>

	<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('js/easy/jquery.easy-autocomplete.min.js')}}"></script>

	<script>
			
		
		function closeAlert(event){
			let element = event.target;
			while(element.nodeName !== "BUTTON"){
			element = element.parentNode;
			}
			element.parentNode.parentNode.removeChild(element.parentNode);
		}


	</script>




@endsection

@section("pie")
@endsection