<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['id', 'nombre', 'codmunicipio', 'zonal', 'codzonal', 'estado'];

    public static function getActive(){
        return Municipio::where('estado', 1)->get();
    }
}
