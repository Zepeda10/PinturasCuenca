@extends("../layouts.master")

@section("body")

	<h2 class="titulo">Categorías</h2>
      
        <div class="mt-2">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4">
				<div class="mb-4 ml-4">    
					<a class="ml-4 btn-agregar hover:no-underline" href="{{route('categorias.create')}}">Agregar</a>
				</div>
                <div class="inline-block w-11/12 shadow-sm rounded-lg overflow-hidden mx-12 mt-1 ml-14">
					<table>
						<thead>
							<tr>
								<th class="w-24">Id</th>
								<th class="w-48">Categoría</th>
								<th class="w-24">Editar</th>
								<th class="w-24">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categorias as $categoria)
								<tr>
									<td>{{$categoria->id}}</td>
									<td>{{$categoria->categoria}}</td>
									<td>
										<a href="{{route('categorias.edit', $categoria->id)}}">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700 hover:text-green-500" viewBox="0 0 20 20" fill="currentColor">
												<path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
												<path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
											</svg>
										</a>
									</td>
									<td>
										<form class="form-eliminar" action="{{route('categorias.destroy',$categoria)}}" method="post" accept-charset="utf-8">
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
            </div>
        </div>

	<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{asset('js/confirmacion-eliminar.js')}}"></script>
	


@endsection

@section("pie")
@endsection