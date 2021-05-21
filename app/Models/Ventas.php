<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ventas extends Model
{
    use HasFactory;

    protected $fillable = ['folio',
    						'total',
    						'user_id',
                        'created_at']; 

    //Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relación uno a uno
    public function detalle_venta() {
      return $this->hasOne('App\DetalleVenta');
    }

    public static function insertaVenta($folio,$total,$id_usuario,$fecha){
        $sql = DB::table('ventas')->insert([
            'folio' => $folio,
            'total' => $total,   
            'user_id' => $id_usuario,
            'created_at' => $fecha
        ]);

        $id = Ventas::latest('id')->first();
        return $id;
    }

}
