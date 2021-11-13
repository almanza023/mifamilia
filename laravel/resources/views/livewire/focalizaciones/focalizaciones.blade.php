<div>
    @if (session()->has('message'))
    <script>
        mensaje("{{ session('message') }}")
    </script>
    @endif
    @if (session()->has('advertencia'))
    <script>
        advertencia("{{ session('advertencia') }}")
    </script>
    @endif
    <!-- Basic Forms -->
    <div class="card">
      <div class="card-header with-border">
        <h4 class="card-title">Búsqueda de beneficiarios vigencia 2021-2022</h4>
        <h6 class="card-subtitle">Ingrese todos los datos</h6>
      </div>
      <!-- /.box-header -->
      <div class="card-body">
        @if(!empty($estadisticas))
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th><center>ESTADISTICAS DEL DÍA {{ $estadisticas['fecha'] }} </center></th>
                </tr>
                <tr>
                    <th>VINCULADAS</th>
                    <td>{{ $estadisticas['vinculados'] }}</td>
                </tr>
                <tr>
                    <th>NO VINCULADAS</th>
                    <td>{{ $estadisticas['noVinculados'] }}</td>
                </tr>
                <tr>
                    <th>TOTAL</th>
                    <td>{{ $estadisticas['total'] }}</td>
                </tr>
            </table>
        </div>
        @endif
        <div class="row">
          <div class="col">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                        <h5>Código Focalización <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="number" wire:keydown.enter="buscar" wire:model.defer="codigo" class="form-control" required >
                            @error('codigo') <span class="text-danger error">{{ $message }}</span>@enderror

                        </div>
                    </div>

                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <h5>ID Focalización<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" class="form-control" wire:model.defer="id_focalizacion" readonly>
                        </div>

                    </div>
                </div>
                </div>
                  <div class="text-xs-right">
                      <button type="button" wire:click="buscar()" class="btn btn-info">Consultar</button>
                  </div>


          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </div>


      @if(!empty($codigo))
      <div class="card" >
        <div class="card-header with-border">
          <h4 class="card-title">Resultado de Búsqueda</h4>
        </div>
        <!-- /.box-header -->
        <div class="card-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
               @if(!empty($data))
               <tr class="bg-warning">
                   <th colspan="4"><center>INFORMACION JEFE DEL HOGAR</center></th>
               </tr>

               <tr>
                <th>TIPO ACOMPAÑAMIENTO</th>
                <th>FUENTE</th>
                <th>DEPARTAMENTO</th>
                <th>MUNICIPIO</th>

              </tr>
              <tr>
                <td>{{ $data->tipoacom }}</td>
                <td>{{ $data->fuente }}</td>
                <td>{{ $data->departamento }}</td>
                <td>{{ $data->municipio }}</td>
              </tr>
              <tr class="bg-info">
                <th colspan="4" class="text-bold"><center>DATOS DE UBICACIÓN E INFORMACION DE LA FAMILIA</center></th>
            </tr>
                <tr>
                    <th>TIPO DOCUMENTO</th>
                    <th>N° DOCUMENTO</th>
                    <th>JEFE DEL HOGAR</th>
                  </tr>
                <tr>
                    <td>{{ $data->tipo_docj }}</td>
                    <td>{{ $data->num_docj }}</td>
                  <td>{{ $data->JefeHogar }}</td>
                </tr>
                <tr>
                  <th>DIRECCION 1</th>
                  <th>BARRIO 1</th>

                    <th>DIRECCION 2</th>
                    <th>BARRIO 2</th>

                </tr>
                <tr>
                    <td>{{ $data->direccionf1 }}</td>
                    <td>{{ $data->barriof1 }}</td>
                    <td>{{ $data->direccionf2 }}</td>
                    <td>{{ $data->barriof2 }}</td>
                </tr>

                <tr>
                  <th>TELEFONO 1</th>
                  <th>TELEFONO 2</th>
                  <th>TELEFONO 3</th>
                  <th>TELEFONO 4</th>
                </tr>
                <tr>
                    <td>{{ $data->telefono1 }}</td>
                    <td>{{ $data->telefono2 }}</td>
                    <td>{{ $data->telefono3 }}</td>
                    <td>{{ $data->telefono4 }}</td>
                </tr>
                <tr>
                    <th class="bg-primary" colspan="4"><center>INFORMACION DEL BENEFICIARIO</center></th>
                </tr>
                 <tr >
                     <th><b>TIPO DOCUMENTO</b></th>
                     <th>N° DOCUMENTO</th>
                     <th>BENEFICIARIO</th>
                     <th>DIRECCION</th>

                </tr>
                <tr>
                    <td>{{ $data->tipo_docb }}</td>
                     <td>{{ $data->num_docb }}</td>
                    <td>{{ $data->Beneficiario }}</td>
                    <td>{{ $data->direccionf1 }}</td>
               </tr>


                 <tr>
                   <th>TELEFONO</th>
                   <td>{{ $data->telefono1 }}</td>
                 </tr>
              </table>
              <table class="table">
                  <tr class="bg-success">
                      <th colspan="4" class="text-center">ACTUALIZACION DE DATOS</th>
                  </tr>

                <tr>
                    <th>¿FUE BUSCADO?</th>
                    <th>ACEPTO PERTENECER AL PROGRAMA</th>
                    <th>¿CANTIDAD DE VISITAS REALIZADAS?</th>
                    <th>FIRMÓ ACUERDO DE VINCULACIÓN</th>
                </tr>
                <tr>
                   <td>
                       <select class="form-control" wire:model="buscado">
                           <option value="">Seleccione</option>
                           <option value="SI">SI</option>
                           <option value="NO">NO</option>
                       </select>
                       @error('buscado') <span class="text-danger error">{{ $message }}</span>@enderror
                   </td>
                   <td>
                    <select class="form-control" wire:model="aceptopro">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('aceptopro') <span class="text-danger error">{{ $message }}</span>@enderror
                    </td>
                   <td>
                       <input type="number" class="form-control" wire:model.defer="canvisitas">
                       @error('canvisitas') <span class="text-danger error">{{ $message }}</span>@enderror
                   </td>

                @if($visible==false)
                <td>
                    <select class="form-control" wire:model.defer="firmoacu">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('firmoacu') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                @endif
                </tr>
                @if($visible==false)
                <tr>
                    <th>
                        <button type="button" class="btn btn-warning" wire:click="marcar">MARCAR SI</button>
                    </th>
                    <th>
                      <button type="button" class="btn btn-danger" wire:click="marcarNo">QUITAR MARCARDO</button>
                  </th>
                </tr>
               <tr>
                   <th>AUTORIZÓ EL REGISTRO Y PROTECCIÓN DE DATOS DE PERSONALES</th>
                   <th>AUTORIZÓ EL ENVÍO DE MENSAJES DE TEXTO O LLAMADAS TELEFÓNICAS PARA EL ACOMPAÑAMIENTO NO PRESENCIAL</th>
                   <th>AUTORIZÓ EL USO DE REGISTROS FOTOGRÁFICOS, AUDIOS Y VIDEOS PARA EL DESARROLLO DE CAMPAÑAS DEL ICBF</th>
                   <th><p>AUTORIZÓ BRINDAR ATENCIÓN DE FORMA PRESENCIAL Y/O NO PRESENCIAL CUMPLIENDO TODOS LOS PROTOCOLOS DE BIOSEGURIDAD PARA MITIGAR, CONTROLAR E IMPEDIR LA PROPAGACIÓN DEL COVID-19
                </p></th>
               </tr>
               <tr>
                <td>
                    <select class="form-control" wire:model.defer="autorizoda">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('autorizoda') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td>
                    <select class="form-control" wire:model.defer="autorizomen">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('autorizomen') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td>
                    <select class="form-control" wire:model.defer="autorizofot">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('autorizofot') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td>
                    <select class="form-control" wire:model.defer="autorizopre">
                        <option value="">Seleccione</option>
                        <option value="SI">SI</option>
                        <option value="NO">NO</option>
                    </select>
                    @error('autorizopre') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
               </tr>
               <tr>
                <th>
                    <button type="button" class="btn btn-info" wire:click="copiar">COPIAR DATOS</button>
                </th>
                <th>
                    <button type="button" class="btn btn-danger" wire:click="quitar">QUITAR</button>
                </th>

            </tr>
               <tr>
                   <th>FECHA VINCULACIÓN</th>
                   <th >TIPO DE DOCUMENTO DE IDENTIDAD DEL JEFE DE GRUPO FAMILIAR </th>
                   <th >NÚMERO DE DOCUMENTO DE IDENTIDAD DEL JEFE DE GRUPO FAMILIAR  </th>
                   <th >INTEGRANTES NUCLEO FAMILIAR  </th>
               </tr>
               <tr>
                   <td>
                       <input type="date" class="form-control" wire:model="fechavin">
                       @error('fechavin') <span class="text-danger error">{{ $message }}</span>@enderror
                   </td>
                   <td >
                    <select class="form-control" wire:model="tipodocj">
                        <option value="">Seleccione</option>
                        <option value="RC">RC</option>
                        <option value="TI">TI</option>
                        <option value="CC">CC</option>
                        <option value="CE">CE</option>
                        <option value="PA">PA</option>
                        <option value="PEP">PEP</option>
                        <option value="TMF">TMF</option>
                        <option value="VISA">VISA</option>
                    </select>
                    @error('tipodocj') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td >
                    <input type="number" class="form-control" wire:model.defer="numdocj">
                    @error('numdocj') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td >
                    <input type="number" class="form-control" wire:model.defer="integrantes">
                    @error('integrantes') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
               </tr>

               <tr>
                <th>PRIMER NOMBRE</th>
                <th>PRIMER APELLIDO</th>
                <th>DIRECCION</th>
                <th>TELEFONO</th>
               </tr>
               <tr>
                   <td>
                       <input type="text" class="form-control" wire:model.defer="primernomj">
                       @error('primernomj') <span class="text-danger error">{{ $message }}</span>@enderror
                   </td>
                   <td>
                    <input type="text" class="form-control" wire:model.defer="primerapej">
                    @error('primerapej') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td>
                    <input type="text" class="form-control" wire:model.defer="direccion">
                    @error('direccion') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
                <td>
                    <input type="number" class="form-control" wire:model.defer="telefono">
                    @error('telefono') <span class="text-danger error">{{ $message }}</span>@enderror
                </td>
               </tr>
               @if($data->fuente=="PROTECCIÓN")
                    <tr>
                        <th>CANTIDAD DE NNJ EN PROTECCION</th>
                        <td>
                         <input type="number" class="form-control" wire:model.defer="can_proteccion">
                         @error('can_proteccion') <span class="text-danger error">{{ $message }}</span>@enderror
                     </td>
                    </tr>
                @endif
               @else
                    @if($aceptopro=='NO')
                    <tr>
                        <td colspan="4"> OBSERVACION 1</td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <select class="form-control" wire:model="obs1">
                                <option value="">Seleccione</option>
                                @foreach ($observaciones as $item)
                                <option value="{{ $item->descripcion }}">{{ $item->descripcion }}</option>
                                @endforeach
                            </select>
                            @error('obs1') <span class="text-danger error">{{ $message }}</span>@enderror
                        </td>
                    </tr>
                    @if($visible2)
                    <tr>
                        <td colspan="4"> OBSERVACION 2 (Indique la observacion)</td>
                    </tr>
                    <tr>

                        <td colspan="4">
                        <textarea class="form-control" wire:model.defer="obs2" cols="3" rows="4"></textarea>

                         @error('obs2') <span class="text-danger error">{{ $message }}</span>@enderror
                     </td>

                    </tr>
                    @endif

                    @endif
               @endif

              </table>
              <div wire:loading>
                Procesando...
            </div>
              <div class="form-group" wire:loading.remove>
                <button type="button" wire:click.prevent="update" class="btn btn-primary btn-block">GUARDAR</button>
            </div>
                @else
                <tr>
                  <td>El Código ingresado no fue encontrado en el Programa MIFAMILIA en la vigencia 2021</td>
                  </tr>
               @endif


              </table>

            </div>
        </div>
        <!-- /.box-body -->
      </div>
      @endif
        <!-- /.box -->


    <!-- /.box -->
</div>
