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
    <!-- Basic Frms -->
      <div class="card" >
        <div class="card-header with-border">
          <h4 class="card-title">Datos Básicos</h4>
        </div>
        <!-- /.box-header -->
        <div class="card-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
                  <tr>
                      <th>MUNICIPIO</th>
                      <th>UNIDAD</th>
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
                               <option value="{{ $item->id.'|'.$item->nombre  }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @endif
                    </td>

               </tr>

              </table>
              <div wire:loading>
                Buscando...
            </div>
              <div class="form-group" wire:loading.remove>
                <button type="button" wire:click.prevent="buscar" class="btn btn-primary btn-block">CONSULTAR</button>
            </div>


              </table>

            </div>
        </div>
        <!-- /.box-body -->
      </div>
    <!-- /.box -->
    <br>
    @if ($contadores)
    <div class="card" >
        <div class="card-header with-border">
          <h4 class="card-title">ESTADISTICA DE UNIDAD DE ACOMPAÑAMIENTO FAMILIAR</h4>
        </div>
        <!-- /.box-header -->
        <div class="card-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
                  <tr>
                      <th>CANTIDAD POR TIPO DE ACOMPAÑAMIENTO</th>
                  </tr>
                  <tr>
                      <th>INTENSIVO</th>
                      <th>PREVENTIVO - DISCAPACIDAD</th>
                      <th>PREVENTIVO</th>
                  </tr>
               <tr>
                    <th>
                        {{ $contadores['intensivos'] }}
                    </th>
                    <th>
                        {{ $contadores['discapacidad'] }}
                    </th>
                    <th>
                        {{ $contadores['preventivos'] }}
                    </th>
               </tr>
               <tr>
                   <TH>VINCULADOS</TH>
                   <td>{{ $contadores['vinculados'] }}</td>
               </tr>
               <tr>
                <TH> NO VINCULADOS</TH>
                <td>{{ $contadores['noVinculados'] }}</td>
            </tr>
              </table>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>
    @endif
<br>
    @if ($familiasProfesionales)
    <div class="card" >
        <div class="card-header with-border">
          <h4 class="card-title">PROFESIONALES DE UNIDAD DE ACOMPAÑAMIENTO </h4>
        </div>
        <!-- /.box-header -->
        <div class="card-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
                  <tr>
                      <th>PROFESIONAL</th>
                      <th>CANTIDAD DE FAMILIAS VINCULADAS</th>
                      <th>DETALLES</th>
                  </tr>

                @foreach ($familiasProfesionales as $item)
                <tr>
                   <th>
                    {{ $item['nombre'] }}
                </th>
                <th>
                    {{ $item['cantidad'] }}
                </th>
                <th>
                    <td>
                        <button data-toggle="modal" data-target="#modalCreate" wire:click="edit({{ $item['documento']}})" class="btn btn-outline-info btn-sm"><i class="typcn typcn-edit"></i></button>
                    </td>
                </th>
            </tr>
                @endforeach


              </table>
            </table>
            </div>
        </div>
        <!-- /.box-body -->
      </div>

    @endif
    @include('livewire.estadisticas-unidad.detalles')




</div>
