@extends("../layouts.master")

@section("body")
	
	<h2 class="titulo">Ventas</h2>

	<div class="mt-3">
		<label for="folio" class="block text-sm font-medium text-gray-700">Buscar</label>
		<form action="{{route('verventas.index',$folio,$users)}}" method="get" accept-charset="utf-8">
			<div class="grid grid-cols-6 gap-6">
				<div class="col-span-6 sm:col-span-2">
					<input type="text" name="folio" placeholder="Folio">
				</div>
				<div class="col-span-6 sm:col-span-1">
					<select name="user_id" id="select_user_id">
						<option value="0">Usuario</option>
						@foreach($users as $user)
							<option value="{{ $user->id }}">{{ $user->usuario }}</option>
						@endforeach
					</select>
				</div>

				<div class="col-span-6 sm:col-span-1">
					<button type="submit" class="btn-buscar">Buscar</button>
				</div>		
			</div>
		</form>
	</div>
	
	<div class="mt-4">        
        <div class="mt-6">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block w-11/12 shadow-sm rounded-lg overflow-hidden mx-12">
					<table class="table-fixed">
						<thead>
							<tr>
								<th class="w-40">Id</th>
								<th class="w-72">Folio</th>
								<th class="w-72">Total</th>
								<th class="w-72">Usuario</th>
								<th class="w-72">Fecha</th>
								<th class="w-40">Detalles</th>
							</tr>
						</thead>
						<tbody>
							@foreach($ventas as $venta)
								<tr>
									<td>{{$venta->id}}</td>
									<td>{{$venta->folio}}</td>
									<td>{{$venta->total}}</td>

									@if ($venta->user)
									<td>{{$venta->user->usuario}}</td>
									@else
										<td>Sin usuario</td>
									@endif
									
									<td>{{$venta->created_at}}</td>
									<td>
										<a href="{{route('ventas.show', $venta->id)}}">
										<div class="h-8 w-8 bg-blue-700 hover:bg-blue-600 flex items-center justify-center rounded-md shadow-xl">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
												<path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
												<path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
											</svg>
										</div>
											
										</a>
									</td>			
								</tr>
							@endforeach	        
						</tbody>
					</table>
                </div>
				<div class="mt-3">
					{{ $ventas->appends(request()->input())->links() }} 
				</div>
            </div>
        </div>
    </div>

	
@endsection

@section("pie")
@endsection