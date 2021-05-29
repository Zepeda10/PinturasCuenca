@extends("../layouts.master")

@section('title', 'Roles')

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

<h2 class="titulo">Roles</h2>

		<div class="mt-2">
            <div class="sm:-mx-8 px-4 sm:px-8 py-4">

                <div class="inline-block w-11/12 shadow-sm rounded-lg overflow-hidden mx-12 mt-1 ml-14">
                    <table>
                        <thead>
                            <tr>
                                <th class="w-24">Id</th>
                                <th class="w-48">Rol</th> 
                                <th class="w-24">Editar</th>
                                <th class="w-24">Información</th>
                            </tr>
                        </thead>
                        <tbody>
							@foreach($roles as $rol)
								<tr>
									<td>
										<p class="whitespace-no-wrap">{{$rol->id}}</p>
									</td>

									<td>
										<p class="whitespace-no-wrap">{{$rol->rol}}</p>
									</td>

									<td>
										<a href="{{route('roles.edit', $rol->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>

									@if($rol->id == 1)		
									<td>
										<div class="to">
										<span class="tooltiptext">Usuario con todos los permisos</span>
											<svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-blue-800 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
											</svg>
										</div>									
									</td>
									@elseif($rol->id == 2)
									<td>
										<div class="to">
										<span class="tooltiptext">Usuario con permiso de realizar ventas</span>
											<svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-blue-800 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
											</svg>
										</div>									
									</td>
										
									@endif

									
								</tr>
							@endforeach	  
                        </tbody>
                    </table>
                </div>
            </div>
		</div>

		<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
		<script src="{{ asset('js/admin/productos.js') }}"></script>

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