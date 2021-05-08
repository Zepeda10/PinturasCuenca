<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        <link rel="canonical" href="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script> 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title></title>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
                  
    </head>
    <body>
        @guest 
            <p>No estás logueado</p>    

              @else
                   @if (Auth::user()->role_id == 1)

                    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
                        @include('layouts.sidebar')
                        
                        <div class="flex-1 flex flex-col overflow-hidden">
                            @include('layouts.header')

                            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                                <div class="container mx-auto px-6 py-8 pr-10">
                                    @yield('body')
                                </div>
                            </main>
                        </div>
                    </div>

                    <div class="pie"> 
                        @yield("pie")
                       
                    </div>
                    
                </body>
                
            </html>

@endif

 @if (Auth::user()->role_id == 2)
    <script>window.location = "/ventas";</script>
 @endif

@endguest
