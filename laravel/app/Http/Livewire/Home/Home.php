<?php

namespace App\Http\Livewire\Home;

use App\Models\Huella;
use App\Models\Profesional;
use App\Models\ProfesionalUnidad;
use Livewire\Component;

class Home extends Component
{
    public $profesional;
    public function render()
    {
        $doc=auth()->user()->documento;
        $nombre=auth()->user()->name;
        $rol=auth()->user()->rol;
        $intensivos=0;
        $porcentajeDiscapacidad=0;
        $porcentajeIntensivo=0;
        $porcentajePreventivos=0;
        $discapacidad=0;
        $preventivos=0;
        $metaIntensivos=0;
        $metaDiscapacidad=0;
        $metaPreventivos=0;
        $profesionalUnidad=ProfesionalUnidad::getProfesional($doc);
        $this->profesional=Profesional::getByDocumento($doc);
        $uat=$profesionalUnidad->unidad->nombre;
        $info=[
            'nombre'=>$nombre,
            'uat'=>$uat,
            'municipio'=>$profesionalUnidad->unidad->municipio,
            'documento'=>$doc,

        ];

        if($rol==1){

        }else if($rol==2){

        }else{


        $intensivos = Huella::where('tipoacom', 'INTENSIVO')
        ->where('uat', $uat)->where('programa', 'SI')->count();
        $discapacidad = Huella::where('tipoacom', 'PREVENTIVO - DISCAPACIDAD')
        ->where('uat', $uat)->where('programa', 'SI')->count();
        $preventivos = Huella::where('tipoacom', 'PREVENTIVO')
        ->where('uat', $uat)->where('programa', 'SI')->count();

        $metaIntensivos=$profesionalUnidad->unidad->intensivo;
        if($metaIntensivos>0){
            $porcentajeIntensivo=round(($intensivos*100)/$metaIntensivos, 2);
        }
        $metaDiscapacidad=$profesionalUnidad->unidad->discapacidad;
        if($metaDiscapacidad>0){
            $porcentajeDiscapacidad=round(($discapacidad*100)/$metaDiscapacidad, 2);
        }
        $metaPreventivos=$profesionalUnidad->unidad->preventivo;
            if($metaPreventivos>0){
            $porcentajePreventivos=round(($preventivos*100)/$metaPreventivos, 2);
            }
        }
        $data=[
            'intensivos'=>$intensivos,
            'metaIntensivos'=>$metaIntensivos,
            'porcentajeIntensivo'=>$porcentajeIntensivo,
            'discapacidad'=>$discapacidad,
            'metaDiscapacidad'=>$metaDiscapacidad,
            'porcentajeDiscapacidad'=>$porcentajeDiscapacidad,
            'preventivos'=>$preventivos,
            'metaPreventivos'=>$metaPreventivos,
            'porcentajePreventivos'=>$porcentajePreventivos,
        ];

        return view('livewire.home.home', compact('data', 'info'));
    }
}
