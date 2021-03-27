@extends("../layouts.plantilla")

@section("cabecera")
@endsection

@section("contenido")
	
	<h2>Usuarios</h2>

	<label for="autocomplete-search">Buscar:</label>
	<input type="text" id="autocomplete-search" placeholder="Nombre, Rol">

	<a href="{{route('usuarios.create')}}">Agregar</a>

	<table border="1">
		<thead>
			<tr>
				<th>Id</th>
				<th>Usuario</th>
				<th>Tipo</th>
				<th>Foto</th>
				<th>Editar</th>
				<th>Eliminar</th> 
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
				<tr>
					<td>{{$usuario->id}}</td>
					<td>{{$usuario->usuario}}</td>
					<td>{{$usuario->role->rol}}</td>
					@if ($usuario->imagen)
						<td><img src="/images/{{$usuario->imagen->url}}" width="100"/></td> 
					@else
						<td><img src="/images/generico.jpg" width="100"/></td> 
					@endif
					<td><a href="{{route('usuarios.edit', $usuario->id)}}">Editar</a></td>
					<td>
						<form action="{{route('usuarios.destroy',$usuario)}}" method="post" accept-charset="utf-8">
							@csrf
							@method('delete')
							<button type="submit">Eliminar</button>
						</form>
					</td>
				</tr>
	        @endforeach	        
		</tbody>
	</table>

	{{ $usuarios->links() }}

	<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('js/easy/jquery.easy-autocomplete.min.js')}}"></script>

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
		           window.location = "{{url('admin/usuarios')}}" + "/" + selectedUser.id;
		        }
		    }
		});
	</script>




@endsection

@section("pie")
@endsection