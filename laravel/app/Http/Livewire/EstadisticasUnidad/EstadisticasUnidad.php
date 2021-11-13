<?php

namespace App\Http\Livewire\EstadisticasUnidad;

use App\Models\Huella;
use App\Models\Municipio;
use App\Models\ProfesionalUnidad;
use App\Models\Unidad;
use Livewire\Component;

class EstadisticasUnidad extends Component
{
    public $data=[], $municipios, $municipio, $nomuni, $unidades=[], $arrayUni=[], $unidad, $contadores='';
    public $familiasProfesionales=[];

    public function render()
    {

          $this->municipios=Municipio::getActive();
         if(auth()->user()->rol==2){
            $prouni=ProfesionalUnidad::getProfesional(auth()->user()->documento);
            $this->municipio=$prouni->unidad->municipio;
         }
          if(!empty($this->municipio)){
                $this->unidades=Unidad::getUnidades($this->municipio);
            }
            if(!empty($this->unidad)){
                $arrayUni= explode("|", $this->unidad);
                $this->nomuni=$arrayUni[1];
                $this->profesionales=ProfesionalUnidad::getProfesionalesUnidad($arrayUni[0]);
            }

        return view('livewire.estadisticas-unidad.estadisticas-unidad');
    }

    public function buscar(){
        $validatedDate = $this->validate([
            'municipio' => 'required',
            'unidad' => 'required',
        ]);
        $this->contadores=[];
        $this->familiasProfesionales=[];
        $this->contadores=Huella::estadisticasUaf($this->nomuni);

        foreach ($this->profesionales as $item) {
            $cantF=Huella::getFamiliasProfesional($item->profesional->documento);
            $temp=[
                'documento'=>$item->profesional->documento,
                'nombre'=>$item->profesional->nombres.' '.$item->profesional->apellidos,
                'cantidad'=>$cantF
            ];
            array_push($this->familiasProfesionales, $temp);
        }
    }

    public function edit($docpro){
        $this->data=Huella::getDetallesFamilia($docpro);
    }
}
