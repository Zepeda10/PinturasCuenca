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

                 @if (Auth::user()->role_id == 1)
                    <a href="{{route('admin.welcome')}}">Admin</a>
                 @endif
                                                                     
        </div>
    </div>

    <div>
        <h2>VENTAS</h2>
        <h1>Bienvenido, {{Auth::user()->usuario}}</h1>
    </div>

</body>
</html>


@endguest