<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';
    protected $fillable = ['id', 'nombre', 'unidad', 'tipo', 'municipio', 'intensivo', 'discapacidad', 'preventivo'
    ,'cupos', 'estado'];

    public static function getUnidades($municipio){
        return Unidad::where('municipio', $municipio)->get();
    }


    public function ubicacion()
    {
        return $this->belongsTo('App\Models\Municipio', 'municipio', 'nombre');
    }


}
