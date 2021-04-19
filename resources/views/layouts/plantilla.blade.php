<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>
	<div id="app">
        <div class="container">      
             @guest
               
                <p>No estás logueado</p>    

               @else
                    @if (Auth::user()->role_id == 1)
                          
                    <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->usuario }}
                    </a>
      
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    <div class="cabecera">
						@yield("cabecera")

						<h2>Cabecera</h2>
						<a href="{{route('admin.welcome')}}">Inicio</a>
						<a href="{{route('roles.index')}}">Roles</a>
						<a href="{{route('usuarios.index')}}">Usuarios</a>
						<a href="{{route('productos.index')}}">Productos</a>
						<a href="{{route('categorias.index')}}">Categorias</a>
						<a href="{{route('proveedores.index')}}">Proveedores</a>
                        <a href="{{route('verventas.index')}}">Ventas</a>
						<a href="{{route('ventas.index')}}">Realizar venta</a>
				                                       
					</div>
                                                                                  
        </div>
    </div>


	<div class="contenido"> @yield("contenido") </div>

	<div class="pie"> 
		@yield("pie")
		Zona de pie 
	</div>
	
</body>
</html>
@endif

 @if (Auth::user()->role_id == 2)
    <script>window.location = "/ventas";</script>
 @endif

@endguest