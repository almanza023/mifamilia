<?php

namespace App\Http\Livewire\Focalizaciones;


use App\Models\Huella;
use App\Models\Municipio;
use App\Models\Observacion;
use App\Models\ProfesionalUnidad;
use App\Models\Seguimiento;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Focalizaciones extends Component
{
    public  $codigo, $id_focalizacion, $data, $marca=false;
    public $buscado, $canvisitas, $aceptopro, $firmoacu, $autorizoda, $autorizomen, $autorizofot, $autorizopre;
    public $tipodocj, $numdocj, $primernomj, $primerapej, $direccion, $telefono, $obs1, $obs2, $responsable;
    public $visible=null, $visible2=false, $observaciones, $doc, $can_proteccion, $fechavin, $integrantes,
    $profesionalUnidad, $estadisticas;

    public function render()
    {

        $this->doc=auth()->user()->documento;
        $this->profesionalUnidad=ProfesionalUnidad::getProfesional($this->doc);

        if(empty($this->aceptopro)){
            $this->visible=true;
        }else if($this->aceptopro=='NO'){
            $this->visible=true;
        } if($this->aceptopro=='SI'){
            $this->visible=false;
        }

        if($this->obs1=='J) OTRO'){
            $this->visible2=true;
        }else{
            $this->visible2=false;
        }
       $this->estadisticas=Huella::estadisticasPaf($this->doc);


        $this->observaciones=Observacion::getActive();
        return view('livewire.focalizaciones.focalizaciones');
    }

    public function buscar(){
        $validatedDate = $this->validate([
            'codigo' => 'required',
        ]);



        $this->data=Huella::getIdFocalizacion($this->codigo);
        $contador=Huella::estadisticasUaf( $this->profesionalUnidad->unidad->nombre);
        
        if($this->data->tipoacom=='INTENSIVO'){
            if($contador['intensivos']>$this->profesionalUnidad->unidad->intensivo) {
                $this->data=[];
                return session()->flash('advertencia', 'YA CUMPLIO SU META EN EL TIPO INTENSVO');
            }
        }
        if($this->data->tipoacom=='PREVENTIVO - DISCAPACIDAD'){
            if($contador['discapacidad']>$this->profesionalUnidad->unidad->discapaidad)      {
                $this->data=[];
                return session()->flash('advertencia', 'YA CUMPLIO SU META EN EL TIPO PREVENTIVO - DISCAPACIDAD');
            }
        }
        if($this->data->tipoacom=='PREVENTIVO'){
            if($contador['preventivos']>$this->profesionalUnidad->unidad->preventivo)      {
                $this->data=[];
                return session()->flash('advertencia', 'YA CUMPLIO SU META EN EL TIPO PREVENTIVO');
            }
        }

        if(empty($this->data)){
            return $this->data=[];
        }
        if(auth()->user()->rol==3 ){
            if($this->profesionalUnidad->unidad->municipio!=$this->data->municipio){
                $this->codigo='';
                $this->id_focalizacion='';
                $this->data=[];
                session()->flash('advertencia', 'EL CODIGO INGRESADO NO PERTENCE A SU MUNICIPIO');

            }else{
                if($this->profesionalUnidad->unidad->unidad=="RURAL" && $this->data->tipoacom=="INTENSIVO"){
                    session()->flash('advertencia', 'NO SE PUEDE VINCULAR ESTE BENEFICIARIO PERTENECE A INTENSIVO Y SU PERFIL ES RURAL');
                    $this->data=[];
                }

                if(!empty($this->data)){
                    if((!empty($this->data->estado) && auth()->user()->rol!=1) && auth()->user()->rol!=2){
                        session()->flash('advertencia', 'YA EL CODIGO FUE MANIPULADO POR EL PAF '.$this->data->profesional);
                        $this->data='';
                    }else{
                        $this->id_focalizacion=$this->data->id_focalizacion;
                    }
                }
            }


        }else{
        session()->flash('advertencia', 'EL USUARIO NO ESTA HABILITADO PARA REALIZAR VINCULACIONES');
        $this->data=[];
        }

    }

    public function resetInputs(){

        $this->codigo="";
        $this->id_focalizacion="";
        $this->data="";
        $this->buscado="";
        $this->canvisitas="";
        $this->marca=false;
        $this->visible2=false;
        $this->canvisitas="";
        $this->aceptopro="";
        $this->firmoacu="";
        $this->autorizoda="";
        $this->autorizomen="";
        $this->autorizopre="";
        $this->autorizofot="";
        $this->tipodocj="";
        $this->numdocj="";
        $this->primerapej="";
        $this->primernomj="";
        $this->direccion="";
        $this->telefono="";
        $this->observacion1="";
        $this->observacion2="";
        $this->integrantes="";
        $this->fechavin="";
        $this->canvisitas="";
        $this->observaciones="";

    }

    public function marcar(){


        $this->firmoacu="SI";
        $this->autorizoda="SI";
        $this->autorizomen="SI";
        $this->autorizopre="SI";
        $this->autorizofot="SI";

    }

    public function copiar(){

        $this->tipodocj=$this->data->tipo_docj;
        $this->numdocj=$this->data->num_docj;
        $this->primernomj=$this->data->primer_nomj;
        $this->primerapej=$this->data->primer_apej;
        $this->direccion=$this->data->direccionb;
        $this->direccion=$this->data->direccionb;
        $this->telefono=$this->data->telefonoc;


    }

    public function marcarNo(){
        $this->firmoacu="";
        $this->autorizoda="";
        $this->autorizomen="";
        $this->autorizopre="";
        $this->autorizofot="";

    }

    public function quitar(){
        $this->tipodocj="";
        $this->numdocj="";
        $this->primernomj="";
        $this->primerapej="";
        $this->direccion="";
        $this->direccion="";
        $this->telefono="";
    }

    public function update(){

        $validatedDate = $this->validate([
            'buscado' => 'required',
            'aceptopro' => 'required',
            'id_focalizacion'=>'required'
        ]);



        $profesionalUnidad=ProfesionalUnidad::getProfesional($this->doc);
        $obj=Huella::getFocalizacion($this->id_focalizacion);
        $validar=Huella::validarBeneficiario($obj->num_docj);

        if(count($validar)>0){
            return session()->flash('advertencia', 'EL DOCUMENTO DEL JEFE DE FAMILIA '.$obj->num_docj.' YA TIENE UN REGISTRO EN EL SISTEMA');
        }else{
            if($profesionalUnidad->unidad->unidad=="RURAL" && $obj->tipoacom=="INTENSIO"){
                session()->flash('advertencia', 'NO SE PUEDE VINCULAR ESTE BENEFICIARIO PERTENECE A INTENSIVO Y SU PERFIL ES RURAL');
            }
            try {
                DB::beginTransaction();
                if($this->aceptopro=='SI'){
                    $validatedDate = $this->validate([
                        'canvisitas' => 'required',
                        'firmoacu' => 'required',
                        'autorizoda' => 'required',
                        'autorizomen' => 'required',
                        'autorizopre' => 'required',
                        'autorizofot' => 'required',
                        'tipodocj' => 'required',
                        'numdocj' => 'required',
                        'primernomj' => 'required',
                        'primerapej' => 'required',
                        'telefono' => 'required|digits:10',
                        'direccion' => 'required',
                        'integrantes' => 'required',
                        'fechavin' => 'required|date',
                    ]);
                    if($this->fechavin>date('Y-m-d')){
                        return session()->flash('advertencia', 'LA FECHA DE VINCULACION NO PUEDE SER MAYOR A LA FECHA ACTUAL');

                    }
                    if($obj->fuente=="PROTECCIÓN"){
                        $validatedDate = $this->validate([
                            'can_proteccion' => 'required',
                        ]);
                        if($this->can_proteccion>$this->integrantes){
                            return session()->flash('advertencia', 'LA CANTIDAD DE NNJ EN PROTECION ES MAYOR A LOS INTEGRANTES DE LA FAMILIA');

                        }
                        $obj->can_proteccion=$this->can_proteccion;
                    }

                    $obj->buscado=$this->buscado;
                    $obj->canvis=$this->canvisitas;
                    $obj->programa=$this->aceptopro;
                    $obj->firmo=$this->firmoacu;
                    $obj->mensajes=$this->autorizomen;
                    $obj->datos=$this->autorizoda;
                    $obj->presencial=$this->autorizopre;
                    $obj->fotografia=$this->autorizofot;
                    $obj->tip_doca=$this->tipodocj;
                    $obj->num_doca=$this->numdocj;
                    $obj->primer_noma=strtoupper($this->primernomj);
                    $obj->primer_apea=strtoupper($this->primerapej);
                    $obj->direcciona=strtoupper($this->direccion);
                    $obj->telefonoa=$this->telefono;
                    $obj->fechavin=$this->fechavin;
                    $obj->integrantes=$this->integrantes;
                    $obj->estado=1;

                }else{
                    $validatedDate = $this->validate([
                        'obs1' => 'required',
                        'canvisitas' => 'required',
                    ]);
                    $obj->buscado=$this->buscado;
                    $obj->canvis=$this->canvisitas;
                    $obj->programa=$this->aceptopro;
                    $obj->observacion1=$this->obs1;

                    if($this->obs1=='J) OTRO'){
                        $validated = $this->validate([
                            'obs2' => 'required',
                        ]);
                    $obj->observacion2=strtoupper($this->obs2);
                    }
                    $obj->estado=2;
                }
                    $obj->profesional=auth()->user()->name;
                    $obj->docpro=auth()->user()->documento;
                    $obj->uat=$profesionalUnidad->unidad->nombre;
                    $obj->save();
                    if($obj->programa=="SI"){
                        Seguimiento::create([
                            'id_focalizacion'=>$obj->id_focalizacion,
                            'integrantes'=>$obj->integrantes,
                            'can_proteccion'=>$obj->can_proteccion,
                            'tipo'=>$profesionalUnidad->unidad->unidad,
                            'uat'=>$obj->uat,
                        ]);
                    }
                $this->resetInputs();
                DB::commit();
                session()->flash('message', 'SE HA REGISTRADO LA INFORMACION DEL ID '.$obj->id_focalizacion.' EXITOSAMENTE.');
                sleep(1);
                return redirect()->route('focalizacion');


            } catch (\PDOException $e) {
                DB::rollBack();
                session()->flash('advertencia', $e->getMessage());

            }

        }

    }

}
