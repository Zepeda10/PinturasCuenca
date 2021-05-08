@extends("../layouts.master")

@section('title', 'Inicio')

@section("body")
	
	@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @guest
               
        @else

    		<h1>Bienvenido, {{Auth::user()->usuario}}</h1>

@endsection

@section("pie")
@endsection

@endguest