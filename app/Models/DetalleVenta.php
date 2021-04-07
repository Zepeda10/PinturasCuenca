<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table="detalle_ventas"; //Declarando que la tabla (migración) es 'detalle_ventas' 
    protected $fillable = ['nombre',
                            'cantidad',
                            'precio_individual',
                            'venta_id',
                            'producto_id'];
}
