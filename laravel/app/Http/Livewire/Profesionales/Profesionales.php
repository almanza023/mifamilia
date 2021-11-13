<?php

namespace App\Http\Livewire\Profesionales;

use App\Models\Municipio;
use App\Models\Profesional;
use App\Models\ProfesionalUnidad;
use App\Models\Unidad;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Profesionales extends Component
{
    use WithPagination;
    public $nombres, $apellidos, $telefono, $documento, $correo, $profesion,
     $cargo,  $profesional_id, $clave, $updateMode=false, $municipios, $municipio,
     $unidad, $unidades;
    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;

    private $model=Profesional::class;

    public function render()    {

        $this->unidades=[];
        $this->municipios=Municipio::getActive();
        if(!empty($this->municipio)){
            $this->unidades=Unidad::getUnidades($this->municipio);
        }
        $data=$this->model::search($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        return view('livewire.profesionales.profesionales', compact('data'));
    }

    public function resetInputFields(){
        $this->nombres='';
        $this->apellidos='';
        $this->documento='';
        $this->correo='';
        $this->telefono='';
        $this->profesion='';
        $this->cargo='';
        $this->municipio='';
        $this->municipios='';
        $this->unidad='';
        $this->clave='';
        $this->unidades=[];
        $this->profesional_id='';
        $this->updateMode=false;
    }

    public function store(){
        $rol=0;
        $validated = $this->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'municipio' => 'required',
            'cargo' => 'required',
            'unidad' => 'required',
        ]);

        if($validated){
            DB::beginTransaction();
            try {
            $this->cargo='PAF';
            $this->profesion='PSICOLOGIA';
            $profesional=$this->model::updateOrCreate(
                [
                    'id' =>  ($this->profesional_id),
                    'documento' =>  ($this->documento)],
                [
                    'nombres' =>  strtoupper($this->nombres),
                    'apellidos' =>  ($this->apellidos),
                    'documento' =>  ($this->documento),
                    'telefono' =>  ($this->telefono),
                    'profesion' =>  strtoupper($this->profesion),
                    'cargo' =>  strtoupper($this->cargo),
                ]);
                if($this->cargo=="PAF"){
                    $rol=3;
                }else if($this->cargo=="ASESOR PEDAGOGICO" || $this->cargo=="ASESOR PSICOSOCIAL"){
                    $rol=2;
                }else{
                    $rol=1;
                }
            $user=User::updateOrCreate(
                [
                    'documento'=>$this->documento
                ],[
                    'name' =>  strtoupper($this->nombres.' '.$this->apellidos),
                    'documento'=>$this->documento,
                    'email'=>$this->correo,
                    'rol'=>$rol,
                    'password'=>Hash::make($this->documento),
            ]);

            $profesionalUnidad=ProfesionalUnidad::updateOrCreate(
                [
                    'profesional_id'=>$this->documento
                ],[
                    'profesional_id'=>$this->documento,
                    'unidad_id'=>$this->unidad,
                ]);

            DB::commit();
            session()->flash('message', 'DATOS REGISTRADOS EXITOSAMENTE.');
            $this->resetInputFields();
            $this->emit('closeModal');
            return redirect()->route('profesionales');

        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('message', $e->getMessage());
        }
        }
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $obj = $this->model::find($id);
        $this->municipio=$obj->profesionalUnidad->unidad->municipio;
        $this->tipo=$obj->profesionalUnidad->unidad->tipo;
        $this->profesional_id = $id;
        $this->nombres = $obj->nombres;
        $this->apellidos = $obj->apellidos;
        $this->telefono = $obj->telefono;
        $this->correo = $obj->correo;
        $this->documento = $obj->documento;
        $this->profesion = $obj->profesion;
        $this->cargo = $obj->cargo;
        $this->estado = $obj->estado;
    }

    public function editEstado($id)
    {
        $this->profesional_id = $id;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function updateEstado(){
        $obj = $this->model::find($this->profesional_id);

        if($obj->estado==1){
            $obj->estado=0;
            $obj->save();
            User::where('documento', $obj->documento)->update(['estado'=>0]);
            ProfesionalUnidad::where('profesional_id', $obj->documento)->update(['estado'=>0]);
        }else{
            $obj->estado=1;
            $obj->save();
            User::where('documento', $obj->documento)->update(['estado'=>1]);
            ProfesionalUnidad::where('profesional_id', $obj->documento)->update(['estado'=>1]);
        }
        session()->flash('message', 'ESTADO ACTUALIZADO EXITOSAMENTE');
        $this->emit('closeModalEstado');


    }

}
