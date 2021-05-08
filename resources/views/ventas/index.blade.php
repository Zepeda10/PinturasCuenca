<?php 
    $folio = uniqid();

?>

<!DOCTYPE html>
<html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pinturas | Ventas</title>

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

    <div class="contenido">
        <h2>VENTAS</h2>
        <h1>Bienvenido, {{Auth::user()->usuario}}</h1>

        <form action="{{route('ventas.guardar')}}" method="post" id="frmVender" accept-charset="utf-8">
            @csrf
            <input id="producto_id" type="hidden" name="producto_id">
            <input id="user_id" type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input id="folio" type="hidden" name="folio" value="<?php echo $folio; ?>">

            <label>Código de barras</label>
            <input type="text" name="cod_barras" id="cod_barras" placeholder="Código de barras" onkeyup="buscarProducto(event, this, this.value)" autfocus required>

            <label id="resultado_error"></label>

            <label>Nombre del producto</label>
            <input type="text" name="producto" id="producto" placeholder="Nombre" readonly required>

            <label>Cantidad</label>
            <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad" required>

            <label>Precio</label>
            <input type="text" name="precio_venta" id="precio_venta" placeholder="Precio" readonly required>

            <label>Subtotal</label>
            <input type="text" name="subtotal" id="subtotal" placeholder="Subtotal" readonly required>

            <button type="button" id="agregar_producto" name="agregar_producto" onclick="agregaProducto(producto_id.value,'<?php echo $folio; ?>',cantidad.value)">Agregar producto</button>

            <table border="1" id="tbl_venta">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th> 
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>

            <label>Total</label>
            <input type="text" name="total" id="total" placeholder="Total" value="0.00" readonly>

            <button type="button" name="completar_compra" id="completar_compra">Completar venta</button>

        </form>

        <form action="{{route('ventas.cancelar')}}" method="post" accept-charset="utf-8">
         @csrf    
             <button type="submit" name="cancelar_venta" id="cancelar_venta">Cancelar venta</button>
        </form>


    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <script>
       $(document).ready(function(){
            $("#completar_compra").click(function(){
                let nFila = $("#tbl_venta tr").length;

                if(nFila < 2){ //significa que no hay datos, solo está el encabezado de la tabla
                    alert("No hay productos en área de venta");
                }else{
                    $("#frmVender").submit();
                }

            });

        });

        function buscarProducto(e,tagCodigo,codigo){
            var enterKey = 13;
            var dire = `/buscaProducto/${codigo}`;

            if(codigo!=''){     
                if(e.which==enterKey){

                    console.log("enterr");

                    $.ajax({
                        url:dire,
                        dataType: 'json',
                            success: function(resultado){
                                if(resultado==0){
                                    $(tagCodigo).val('');
                                }else{
                                    $(tagCodigo).removeClass('has-error');
                                    $("#resultado_error").html(resultado.error);

                                    if(resultado.existe){
                                        $("#producto_id").val(resultado.datos.id);
                                        $("#producto").val(resultado.datos.nombre);                         
                                        $("#precio_venta").val(resultado.datos.precio_venta);
                                        $("#cantidad").val(1);
                                        $("#subtotal").val(resultado.datos.precio_venta);
                                        $("#cantidad").focus();
                                        console.log("si existe");

                                    }else{
                                        $("#producto_id").val('');
                                        $("#producto").val('');                          
                                        $("#precio_venta").val('');
                                        $("#cantidad").val('');
                                        $("#subtotal").val('');
                                        console.log("no existe");
                                    }
                                }
                            }

                    });
 
                }

            }

        }


        function agregaProducto(producto_id,folio,cantidad){
            var direc = `/ventaTemporal/${producto_id}/${folio}/${cantidad}`;

            if(producto_id!=null && producto_id!=0 && cantidad > 0){        

                    console.log("función agregar");

                    $.ajax({
                        url:direc,
                            success: function(resultado){
                                if(resultado==0){
                                    console.log("cero");
                                }else{
                                    console.log("se llena tabla 1");
                                    var resultado = JSON.parse(resultado);

                                    if(resultado.error==''){
                                        $("#tbl_venta tbody").empty();
                                        $("#tbl_venta tbody").append(resultado.datos);
                                        $("#total").val(resultado.total);                                    
                                        $("#producto_id").val('');
                                        $("#cod_barras").val('');
                                        $("#producto").val('');                          
                                        $("#precio_venta").val('');
                                        $("#cantidad").val('');
                                        $("#subtotal").val('');
                                        console.log("se llena tabla 2");
                                    }
                                    
                                }
                            }

                    });

            }

        }


        function eliminarProducto(producto_id,folio){
            var direccion = `/eliminaProducto/${producto_id}/${folio}`;

                    $.ajax({
                        url:direccion,
                            success: function(resultado){
                                if(resultado==0){
                                    $(tagCodigo).val('');
                                }else{
                                    var resultado = JSON.parse(resultado);
                                    $("#tbl_venta tbody").empty();
                                    $("#tbl_venta tbody").append(resultado.datos);
                                    $("#total").val(resultado.total);
                                }
                            }

                    });
 
        }
        

    </script>

</body>
</html>


@endguest