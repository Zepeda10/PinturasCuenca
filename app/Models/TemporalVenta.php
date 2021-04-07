<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporalVenta extends Model
{
    use HasFactory;
    protected $table="temp_ventas"; //Declarando que la tabla (migración) es 'temp_ventas' 
    protected $fillable = ['folio',
                            'codigo_barras',
                            'producto',
                            'cantidad',
                            'precio',
                            'subtotal',
                            'producto_id'];


    //Función para evitar duplicar datos en tabla temporal
    public static function getIdVentaAttribute($id,$folio){ 
    	$datos = TemporalVenta::where('folio', $folio)->where('producto_id',$id)->first();

    	return $datos;
    }

    //Función para llenar la tabla de ventas
    public static function getVentaAttribute($folio){ 
    	$datos = TemporalVenta::where('folio', $folio)->get();

    	return $datos;
    }

    //Función para actualizar producto en la tabla de la venta
    public static function getActualizaVentaAttribute($id,$folio,$cantidad,$subtotal){ 
    	$datos = TemporalVenta::where('folio', $folio)
    						    ->where('producto_id',$id)
    						    ->update(['cantidad' => $cantidad,'subtotal' => $subtotal]);
    }

    //Función para eliminar último producto en la tabla de la venta
    public static function getEliminaVentaAttribute($id,$folio){ 
    	$datos = TemporalVenta::where('folio', $folio)
    						    ->where('producto_id',$id)
    						    ->delete();
    }

    //Función para eliminar registros de la tabla tempora_venta
    public static function getEliminaTemporalAttribute($folio){ 
        $datos = TemporalVenta::where('folio', $folio)
                                ->delete();
    }
}
