<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesionalUnidad extends Model
{
    protected $table = 'profesionales_unidades';
    protected $fillable = ['id', 'profesional_id', 'unidad_id', 'estado'];


    public static function getProfesional($documento){
        return ProfesionalUnidad::where('profesional_id', $documento )->first();
    }

    public static function getProfesionalesUnidad($unidad){
        return ProfesionalUnidad::where('unidad_id', $unidad )->get();
    }

    public function unidad()
    {
        return $this->belongsTo('App\Models\Unidad', 'unidad_id', 'id');
    }

    public function profesional()
    {
        return $this->belongsTo('App\Models\Profesional', 'profesional_id', 'documento');
    }



}
