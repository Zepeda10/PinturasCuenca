

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

            <div id="fondo" class=" sm:px-8 py-4 overflow-x-auto">
                <div id="logoInicio" class=" sm:px-8 py-4 overflow-x-auto">
                    <img src="/images/logoPin.png" alt="">
                </div>
            </div>

@endsection

@section("pie")
@endsection

@endguest