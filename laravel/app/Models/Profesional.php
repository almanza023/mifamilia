<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesional extends Model
{
    protected $table = 'profesionales';
    protected $fillable = ['id', 'nombres', 'apellidos', 'documento', 'correo', 'telefono', 'profesion',
    'cargo', 'estado'
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('nombres', 'like', '%'.$search.'%')
                ->orWhere('apellidos', 'like', '%'.$search.'%')
                ->orWhere('documento', 'like', '%'.$search.'%');
    }
    public function setNombresAttribute($value)
    {
        $this->attributes['nombres'] =strtoupper($value);
    }
    public function getNombreAttribute() {
        return ($this->nombres) . ' ' . ($this->apellidos);
    }

    public function setApellidosAttribute($value)
    {
        $this->attributes['apellidos'] =strtoupper($value);
    }


    public function profesionalUnidad()
    {
        return $this->belongsTo('App\Models\ProfesionalUnidad', 'documento', 'profesional_id');
    }

    public static function getByDocumento($documento){
        return Profesional::where('documento', $documento)->where('estado', 1)->first();
    }

    public static function getActive(){
        return Profesional::where('estado', 1)->get();
    }
}
