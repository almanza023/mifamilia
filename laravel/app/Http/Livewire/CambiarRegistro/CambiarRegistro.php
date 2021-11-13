<?php

namespace App\Http\Livewire\CambiarRegistro;

use App\Models\Cambio;
use App\Models\Huella;
use App\Models\Municipio;
use App\Models\ProfesionalUnidad;
use App\Models\Seguimiento;
use App\Models\Unidad;
use Carbon\Carbon;
use Livewire\Component;

class CambiarRegistro extends Component
{
    public  $codigo, $id_focalizacion, $data, $marca=false;
    public $municipios, $municipio, $nomuni, $unidades='', $unidad, $profesional, $profesionales='';

    public function render()
    {
        $this->municipios=Municipio::getActive();
        if(auth()->user()->rol==2){
            $prouni=ProfesionalUnidad::getProfesional(auth()->user()->documento);
            $this->municipio=$prouni->unidad->municipio;
         }
        if(!empty($this->data)){
            if(!empty($this->municipio)){
                $this->unidades=Unidad::getUnidades($this->municipio);
            }
            if(!empty($this->unidad)){
                    $arrayUni= explode("-", $this->unidad);
                    $this->nomuni=$arrayUni[1];
                    $this->profesionales=ProfesionalUnidad::getProfesionalesUnidad($arrayUni[0]);
                }

            }

        return view('livewire.cambiar-registro.cambiar-registro');
    }

    public function buscar(){
        $validatedDate = $this->validate([
            'codigo' => 'required',
        ]);
        $this->data=Huella::getHuella($this->codigo);

        if(empty($this->data)){
            session()->flash('advertencia', 'EL CODIGO INGRESADO NO HA SIDO MANIPULADO');
            return $this->data=[];
        }else{
            $this->id_focalizacion=$this->data->id_focalizacion;
        }

    }

    public function update(){

        $validatedDate = $this->validate([
            'municipio' => 'required',
            'unidad' => 'required',
            'profesional'=>'required'
        ]);
        $paf1=$this->data->docpro;
        if(!empty($this->profesional)){
            $arrayPro= explode("-", $this->profesional);
            $this->data->docpro=$arrayPro[0];
            $this->data->profesional=$arrayPro[1];
            $this->data->uat=$this->nomuni;
            $this->data->save();
        }

        $seguimiento=Seguimiento::getIdfocalizacion($this->data->id_focalizacion);
        if(!empty($seguimiento)){
            $seguimiento->uat=$this->nomuni;
            $seguimiento->save();
        }

        Cambio::create([
            'id_focalizacion'=>$this->data->id_focalizacion,
            'fecha'=>Carbon::now()->format('Y-m-d'),
            'paf1'=>$paf1,
            'paf2'=>$arrayPro[0],
        ]);
        session()->flash('message', 'SE HA CAMBIO EL PROFESIONAL EXTISAMENTE AL ID DE FOCALIZACION '.$this->data->id_focalizacion);
        sleep(1.5);
        return redirect()->route('cambiar-registro');

    }
}
