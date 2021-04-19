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
    						'user_id']; 

    //Relación uno a muchos inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
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
