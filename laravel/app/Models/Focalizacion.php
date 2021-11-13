<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Focalizacion extends Model
{
    protected $table = 'huellas';
    protected $fillable = ['id_focalizacion', 'tipoacom', 'fuente', 'prioridada', 'regional','departamento',
    'cod_dandd', 'municipio', 'cod_danem', 'barriof1', 'direccionf1', 'barriof2', 'direccionf2','telefono1',
    'telefono2', 'telefono3','telefono4', 'telefono5', 'tipo_docj', 'num_docj', 'primer_nomj','segundo_nomj',
    'primer_apej', 'primer_apej', 'segundo_apej', 'departamentob', 'cod_daneb', 'municipio', 'cod_munb','direccionb',
    'tipo_docb', 'num_docb', 'primer_nomb', 'segundo_nomb','primer_apeb', 'segundo_apeb','telefonoc', 'nombrea','proceso', 'modalidads',
    'tipo_docb2', 'num_docb2', 'primer_nomb2', 'segundo_nomb2','primer_apeb2', 'segundo_apeb2', 'proceso2', 'modalidads2',
    'prioridad', 'modalidad', 'coduds','nomuds', 'diruds','buscado', 'canvis', 'programa', 'firmo','datos', 'mensaje', 'fotografia', 'presencial',
    'tipo_doca','num_doca', 'primer_noma', 'primer_apea', 'direcciona',
    'telefonoa', 'observacion1', 'observacion2', 'integrantes', 'profesional',
    'uat', 'fechavin', 'estado' ];

    public static function getFocalizacion($codigo){
        return Huella::where('id_focalizacion', $codigo)->first();
    }

    public static   function validarBeneficiario($documento){
        return Huella::where('num_docj', $documento)
        ->orWhere('num_docb', $documento)
        ->orWhere('num_doca', $documento)
        ->first();
    }

    public function getJefeHogarAttribute() {
        return ucfirst($this->primer_nomj) . ' ' . ucfirst($this->segundo_nomj).' '.ucfirst($this->primer_apej) . ' ' . ucfirst($this->segundo_apej);
    }

    public function getBeneficiarioAttribute() {
        return ucfirst($this->primer_nomb) . ' ' . ucfirst($this->segundo_nomb).' '.ucfirst($this->primer_apeb) . ' ' . ucfirst($this->segundo_apeb);
    }
    public static function getIdFocalizacion($value)
    {
    return Huella::where('id_focalizacion', 'like', '%'.$value.'%')->first();
    }

    public static function getFiltros($municipio, $tipo, $fuente)
    {

            return Huella::where('municipio', $municipio)
            ->where('tipo', $tipo)->where('fuente', $fuente)->get();


    }




}
