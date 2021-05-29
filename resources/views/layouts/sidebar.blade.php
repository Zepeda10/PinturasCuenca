<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>
    
<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8 mx-4 ">
        <div class="flex items-center">
            <img class="w-11 h-11" src="/images/log.gif" alt="">
            <span class="text-white text-2xl mx-2 font-semibold">Pinturas de la Cuenca</span>
        </div>
    </div>

    <nav class="mt-10">
        <a @if(request()->routeIs('admin.welcome')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="/">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>

            <span class="mx-3">Inicio</span>
        </a>

        <div >
        <a @if(request()->routeIs('roles.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif  href="{{route('roles.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>

            <span class="mx-3">Roles</span>
        </a>
        </div>

        <a @if(request()->routeIs('usuarios.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('usuarios.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>

            <span class="mx-3">Usuarios</span>
        </a>

        <a @if(request()->routeIs('categorias.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('categorias.index')}}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3">Categorías</span>
        </a>

        <a @if(request()->routeIs('productos.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('productos.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>

            <span class="mx-3">Productos</span>
        </a>

        <a @if(request()->routeIs('proveedores.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('proveedores.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span class="mx-3">Proveedores</span>
        </a>

        <a @if(request()->routeIs('verventas.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('verventas.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <span class="mx-3">Ventas</span>
        </a>

        <a @if(request()->routeIs('ventas.index')) class="flex items-center mt-4 py-2 px-6 bg-gray-700 bg-opacity-25 text-gray-100 hover:no-underline hover:text-gray-100" @else class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 hover:no-underline" @endif href="{{route('ventas.index')}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>

            <span class="mx-3">Realizar venta</span>
        </a>
    </nav>
</div>