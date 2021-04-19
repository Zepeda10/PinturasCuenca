<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Producto;
use App\Models\TemporalVenta;
use App\Models\DetalleVenta;
use Carbon\Carbon;


class VentasController extends Controller
{

    //Actualiza el stock
    public static function actualizaStock($id_producto,$cantidad){
        Producto::where('id', $id_producto)
                ->decrement('stock', $cantidad);
    }


    public function guardar(Request $request){
    	$detalle = new DetalleVenta();

    	$folio = $request->folio;
    	$total = preg_replace('/[$,]/','',$request->total);	
    	$id_usuario = $request->user_id;	
        $fecha = Carbon::now()->toDateTimeString();

        $resultadoId = Ventas::insertaVenta($folio,$total,$id_usuario,$fecha); 
      

        if($resultadoId){//si lac función retorna un ID
        	$resultadoCompra = TemporalVenta::getVentaAttribute($folio);

        	foreach ($resultadoCompra as $row) {
                DetalleVenta::insert([
                    'nombre' => $row['producto'],
                    'cantidad' => $row['cantidad'],   
                    'precio_individual' => $row['precio'],
                    'venta_id' =>  $resultadoId->id,
                    'producto_id' => $row['producto_id'],
                ]);

                VentasController::actualizaStock($row['producto_id'],$row['cantidad']);
        	}

            TemporalVenta::getEliminaTemporalAttribute($folio);
        }

        return redirect()->route('ventas.index');
    }


    public function cancelar(Request $request){
        $temporal = TemporalVenta::truncate();

        return redirect()->route('ventas.index'); 
    }

}
