<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="btn-group float-right">
                    <ol class="breadcrumb hide-phone p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Panel principal</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-webcam"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10">
                                <h5 class="mt-0 round-inner">VINCULADOS: <b>{{ $data['intensivos'] }}</b></h5>
                                <h5 class="mt-0 round-inner">META SOCIAL: <b>{{ $data['metaIntensivos'] }}</b></h5>
                                <p class="mb-0 text-muted"> INTENSIVO</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger">  <span>{{ $data['porcentajeIntensivo'] }}%</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round">
                                <i class="mdi mdi-account-multiple-plus"></i>
                            </div>
                        </div>
                        <div class="col-6 text-center align-self-center">
                            <div class="m-l-10 ">
                                <h5 class="mt-0 round-inner">VINCULADOS <b>{{ $data['discapacidad'] }}</b></h5>
                                <h5 class="mt-0 round-inner">META SOCIAL <b>{{ $data['metaDiscapacidad'] }}</b></h5>
                                <p class="mb-0 text-muted">PREVENTIVO - DISCAPACIDAD</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> </i> <span>{{ $data['porcentajeDiscapacidad'] }}%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="col-3 align-self-center">
                            <div class="round ">
                                <i class="mdi mdi-basket"></i>
                            </div>
                        </div>
                        <div class="col-6 align-self-center text-center">
                            <div class="m-l-10 ">
                                <h5 class="mt-0 round-inner">VINCULADOS:  <b>{{ $data['preventivos'] }}</b></h5>
                                <h5 class="mt-0 round-inner">META SOCIAL: <b>{{ $data['metaPreventivos'] }}</b></h5>
                                <p class="mb-0 text-muted">PREVENTIVO</p>
                            </div>
                        </div>
                        <div class="col-3 align-self-end align-self-center">
                            <h6 class="m-0 float-right text-center text-danger"> <span></b>{{ $data['porcentajePreventivos'] }}%</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 align-self-center">
            <div class="jumbotron">
                <b><h1 class="display-5">{{ $info['nombre'] }}</h1></b>
                <h3 >{{ $profesional->cargo }}</h1>
                <ul>
                    <li>N° {{ $info['documento'] }}</b></li>
                    <li>UNIDAD: <b>{{ $info['uat'] }}</b></li>
                    <li>MUNICIPIO: <b>{{ $info['municipio'] }}</b></li>
                </ul>
                <p class="lead">
                    <br>
                  <a class="btn btn-primary btn-lg" href="{{ route('focalizacion') }}" role="button">Vincular</a>
                </p>
              </div>
        </div>

    </div>

</div>
