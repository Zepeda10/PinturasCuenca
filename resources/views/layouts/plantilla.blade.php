<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<div class="cabecera"> 
		@yield("cabecera")
		<h2>Cabecera</h2>
		<a href="{{route('roles.index')}}">Roles</a>
		<a href="{{route('usuarios.index')}}">Usuarios</a>
		<a href="{{route('productos.index')}}">Productos</a>
		<a href="{{route('categorias.index')}}">Categorias</a>
		<a href="{{route('proveedores.index')}}">Proveedores</a>
	</div>

	<div class="contenido"> @yield("contenido") </div>

	<div class="pie"> 
		@yield("pie")
		Zona de pie 
	</div>
	
</body>
</html>