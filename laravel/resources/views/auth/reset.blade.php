
<!DOCTYPE html>
<html>
    <head>
        @include('theme.estilos')
        <title>RESTABLECER CONTRASEÑAS</title>
    </head>
    <body class="fixed-left" >
        <!-- Begin page -->
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                        <center>
                            <img src="{{ asset('theme/assets/images/logo-otp.png') }}" alt="">
                            <h2><b>RESTABLECER CONTRASEÑA</b></h2>
                            <h2><b>MI FAMILIA OTP</b></h2>

                        </center>

                    <div class="p-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }} <b><a href="{{ route('login') }}"> Ingresar</a></b>
                        </div>
                    @endif
                        <form class="form-horizontal m-t-20" autocomplete="off" action="{{ route('save') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="">Correo Electrónico</label>
                                    <input class="form-control" type="email"  name="correo" placeholder="Correo ">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="">N° Documento</label>
                                    <input class="form-control" type="number"  name="documento" placeholder="N° Documento">
                                </div>
                            </div>



                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">RESTABLECER CLAVE <i class="mdi mdi-arrow-right-bold-circle"></i></button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="{{ route('login') }}" class="text-danger"><i class="mdi mdi-lock"></i> <small>Iniciar Sesión </small></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('theme.scripts')
    </body>
</html>
