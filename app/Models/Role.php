<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['rol'];

    //Relación uno a muchos
    public function users(){
    	return $this->hasMany('App\Models\User');
    }
}
