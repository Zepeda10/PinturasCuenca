<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre',
                            'cod_barras',
                            'descripcion',
                            'stock',
                            'precio_compra',
                            'precio_venta',
                            'iva'];

    //Relación uno a muchos inversa
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    //Relación uno a muchos inversa
    public function imagen(){
        return $this->belongsTo('App\Models\Imagen');
    }

    //Relación uno a muchos inversa
    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor');
    }
}
