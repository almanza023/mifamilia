<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center py-2">
            <a href="{{ route('home') }}" class="logo"> <img src="{{ asset('theme/assets/images/logo-mifamilia.png') }}" width="220" alt="logo"></a>

            @if(!empty(auth()->user()->name))
                <p style="font-size: 11px"><b>{{ auth()->user()->name }}</b></p>
            @endif
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Opciones</li>
                <li>
                    <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-calendar"></i><span> Inicio </span></a>
                </li>

                @if(auth()->user()->rol==1)
                <li>
                    <a href="{{ route('profesionales') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Profesionales </span></a>
                </li>
                @endif

                @if(auth()->user()->rol==2 || auth()->user()->rol==1)
                <li>
                    <a href="{{ route('estadisticas-unidad') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Estadisticas Unidad </span></a>
                </li>

                <li>
                    <a href="{{ route('cambiar-registro') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Cambiar Familia de PAF </span></a>
                </li>

                @endif

                @if(auth()->user()->rol==3)
                <li>
                    <a href="{{ route('focalizacion') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Focalizaciones </span></a>
                </li>

                <li>
                    <a href="{{ route('historial') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Historial </span></a>
                </li>

                <li>
                    <a href="{{ route('seguimiento') }}" class="waves-effect"><i class="mdi mdi-account-box"></i><span> Formato Seguimiento </span></a>
                </li>

                @endif




                <li>
                    <a data-target='#salirModal' data-toggle='modal' class="waves-effect"><i class="mdi mdi-close"></i><span> Cerrar Sesión </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
