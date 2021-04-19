<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporalVenta;
use App\Models\Producto;

class TemporalVentaController extends Controller
{
   
    public function insertarTemporal(Request $request, $id,$folio,$cantidad)
    {
    	$error = "";
    	$producto = Producto::where('id', $id)->first();

    	if($producto){
    		$datosExiste = TemporalVenta::getIdVentaAttribute($id,$folio);

    		if($datosExiste){
    			$cantidad = $datosExiste->cantidad + $cantidad;
    			$subtotal = $cantidad * $datosExiste->precio;
    			TemporalVenta::getActualizaVentaAttribute($id,$folio,$cantidad,$subtotal);

    		}else{
    			$subtotal = $cantidad * $producto["precio_venta"];

    			$temporal = new TemporalVenta();
    			$temporal->folio = $folio;
    			$temporal->producto_id = $id;
    			$temporal->codigo_barras = $producto["cod_barras"];
    			$temporal->producto = $producto["nombre"];
    			$temporal->cantidad = $cantidad;
    			$temporal->precio = $producto["precio_venta"];
    			$temporal->subtotal = $subtotal;
        		$temporal->save();
    		}

    	}else{
    		$error = "No existe el producto";
    	}

    	$res["datos"] = $this->cargaProductos($folio);
        $res["error"] = $error;
        $res["total"] = number_format($this->totalProductos($folio),2,'.',',');
        //$res["total"] = $this->totalProductos($folio);

        echo json_encode($res); 
    }

    public function cargaProductos($folio){
    	$resultado = TemporalVenta::getVentaAttribute($folio);
    	$fila = "";
    	$numFila = 0;

    	foreach ($resultado as $row) {
    		$numFila++;
    		$fila.="<tr id='fila".$numFila."'> ";
    		$fila.="<td>".$numFila."</td>";
    		$fila.="<td>".$row["codigo_barras"]."</td>";
    		$fila.="<td>".$row["producto"]."</td>";
    		$fila.="<td>".$row["precio"]."</td>";
    		$fila.="<td>".$row["cantidad"]."</td>";
    		$fila.="<td>".$row["subtotal"]."</td>";
    		$fila.= "<td> <a onclick=\"eliminarProducto(".$row['producto_id'].", '".$folio."' )\" class='borrar' >Eliminar</a> </td>";		
    		$fila.="</tr>";
    	}

    	return $fila;
    }

    public function totalProductos($folio){
    	$resultado = TemporalVenta::getVentaAttribute($folio);
    	$total = 0;

    	foreach ($resultado as $row) {
    		$total += $row["subtotal"];
    	}

    	return $total;
    }

    public function eliminarTemporal($id,$folio){
    	$datosExiste = TemporalVenta::getIdVentaAttribute($id,$folio);

    	if($datosExiste){
    		if($datosExiste->cantidad > 1){
    			$cantidad = $datosExiste->cantidad - 1;
    			$subtotal = $cantidad * $datosExiste->precio;
    			TemporalVenta::getActualizaVentaAttribute($id,$folio,$cantidad,$subtotal);

    		}else{
    			TemporalVenta::getEliminaVentaAttribute($id,$folio);
    		}

    	}

    	$res["datos"] = $this->cargaProductos($folio);
        $res["error"] = '';
        $res["total"] = number_format($this->totalProductos($folio),2,'.',',');

        echo json_encode($res);

    }

}
