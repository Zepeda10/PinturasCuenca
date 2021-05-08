@extends("../layouts.master")

@section('title', 'Ver ventas')

@section("body")
	
	<h2 class="titulo"> Detalle de venta </h2>

	<div class="my-2">
	
			<a class="flex float-left mr-3 items-center text-green-700 hover:text-green-600 hover:no-underline" href="{{route('verventas.index')}}">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
				</svg>
				<span class="-my-5 mx-2 font-semibold">Regresar</span>
			</a>
				
			<a class="flex float-left items-center text-red-700 hover:text-red-600 hover:no-underline" href="{{route('verventas.pdf', $venta->id)}}">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
				</svg>
				<span class="-my-5 mx-2 font-semibold">PDF</span>
			</a>

		<div class="fixed grid grid-cols-1 gap-2 my-11 mx-0.5 text-base">
			<p><span class="font-semibold">Folio:</span> {{ $venta->folio }}</p>
			@if ($venta->user)
				<p><span class="font-semibold">Usuario:</span> {{$venta->user->usuario}}</p>
			@else
				<p>Sin usuario</tp>
			@endif
			<p><span class="font-semibold">Fecha:</span> {{ $venta->created_at }}</p>
		</div>
	</div>

	<div class="mt-36">        
        <div class="mt-6">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block w-11/12 shadow-sm rounded-lg overflow-hidden mx-12">
					<table class="table-fixed">
						<thead>
							<tr>
								<th class="w-20">Id</th>
								<th class="w-44">Producto</th>
								<th class="w-36">Cantidad</th>
								<th class="w-40">Precio Individual</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detalle as $d)
								<tr>
									<td>{{$d->id}}</td>
									<td>{{$d->nombre}}</td>
									<td>{{$d->cantidad}}</td>
									<td>{{$d->precio_individual}}</td>		
								</tr>
							@endforeach	        
						</tbody>
					</table>
				</div>
            </div>
        </div>
    </div>

	<div class="grid grid-cols-6 gap-4 text-lg -mt-3">
		<p class="ml-60 col-end-7 col-span-2"><span class="font-semibold">Total:</span> ${{ $venta->total }}</p>
	</div>


@endsection

@section("pie")
@endsection