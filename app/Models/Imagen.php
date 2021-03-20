<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $table="imagenes"; //Declarando que la tabla (migración) es 'imagenes' 
    protected $fillable = ['url','tipo'];

    //Relación uno a muchos
    public function users(){
    	return $this->hasMany('App\Models\User');
    }

    //Relación uno a muchos
    public function productos(){
    	return $this->hasMany('App\Models\Producto');
    }
}
