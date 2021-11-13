<?php

namespace App\Http\Livewire\Seguimiento;

use App\Models\Empresa;
use App\Models\ProfesionalUnidad;
use App\Models\Seguimiento as ModelsSeguimiento;
use Livewire\Component;

class Seguimiento extends Component
{
    private $model = ModelsSeguimiento::class;
    public $i = 1;
    public $perPage = 20;
    public $search = '';
    public $orderBy = 'id_focalizacion';
    public $orderAsc = true;
    public $det, $editar=false;
    public $integrantes, $can_proteccion;
    public function render()
    {
        $tipo=auth()->user()->rol;
        $doc=auth()->user()->documento;
        $profesionalUnidad=ProfesionalUnidad::getProfesional($doc);
        $unidad=$profesionalUnidad->unidad->nombre;
        $empresa=Empresa::getEmpresa();
        $data='';
        $info=[
            'operador'=>$empresa->nombre,
            'contrato'=>$empresa->contrato,
            'centroZonal'=>$profesionalUnidad->unidad->ubicacion->zonal,
            'codcz'=>$profesionalUnidad->unidad->ubicacion->codzonal,
            'municipio'=>$profesionalUnidad->unidad->ubicacion->nombre,
            'codmunicipio'=>$profesionalUnidad->unidad->ubicacion->codmunicipio,
            'tipo'=>$profesionalUnidad->unidad->unidad,
            'uat'=>$profesionalUnidad->unidad->nombre,

        ];
        $data = $this->model::search($unidad, $tipo, $this->search)
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->simplePaginate($this->perPage);

        return view('livewire.seguimiento.seguimiento', compact('data', 'info'));
    }

    public function edit($id){
        $this->det=ModelsSeguimiento::getIdfocalizacion($id);

    }

    public function update(){
        $validatedDate = $this->validate([
            'integrantes' => 'required',
        ]);

        if($this->det->huella->tipoacom=='INTENSIVO'){
            $validatedDate = $this->validate([
                'can_proteccion' => 'required',
            ]);
            if($this->can_proteccion>$this->integrantes){
                $this->emit('closeModal');
                $this->integrantes='';
                $this->can_proteccion='';
                $this->det='';
                return  session()->flash('advertencia', 'LA CANTIDAD DE NNJ EN PROTECCION SUPERA A LOS INTEGRANTES DEL NUCLEO FAMILIAR');
            }
            $this->det->integrantes=$this->integrantes;
            $this->det->save();
            $this->det->huella->integrantes=$this->integrantes;
            $this->det->huella->save();

            $this->det->huella->can_proteccion=$this->can_proteccion;
            $this->det->huella->save();
            $this->det->can_proteccion=$this->can_proteccion;
            $this->det->save();
        }else{
            $this->det->integrantes=$this->integrantes;
            $this->det->save();
            $this->det->huella->integrantes=$this->integrantes;
            $this->det->huella->save();
        }
        $this->emit('closeModal');
        $this->integrantes='';
        $this->can_proteccion='';
        $this->det='';


    }
}
