
<!DOCTYPE html>
<html>
    <head>
        @include('theme.estilos')
        @livewireStyles
        <title>REGISTRO DE DATOS </title>
    </head>
    <body class="">
        <div class="topbar">
            <br>
            <nav class="navbar-custom bg-info"               
                <a>
                    <center>
                      
                        <h2 style="color: white"><b>AGENDAMIENTOS DE CITAS</b></h2>
                    </center>
                </a>
               
               
        
            </nav>
        
        </div>
        <!-- Begin page -->
        <div class="wrapper-page2">

            <div class="card" style="width: 100%">
                <div class="card-header card-info">
                    <h4 style="color: white">REGISTRO DE DATOS</h4>
                </div>
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin">

                        </a>
                    </h3>                
                    <div class="p-3" >
                        <center><img src="{{ asset('theme/assets/images/logo_medicosta.png') }}" alt="" 
                            width="280px" height="150px">
                            
                        </center><br>
                        <livewire:register />
                    </div>

                </div>
            </div>
        </div>
        @include('theme.scripts')
        @livewireScripts
        <script>
            function mensaje(valor){
             swal(
                 {
                     title: 'EXITOSO',
                     text: valor,
                     type: 'success',
                     showCancelButton: true,
                     confirmButtonClass: 'btn btn-success',
                     cancelButtonClass: 'btn btn-danger m-l-10'
                 }
             )
            }
            function advertencia(valor){
                swal(
                    {
                        title: 'SINSA ERP',
                        text: valor,
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10'
                    }
                )
               }

               window.livewire.on('notificacion', () => {
                $('#notificacionModal').modal('show');
            });
         </script>
    </body>
</html>
