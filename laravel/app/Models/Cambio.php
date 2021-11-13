<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    protected $table = 'cambios';
    protected $fillable = ['id', 'id_focalizacion', 'fecha', 'paf1', 'paf2', 'estado'];

    public static function getActive(){
        return Cambio::where('estado', 1)->get();
    }
}
