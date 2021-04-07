<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table="proveedores"; //Declarando que la tabla (migración) es 'proveedores' 

    protected $fillable = ['nombre',
    						'rfc',
    						'direccion',
    						'email',
    						'telefono'];

    //Relación uno a muchos
    public function productos(){
    	return $this->hasMany('App\Models\Producto');
    }
}
