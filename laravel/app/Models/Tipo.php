<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $fillable = ['id', 'nombre', 'estado'];

    public static function getActive(){
        return Tipo::where('estado', 1)->get();
    }
}
