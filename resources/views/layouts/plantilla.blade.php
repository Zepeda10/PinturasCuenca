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
	</div>

	<div class="contenido"> @yield("contenido") </div>

	<div class="pie"> 
		@yield("pie")
		Zona de pie 
	</div>
	
</body>
</html>