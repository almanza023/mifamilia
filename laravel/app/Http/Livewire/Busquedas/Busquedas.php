<?php

namespace App\Http\Livewire\Busquedas;

use App\Models\Focalizacion;
use Livewire\Component;

class Busquedas extends Component
{
    public $documento, $filtro, $data;
    public function render()
    {
        return view('livewire.busquedas.busquedas');
    }

    public function buscar(){
        $validatedDate = $this->validate([
            'documento' => 'required',
        ]);
        $this->data=Focalizacion::validarBeneficiario($this->documento);

    }
}
