<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huella extends Model
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


    public static function getFocalizacion($codigo){
        return Huella::where('id_focalizacion', $codigo)->first();
    }

    public static   function validarBeneficiario($documento){
        return Huella::where('num_docj', $documento)->where('programa', 'SI')->get();
    }

    public function getJefeHogarAttribute() {
        return ucfirst($this->primer_nomj) . ' ' . ucfirst($this->segundo_nomj).' '.ucfirst($this->primer_apej) . ' ' . ucfirst($this->segundo_apej);
    }

    public function getDireccionesAttribute() {
        return ($this->direccionf1) . ' ' . ($this->direccionf2).' '.($this->direccionf3);
    }

    public function getTelefonosAttribute() {
        return ($this->telefono1) . ' ' . ($this->telefono2).' '.($this->telefono3) . ' ' . ($this->telefono4).' ' . ($this->telefono5);
    }

    public function getBeneficiarioAttribute() {
        return ucfirst($this->primer_nomb) . ' ' . ucfirst($this->segundo_nomb).' '.ucfirst($this->primer_apeb) . ' ' . ucfirst($this->segundo_apeb);
    }

    public static function getIdFocalizacion($value)
    {
    return Huella::where('id_focalizacion', 'like', '%'.$value.'%')->first();
    }

    public static function getHuella($value)
    {
    return Huella::where('id_focalizacion', 'like', '%'.$value.'%')->whereNotNull('programa')->first();
    }

    public static function getFiltros($municipio, $tipo, $fuente)
    {
        return Huella::where('municipio', $municipio)
            ->where('tipo', $tipo)->where('fuente', $fuente)->get();

    }
    public static function estadisticasPaf($documento)
    {
            $date=date('Y-m-d');
            $vinculados= Huella::where('docpro', $documento)
            ->where('programa', 'SI')->where('fechavin', $date)->count();
            if(empty($vinculados)){
                $vinculados=0;
            }
            $noVinculados= Huella::where('docpro', $documento)
            ->where('programa', 'NO')->count();
            if(empty($noVinculados)){
                $noVinculados=0;
            }
            $data=[
                'fecha'=>$date,
                'vinculados'=>$vinculados,
                'noVinculados'=>$noVinculados,
                'total'=>($vinculados+$noVinculados),
            ];
            return $data;
    }

    public static function estadisticasUaf($uat)
    {
            $intensivos = Huella::where('tipoacom', 'INTENSIVO')
            ->where('uat', $uat)->where('programa', 'SI')->count();
            $discapacidad = Huella::where('tipoacom', 'PREVENTIVO - DISCAPACIDAD')
            ->where('uat', $uat)->where('programa', 'SI')->count();
            $preventivos = Huella::where('tipoacom', 'PREVENTIVO')
            ->where('uat', $uat)->where('programa', 'SI')->count();
            $noVinculados = Huella::where('uat', $uat)->where('programa', 'NO')->count();
            $vinculados = Huella::where('uat', $uat)->where('programa', 'SI')->count();
            $data=[
                'intensivos'=>$intensivos,
                'discapacidad'=>$discapacidad,
                'preventivos'=>$preventivos,
                'noVinculados'=>$noVinculados,
                'vinculados'=>$vinculados,
                'total'=>($intensivos+$intensivos+$preventivos),
            ];
            return $data;
    }

    public static function getFamiliasProfesional($docpro){
        $can=Huella::where('docpro', $docpro)->where('programa', 'SI')->count();
        if(empty($can)){
            return 0;
        }
        return $can;

    }
    public static function getDetallesFamilia($docpro){
        return Huella::where('docpro', $docpro)->where('programa', 'SI')->get();

    }






}
