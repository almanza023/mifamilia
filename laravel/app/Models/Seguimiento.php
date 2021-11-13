<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';
    protected $fillable = ['id', 'id_focalizacion', 'can_proteccion', 'integrantes', 'tipo', 'nivelaciones', 'uat', 'estado'];

    public static function getActive(){
        return Seguimiento::where('estado', 1)->orderBy('id_focalizacion', 'asc')->get();
    }

    public static function search($uat, $tipo, $search)
     {
         if($tipo==3){
             if(empty($search)){
                return static::query()->where('uat', $uat);
             }else{
                return static::query()->where('uat', $uat)->where('id_focalizacion',  'like', '%'.$search.'%');
             }
         }
     }


    public function huella()
    {
        return $this->belongsTo('App\Models\Huella', 'id_focalizacion', 'id_focalizacion');
    }

    public static function getIdfocalizacion($id){
        return Seguimiento::where('id_focalizacion', $id)->first();
    }

}
