<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fuente extends Model
{
    protected $table = 'fuentes';
    protected $fillable = ['id', 'nombre', 'estado'];

    public static function getActive(){
        return Fuente::where('estado', 1)->get();
    }

}
