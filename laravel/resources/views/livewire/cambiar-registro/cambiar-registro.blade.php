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
        <h4 class="card-title">Cambiar Vinculación PAF</h4>
        <h6 class="card-subtitle">Ingrese todos los datos</h6>
      </div>
      <!-- /.box-header -->
      <div class="card-body">
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
                   <th colspan="4"><center>DETALLES DE REGISTRO</center></th>
               </tr>
               <tr>
                   <th>PROFESIONAL ASIGNADO </th>
                   <td>
                    {{ $data->docpro }} - {{ $data->profesional }}
                   </td>
               </tr>
               <tr>
                   <th>MUNICIPIO</th>
                   <th>UNIDAD</th>
                   <th>PROFESIONAL</th>
               </tr>
               <tr>
                   <td>
                        <select class="form-control" wire:model="municipio">
                            <option value="">Seleccione</option>
                           @foreach ($municipios as $item)
                               <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                           @endforeach
                        </select>
                   </td>
                   <td>
                    @if(!empty($municipio))
                    <select class="form-control" wire:model="unidad">
                        <option value="">Seleccione</option>
                        @foreach ($unidades as $item)
                               <option value="{{ $item->id.'-'.$item->nombre  }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @endif
                    </td>
                    <td>
                        @if (!empty($unidad))
                        <select class="form-control" wire:model="profesional">
                            <option value="">Seleccione</option>
                            @foreach ($profesionales as $item)
                            <option value="{{ $item->profesional->documento.'-'.$item->profesional->nombres.' '.$item->profesional->apellidos   }}">{{ $item->profesional->nombres.' '.$item->profesional->apellidos  }}</option>
                        @endforeach
                        </select>
                        @endif
                    </td>
               </tr>

              </table>
              <div wire:loading>
                Procesando...
            </div>
              <div class="form-group" wire:loading.remove>
                <button type="button" wire:click.prevent="update" class="btn btn-primary btn-block">ACTUALIZAR</button>
            </div>
                @else
                <tr>
                  <td>El Código ingresado NO ha sido manipulado por ningún PAF</td>
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
