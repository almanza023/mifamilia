<div wire:ignore.self id="modalCreate" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DETALLES DE REGISTRO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               @if(!empty($det))
               <div class="table-responsive">
                <table class="table table-hover">
                    <tr>
                        <tr>
                            <th>ID FOCALIZACION: {{ $det->id_focalizacion }} </th>
                            <th>TIPO ACOMPAÑAMIENTO: {{ $det->huella->tipoacom }} </th>
                        </tr>
                        <th>
                            CANTIDAD DE INTEGRANTES
                        </th>
                        <td>
                            <input type="number" class="form-control" wire:model="integrantes">
                            @error('integrantes') <span class="text-danger error">{{ $message }}</span>@enderror
                        </td>
                    </tr>
                    @if($det->huella->tipoacom=='INTENSIVO')
                    <tr>
                        <th>
                            CANTIDAD DE NNJ EN PROTECCION
                        </th>
                        <td>
                            <input type="number" class="form-control" wire:model="can_proteccion">
                            @error('can_proteccion') <span class="text-danger error">{{ $message }}</span>@enderror
                        </td>
                    </tr>
                    @endif

                </table>
            </div>
               @endif

            </div>
            <div class="modal-footer">
                <button type="button" wire:click="update" class="btn btn-raised btn-success ml-2"><i class="mdi mdi-content-save-all">
                </i> ACTUALIZAR</button>
                <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                    "></i> CANCELAR</button>
            </div>
        </div>
    </div>
</div>
