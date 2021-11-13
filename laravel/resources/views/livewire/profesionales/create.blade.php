<div wire:ignore.self id="modalCreate" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DATOS DE PROFESIONAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <input type="text" wire:model.defer="nombres" class="form-control"  required>
                            @error('nombres') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Apellidos</label>
                            <input type="text" wire:model.defer="apellidos" class="form-control"  required>
                            @error('apellidos') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Número Documento</label>
                            <input type="text" wire:model.defer="documento" class="form-control"  required>
                            @error('documento') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Teléfono</label>
                            <input type="text" wire:model.defer="telefono" class="form-control"  required>
                            @error('telefono') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <input type="text" wire:model.defer="correo" class="form-control"  required>
                            @error('correo') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Profesíon</label>
                            <input type="text" wire:model.defer="profesion" class="form-control"  required>
                            @error('profesion') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Cargo</label>
                          <select class="form-control" wire:model.defer="cargo">
                              <option value="">Seleccione</option>
                              <option value="GERENTE">GERENTE</option>
                              <option value="GESTOR DE OFERTA">GESTOR DE OFERTA</option>
                              <option value="GESTOR DE INFORMACION">GESTOR DE INFORMACION</option>
                              <option value="GESTOR DE SEGUIMIENTO Y MONITOREO">GESTOR DE SEGUIMIENTO Y MONITOREO</option>
                              <option value="ASESOR PEDAGOOGICO">ASESOR PEDAGOOGICO</option>
                              <option value="ASESOR PSICOSOCIAL">ASESOR PSICOSOCIAL</option>
                              <option value="PAF">PROFESIONAL DE ACOMPAÑAMIENTO FAMILIAR</option>

                          </select>
                            @error('cargo') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Municipio</label>
                          <select class="form-control" wire:model="municipio">
                              <option value="">Seleccione</option>
                             @foreach ($municipios as $item)
                                 <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                             @endforeach

                          </select>
                            @error('municipio') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Unidad</label>
                          <select class="form-control" wire:model="unidad">
                              <option value="">Seleccione</option>
                             @foreach ($unidades as $item)
                                 <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                             @endforeach

                          </select>
                            @error('unidad') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Contraseña</label>
                            <input type="password" wire:model.defer="clave" class="form-control"  required>
                            @error('unidad') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>


                </div>



            </div>
            <div class="modal-footer">
                <button type="button" wire:click="store" class="btn btn-raised btn-primary ml-2"><i class="mdi mdi-content-save-all">
                </i> GUARDAR</button>
                <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                    "></i> CANCELAR</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<div wire:ignore.self id="modalCreate" class="modal fade bd-example-modal-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="exampleModalform">DATOS DE PROFESIONAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Nombres</label>
                            <input type="text" wire:model.defer="nombres" class="form-control"  required>
                            @error('nombres') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Apellidos</label>
                            <input type="text" wire:model.defer="apellidos" class="form-control"  required>
                            @error('apellidos') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Número Documento</label>
                            <input type="text" wire:model.defer="documento" class="form-control"  required>
                            @error('documento') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Teléfono</label>
                            <input type="text" wire:model.defer="telefono" class="form-control"  required>
                            @error('telefono') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Correo</label>
                            <input type="text" wire:model.defer="correo" class="form-control"  required>
                            @error('correo') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Profesíon</label>
                            <input type="text" wire:model.defer="profesion" class="form-control"  required>
                            @error('profesion') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">Cargo</label>
                          <select class="form-control" wire:model.defer="cargo">
                              <option value="">Seleccione</option>
                              <option value="GERENTE">GERENTE</option>
                              <option value="GESTOR DE OFERTA">GESTOR DE OFERTA</option>
                              <option value="GESTOR DE INFORMACION">GESTOR DE INFORMACION</option>
                              <option value="GESTOR DE SEGUIMIENTO Y MONITOREO">GESTOR DE SEGUIMIENTO Y MONITOREO</option>
                              <option value="ASESOR PEDAGOOGICO">ASESOR PEDAGOOGICO</option>
                              <option value="ASESOR PSICOSOCIAL">ASESOR PSICOSOCIAL</option>
                              <option value="PAF">PROFESIONAL DE ACOMPAÑAMIENTO FAMILIAR</option>

                          </select>
                            @error('fechaActivacion') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>


                </div>


            </div>
            <div class="modal-footer">
                <button type="button" wire:click="store" class="btn btn-raised btn-primary ml-2"><i class="mdi mdi-content-save-all">
                </i> GUARDAR</button>
                <button type="button" class="btn btn-raised btn-danger ml-2" data-dismiss="modal"><i class="mdi mdi-close-octagon
                    "></i> CANCELAR</button>
            </div>
        </div>
    </div>
</div>
