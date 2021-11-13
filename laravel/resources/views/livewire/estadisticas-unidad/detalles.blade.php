<div wire:ignore.self id="modalCreate" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">FAMILIAS VINCULADAS POR PROFESIONAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               @if(!empty($data))
               <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID FOCALIZACION</th>
                            <th>TIPO ACOMPAÑAMIENTO</th>
                            <th>FUENTE</th>
                            <th>JEFE DEL HOGAR</th>
                            <th>BENEFICIARIO</th>
                            <th>FECHA VINCULACION</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        @php
                            $class='';
                        @endphp

                        <div class="table-responsive">
                            <tr>
                                <td >{{ $loop->iteration }}</td>
                                <td >{{ $item->id_focalizacion }}</td>
                                <td>{{ $item->tipoacom }}</td>
                                <td>{{ $item->fuente }}</td>
                                <td>{{ $item->JefeHogar }}</td>
                                <td>{{ $item->Beneficiario }}</td>
                                <td >{{ $item->fechavin }}</td>


                            </tr>
                        </div>
                        @empty
                            <tr>
                                <td colspan="10"><center>No Existen datos</center></td>
                            </tr>
                        @endforelse
                        <tr>
                            <th>Total Registros:{{ count($data) }}</th>
                        </tr>
                    </tbody>
                    </tbody>
                </table>
                </div>
            @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                    "></i> CERRAR</button>
            </div>
        </div>
    </div>
</div>
