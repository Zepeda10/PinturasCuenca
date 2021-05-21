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
    <link href="{{ asset('css/ventas.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
        @guest
                     <p>No estás logueado</p>    
               @else

<header class="flex justify-between items-center py-3 px-6 bg-blue-900 border-b-4">
    <div class="flex items-center">
        <p class="text-lg mx-3 font-normal text-gray-100">Ventas</p>
    </div>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    
    <div class="flex items-center">

                @if (Auth::user()->role_id == 1)
                    <a href="{{route('admin.welcome')}}"  class="text-gray-100 text-lg mx-5 hover:no-underline hover:text-white">Ir a panel</a>
                 @endif

        <p class="text-lg mx-3 text-gray-100"> {{ Auth::user()->usuario }}</p>

        <div x-data="{ dropdownOpen: false }"  class="relative">
            <button @click="dropdownOpen = ! dropdownOpen" class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none"> 
            @if (Auth::user()->imagen)  
                <img class="h-full w-full object-cover" src="/images/{{Auth::user()->imagen->url}}" alt="Your avatar">
            @else
				<img class="w-full h-full object-cover" src="/images/generico.jpg" alt="" />
			@endif                                       
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 hover:no-underline" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                    </a>
            </div>
        </div>
    </div>
</header>

<body>

    <div class="container mx-auto px-6 py-8 pr-10">
       
        <form action="{{route('ventas.guardar')}}" method="post" id="frmVender" accept-charset="utf-8">
            @csrf
            <input id="producto_id" type="hidden" name="producto_id">
            <input id="user_id" type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input id="folio" type="hidden" name="folio" value="<?php echo $folio; ?>">

            <div class="grid grid-cols-3 gap-4">
				<div class="col-start-1 col-end-2">
                    <label>Código de barras</label>
                    <input type="text" name="cod_barras" id="cod_barras" placeholder="Código de barras" onkeyup="buscarProducto(event, this, this.value)" autfocus required>
                        <small id="resultado_error" class="text-red-600 mt-9 ml-1"></small>
				</div>

                <div class="col-start-2 col-end-3">
                    <label>Nombre del producto</label>
                    <input type="text" name="producto" id="producto" placeholder="Nombre" readonly required>
                </div>

                <div class="col-start-3 col-end-3">
                    <label>Cantidad</label>
                    <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad" required>
				</div>

                <div class="col-start-1 col-end-2">
                    <label>Precio</label>
                    <input type="text" name="precio_venta" id="precio_venta" placeholder="Precio" readonly required>
                </div>

                <div class="col-start-2 col-end-3">
                    <label>Subtotal</label>
                    <input type="text" name="subtotal" id="subtotal" placeholder="Subtotal" readonly required>
                </div>

                <div class="col-start-3 col-end-3 mt-1">	
                    <button type="button" id="agregar_producto" name="agregar_producto" class="btn-agVenta px-3 mt-4" onclick="agregaProducto(producto_id.value,'<?php echo $folio; ?>',cantidad.value)">Agregar producto</button>
			    </div>	
            </div>
            

            <table id="tbl_venta" class="mt-20 ">
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

            <div class="grid grid-cols-5 gap-4">
				<div class="col-start-1 col-end-2">
                    <label>Total</label>
                    <input type="text" name="total" id="total" placeholder="Total" value="0.00" readonly>
                </div>
            </div>

            <button type="button" name="completar_compra" id="completar_compra" class="btn-vender mx-0  px-3 mt-4 float-left">Vender</button>

        </form>

        <form action="{{route('ventas.cancelar')}}" method="post" accept-charset="utf-8">
         @csrf    
             <button type="submit" name="cancelar_venta" id="cancelar_venta" class="btn-cancelarVenta px-3 mt-4 float-left">Cancelar venta</button>
        </form>

            <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <div class="grid grid-cols-4 gap-4">
				    <div class="col-start-2 col-end-2">
                        <label for="total-modal">Total</label>
                        <input type="text" name="total-modal" id="total-modal" value="0.00" readonly>
                    </div>

                    <div class="col-start-2 col-end-2">
                        <label for="pago">Pago recibido</label>
                        <input type="text" name="pago" id="pago">
                    </div>

                    <div class="col-start-2 col-end-2">
                        <label for="cambio">Cambio</label>
                        <input type="text" name="cambio" id="cambio" value="0.00" readonly>
                    </div>
                <span id="display"></span>

                <div class="col-start-3 col-end-2">
                    <button id="vender-modal" class="btn-vender mx-0 px-3 mt-4">Completar venta</button>
                </div>

                
            </div>

        </div>


    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    

    <script>

       $(document).ready(function(){
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            var cambio = 0;


            $("#completar_compra").click(function(){
                let nFila = $("#tbl_venta tr").length;

                if(nFila < 2){ //significa que no hay datos, solo está el encabezado de la tabla
                    alert("No hay productos en área de venta");
                }else{

                    // When the user clicks on the button, open the modal
                    modal.style.display = "block";

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    $('#pago').keyup(function () {
                        cambio =  $(this).val() - $("#total-modal").val();
                        $('#cambio').val(cambio.toFixed(2));
                    });
                                                    
                    $("#vender-modal").click(function(){
                        $("#frmVender").submit();
                    });  
                    
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
                                        $("#total-modal").val(resultado.total);                                         
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