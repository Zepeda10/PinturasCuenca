@extends("../layouts.master")

@section("body")
	
	<h2 class="titulo">Usuarios</h2>

	<div class="mt-3">
		<label for="buscar" class="block text-sm font-medium text-gray-700">Buscar</label>	
		<div class="grid grid-cols-6 gap-6">
			<div class="col-span-6 sm:col-span-2">
				<input type="text" id="autocomplete-search" placeholder="Nombre, Rol">
			</div>
			<div class="col-span-6 sm:col-span-1">
				<button type="submit" class="btn-buscar">Buscar</button>
			</div>
		</div>			
	</div>

	<div class="mt-4 -ml-3">   
		<a class="btn-agregar hover:no-underline" href="{{route('usuarios.create')}}">Agregar</a>
	</div>

	<div class="mt-4">        
        <div class="mt-6">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-sm rounded-lg overflow-hidden">

					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Usuario</th>
								<th>Tipo</th>
								<th>Editar</th>
								<th>Eliminar</th> 
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
								<tr>
									<td>{{$usuario->id}}</td>
									<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
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
										<td>{{$usuario->role->rol}}</td>
									@else
										<td>Sin rol</td>
									@endif
									
									<td>
										<a href="{{route('usuarios.edit', $usuario->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>
									<td>
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('js/confirmacion-eliminar.js')}}"></script>

	<script>
			
		$("#autocomplete-search").easyAutocomplete({
		    url: function(search) {
		        return "{{route('usuarios.search')}}?search=" + search;
		    },
		 
		   //getValue: "usuario",
		   getValue: function(element) {
        	return element.usuario +" - "+ element.rol;
    	   }, 
	  
		    list: {
		        onChooseEvent: function() {
		            var selectedUser = $("#autocomplete-search").getSelectedItemData();
					console.log(selectedUser);
		           window.location = "{{url('admin/usuarios')}}" + "/" + selectedUser.id;
		        }
		    }
		});
	</script>




@endsection

@section("pie")
@endsection