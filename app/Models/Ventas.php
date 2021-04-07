<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $fillable = ['folio',
    						'codigo_barras',
    						'producto',
    						'cantidad',
    						'precio',
    						'subtotal'];

    //Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
