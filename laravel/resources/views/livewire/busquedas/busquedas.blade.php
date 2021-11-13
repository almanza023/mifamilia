<div>
    <!-- Basic Forms -->
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">Búsqueda de beneficiarios vigencia 2020</h4>
        <h6 class="box-subtitle">Ingrese todos los datos</h6>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col">
                <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                          <h5>Seleccione<span class="text-danger">*</span></h5>
                          <div class="controls">
                              <select class="form-control" wire:model.defer="filtro" >
                                  <option value="0">Todas</option>
                                  <option value="0">Jefe del Hogar</option>
                                  <option value="0">Beneficiario</option>
                                  <option value="0">Otro Integrante de Familia</option>
                              </select>
                          </div>

                      </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <h5>Número Documento <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="number" wire:keydown.enter="buscar" wire:model.defer="documento" class="form-control" required >
                        </div>
                    </div>
                </div>
                </div>
                  <div class="text-xs-right">
                      <button type="button" wire:click="buscar()" class="btn btn-info">Consultar</button>
                  </div>

                  <div wire:loading>
                   Buscando información...
                </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </div>


      @if(!empty($documento))
      <div class="box" wire:loading.remove>
        <div class="box-header with-border">
          <h4 class="box-title">Resultado de Búsqueda</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
               @if(!empty($data))
               <tr>
                   <th colspan="2"><center>INFORMACION JEFE DEL HOGAR</center></th>
               </tr>
               <tr>
                <th>ID FOCALIZACION</th>
                <td>{{ $data->id_focalizacion }}</td>
              </tr>
               <tr>
                <th>TIPO ACOMPAÑAMIENTO</th>
                <td>{{ $data->tipo_acom }}</td>
              </tr>
              <tr>
                <th>FUENTE</th>
                <td>{{ $data->fuente }}</td>
              </tr>
               <tr>
                  <th>DEPARTAMENTO</th>
                  <td>{{ $data->departamentof }}</td>
                </tr>
                <tr>
                  <th>MUNICIPIO</th>
                  <td>{{ $data->municipiof }}</td>
                </tr>
                <tr>
                    <th>TIPO DOCUMENTO</th>
                    <td>{{ $data->tipo_docj }}</td>
                  </tr>
                <tr>
                  <th>JEFE DEL HOGAR</th>
                  <td>{{ $data->JefeHogar }}</td>
                </tr>
                  <th>DIRECCION</th>
                  <td>{{ $data->direccionf1 }}</td>
                </tr>
                <tr>
                  <th>TELEFONO</th>
                  <td>{{ $data->telefono1 }}</td>
                </tr>
                <tr>
                    <th colspan="2"><center>INFORMACION DEL BENEFICIARIO</center></th>
                </tr>
                 <tr>
                     <th>TIPO DOCUMENTO</th>
                     <td>{{ $data->tipo_docb }}</td>
                </tr>
                <tr>
                    <th>N° DOCUMENTO</th>
                    <td>{{ $data->num_docb }}</td>
               </tr>
                 <tr>
                   <th>BENEFICIARIO</th>
                   <td>{{ $data->Beneficiario }}</td>
                 </tr>
                   <th>DIRECCION</th>
                   <td>{{ $data->direccionf1 }}</td>
                 </tr>
                 <tr>
                   <th>TELEFONO</th>
                   <td>{{ $data->telefono1 }}</td>
                 </tr>
                @else
                <tr>
                  <td>El Documento ingresado no fue Beneficiario del Programa MIFAMILIA en la vigencia 2020</td>
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
