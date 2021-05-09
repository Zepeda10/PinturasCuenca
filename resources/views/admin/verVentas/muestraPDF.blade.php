<!DOCTYPE html>
<head>
	<style>
		body{
			font-family: sans-serif;
		}
		@page {
			margin: 160px 50px;
		}
		header { 
			position: fixed;
			left: 0px;
			top: -160px;
			right: 0px;
			height: 100px;
			text-align: center;
		}
		header h1{
			margin-top: 25px;
		}
		header h2{
			
		}
		footer {
			position: fixed;
			left: 0px;
			bottom: -50px;
			right: 0px;
			height: 40px;
			border-bottom: 2px solid #ddd;
		}
		footer .page:after {
			content: counter(page);
		}
		footer table {
			width: 100%;
		}
		footer p {
			text-align: right;
		}
		footer .izq {
			text-align: left;
		}

		.logo{
			position: absolute;
			width: 45px;
			height: 45px;
			margin-top: 23px;
			margin-left: 90px;
		}

		.tbl {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		.tbl td, .tbl th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		.tbl tr:nth-child(even){
			background-color: #f2f2f2;
		}

		.tbl th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #141414;
			color: white;
		}

		.der {
			text-align: right;
		}

	</style>
</head>
<body>
	<header>
	<img class="logo" src="{{public_path('/images/logo2.jpg')}}">
		<h1>Pinturas de la Cuenca</h1>
		<h2>{{ $title }}</h2>
	</header>

	<div class="content">		
		<h3>Creación del reporte: {{ $date }}</h3>
		<p><b>Folio:</b> {{ $venta->folio }}</p>
		@if($venta->user)
			<p><b>Usuario:</b> {{ $venta->user->usuario }}</p>
		@else
			<p>Sin usuario</p>
		@endif

		<p><b>Fecha de venta:</b> {{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y')}}</p>

		<table class="tbl">
			<thead>
				<tr>
					<th>Id</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio Individual</th>
				</tr>
			</thead>
			<tbody>
				@foreach($detalle as $d)
					<tr>
						<td>{{$d->id}}</td>
						<td>{{$d->nombre}}</td>
						<td>{{$d->cantidad}}</td>
						<td>$ {{$d->precio_individual}}</td>		
					</tr>
				@endforeach	        
			</tbody>
		</table>
		<p class="der"><b>Total:</b> ${{ $venta->total }}</p>
	</div>
	
	<footer>
	<table>
      <tr>
        <td>
            <p class="izq">
              
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
	</footer>
</body>
</html>
