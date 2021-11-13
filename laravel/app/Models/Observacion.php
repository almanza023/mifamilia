<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $table = 'observaciones';
    protected $fillable = ['id', 'descripcion', 'estado'];

    public static function getActive(){
        return Observacion::where('estado', 1)->get();
    }
}
